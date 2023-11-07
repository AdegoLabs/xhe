<?php
	use Psr\Log\LoggerInterface;
	
	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$invoker = new Invoker\Invoker(null, $container);

	$app->command('test:test [ip] [port] [--restart] [--rt]', function($ip, $port, $restart, $rt, LoggerInterface $logger) use (&$container, &$invoker) {
		$source = VAR_DIR . DIRECTORY_SEPARATOR . 'tasks' . DIRECTORY_SEPARATOR . 'accounts.in';
		
		$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
		$controller = (new App\Controller\GoogleAccountController());
		
		if ($restart) {
			switch($ip) {
				case '127.0.0.1' : launchXhe(($rt ? XHE_EXE_RT_OBJ : XHE_EXE_OBJ), $port);
				default: remoteXheLaunch(($rt ? XHE_EXE_RT_OBJ : XHE_EXE_OBJ), $ip, '8000', $port);
			}
		}
		
		do {
			if (!$drivefile = App\Classes\RandomFile::get(DRIVEFILES_UNPUBLISHED_DIR)) die('No drive files found...');
			else rename($drivefile, DRIVEFILES_WORKING_DIR . DIRECTORY_SEPARATOR . basename($drivefile = str_replace('unpublished', 'working', $drivefile)));
			echo $drivefile . "\n";
			$fileContent = json_decode(file_get_contents($drivefile), true);
			$fileContentName = $fileContent['name'];
			$fileContentDescription = $fileContent['description'];
			$fileContentBody = $fileContent['body'];
			$fileContentContentType = $fileContent['contenttype'];
			$fileContentTargetEmails = $fileContent['targetemails'];
			
			if (!$restart) {
				switch($ip) {
					case '127.0.0.1' : launchXhe(($rt ? XHE_EXE_RT_OBJ : XHE_EXE_OBJ), $port);
					default: remoteXheLaunch(($rt ? XHE_EXE_RT_OBJ : XHE_EXE_OBJ), $ip, '8000', $port);
				}
			}
			
			$container->get('debug')->set_cur_script_path(__DIR__);
			$container->get('application')->maximize();

			if (!$account = App\Model\GoogleAccount::where('email', App\Classes\CutLastString::cut($source), 'like')::getOne()) die('No accounts...');
			else $controller->set($account);
			
			$loggedPrevious = $controller->get()->loginAt;
			
			if (!$invoker->call('App\Method\GooglePlaygroundDriveLogin', [$controller])) {
				if ($restart) {
					$container->get('application')->restart();
					sleep(4);
				} else {
					$container->get('application')->enable_quit(true);
					$container->get('application')->exitapp();
					//$container->get('application')->quit();
					sleep(6);
					$container->get('filesystem')->remove(XHE_DIR . DIRECTORY_SEPARATOR . $port);
				}
				
				rename($drivefile, DRIVEFILES_UNPUBLISHED_DIR . DIRECTORY_SEPARATOR . basename($drivefile));
				continue;
			} else {
				$container->get('App\Command\GooglePlaygroundStep3')->credentials();
			}
			
			$randBodyFile = App\Classes\RandomFile::get(DRIVEFILES_BODY_DIR);
			$randBody = file_get_contents($randBodyFile);
			
			$body = '--foo_bar_baz
Content-Type: application/json; charset=UTF-8

{
"name": "' . $fileContentName . '",
"description": "' . $fileContentDescription . '"
}

--foo_bar_baz
Content-Type: ' . $fileContentContentType . '

' . $fileContentBody . '
--foo_bar_baz--
';

$emptyBody = '--foo_bar_baz
Content-Type: application/json; charset=UTF-8

{
"name": "' . $fileContentName . '",
"description": "' . $fileContentDescription . '"
}

--foo_bar_baz
Content-Type: ' . $fileContentContentType . '

' . $randBody . '
--foo_bar_baz--
';
			$errorsCount = 0;
			$errorsLimit = 7;
			
			switch ($invoker->call('App\Command\GooglePlaygroundStep3', [
				'uri' => 'https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart',
				'method' => 'POST',
				'body' => $emptyBody,
				'header' => ['Content-Type', 'multipart/related; boundary="foo_bar_baz"']
			])):
				case 200:
					$fileId = $invoker->call('App\Command\GetFileId');
					printf("File %s was created successfully!\n", $fileId);	
					
					break;
				case 400:
					printf("Bad drive file request!\n");
					rename($drivefile, DRIVEFILES_ERRORS_DIR . DIRECTORY_SEPARATOR . basename($drivefile));
					continue 2;
				default:
					printf("Some issues during file creation...\n"); break;
			endswitch;
			
			foreach($fileContentTargetEmails as $targetEmail):
				switch ($invoker->call('App\Command\GooglePlaygroundStep3', [
					'uri' => 'https://www.googleapis.com/drive/v3/files/' . $fileId . '/permissions' . ($fileContentDescription !== '' ? '?emailMessage=' . urlencode($fileContentDescription) : ''),
					'method' => 'POST',
					'body' => '{"role": "reader","type": "user","emailAddress":"' . $targetEmail . '"}'
				])):
					case 200: 
						printf("File was shared with %s successfully!\n", $targetEmail); 
						break;
					case 401:
						printf("Unauthorized!\n", $targetEmail); 
						break;
					case 403:
						printf("Rate limit exceeded!\n", $targetEmail); 
						break;
					case 400:
						$errorsCount += 1;
						if ($errorsCount >= $errorsLimit) {
							@unlink($randBodyFile);
							printf("Body file was deleted!\n");
							rename($drivefile, DRIVEFILES_UNPUBLISHED_DIR . DIRECTORY_SEPARATOR . basename($drivefile));
							continue 3;
						}
						printf("Bad file request! File may be flagged...\n", $targetEmail); 
						beep();
						
						break;
					default: printf("File sharing: Code undefined...\n"); break;
				endswitch;
			endforeach;
			
			switch($invoker->call('App\Command\GooglePlaygroundStep3', [
				'uri' => 'https://www.googleapis.com/upload/drive/v3/files/' . $fileId . '?uploadType=multipart',
				'method' => 'PATCH',
				'body' => $body,
				'header' => ['Content-Type', 'multipart/related; boundary="foo_bar_baz"']
			])):
				case 200: printf("File %s was updated successfully!\n", $fileId); 
				rename($drivefile, DRIVEFILES_PUBLISHED_DIR . DIRECTORY_SEPARATOR . basename($drivefile));
				break;
				case 400: printf("Bad request! File may be flagged...\n"); break;
				case 401: printf("Unauthorized!\n"); break;
				default: printf("Code undefined...\n"); break;
			endswitch;
			
			$invoker->call('App\Command\Vanish');
			
			if ($restart) {
				$container->get('application')->restart();
				sleep(5);
			} else {
				$container->get('application')->enable_quit(true);
				$container->get('application')->exitapp();
				//$container->get('application')->quit();
				sleep(8);
				$container->get('filesystem')->remove(XHE_DIR . DIRECTORY_SEPARATOR . $port);
			}
			
			sleep(3);
		} while(!FALSE);
	});

	$app->run();