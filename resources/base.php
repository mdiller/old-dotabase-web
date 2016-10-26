<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

defined("RESOURCES")
	or define("RESOURCES", __DIR__ . "/");

defined("SITE_PATH")
	or define("SITE_PATH", RESOURCES . "../");
defined("JS_PATH")
	or define("JS_PATH", SITE_PATH . "js/");

defined("SITE_URL")
	or define("SITE_URL", "http://" . $_SERVER['SERVER_NAME']);

defined("VPK_PATH")
	or define("VPK_PATH", SITE_URL . "/dota-vpk");

defined("CSS_URL")
	or define("CSS_URL", SITE_URL . "/css/");

defined("JS_URL")
	or define("JS_URL", SITE_URL . "/js/");


defined("HEADER")
	or define("HEADER", RESOURCES . "header.php");
defined("FOOTER")
	or define("FOOTER", RESOURCES . "footer.php");

include RESOURCES . "helpers.php";
include RESOURCES . "dotabasepath.php";

?>

<!-- CSS File includes -->

<!-- Bootstrap Core CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo CSS_URL ?>base.css" rel="stylesheet">


<!--Javascript file includes -->

<!-- jQuery Version 1.11.1 -->
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Clipboard Javascript -->
<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>
<!-- Custom Javascript -->
<script>
</script>
