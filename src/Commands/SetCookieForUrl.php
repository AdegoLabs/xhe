<?php
namespace App\Command;

class SetCookieForUrl extends Command {
	function __invoke($url, $entry) {
		$this->container->get('browser')->set_cookie_for_url($url, "", $entry, true);
		$this->container->get('browser')->wait();
	}
}