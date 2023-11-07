<?php

$file = 'C:\Users\user741\Desktop\workflow\projects\calendar api\attendees\crossproject\email\combined\all-jp.csv';
$array = file($file, FILE_IGNORE_NEW_LINES);

$unique = array_unique($array);
file_put_contents('C:\Users\user741\Desktop\workflow\projects\calendar api\attendees\crossproject\email\combined\all-jp-no_duplicates.csv', implode("\n", $unique));

?>