<?php

namespace App\Model;

use App\Model\Cookie as Cookie;

class CookieBuilder {
	public static function buildWithUrl($url) {
		$model = new Cookie;
		$model->url = $url;
		$model->save();
		
		return $model;
	}
	
	public static function build() {
		$model = new Cookie;
		
		$model->save();
		
		return $model;
	}
}