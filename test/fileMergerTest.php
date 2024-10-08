<?php

$input = 'C:\Users\user741\Desktop\workflow\projects\calendar api\attendees\crossproject\email\all-jp2107';
$output = 'C:\Users\user741\Desktop\workflow\projects\calendar api\attendees\crossproject\email\combined2107\all-jp.csv';

function joinFiles(array $files, $result, $dir) {
    if(!is_array($files)) {
        throw new Exception('`$files` must be an array');
    }

    $wH = fopen($result, "w+");

    foreach($files as $file) {
		printf("Working with file %s...\n", $file);
		
        $fh = fopen($dir . DIRECTORY_SEPARATOR . $file, "r");
        while(!feof($fh)) {
            fwrite($wH, fgets($fh));
        }
        fclose($fh);
        unset($fh);
        fwrite($wH, "\n"); //usually last line doesn't have a newline
    }
    fclose($wH);
    unset($wH);
}

$files = array_diff(scandir($input), array('.', '..', 'desktop.ini'));
joinFiles($files, $output, $input);