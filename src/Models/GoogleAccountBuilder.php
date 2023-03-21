<?php
namespace App\Model;

use App\Model\GoogleAccount as Account;

class GoogleAccountBuilder {
	public static function build() {
		$model = new Account;
		if (@$model->save())
			return $model;
		
		return NULL;
	}
	
	public function buildWithData($data) {
		$model = \App\Model\GoogleAccountBuilder::build();
		$model->update($data);
		
		return $model;
	}
		
	public static function findUnused() {
		//if (!is_null($model = Account::where('status', 1)::where('working', 0)::where('rEmail', NULL, 'is not')::groupBy('used')::orderBy('createdAt', 'DESC')::getOne()))
	//	if (!is_null($model = Account::where('status', 1)::where('working', 0)::groupBy('used')::getOne()))
		if (!is_null($model = Account::where('status', 1)::where('working', 0)::where('rEmail', NULL, 'is not')::groupBy('used')::getOne()))
			return $model;
		return false;
	}
	
	public static function findMultipleUnused($q) {
		if (!is_null($result = Account::where('status', 1)::where('working', 0)::where('rEmail', NULL, 'is not')::groupBy('used')::get($q))) {
			
			foreach($result as $model)
				$model->update('updatedAt', date("Y-m-d H:i:s"));
			
			return $result;
		}
			
		return false;
	}
}