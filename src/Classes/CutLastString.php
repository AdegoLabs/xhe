<?php

namespace App\Classes;

class CutLastString {
	public static function cut($file) {
		if (!file_exists($file))
			return false;
		
		$lines = file($file, FILE_IGNORE_NEW_LINES);
		if (empty($lines))
			return false;
		
		$last = sizeof($lines) - 1 ;
		$cutted = $lines[$last];
		unset($lines[$last]); 

		$fp = fopen($file, 'w'); 
		fwrite($fp, implode("\n", $lines)); 
		fclose($fp); 
		
		return $cutted;
	}
}