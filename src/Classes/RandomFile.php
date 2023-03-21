<?php
namespace App\Classes;

function readFiles($dir = '/', $returnAbsolute = true) {
		$files = glob($dir . DIRECTORY_SEPARATOR . '*.*');
		
		if (!$returnAbsolute) {
			$files = array_map((function($file) {
				return basename($file);
			}), $files);
		}

		return $files;
	}
	
class RandomFile {
	public static function get($dir) {
		$files = readFiles($dir);
		shuffle($files);
		
		return array_pop($files);
	}
	
}