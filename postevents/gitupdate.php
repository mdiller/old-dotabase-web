<?php
ob_start();
include "../resources/base.php";
ob_end_clean();

if (!empty($_REQUEST['payload'])) {
	$data = json_decode($_REQUEST['payload'], true);
	$repo = $data['repository']['full_name'];
	switch($repo) {
		case "mdiller/dotabase-web":
			$path = SITE_PATH;
			break;
		case "mdiller/dotabase":
			$path = DOTABASE_PATH;
			break;
		default:
			echo "invalid repository: " . $repo;
			die(1);
	}
	$output = shell_exec("cd " . $path . "; git pull;");
	
	if(is_null($output)) {
		echo "error executing pull";
		die(1);
	}
	else {
		echo $output;
		echo "updated " . $repo . " at " . time();
		die(0);
	}
}
echo "invalid request";
die(1);

?>