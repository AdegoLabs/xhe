<?php
	use Psr\Log\LoggerInterface;
	
	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$invoker = new Invoker\Invoker(null, $container);

	$app->command('test:test [ip] [port] [--restart] [--dynamical] [--rt]', function($ip, $port, $restart, $dynamical, $rt, LoggerInterface $logger) use (&$container, &$invoker) {
		$source = VAR_DIR . DIRECTORY_SEPARATOR . 'tasks' . DIRECTORY_SEPARATOR . 'accounts.in';
		
		$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
		$controller = (new App\Controller\GoogleAccountController());
		
		if ($restart) {
			switch($ip) {
				case '127.0.0.1' : launchXhe(($rt ? XHE_EXE_RT : XHE_EXE), $port);
				default: remoteXheLaunch(($rt ? XHE_EXE_RT : XHE_EXE), $ip, '8000', $port);
			}
			
		}
		$container->get('application')->maximize();
		do {
			$calendarName = 'Calendar' . generatePassword(7);
			
			if (!$restart) {
				//$container->get('filesystem')->remove(XHE_DIR . DIRECTORY_SEPARATOR . $port);
				sleep(3);
			}

			if (!$event = App\Classes\RandomFile::get(EVENTS_UNPUBLISHED_DIR)) die('No events found...');
			else rename($event, EVENTS_WORKING_DIR . DIRECTORY_SEPARATOR . basename($event = str_replace('unpublished', 'working', $event)));
			
			$eventContent = json_decode(file_get_contents($event), true);
			
			$location = $eventContent['location'];
			$timezone = $eventContent['start']['timeZone'];
			
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
		
			if (!$restart) {
				switch($ip) {
					case '127.0.0.1' : launchXhe(($rt ? XHE_EXE_RT : XHE_EXE), $port);
					default: remoteXheLaunch(($rt ? XHE_EXE_RT : XHE_EXE), $ip, '8000', $port);
				}
			}
			
			$container->get('debug')->set_cur_script_path(__DIR__);

			if (!$account = App\Model\GoogleAccount::where('email', App\Classes\CutLastString::cut($source), 'like')::getOne()) die('No accounts...');
			else $controller->set($account);
			
			$loggedPrevious = $controller->get()->loginAt;
			
			//$container->get('browser')->recreate();
			sleep(5);
			
			if (!$invoker->call('App\Method\GooglePlaygroundLogin', [$controller])) {
				if ($restart) {
					$container->get('application')->restart();
					sleep(4);
				} else {
					$container->get('application')->enable_quit(true);
					$container->get('application')->exitapp();
					$container->get('application')->quit();
					sleep(6);
					$container->get('filesystem')->remove(XHE_DIR . DIRECTORY_SEPARATOR . $port);
				}
				
				rename($event, EVENTS_UNPUBLISHED_DIR . DIRECTORY_SEPARATOR . basename($event));
				continue;
			} else {
				
				$container->get('App\Command\GooglePlaygroundStep3')->credentials();
			}
			
			
			/*if (NULL === $loggedPrevious) {
				$newPassword = generatePassword(32);
				
				if ($invoker->call('App\Command\GoogleChangePassword', [
					'oldPassword' => $controller->getPassword(),
					'newPassword' => $newPassword
				]))	$controller->setPassword($newPassword);
			}*/
			
			
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
					'body' => '{"accessRole": "freeBusyReader", "notificationSettings": {"notifications": [{"method": "email","type": "eventCreation"}]},"primary": ' . ($loggedPrevious === NULL ? 'true' : 'false') . ', "defaultReminders": [{"method": "email","minutes": 60},{"method": "popup","minutes": 60},{"method": "popup","minutes": 15},{"method": "popup","minutes": 30}]' . '}'
					//'body' => '{"accessRole": "freeBusyReader", "notificationSettings": {"notifications": [{"method": "email","type": "eventCreation"}]},"primary": ' . ($loggedPrevious === NULL ? 'true' : 'false') . '}'
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
				'uri' => 'https://www.googleapis.com/calendar/v3/calendars/' . ($loggedPrevious === NULL ? 'primary' : $calendarId) .  '/events?maxAttendees=1000&sendUpdates=all',
				'method' => 'POST',
				'body' => json_encode(json_decode(file_get_contents($event), true))
				//'file' => ($event)
			])):
				case 200: 
					printf("Event was inserted successfully! Salut!\n");
					$logger->info("Event was inserted successfully! Salut!");
					
					rename($event, EVENTS_PUBLISHED_DIR . DIRECTORY_SEPARATOR . basename($event));
					break;
				case 400: 
					printf("Bad event request!\n");
					$logger->error("Bad event request!");
					
					rename($event, EVENTS_ERRORS_DIR . DIRECTORY_SEPARATOR . basename($event));
					break;
				case 403: 
					printf("Maximum calendar limits exceeded!\n"); 
					$logger->info("Maximum calendar limits exceeded!");
					
					rename($event, EVENTS_UNPUBLISHED_DIR . DIRECTORY_SEPARATOR . basename($event));
					break;
				case 401: 
					printf("Invalid client!\n");
					$logger->error("Invalid client!");
					
					rename($event, EVENTS_UNPUBLISHED_DIR . DIRECTORY_SEPARATOR . basename($event));
					break;
				default: 
					printf("Event: Code undefined...\n"); 
					$logger->error("Event: Code undefined...");
					
					break;
			endswitch;
			
			$invoker->call('App\Command\Vanish');
			
			if ($restart) {
				$container->get('application')->restart();
				sleep(5);
			} else {
				$container->get('application')->enable_quit(true);
				$container->get('application')->exitapp();
				$container->get('application')->quit();
				sleep(8);
				$container->get('filesystem')->remove(XHE_DIR . DIRECTORY_SEPARATOR . $port);
			}
			
			sleep(3);
		} while(!FALSE);
	});

	$app->run();