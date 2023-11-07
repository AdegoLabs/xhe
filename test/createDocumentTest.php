<?php
	use Psr\Log\LoggerInterface;
	
	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$invoker = new Invoker\Invoker(null, $container);

	$app->command('test:test [ip] [port] [--restart] [--rt]', function($ip, $port, $restart, $rt, LoggerInterface $logger) use (&$container, &$invoker) {
		$source = VAR_DIR . DIRECTORY_SEPARATOR . 'tasks' . DIRECTORY_SEPARATOR . 'accounts.in';
		$nameDoc = 'DTHH46';
		$bodyDoc = 'Тебе выпал идеальный шанс поиметь пару-тройку призов от нашего комьюнити

Получай сочный бонус 150% к дэпчику, потому что мы ценим тебя

Кайфуй от наилучших скидок до 20%, на все развлечения

Один из элитных приветсвенных пакетов до 777% бонусов и 200 халявных спинов, для всех желающих

Куча лучших акций, эксклюзивно для наших клиентов

А сколько еще тебя ждет впереди! Поспеши, подключайся к нам и будь всегда на волне
https://bit.ly/3UyrVIo 
эскалапия повальный живорыбный замесить';
		$messageDoc = 'Ты чего? Это же халява';
		$attendees = [
			'tanyaaselina@gmail.com'
		];
		
		$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
		$controller = (new App\Controller\GoogleAccountController());
		
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
		
		if (!$invoker->call('App\Method\GoogleLogin', [$controller])) {
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
		}

		$invoker->call('App\Command\CreateDocument', [
			'name' => $nameDoc,
			'body' => $bodyDoc,
			'message' => $messageDoc,
			'attendees' => $attendees
		]);
	});
	
	$app->run();
