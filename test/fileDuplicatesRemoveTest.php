<?php

	

	$input = $argv[1] ?? NULL;
	
	if ($input) {
		$array = file($input, FILE_IGNORE_NEW_LINES);
		$filtered = array_unique($array);
		$output = implode("\n", $filtered);
		
		file_put_contents("unique.txt", $output);
	}