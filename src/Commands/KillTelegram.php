<?php

namespace App\Command;

class KillTelegram extends Command {
	public function __invoke() {
		$tg = $this->container->get('window')->get_by_text("Telegram", false);
		
		return $tg->get_process_id();
	}
}