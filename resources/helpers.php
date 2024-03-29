<?php

function form_value($name, $type, $select_value = ''){
	if(isset($_GET[$name])){
		switch($type){
			case 'text':{
				return ' value="' . htmlspecialchars($_GET[$name]) . '" ';
				break;
			}
			case 'checkbox':{
				return ' checked ';
				break;
			}
			case 'select':{
				if($_GET[$name] == $select_value) {
					return ' value="' . $select_value . '" selected ';
				} 
				return ' value="' . $select_value . '" ';
				break;
			}
			default:
				throw new Exception("Invalid type for form_value: " . $type);
				return "ERROR";
		}
	}
	if($type == "select") {
		return ' value="' . $select_value . '" ';
	}
	return '';
};

function get_get($name, $default, $type='string'){
	if(isset($_GET[$name])){
		switch($type){
			case 'string':{
				return htmlspecialchars($_GET[$name]);
				break;
			}
			case 'bool':{
				return true;
				break;
			}
			default:
				throw new Exception("Invalid type for get_get: " . $type);
				return "ERROR";
		}
	}
	return $default;
}

?>