<?php

namespace Xhe;

class XVar {
	public $server;
	public function __construct($client) {
		$this->setClient($client);
	}
	public function setClient($client) {
		$this->server = $client;
	}
	
}