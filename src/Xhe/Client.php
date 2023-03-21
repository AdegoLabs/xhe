<?php

namespace Xhe;

class Client {
	public $ip;
	public $port;
	
	public function __construct($ip, $port) {
		$this->ip = $ip;
		$this->port = $port;
	}
	
	public function __toString() {
		return $this->ip . ":" . $this->port;
	}
	
}