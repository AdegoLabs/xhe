<?php

namespace App\Model;

class Profile extends Model {
	protected $dbTable = "profiles";
	protected $jsonFields = Array('resolution', 'hardware', 'audio');
	protected $dbFields = Array(
		'useragent' => Array('text'),
		'language' => Array('text'),
		'timezone' => Array('text'),
		'resolution' => Array('text'),
		'hardware' => Array('text'),
		'canvas' => Array('int'),
		'audio' => Array('text'),
		'bound' => Array('int'),
	);
	
	
	
	
	
}
