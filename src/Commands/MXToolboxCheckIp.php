<?php

namespace App\Command;

class MXToolboxCheckIp extends Command {
	public function __invoke($ip) {
		$this->container->get('browser')->navigate('https://mxtoolbox.com/SuperTool.aspx?action=blacklist%3a' . $ip . '&run=toolpage');
		$this->container->get('browser')->wait();
		
		sleep(6);
		
		if ($this->container->get('span')->get_by_inner_text("We notice you are on a blackli", false)->is_visibled())
			return false;
		return true;
	}
}

?>