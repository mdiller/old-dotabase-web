<?php 

function init_dotabase(){
	return new PDO("sqlite:" . DOTABASE_PATH . "/dotabase.db");
}

function attr_icon($attr) {
	$attr_icon_dict = array(
		"DOTA_ATTRIBUTE_STRENGTH" => (VPK_PATH . "/panorama/images/primary_attribute_icons/primary_attribute_icon_strength_psd.png"),
		"DOTA_ATTRIBUTE_INTELLECT" => (VPK_PATH . "/panorama/images/primary_attribute_icons/primary_attribute_icon_intelligence_psd.png"),
		"DOTA_ATTRIBUTE_AGILITY" => (VPK_PATH . "/panorama/images/primary_attribute_icons/primary_attribute_icon_agility_psd.png"),
	);
	return $attr_icon_dict[$attr];
}

?>