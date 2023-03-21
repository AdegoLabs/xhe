<?php

namespace App\Model;

class Cookie extends Model {
	protected $dbTable = "cookies";
	protected $dbFields = Array(
		'entry' => Array('text'),
		'url' => Array('text')
	);
}
