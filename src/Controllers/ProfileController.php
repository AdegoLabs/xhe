<?php
namespace App\Controller;

class ProfileController extends Controller {
	public function getUseragent() {
		return $this->get()->useragent;
	}
	
	public function getLanguage() {
		return $this->get()->language;
	}
	
	public function getTimezone() {
		return $this->get()->timezone;
	}
	
	public function getCanvas() {
		return $this->get()->canvas;
	}
	
	public function getResolution() {
		return $this->get()->resolution;
	}
	
	public function getHardware() {
		return $this->get()->hardware;
	}
	
	public function getAudio() {
		return $this->get()->audio;
	}
	
	public function getBound() {
		return $this->get()->bound;
	}
}