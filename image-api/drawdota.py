import aiohttp
import asyncio
import async_timeout
import json
import sys
from dotabase import *
from PIL import Image, ImageDraw
from tabledraw import Table, ImageCell, TextCell, ColorCell
from io import BytesIO

db_session = dotabase_session()
# vpkurl = "http://dotabase.me/dota-vpk"
radiant_icon = "radiant.png"
dire_icon = "dire.png"

trim_color = "#2C2F33"
background_color = "#23272A"

hero_infos = {}
item_infos = {}

def set_info_dicts(vpkpath):
	global hero_infos, item_infos
	for hero in db_session.query(Hero):
		hero_infos[hero.id] = {
			"name": hero.localized_name,
			"full_name": hero.full_name,
			"icon": vpkpath + hero.icon,
			"image": vpkpath + hero.image,
			"attr": hero.attr_primary
		}
	for item in db_session.query(Item):
		item_infos[item.id] = {
			"name": item.localized_name,
			"icon": vpkpath + item.icon
		}


# async def get_hero_image(hero_id):
# 	async with aiohttp.get(hero_infos[hero_id]["image"]) as r:
# 		return Image.open(BytesIO(await r.read()))

# async def get_item_image(item_id):
# 	async with aiohttp.get(item_infos[item_id]["icon"]) as r:
# 		return Image.open(BytesIO(await r.read()))
async def get_hero_image(hero_id):
	return Image.open(hero_infos[hero_id]["image"])

async def get_item_image(item_id):
	return Image.open(item_infos[item_id]["icon"])

async def get_item_images(player):
	images = []
	for i in range(0, 6):
		item = player.get(f"item_{i}")
		if item:
			images.append(await get_item_image(item))
	if len(images) == 0:
		return None

	widths, heights = zip(*(i.size for i in images))
	result = Image.new("RGBA", (sum(widths), max(heights)))

	x = 0
	for i in range(len(images)):
		result.paste(images[i], (x, 0))
		x += widths[i]
	return result


def get_lane(player):
	lane_dict = { 1: "Bot", 3: "Top" }
	lane_role_dict = { 1: "Safe", 2: "Mid", 3: "Off", 4: "Jungle" }
	if 'is_roaming' in player and player['is_roaming']:
		return "Roaming"
	elif player.get('lane') in lane_dict:
		return f"{lane_role_dict[player['lane_role']]}({lane_dict[player['lane']]})"
	else:
		return lane_role_dict[player.get('lane_role')]

async def add_player_row(table, player, is_parsed):
	row = [
		ColorCell(width=5, color=("green" if player["isRadiant"] else "red")),
		ImageCell(img=await get_hero_image(player["hero_id"]), height=48),
		TextCell(player.get("personaname", "Anonymous")),
		TextCell(player.get("kills")),
		TextCell(player.get("deaths")),
		TextCell(player.get("assists")),
		TextCell(player.get("gold_per_min"), color="yellow"),
		ImageCell(img=await get_item_images(player), height=48)
	]
	if is_parsed:
		row[-1:-1] = [
			TextCell(player.get("actions_per_min")),
			TextCell(get_lane(player)),
			TextCell(player.get("pings", "-"), horizontal_align="center")
		]
	table.add_row(row)

async def draw_match_table(match):
	is_parsed = match.get("version")
	table = Table(background=background_color)
	# Header
	headers = [
		TextCell("", padding=0),
		TextCell(""),
		TextCell("Player"),
		TextCell("K", horizontal_align="center"),
		TextCell("D", horizontal_align="center"),
		TextCell("A", horizontal_align="center"),
		TextCell("GPM", color="yellow"),
		TextCell("Items")
	]
	if is_parsed:
		headers[-1:-1] = [
			TextCell("APM"),
			TextCell("Lane"),
			TextCell("Pings")
		]
	table.add_row(headers)
	for cell in table.rows[0]:
		cell.background = trim_color

	# Do players
	for player in match["players"]:
		if player['isRadiant']:
			await add_player_row(table, player, is_parsed)
	table.add_row([ColorCell(color=trim_color, height=5) for i in range(len(headers))])
	for player in match["players"]:
		if not player['isRadiant']:
			await add_player_row(table, player, is_parsed)
	return table.render()

async def create_match_image(filename, match):
	table_border = 10
	table_image = await draw_match_table(match)

	image = Image.new('RGBA', (table_image.size[0] + (table_border * 2), table_image.size[1] + table_border + 64))
	draw = ImageDraw.Draw(image)
	draw.rectangle([0, 0, image.size[0], image.size[1]], fill=background_color)
	draw.rectangle([0, 64, image.size[0], image.size[1]], fill=trim_color)
	image.paste(table_image, (table_border, 64))

	title = TextCell(f"{'Radiant' if match['radiant_win'] else 'Dire'} Victory", font_size=48, color=("green" if match['radiant_win'] else "red"))
	title.render(draw, image, 64, 0, image.size[0] - 64, 64)

	team_icon = Image.open(radiant_icon if match['radiant_win'] else dire_icon).resize((64, 64))
	temp_image = Image.new("RGBA", image.size)
	temp_image.paste(team_icon, (0, 0))
	image = Image.alpha_composite(image, temp_image)

	image.save(filename)

async def request(session, url):
	with async_timeout.timeout(10):
		async with session.get(url) as response:
			return await response.json()

async def main(loop, match_id, out_directory, vpkpath):
	async with aiohttp.ClientSession(loop=loop) as session: 
		set_info_dicts(vpkpath)
		data = await request(session, f'https://api.opendota.com/api/matches/{match_id}')
		filename = f"match_{match_id}.png"
		if data.get("version"):
			filename = f"parsed_{filename}"
		print(filename)
		await create_match_image(f"{out_directory}/{filename}", data)


if __name__ == '__main__':
	if len(sys.argv) != 4:
		print("usage: drawdota.py <match_id> <out_directory> <vpkpath>")
		exit()

	loop = asyncio.get_event_loop()
	loop.run_until_complete(main(loop, int(sys.argv[1]), sys.argv[2], sys.argv[3]))

