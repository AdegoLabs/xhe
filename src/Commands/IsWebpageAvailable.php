<?php
namespace App\Command;

class IsWebpageAvailable extends Command {
	public function __invoke($url = 'google.com') {
		$this->container->get('browser')->navigate($url);
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		if ($this->container->get('browser')->check_connection($url, $timeout = 15))
			return true;
		return false;
	}
}