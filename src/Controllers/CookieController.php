<?php
namespace App\Controller;

class CookieController extends Controller {
	
	public function has() {
		return !is_null($this->get());
	}
	
	public function getUrl() {
		return $this->get()->url;
	}
	
	public function getValue() {
		return $this->get()->entry;
	}
	
	public function setValue($value) {
		$this->update(['entry' => $value]);
	}
	
	public function setUrl($url) {
		$this->update(['url' => $url]);
	}
	
	public function build() {
		return new \App\Model\Cookie;
	}
}