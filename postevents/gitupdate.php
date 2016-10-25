<?php
include "../resources/base.php";

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
		echo $output . "\n";
		echo "updated " . $repo . " at " . mktime();
		die(0);
	}
}
echo "invalid request";
die(1);

?>