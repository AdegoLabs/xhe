<?php
namespace App\Command;

class EnableProxy extends Command {
	function __invoke($ip, $port, $login, $pass) {
		//$this->container->get('browser')->reset_default_authorization();
		
		$this->container->get('browser')->set_default_authorization($login, $pass);
		$this->container->get('browser')->enable_proxy("all connections", $ip . ":" . $port, false);
		$this->container->get('browser')->wait();
	}
}