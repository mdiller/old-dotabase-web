<?php 

function init_dotabase(){
	return new PDO("sqlite:" . DOTABASE_PATH . "/dotabase.db");
}

function attr_icon($attr) {
	$attr_icon_dict = array(
		"strength" => (VPK_PATH . "/panorama/images/primary_attribute_icons/primary_attribute_icon_strength_psd.png"),
		"intelligence" => (VPK_PATH . "/panorama/images/primary_attribute_icons/primary_attribute_icon_intelligence_psd.png"),
		"agility" => (VPK_PATH . "/panorama/images/primary_attribute_icons/primary_attribute_icon_agility_psd.png"),
	);
	return $attr_icon_dict[$attr];
}

?>