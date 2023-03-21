<?php
namespace App\Command;

class GetCookie extends Command {
	function __invoke() {
		$cookie = $this->container->get('browser')->get_cookie("");
		
		return $cookie;
	}
}