<?php

namespace App\Model;

use App\Model\Proxy as Proxy;

class ProxyBuilder {
	public static function build() {
		$model = new Proxy;
		
		if ($model->save())
			return $model;
		
		return NULL;

	}
	
	public function buildWithData($data) {
		@$model = \App\Model\ProxyBuilder::build();
		$model->update($data);

		return $model;
	}
	
	public static function findUnused() {
		return Proxy::where('status', 1)::groupBy('used')::getOne();
	}
}