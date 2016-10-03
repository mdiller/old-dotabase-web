<div class="response">
<?php 

echo $response['text'] . "<br>";
echo "<audio controls> <source src='" . $vpkpath . $response['mp3'] . "' type='audio/mpeg'> </audio>";
//echo "<img src=\"" . $row['iconlink'] . "\" alt=\"" . $row['name'] . "\">";

?>
</div>