<?php
$content = $_POST["content"];

$img = preg_replace('#data:image/[^;]+;base64,#', '', $content);


print_r($img);

?>