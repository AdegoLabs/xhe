<?php

namespace App\Controller;

class TelegramPhoneController extends Controller {
	public function hasProxy() {
		return !is_null($this->get()->proxy);
	}
	
	public function deactivate() {
		$this->update(['status' => 0]);
	}
	
	public function activate() {
		$this->update(['status' => 1]);
	}
	
	public function working($work) {
		$this->update(['working' => $work]);
	}
	
	public function used() {
		$this->update(['used' => $this->get()->used += 1]);
	}
	
	public function setAppId($appId) {
		$this->update([
			'appId' => $appId
		]);
		
		return $this;
	}
	
	public function setAppHash($appHash) {
		$this->update([
			'appHash' => $appHash
		]);
		
		return $this;
	}
	
	public function getAppId() {
		return $this->get()->appId;
	}
	
	public function getAppHash() {
		return $this->get()->appHash;
	}
	
	public function getPhone() {
		return $this->get()->phone;
	}
		
	public function startWorking() {
		$this->update(['working' => 1]);
	}
	
	public function finishWorking() {
		$this->update(['working' => 0]);
	}
}
