<?php
include "../../resources/base.php";

define("TITLE", "Hero Stats");

$dotabase = init_dotabase();

$heroes = $dotabase->query("SELECT * from heroes ORDER BY localized_name");

include HEADER;
?>

<table id="hero-table" class="table table-sm table-responsive table-header-rotated sortable">
	<thead>
		<th data-defaultsort="asc"><div>Hero</div></th>
		<th class="rotate-45"><div><span>Primary Attribute</span></div></th>
		<th class="rotate-45"><div><span>Base Strength</span></div></th>
		<th class="rotate-45"><div><span>Strength Gain</span></div></th>
		<th class="rotate-45"><div><span>Base Intelligence</span></div></th>
		<th class="rotate-45"><div><span>Intelligence Gain</span></div></th>
		<th class="rotate-45"><div><span>Base Agility</span></div></th>
		<th class="rotate-45"><div><span>Agility Gain</span></div></th>
		<th class="rotate-45"><div><span>Base Health Regen</span></div></th>
		<th class="rotate-45"><div><span>Base Armor</span></div></th>
		<th class="rotate-45"><div><span>Base Movement</span></div></th>
		<th class="rotate-45"><div><span>Turn Rate</span></div></th>
		<th class="rotate-45"><div><span>Attack Range</span></div></th>
		<th class="rotate-45"><div><span>Projectile Speed</span></div></th>
		<th class="rotate-45"><div><span>Attack Damage Min</span></div></th>
		<th class="rotate-45"><div><span>Attack Damage Max</span></div></th>
		<th class="rotate-45"><div><span>Attack Point</span></div></th>
		<th class="rotate-45"><div><span>Attack Rate</span></div></th>
	</thead>
	<tbody>
		<?php 
		foreach($heroes as $hero)
		{
			include "herorow.php"; 
		}
		?>
	</tbody>
</table>

<!-- Sortable Tables -->
<script src="<?php echo JS_URL; ?>bootstrap-sortable.js"></script>

<?php
include FOOTER;


?>
