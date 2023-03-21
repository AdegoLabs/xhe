<?php
namespace App\Model;

use App\Model\Attendee as Attendee;

class AttendeeBuilder {
	public static function build() {
		$model = new Attendee;
		if (@$model->save())
			return $model;
		return NULL;
	}
	
	public function buildWithData($data) {
		
		//$check = \dbObject::table('attendees')::where('email', $data['email']);
		
		//if (!$check->has()) {
			$model = \App\Model\AttendeeBuilder::build();
			$model->update($data);
			
			return $model;
		//}
			
		//return NULL;
	}
	
	public static function findUnused() {
		if (!is_null($model = Attendee::where('status', 1)::groupBy('used')::getOne()))
			return $model;
		return false;
	}
}