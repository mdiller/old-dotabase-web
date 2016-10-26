<?php 

function init_dotabase(){
	return new PDO("sqlite:" . DOTABASE_PATH . "/dotabase.db");
}

function attr_icon($attr) {
	$attr_icon_dict = array(
		"DOTA_ATTRIBUTE_STRENGTH" => (VPK_PATH . "/resource/flash3/images/heroes/selection/pip_str.png"),
		"DOTA_ATTRIBUTE_INTELLECT" => (VPK_PATH . "/resource/flash3/images/heroes/selection/pip_int.png"),
		"DOTA_ATTRIBUTE_AGILITY" => (VPK_PATH . "/resource/flash3/images/heroes/selection/pip_agi.png"),
	);
	return $attr_icon_dict[$attr];
}

?>