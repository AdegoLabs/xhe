<?php

namespace App\Command;

class MeganzDownload extends Command {
	public function __invoke($url, $destination = 'C:\xampp\htdocs\xhe\var\downloads') {
		
		$this->container->get('browser')->set_default_download($destination);
		$this->navigate($url);
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		while (!$this->container->get('button')->get_by_inner_text("Download", true)->is_visibled())
			sleep(1);
		
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		sleep(15);
		
		$this->container->get('button')->get_by_inner_text("Download", true)->click();
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait();
		sleep(10);
		
		echo $filePath = $this->container->get('span')->get_by_attribute("class","filename", false)->get_inner_text() . $this->container->get('span')->get_by_attribute("class","extension", false)->get_inner_text();
				
		if (file_exists($destination . DIRECTORY_SEPARATOR . $filePath)) {
			printf("File was downloaded successfully: %s\n", $filePath);
			
			return $filePath;
		} else {
			printf("Unsuccessfull attempt to download file...;(");
		}
		
		return false;
	}
}