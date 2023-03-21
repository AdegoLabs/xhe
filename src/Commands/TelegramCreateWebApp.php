<?php

namespace App\Command;

class TelegramCreateWebApp extends Command {
	public function __invoke($phone, $launch = true) {
		$this->container->get('browser')->navigate('https://my.telegram.org/apps');
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		if ($this->container->get('input')->get_by_id('my_login_phone')->is_visibled()) {
			$this->container->get('input')->get_by_id('my_login_phone')->send_input($phone);
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			
			$this->container->get('button')->get_by_number(0)->click();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			sleep(8);
		}
		
		if (!$this->container->get('input')->get_by_name("app_title")->is_visibled()) {
			$code = $this->container->call(\App\Command\TelegramGetAppCode::class);
			
			$this->container->get('input')->get_by_name("password")->send_input($code);
			$this->container->get('button')->get_by_number(1)->click();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			sleep(12);
		}
		
		if ($this->container->get('input')->get_by_name("app_title")->is_visibled()) {
			$appTitle = $this->container->get('submitter')->generate_random_text(rand(5, 8), 1);
			$appShortName = $this->container->get('submitter')->generate_random_text(rand(5, 8), 1);
			$appUrl = $this->container->get('submitter')->generate_random_text(rand(5, 8), 1);
			$appDescription = $this->container->get('submitter')->generate_random_text(rand(15, 20), 1);
			
			$this->container->get('input')->get_by_name("app_title")->send_input($appTitle);
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			
			$this->container->get('input')->get_by_name("app_shortname")->send_input($appShortName);
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			
			$this->container->get('input')->get_by_name('app_url')->send_input($appUrl);
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			
			$this->container->get('textarea')->get_by_name("app_desc")->send_input($appDescription);
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			
			$this->container->get('button')->get_by_id("app_save_btn", false)->click();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			sleep(10);
		}
		
		if ($this->container->get('div')->get_by_attribute("class","app_edit_page", false)->is_visibled()) {
			$appId = $this->container->get('strong')->get_by_number(0)->get_inner_text();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			
			$appHash = $this->container->get('span')->get_by_number(2)->get_inner_text();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			
			printf("App id is %s\nApp hash is %s!\n", $appId, $appHash);
		}
		
		if (isset($appId) && isset($appHash))
			return [
				'id' => $appId, 
				'hash' => $appHash
			];
	}
}