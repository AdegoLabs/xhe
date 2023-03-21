<?php

	function find_replace($file, $find, $replace){
		if(!file_exists($file)) return false;

		if(!filesize($file)) return true;

		$contents = file_get_contents($file);

		$output = str_replace($find, $replace, $contents);
		
		file_put_contents($file, $output, LOCK_EX);
	}

	function get_files_list($dir) {
		$list = scandir($dir);
		unset($list[0]);
		unset($list[1]);
		
		return $list;
	}

	$dir = 'C:\xampp\htdocs\calendar-app\resources\events\elslots\unpublished\10032022';
	$files = get_files_list($dir);
	
	foreach($files as $file) {
		find_replace($dir . DIRECTORY_SEPARATOR . $file, ' aria-invalid=\"true\"', '');
		
		printf("%s was modified successfully!\n", $file);
	}

?>