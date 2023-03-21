<?php

	$file = 'C:\Users\user741\Downloads\India.json';
	$content = file($file, FILE_IGNORE_NEW_LINES);
	$phones = [];
	$emails = [];
	
	foreach($content as $data) {
		$decoded = json_decode($data, true);
	
		 array_push($emails, $decoded['_source']['email']);
		 array_push($phones, $decoded['_source']['phone']);
	}
	
	file_put_contents("emails.txt", implode("\n", $emails));
	file_put_contents("phones.txt", implode("\n", $phones));
	