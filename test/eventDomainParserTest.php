<?php
	function get_files_list($dir) {
		$list = scandir($dir);
		unset($list[0]);
		unset($list[1]);
		
		return $list;
	}
	
	function parse_domain($file) {
		$body = file_get_contents($file);
		
		preg_match("#https:\\\/\\\/(.*?)\\\/#i", $body, $match);
		
		if (isset($match[1]))
			return $match[1];
		else return false;
	}


	$dir = 'C:\xampp\htdocs\xhe\var\events\unpublished';
	$files = get_files_list($dir);

	foreach($files as $file) {
		$domain = parse_domain($dir . DIRECTORY_SEPARATOR . $file);
		
		if ($domain)
			printf("%s\n", $domain);
	}