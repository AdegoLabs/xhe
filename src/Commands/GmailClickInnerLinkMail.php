<?php

namespace App\Command;

class GmailClickInnerLinkMail extends Command {
	public function __invoke($href) {
		if ($this->container->get('anchor')->get_by_href($href, false)->is_exist()) {
			$result = $this->container->get('anchor')->get_by_href($href, false)->click();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			sleep(1);
			
			return $result;
		}
		$this->container->wait();
		
		return false;
	}
	
	
}