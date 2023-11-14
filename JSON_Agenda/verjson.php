<?php
$file = fopen("agenda.csv", 'r');
$header = fgetcsv($file);
$data = array();
while (($row = fgetcsv($file))) {
    $data[] = array_combine($header, $row);
}
fclose($file);
$json = json_encode($data);
header('Content-Type: application/json');
echo $json;
?>