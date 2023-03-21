<?php

namespace App\Model;

class TelegramPhone extends Model {
	protected $dbTable = "telegram_phone";
	protected $dbFields = Array(
		'proxyId' => Array('int'),
		'phone' => Array('text'), // + ?? 
		'appId' => Array('int'),
		'appHash' => Array('text'),
		'used' => Array('int'),
		'working' => Array('bool'),
		'status' => Array('bool')
	);
	
	protected $relations = Array (
        'proxy' => Array ("hasOne", "App\Model\Proxy", "proxyId")
    );
	
}
