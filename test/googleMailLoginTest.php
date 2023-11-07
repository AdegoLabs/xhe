<?php 
	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$invoker = new Invoker\Invoker(null, $container);
	
	$messageSource = VAR_DIR . DIRECTORY_SEPARATOR . 'messages' . DIRECTORY_SEPARATOR . 'dialogs.txt'

	$app->command('test:test [ip] [port] [domain] [--rt]', function($ip, $port, $domain, $rt) use(&$container, &$invoker, &$messageSource) {
		$source = VAR_DIR . DIRECTORY_SEPARATOR . 'tasks' . DIRECTORY_SEPARATOR . 'accounts-gmail.txt';
		$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
		
		$controller = (new App\Controller\GoogleAccountController());
		
		switch($ip) {
			case '127.0.0.1' : launchXhe(($rt ? XHE_EXE_RT_OBJ : XHE_EXE_OBJ), $port);
			default: remoteXheLaunch(($rt ? XHE_EXE_RT_OBJ : XHE_EXE_OBJ), $ip, '8000', $port);
		}
		
		$container->get('debug')->set_cur_script_path(__DIR__);
		
		$container->get('application')->maximize();
		$container->get('application')->minimize_to_tray();
		
		do {
			if (!$account = App\Model\GoogleAccount::where('email', ($email = App\Classes\CutLastString::cut($source)), 'like')::getOne()) die('No accounts...');
				else $controller->set($account);
				
			$loggedPrevious = $controller->get()->loginAt;
			
			if (!$invoker->call('App\Method\GoogleLogin', [$controller])) {
				//$container->get('application')->enable_quit(true);
				//$container->get('application')->exitapp();
				//sleep(6);
				//$container->get('filesystem')->remove(XHE_DIR . DIRECTORY_SEPARATOR . $port);
				printf("Error while was trying to login as %s!\n", $email);
			} else {printf("Successfully logged-in as %s!\n", $email);}
			
			$message = App\Classes\GetRandomLineFromFile($messageSource);
			
			$invoker->call(App\Command\GmailInputSearchMail::class, [
				//'search' => 'in:spam from:*@' . $domain
				'search' => 'from:*@' . $domain
			]);
			
			$invoker->call(App\Command\GmailClickSearchLastMail::class);
			
			$invoker->call(App\Command\GmailClickNotSpamMail::class);
			
			if (mt_rand(1,10) %% 3 == 0) { // 33%
				$invoker->call(App\Command\GmailReplyCurrentMail::class, [
					'message' => $message
				]);
			}
			
			/*
			if (mt_rand(1,10) %% 3 == 0) { // 33%
				$invoker->call(App\Command\GmailClickInnerLinkMail::class, [$domain]);
			}
			*/
			
		} while(!FALSE);
	});
	
	$app->run();
?>