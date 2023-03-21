<?php

namespace App\Command;

class SetCookieFolder {
	public function __inovoke($dir) {
		$this->container->get('browser')->set_cookies_folder($dir);
		$this->container->get('browser')->wait();
	}
}

?>