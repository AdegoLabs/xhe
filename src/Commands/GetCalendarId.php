<?php

namespace App\Command;

class GetCalendarId extends Command {
	public function __invoke() {
		$var = array_pop($this->container->get('pre')->get_all_by_attribute("class","body", false)->elements);
		$this->container->get('browser')->wait_js();
		$json = $var->get_inner_text();
		
		if (preg_match("#id\": \"(.*?)\"#i", $json, $match)) {
			$this->container->get('browser')->wait();
			return $match[1];
		}
	}
}