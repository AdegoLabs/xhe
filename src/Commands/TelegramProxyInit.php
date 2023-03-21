<?php

namespace App\Command;

class TelegramProxyInit extends Command {
	public function __invoke($ip, $port, $login, $password) {
		$tg = $this->container->get('window')->get_by_text("Telegram", true);
		
		$tg->restore();
		$tg->show();
		$tg->foreground();
		$tg->maximize();
		
		if ($tg->is_visible()) {
			$tg->mouse_click(35, 50);
			sleep(1);
			$tg->mouse_click(50, 500);
			sleep(1);
			$tg->mouse_click(900, 550);
			sleep(1);
			$tg->mouse_click(900, 225);
			sleep(1);
			$tg->mouse_click(900, 440);
			sleep(1);
			$tg->mouse_click(900, 380);
			sleep(1);
			$tg->mouse_click(900, 380);
			sleep(1);
			$tg->input($ip);
			$tg->key(9);
			$tg->input($port);
			$tg->key(9);
			$tg->input($login);
			$tg->key(9);
			$tg->input($password);
			$tg->mouse_click(1135, 780);
			$tg->key(27);
			sleep(1);
			$tg->key(27);
			sleep(1);
			$tg->key(27);
			$tg->minimize();
			
			return true;
		} else {
			printf("Can not find such window interface...;(\n");
			return false;
		}		
	}
}