<?php

$eventPath = 'C:\xampp\htdocs\xhe\var\events\working\625e85bff3cce.json';

$content = file_get_contents($eventPath);

var_dump(json_decode($content));