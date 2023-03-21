<?php
	//echo fopen('http://94.103.95.148:8000/script.php?code=echo \"Hello World!\";', 'r');
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://5.45.71.226:8000/script.php?code=echo%20%27Hello%20World%27;');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch); 
	
	printf("Output:\n%s\n", $output);
	
?>
