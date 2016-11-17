<?php
# This php script converts all of the loadingscreen pngs to interlaced pngs.

$path = "../../dota-vpk/panorama/images/loadingscreens";

$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
$screens = array(); 
foreach ($files as $file) {
	if (!$file->isDir())
		$screens[] = $file->getPathname();
}

$count = 0;
$length = count($screens);
$percent = -1;

foreach($screens as $screen)
{
	$img = imagecreatefrompng($screen);

	imageinterlace($img, true);

	imagepng($img, $screen);
	imagedestroy($img);

	$count++;
	if($percent != intval(100 * ($count / $length))) {
		$percent = intval(100 * ($count / $length));
		echo($percent . "%\n");
	}
}

?>