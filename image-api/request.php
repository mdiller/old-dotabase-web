<?php
ob_start();
include "../resources/base.php";
ob_end_clean();

if(!isset($_GET['match'])){
	http_response_code(500);
	echo "match not set";
	die(1);
}
if(!isset($_GET['parsed'])){
	http_response_code(500);
	echo "parsed not set";
	die(1);
}

$matchid = $_GET['match'];
$is_parsed = $_GET['parsed'] == "true";

$filename = "match_" . $matchid . ".png";
if($is_parsed){
	$filename = "parsed_" . $filename;
}
$queryurl = SITE_URL . "/image-api/matches.php?match=" . $matchid;
$filepath = __DIR__ . "/images/" . $filename;
$fileurl = SITE_URL . "/image-api/images/" . $filename;
$scriptpath = __DIR__ . "/webkit2png.js";

$output = shell_exec("phantomjs " . $scriptpath . " " . $queryurl . " " . $filepath);


$data = array('file' => $fileurl);
header('Content-Type: application/json;charset=utf-8');
echo json_encode($data);
die(0);

/*
tempfile = "{}temp/match_{}.png".format(settings.resourcedir, match_id)
webkit2png = settings.resourcedir + "scripts/webkit2png.js"
url = "http://dotabase.me/image-api/matches.php?match={}".format(match_id)
helpers.run_command(["phantomjs", webkit2png, url, tempfile])
*/

?>