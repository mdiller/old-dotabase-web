<?php
include "resources/base.php";

$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(SITE_PATH . "dota-vpk/panorama/images/loadingscreens"));
$screens = array(); 
foreach ($files as $file) {
    if (!$file->isDir())
        $screens[] = $file->getPathname();
}
$screen = $screens[array_rand($screens)];
$screen = str_replace(SITE_PATH . "dota-vpk", VPK_PATH, $screen);
$screen = str_replace("\\", "/", $screen);

include HEADER;
?>

<h1>Dotabase</h1>


<style>
body {
	background-size: 100% 100%;
	background-image: url("<?php echo $screen; ?>");
}

h1 {
	color: black;
	font-size: 64px;
	font-weight: bold;
	text-shadow: 0px 0px 10px white;
}
</style>

<?php include FOOTER; ?>