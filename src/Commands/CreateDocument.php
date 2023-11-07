<?php

namespace App\Command;

class CreateDocument extends Command {
	public function __invoke($name, $body, $message, $attendees) {
		$this->container->get('browser')->navigate('https://docs.google.com/document/create?usp=drive_web');
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		sleep(6);
		
		if ($this->permissions($message, $attendees))
			printf("File was shared successfully!\n");
		else printf("File was NOT shared!\n");
		$this->create($name, $body);
	}
	
	public function create($name, $body) {
		
		$this->container->get('div')->get_by_attribute("class","kix-page-paginated canvas-first-page", false)->click();
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();

		$this->container->get('div')->get_by_attribute("class","kix-page-paginated canvas-first-page", false)->send_input($body);
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();

		$this->container->get('input')->get_by_number(0)->set_value("");
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		$this->container->get('input')->get_by_number(0)->send_input($name);
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		sleep(1);
	}
	
	public function permissions($message, $attendees) {
		$this->container->get('span')->get_by_attribute('class', 'apps-share-sprite', false)->send_mouse_click();
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		sleep(5);
		
		for ($frameNum = 8; $frameNum < 12; $frameNum++) {
			$this->container->get('browser')->wait();
			if ($this->container->get('button')->get_by_number(5, $frameNum)->is_exist())
				$FR = $frameNum;
			echo "\n";
			$this->container->get('browser')->wait();
		}
		
		if (!isset($FR)) {
			$this->container->get('browser')->refresh();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			sleep(3);
			
			$this->permissions($message, $attendees);
		}

		if ($this->container->get('span')->get_by_inner_text("Все, у кого есть ссылка", true, $FR)->is_visibled())
			$this->container->get('span')->click_by_inner_text("Все, у кого есть ссылка", true, $FR);
		elseif($this->container->get('span')->get_by_inner_text("Anyone with the link", true, $FR)->is_visibled())
			$this->container->get('span')->click_by_inner_text("Anyone with the link", true, $FR);
		
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		sleep(1);

		foreach($attendees as $attendee) {
			$this->container->get('input')->get_by_number(0, $FR)->send_input($attendee);
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			$this->container->get('input')->get_by_number(0, $FR)->send_input(',');
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			sleep(1);
		}
		
		$this->container->get('keyboard')->send_key(13);
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		if ($this->container->get('span')->get_by_inner_text("Редактор", true, $FR)->is_visibled())
			$this->container->get('span')->click_by_inner_text("Редактор", true, $FR);
		if ($this->container->get('span')->get_by_inner_text("Editor", true, $FR)->is_visibled())
			$this->container->get('span')->click_by_inner_text("Editor", true, $FR);

		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();

		if ($this->container->get('span')->get_by_inner_text("Читатель", true, $FR)->is_visibled())
			$this->container->get('span')->click_by_inner_text("Читатель", true, $FR);
		elseif($this->container->get('span')->get_by_inner_text("Viewer", true, $FR))
			$this->container->get('span')->click_by_inner_text("Viewer", true, $FR);
		
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
			
		if ($message) {
			$this->container->get('textarea')->set_value_by_number(0, $message, $FR);
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
		}

		if ($this->container->get('button')->get_by_inner_text("Отправить", true, $FR)->is_visibled())
			$this->container->get('button')->click_by_inner_text("Отправить", true, $FR);
		elseif($this->container->get('button')->get_by_inner_text("Send", true, $FR)->is_visibled())
			$this->container->get('button')->click_by_inner_text("Send", true, $FR);
			
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		sleep(2);
		
		if ($this->container->get('button')->get_by_inner_text("Поделиться", false, $FR)->is_visibled())
			$this->container->get('button')->get_by_inner_text("Поделиться", false, $FR)->click();
		elseif($this->container->get('button')->get_by_inner_text("Share", false, $FR)->is_visibled())
			$this->container->get('button')->get_by_inner_text("Share", false, $FR)->click();
		
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		if ($this->container->get('span')->get_by_inner_text("flagged", false, $FR)->is_visibled() || $this->container->get('span')->get_by_inner_text("помечен", false, $FR)->is_visibled())
			return false;
		return true;
		sleep(1);
	}
}