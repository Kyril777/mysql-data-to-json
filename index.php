<?php

// Access thne database
include "config.php";

// Retrieves MySQL data on array
$stmt = $db->prepare("SELECT * FROM jsondata");
$stmt->execute();
$myArray = array();
while($data = $stmt->fetchAll()){
  $myArray[] = $data;
}

// Converts MySQL data to JSON
echo json_encode($myArray);
$file = fopen('/var/www/html/mysqldatatatojson/data.json', 'w');
fwrite($file, json_encode($myArray));

?>
