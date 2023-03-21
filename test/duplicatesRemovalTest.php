<?php

$file = 'C:\Users\user741\Desktop\workflow\projects\calendar api\attendees\all.31oct22\combined\all-vip.csv';
$array = file($file, FILE_IGNORE_NEW_LINES);

$unique = array_unique($array);
file_put_contents('C:\Users\user741\Desktop\workflow\projects\calendar api\attendees\all.31oct22\combined\all-vip-uniq.csv', implode("\n", $unique));

?>