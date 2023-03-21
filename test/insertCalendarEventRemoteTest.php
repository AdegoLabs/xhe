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
		if (!$event = App\Classes\RandomFile::get(EVENTS_UNPUBLISHED_DIR)) die('No events found...');
		else rename($event, EVENTS_WORKING_DIR . DIRECTORY_SEPARATOR . basename($event = str_replace('unpublished', 'working', $event)));
	
//		launchXhe(XHE_EXE, $port);
		$container->get('debug')->set_cur_script_path(__DIR__);
		
		if (!$account = App\Model\GoogleAccountBuilder::findUnused()) die('No accounts...');
		else $controller->set($account);
		
		$loggedPrevious = $controller->get()->loginAt;
		
		if (!$invoker->call('App\Method\GooglePlaygroundLogin', [$controller])) {
			$invoker->call('App\Command\Vanish');
			$container->get('application')->restart();
			sleep(7);
			
			rename($event, EVENTS_UNPUBLISHED_DIR . DIRECTORY_SEPARATOR . basename($event));
			continue;
		} else {$container->get('App\Command\GooglePlaygroundStep3')->credentials();}
		
		if (NULL === $loggedPrevious) {
			$newPassword = generatePassword(32);
			
			if ($invoker->call('App\Command\GoogleChangePassword', [
				'oldPassword' => $controller->getPassword(),
				'newPassword' => $newPassword
			]))	$controller->setPassword($newPassword);
		}
		
		if (NULL === $loggedPrevious) {
			switch ($invoker->call('App\Command\GooglePlaygroundStep3', [
				'uri' => 'https://www.googleapis.com/calendar/v3/users/me/calendarList/' . $controller->getEmail(),
				'method' => 'PUT',
				'body' => '{"accessRole": "freeBusyReader","defaultReminders": [{"method": "email","minutes": 60},{"method": "popup","minutes": 15},{"method": "popup","minutes": 60},{"method": "popup","minutes": 2880},{"method": "popup","minutes": 1440}],"notificationSettings": {"notifications": [{"method": "email","type": "eventResponse"},	{"method": "email","type": "eventCreation"}]},"primary": true}'
				//'body' => //'{"accessRole": "freeBusyReader","defaultReminders": [{"method": "email","minutes": 60},{"method": "popup","minutes": 15},{"method": "popup","minutes": 60},{"method": "popup","minutes": 2880},{"method": "popup","minutes": 1440}],"notificationSettings": {"notifications": [{"method": "email","type": "agenda"},{"method": "email","type": "eventResponse"},	{"method": "email","type": "eventCreation"}]},"primary": true}'
			])):
				case 200: 
					printf("Calendar list rule was inserted successfully!\n"); 
					break;
				default: printf("Code undefined...\n"); break;
			endswitch;

			switch ($invoker->call('App\Command\GooglePlaygroundStep3', [
				'uri' => 'https://www.googleapis.com/calendar/v3/calendars/primary/acl',
				'method' => 'POST',
				'body' => '{"role": "freeBusyReader","scope": {"type": "default"}}'
			])):
				case 200: 
					printf("ACL rule was inserted successfully!\n"); 
					break;
				default: printf("Code undefined...\n"); break;
			endswitch;
		}
		
		switch ($invoker->call('App\Command\GooglePlaygroundStep3', [
			'uri' => 'https://www.googleapis.com/calendar/v3/calendars/primary/events?maxAttendees=1000&sendUpdates=all',
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
			default: printf("Code undefined...\n"); break;
		endswitch;
		
		$invoker->call('App\Command\Vanish');
		$container->get('application')->restart();
		
		sleep(7);
	} while(!FALSE);
});

$app->run();