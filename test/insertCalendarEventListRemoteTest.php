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

	function generatePassword($len = 8) {
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

	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$invoker = new Invoker\Invoker(null, $container);

	$app->command('test:test [ip] [port] [--dynamical]', function($ip, $port, $dynamical) use (&$container, &$invoker) {
		$source = VAR_DIR . DIRECTORY_SEPARATOR . 'tasks' . DIRECTORY_SEPARATOR . 'accounts.in';
		
		$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
		$controller = (new App\Controller\GoogleAccountController());
		
		remoteXheLaunch($ip, '8000', $port);
		
		do {
			$calendarName = 'Calendar' . generatePassword(7);

			if (!$event = App\Classes\RandomFile::get(EVENTS_UNPUBLISHED_DIR)) die('No events found...');
			else rename($event, EVENTS_WORKING_DIR . DIRECTORY_SEPARATOR . basename($event = str_replace('unpublished', 'working', $event)));
			
			$eventContent = json_decode(file_get_contents($event), true);
			
			$location = $eventContent['location'];
			$timezone = $eventContent['start']['timeZone'];
			
			$container->get('debug')->set_cur_script_path(XHE_DIR . DIRECTORY_SEPARATOR . 'My Scripts');

			if (!$account = App\Model\GoogleAccount::where('email', App\Classes\CutLastString::cut($source), 'like')::getOne()) die('No accounts...');
			else $controller->set($account);
			
			$loggedPrevious = $controller->get()->loginAt;
			
			if ($dynamical) {
				$timestamp = time();
				
				$dt = new DateTime("now", new DateTimeZone($timezone));
				$dt->setTimestamp($timestamp);

				$dt->add(new DateInterval('PT1H'));
				$eventContent['start']['dateTime'] = $dt->format("Y-m-d" . "\T" . "H:m:s");
				
				$dt->add(new DateInterval('PT1H'));
				$eventContent['end']['dateTime'] = $dt->format("Y-m-d" . "\T" . "H:m:s");
				file_put_contents($event, json_encode($eventContent));
			}
			
			//$container->get('browser')->recreate();
			sleep(5);
			
			if (!$invoker->call('App\Method\GooglePlaygroundLogin', [$controller])) {
				$container->get('application')->restart();
				sleep(10);
				rename($event, EVENTS_UNPUBLISHED_DIR . DIRECTORY_SEPARATOR . basename($event));
				continue;
			} else {
				$container->get('App\Command\GooglePlaygroundStep3')->credentials();
			}
			
			if (NULL !== $loggedPrevious) {
				switch ($invoker->call('App\Command\GooglePlaygroundStep3', [
					'uri' => 'https://www.googleapis.com/calendar/v3/calendars',
					'method' => 'POST',
					'body' => '{"summary": "' . $calendarName . '","location": "' . $location . '","timeZone": "' . $timezone . '"}'
				])):
					case 200:
						$calendarId = $invoker->call('App\Command\GetCalendarId');
						printf("Calendar %s was created successfully!\n", $calendarId);	
						break;
					default:
						printf("Some issues during calendar creation...\n"); break;
				endswitch;
			}
			
			
			//if (NULL === $loggedPrevious) {
				switch ($invoker->call('App\Command\GooglePlaygroundStep3', [ //$calendarId
					'uri' => 'https://www.googleapis.com/calendar/v3/users/me/calendarList/' . $controller->getEmail(),
					'method' => 'PUT',
					//'body' => '{"accessRole": "writer", "notificationSettings": {"notifications": [{"method": "email","type": "eventCreation"}]},"primary": ' . ($loggedPrevious === NULL ? 'true' : 'false') . '}'
					//'body' => '{"accessRole": "freeBusyReader", "primary": ' . ($loggedPrevious === NULL ? 'true' : 'false') . '}'
					'body' => '{"accessRole": "freeBusyReader", "notificationSettings": {"notifications": [{"method": "email","type": "eventCreation"}]},"primary": ' . ($loggedPrevious === NULL ? 'true' : 'false') . '}'
					//'body' => '{"accessRole": "freeBusyReader", "notificationSettings": {"notifications": [{"method": "email","type": "eventCreation"}]},"primary": ' . ($loggedPrevious === NULL ? 'true' : 'false') . ', "defaultReminders": [{"method": "email","minutes": 60},{"method": "popup","minutes": 15},{"method": "popup","minutes": 60},{"method": "popup","minutes": 2880},{"method": "popup","minutes": 1440}]' . '}'
					//'body' => //'{"accessRole": "freeBusyReader","defaultReminders": [{"method": "email","minutes": 60},{"method": "popup","minutes": 15},{"method": "popup","minutes": 60},{"method": "popup","minutes": 2880},{"method": "popup","minutes": 1440}],"notificationSettings": {"notifications": [{"method": "email","type": "agenda"},{"method": "email","type": "eventResponse"},	{"method": "email","type": "eventCreation"}]},"primary": true}'
				])):
					case 200: 
						printf("Calendar list rule was inserted successfully!\n"); 
						break;
					default: printf("Calendar list: Code undefined...\n"); break;
				endswitch;

				switch ($invoker->call('App\Command\GooglePlaygroundStep3', [
					'uri' => 'https://www.googleapis.com/calendar/v3/calendars/' . ($loggedPrevious === NULL ? 'primary' : $calendarId) . '/acl',
					'method' => 'POST',
					'body' => '{"role": "reader","scope": {"type": "default"}}'
					//'body' => '{"role": "writer","scope": {"type": "default"}}'
				])):
					case 200: 
						printf("ACL rule was inserted successfully!\n"); 
						break;
					default: printf("ACL rule: Code undefined...\n"); break;
				endswitch;
			//}
			
			
			switch ($invoker->call('App\Command\GooglePlaygroundStep3', [
				'uri' => 'https://www.googleapis.com/calendar/v3/calendars/' . ($loggedPrevious === NULL ? 'primary' : $calendarId) .  '/events?maxAttendees=100&sendUpdates=all',
				'method' => 'POST',
				'body' => json_encode(json_decode(file_get_contents($event), true))
				//'file' => ($event)
			])):
				case 200: 
					printf("Event was inserted successfully! Salut!\n");
					rename($event, EVENTS_PUBLISHED_DIR . DIRECTORY_SEPARATOR . basename($event));
					break;
				case 400: 
					printf("Bad event request!\n"); 
					rename($event, EVENTS_ERRORS_DIR . DIRECTORY_SEPARATOR . basename($event));
					break;
				case 403: 
					printf("Maximum calendar limits exceeded!\n"); 
					rename($event, EVENTS_UNPUBLISHED_DIR . DIRECTORY_SEPARATOR . basename($event));
					break;
				case 401: 
					printf("Invalid client!\n"); 
					rename($event, EVENTS_UNPUBLISHED_DIR . DIRECTORY_SEPARATOR . basename($event));
					break;
				default: printf("Event: Code undefined...\n"); break;
			endswitch;
			
			$invoker->call('App\Command\Vanish');
			sleep(2);
			$container->get('application')->restart();
			sleep(10);
		} while(!FALSE);
	});

	$app->run();