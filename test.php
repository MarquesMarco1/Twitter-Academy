<?php 
$directory = "assets/save_image_user/";
$filecount = count(glob($directory . "*"));
echo "There were $filecount files";

$url = "https://example.com/image.jpg";
$image = file_get_contents($url);
file_put_contents("path/to/save/image.jpg", $image);


?>