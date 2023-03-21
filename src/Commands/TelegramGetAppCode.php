<?php

namespace App\Command;

class TelegramGetAppCode extends Command {
	public function __invoke() {
		$tg = $this->container->get('window')->get_by_text("Telegram", false);
		
		$tg->enable(true);
		$tg->focus();
		$tg->restore();
		$tg->show();
		$tg->foreground();
		//$tg->maximize();
		
		/*
		$tg->mouse_click(970,500);
		$tg->maximize();
		sleep(1);
		*/
		
		if (!$tg->is_visible())
			die("Can not find Telegram instance...;(\n");
		
		sleep(2);
		$tg->mouse_click(100, 60); // Click to search bar 
		
		sleep(1);

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
		
		$tg->mouse_move(850, 770); // Confirmation code in the text message
		$tg->mouse_double_click(850, 770); // Select code by tripple mouse clicking
		$tg->mouse_click(850, 770);
		
		$tg->mouse_right_click(850, 770); // Open modal window with properties
		sleep(1);
		
		$tg->mouse_move(1050, 545); // Copy selected string
		sleep(1);
		
		$tg->mouse_click(1050, 545);
		sleep(1);
		
		/*
		if (preg_match("#.*?([\d]{5}).*?#", $this->container->get('clipboard')->get_text(), $match)) {
			$code = $match[1];
		} else {
			$code = false;
			var_dump($match);
			echo "No auth code found...(\n";
			echo $this->container->get('clipboard')->get_text();
		}
		*/
		
		$code = $this->container->get('clipboard')->get_text();
		
		printf("Confirmation code is %s\n", $code);
		
		//$tg->minimize();

		return $code;
	}
}