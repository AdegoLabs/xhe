<?php

namespace App\Classes;

class GetRandomLineFromFile {
	public function __invoke($file) {
		if (!file_exists($file))
			die('File doesn\t exist!');
		
		$data = file($file, FILE_IGNORE_NEW_LINES);
		shuffle($data);
		
		$result = array_pop($data);
		
		return $result;
	}
	
}