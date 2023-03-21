<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

require('C:\xampp\htdocs\calendar-app\libs\Models\GmailAccountModel.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);
$invoker = new Invoker\Invoker(null, $container);

$accounts = GmailAccount::where('status', 1)::get();

do {
	$account = array_pop($accounts);
	
	$model = new App\Model\GoogleAccount;
	
	$model->email = $account->email;
	$model->password = $account->password;
	
	if (!is_null($account->reserveEmail) && $account->reserveEmail != '')
		$model->rEmail = $account->reserveEmail;
	
	if (!is_null($account->reservePhone) && $account->reservePhone != '')
		$model->phone = $account->reservePhone;
	
	$id = $model->save();
	
	printf("Account was imported and got id = %d\n", $id);
} while(!empty($accounts));

$app->run();
