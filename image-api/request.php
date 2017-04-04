<?php
ob_start();
include "../resources/base.php";
ob_end_clean();

if(!isset($_GET['match'])){
	http_response_code(500);
	echo "match not set";
	die(1);
}
if(!is_numeric($_GET['match'])){
	http_response_code(500);
	echo "matchid should be a number";
	die(1);
}

$matchid = $_GET['match'];

$filepath = __DIR__ . "/images/";
$scriptpath = __DIR__ . "/drawdota.py";
$fileurl = SITE_URL . "/image-api/images/";

$output = shell_exec("python3.6 " . $scriptpath . " " . $matchid . " " . $filepath . " " . VPK_PATH);

$data = array('file' => $fileurl . trim($output));
header('Content-Type: application/json;charset=utf-8');
echo json_encode($data);
die(0);

?>