<?php

namespace App\Model;

class Proxy extends Model {
	protected $dbTable = "proxiez";
	protected $primaryKey = "id";
	protected $dbFields = Array(
		'ip' => Array('text'),
		'port' => Array('int'),
		'login' => Array('text'),
		'password' => Array('text'),
		'language' => Array('text'),
		'updatedAt' => Array('datetime'),
		'deactivatedAt' => Array('datetime'),
		'used' => Array('int'),
		'status' => Array('int')
	);

}
