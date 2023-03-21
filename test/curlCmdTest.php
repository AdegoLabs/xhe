<?php
	
	function remoteXheLaunch($clientIp, $clientPort, $xhePort, $output = false) {
		$pageurl = "http://" . $clientIp . ":" . $clientPort;
		$filename = "script.php?code=exec(%27START%20%22%22%20%22C:\XWeb\Human%20Emulator%20Studio%207.0.62\XWeb%20Human%20Emulator%20Studio%20RT.exe%22%20/port:" . $xhePort . "%20/in_tray:1%27);";
		
		/*
		$params = array(
			'code' => "exec('START \"\" \"C:\XWeb\Human Emulator Studio 7.0.62\XWeb Human Emulator Studio RT.exe\" /port:7015');"
		);
		*/
		
		$result = $pageurl . (preg_match("#\\\#", $pageurl{strlen($pageurl) - 1}) ? "" : "/" . $filename) . "";
	
		$ch = curl_init($result);
		$response = curl_exec($ch);
		
		curl_close($ch);
		
		if ($output)
			printf("%s\n", $result);
		
		return $response;
	}
	
	$output = remoteXheLaunch('5.45.71.226', '8000', '7889');
	
	var_dump($output);