<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$invoker = new Invoker\Invoker(null, $container);

$source = 'C:\Users\user741\Downloads\order1770092.txt';
$data = file($source, FILE_IGNORE_NEW_LINES);

$controller = (new App\Controller\GoogleAccountController());
$container->set('client', \DI\create('Xhe\Client')->constructor('127.0.0.1', 7667));

foreach($data as $row) {
	$entity = explode(":", $row);
	
	$oldAccount = [
		'email' => $entity[0],
		'password' => $entity[1]
	];
	
	$oldAccount = (object) $oldAccount;
	$newAccount = App\Model\GoogleAccount::where('email', $oldAccount->email)::groupBy('updatedAt')::getOne();
	
	printf("Picked up %s\n", $oldAccount->email);
	
	$controller->set($newAccount);
	
	if (!$invoker->call('App\Method\GooglePlaygroundLogin', [$controller])) {
		$newAccount->password = $oldAccount->password;
	}
	
	$newAccount->used = 1;
	$newAccount->save();
		
	$invoker->call('App\Command\Vanish');
	sleep(2);
	$newAccount->updatedAt = date("Y-m-d H:i:s");
	$newAccount->save();
	
}

$app->run();
?>