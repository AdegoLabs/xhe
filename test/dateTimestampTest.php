<?php

$tz = 'Europe/Kiev';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp

$dt->add(new DateInterval('PT1H'));
echo $dt->format("Y-m-d" . "\T" . "H:m:s");
echo "\n";

$dt->add(new DateInterval('PT1H'));
echo $dt->format("Y-m-d" . "\T" . "H:m:s");

?>