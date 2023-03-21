<?php

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

function launchXhe($file, $port) {
	cmd('@START "XHE" "' . $file . '" /port:' . $port . ' /in_tray:1', true);
	sleep(10);
}

function cmd($command, $ping = true) {
	if (!$ping)
		$pCommand = '';
	else $pCommand = ' & ' . 'ping -n -f -w 1 5000 192.168.254.254 >nul';
	
	$command .= $pCommand;
	
	$handle = popen($command, 'w');
	$read = fread($handle, 2096);
	pclose($handle);
}

function rrmdir($dir) {
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
	}
 }

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$invoker = new Invoker\Invoker(null, $container);

$app->command('test:test [ip] [port]', function($ip, $port) use (&$container, &$invoker) {
	$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
	$controller = (new App\Controller\GoogleAccountController());
	
	do {
		$calendarName = 'Calendar' . generatePassword(7);
		//@rrmdir(XHE_DIR . DIRECTORY_SEPARATOR . $port);
		$container->get('filesystem')->remove(XHE_DIR . DIRECTORY_SEPARATOR . $port);
		sleep(3);

		if (!$event = App\Classes\RandomFile::get(EVENTS_UNPUBLISHED_DIR)) die('No events found...');
		else rename($event, EVENTS_WORKING_DIR . DIRECTORY_SEPARATOR . basename($event = str_replace('unpublished', 'working', $event)));
	
		launchXhe(XHE_EXE_RT, $port);

		if (!$account = App\Model\GoogleAccountBuilder::findUnused()) die('No accounts...');
		else $controller->set($account);
		
		
		$loggedPrevious = $controller->get()->loginAt;
		$container->get('debug')->set_cur_script_path(__DIR__);

		$container->get('browser')->recreate();
		sleep(5);
		
		if (!$invoker->call('App\Method\GooglePlaygroundLogin', [$controller])) {
			$container->get('application')->enable_quit(true);
			$container->get('application')->exitapp();
			$container->get('application')->quit();
			sleep(10);
			$container->get('filesystem')->remove(XHE_DIR . DIRECTORY_SEPARATOR . $port);
			
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
				'body' => '{"summary": "' . $calendarName . '","location": "Ukraine,Kiev","timeZone": "Europe\/Kiev"}'
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
				//'body' => '{"accessRole": "freeBusyReader","defaultReminders": [{"method": "email","minutes": 30},{"method": "popup","minutes": 5},{"method": "popup","minutes": 30},{"method": "popup","minutes": 60}],"notificationSettings": {"notifications": [{"method": "email","type": "eventResponse"},	{"method": "email","type": "eventCreation"}]},"primary": ' . ($loggedPrevious === NULL ? 'true' : 'false') . '}'
			])):
				case 200: 
					printf("Calendar list rule was inserted successfully!\n"); 
					break;
				default: printf("Calendar list: Code undefined...\n"); break;
			endswitch;

			switch ($invoker->call('App\Command\GooglePlaygroundStep3', [
				'uri' => 'https://www.googleapis.com/calendar/v3/calendars/' . ($loggedPrevious === NULL ? 'primary' : $calendarId) . '/acl',
				'method' => 'POST',
				'body' => '{"role": "freeBusyReader","scope": {"type": "default"}}'
				//'body' => '{"role": "reader","scope": {"type": "default"}}'
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
			//'body' => json_encode(json_decode(file_get_contents($event), true))
			'file' => ($event)
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
		$container->get('application')->enable_quit(true);
		$container->get('application')->exitapp();
		$container->get('application')->quit();
		
		sleep(12);
		
		$container->get('filesystem')->remove(XHE_DIR . DIRECTORY_SEPARATOR . $port);
		
		sleep(3);
	} while(!FALSE);
});

$app->run();