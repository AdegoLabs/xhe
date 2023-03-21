<?php

namespace App\Method;

use App\Command\Command as Command;

abstract class Method extends Command {
	function before() {
		$this->container->get('browser')->navigate('http://localhost/dashboard/');
		$this->container->get('browser')->wait();
	}
	
	abstract function method($data);
}