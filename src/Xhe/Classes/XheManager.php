<?php

namespace Xhe;

use App\Client;

class XheManager {
	public $client;
	public $var;
	
	function __construct($client) {
		$this->client = $client;
	}
	
	function __get($var) {
		
	}
	
	
}