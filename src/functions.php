<?php

	if (!function_exists('generateRandomString')) {
		function generateRandomString($length = 10) {
			$characters = 'abcdefghijklmnopqrstuvwxyz';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[random_int(0, $charactersLength - 1)];
			}
			return $randomString;
		}
	}

	if ( !function_exists('closeOperationByTzid')) {
		function closeOperationByTzid($tzid) {
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://onlinesim.ru/api/setOperationOk.php?apikey=ec2025fdadfe6b27b8f5e1cbbe7101da&tzid=" . $tzid,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_SSL_VERIFYHOST => false,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_HTTPHEADER => [
					"Content-Type: application/json",
				]
			));
			$response = curl_exec($curl);
			curl_close($curl);
			var_dump(json_decode($response, true));
		}
	}

	if ( !function_exists('beep')) {
		function beep($int_beeps = 1) {
			$string_beeps = '';
			for ($i = 0; $i < $int_beeps; $i++): $string_beeps .= "\x07"; endfor;
			isset ($_SERVER['SERVER_PROTOCOL']) ? false : print $string_beeps;
		}
	}

    if( !function_exists('generatePassword') ) {
		function generatePassword($len = 8): string {
			if ($len < 3) return false;
			
			$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$pass = array();
			$alphaLength = strlen($alphabet) - 1;
			
			for ($i = 0; $i < $len; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			
			return implode($pass);
		}
	}
	
	if ( !function_exists('cmd') ) {
		function cmd($command, $ping = true):  string {
			if (!$ping)
				$pCommand = '';
			else $pCommand = ' & ' . 'ping -n -f -w 1 5000 192.168.254.254 >nul';
			
			$command .= $pCommand;
			
			$handle = popen($command, 'w');
			$read = fread($handle, 2096);
			pclose($handle);
			
			return $read;
		}
	}

	if ( !function_exists('rrmdir') ) {
		function rrmdir($dir): bool {
			if (is_dir($dir)) {
				$objects = scandir($dir);
				
				foreach ($objects as $object) {
					if ($object != "." && $object != "..") {
						if (filetype($dir."/".$object) == "dir") 
							 rrmdir($dir."/".$object); 
						else unlink	 ($dir."/".$object);
					}
				}
				
				reset($objects);
				rmdir($dir);
				
				return true;
			} else {
				return false;
			}
		}
	}
	
	if ( !function_exists('remoteXheLaunch') ) {
		function remoteXheLaunch($file, $clientIp, $clientPort, $xhePort, $output = false): string {
			$pageurl = "http://" . $clientIp . ":" . $clientPort;
			$filename = "script.php?code=exec(%27START%20%22%22%20%22" . urlencode($file) . "%22%20/port:%22" . $xhePort . "%22%20/script:%22C%3A%5CXWeb%5CHuman%20Emulator%20Studio%207.0.62%5CMy%20Scripts%5C16.php%22%20/in_tray:%221%22%27);";
			
			$result = $pageurl . (preg_match("#\\\#", $pageurl{strlen($pageurl) - 1}) ? "" : "/" . $filename) . "";

			$ch = curl_init($result);
			$response = curl_exec($ch);
			
			curl_close($ch);
			
			if ($output)
				printf("%s\n", $result);
			
			return $response;
		}
	}

	if ( !function_exists('launchXhe') ) {
		function launchXhe($file, $port, $script = 'C:\XWeb\Human Emulator Studio 7.0.62\My Scripts\16.php'): bool {
			exec('@START "" "' . $file . '" /port:"' . $port . '" /script:"' . $script . '"');
			sleep(10);
			return true;
		}
	}
	
	if ( !function_exists('createTempFile') ) {
		function createTempFile($prefix = 'temp', $extension = 'txt'): string {
			$tempFile = TMP_DIR . DIRECTORY_SEPARATOR . uniqid($prefix) . '.' . $extension;
			
			file_put_contents($tempFile, '');
			
			printf("%s file was created successfully!\n", $tempFile);
			
			return $tempFile;
		}
	}
	
	if ( !function_exists('extractProxiesToFile')) {
		function extractProxiesToFile($targetFile, $proxies): void {
			$data = [];
			foreach($proxies as $proxy) {
				array_push($data, $proxy->ip . ":" . $proxy->port . ":" . $proxy->login . ":" . $proxy->password);
			}
				
			file_put_contents($targetFile,  implode("\n", $data));
		}
	}
	
	if ( !function_exists('launchTelegram')) {
		function launchTelegram() {
			//exec('"C:\Telegram\Telegram.exe"');
			//system('"C:\Telegram\Telegram.exe"');
			pclose(popen('start /B cmd /C "C:\Telegram\Telegram.exe >NUL 2>NUL"', 'r'));

		}
	}
	
	if ( !function_exists('exitTelegram')) {
		function exitTelegram() {
			exec('taskkill /F /IM Telegram.exe');
			sleep(1);
		}
	}
	
	if ( !function_exists('isEmailReal')) {
		function isEmailReal($key, $email) {
			$url = 'https://api-v4.bulkemailchecker.com/?key=' . $key . '&email=' . $email;
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
			curl_setopt($ch, CURLOPT_TIMEOUT, 15); 
			$response = curl_exec($ch);
			curl_close($ch);

			$json = json_decode($response, true);
			
			if (isset($json['error'])) {
				if ($json['error'] == 'The hourly limit of 1500 querys has been reached.') {
					printf("The hourly limit of 1500 querys has been reached.\n");
					printf("Waiting 60 seconds and retry...\n");
					sleep(60);
					return isEmailReal($key, $email);
				}
			}
			var_dump($json);
			if(@$json['status'] == 'failed' || $json['status'] == 'unknown'){
				return false;
			} else {
				return true;
			}
		}
	}