<?php
$hotelJsonPath = 'src/data/hotel.json';

$hotelJson = json_decode(file_get_contents($hotelJsonPath), true);


$hotelImage=$hotelJson["hotels"][1]["image"]
?>