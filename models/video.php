<?php
require_once('../includes/config.inc.php');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

$result = $mysqli->query("SELECT * FROM videolist");


$videoArray = array();

while ($video = $result->fetch_assoc()) {
	$videoArray[] = array("src" => "" . $video['src'] . "", "title" => "" . $video['title'] . "");
}

$jsonArray = array("video" => $videoArray);
echo json_encode($jsonArray);
?>