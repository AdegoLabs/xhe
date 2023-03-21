<?php

namespace App\Command;

class TelegramGetConfirmationCode extends Command {
	public function __invoke() {
		$tg = $this->container->get('window')->get_by_text("Telegram (", false);
		
		// Right sequence to foreground enabled window are: enable(true)->focus->show->foreground
		$tg->enable(true);
		$tg->focus();
		//$tg->restore(); // Double using this method will reduce the size of maximized window
		$tg->show();
		$tg->foreground();
		
		//$tg->maximize(); // Better to use this method only once after launching the program
		
		if (!$tg->is_visible()) {
			//die("Can not find Telegram instance...;(\n");
			$tg = $this->container->get('window')->get_by_text("Telegram", false);
		
			$tg->enable(true);
			$tg->focus();
			$tg->show();
			$tg->foreground();
		}
		
		if (!$tg->is_visible()) 
			die("Can not find Telegram instance...;(\n");
		
		sleep(2);
		//$tg->mouse_click(100, 60); // Click to search bar 
		//sleep(1);

		$tg->input("Telegram"); //Filtering chats to show only service Telegram chat
		sleep(1);
		
		$tg->mouse_move(100, 120); // Move mouse to Telegram chat (first in the list)
		sleep(1);
		
		$tg->mouse_click(100, 120); // Select Telegram chat
		sleep(1);
		
		$tg->mouse_click(1890, 70); //Disable Telegram user info
		sleep(1);
		
		$tg->mouse_click(1865, 930); //Click by down-arrow to see new messages
		sleep(1);
		
		//$tg->mouse_click(1600, 340); // Just for sure disable frame 
		//sleep(1);

		$tg->mouse_double_click(970, 782); //Tripple click by confirmation code in text message
		$tg->mouse_click(970, 782);
		sleep(1);

		$tg->mouse_right_click(970, 782);
		sleep(1);
		
		$tg->mouse_click(1085, 560);
		sleep(1);

		if (preg_match("#.*?([\d]{5}).*?#", $this->container->get('clipboard')->get_text(), $match)) {
			$code = $match[1];
		} else {
			$code = false;
			
			echo "No auth code found...(\n";
			echo $this->container->get('clipboard')->get_text();
		}
		
		//$tg->minimize();

		return $code;
	}
}