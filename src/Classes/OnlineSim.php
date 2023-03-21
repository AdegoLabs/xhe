<?php 
namespace App\Classes;

class OnlineSim {
		public $Api;
		
		public function __construct($Api) {
			$this->Api = $Api;
		}
		
		public function balance() {
			return ($this->Api->user()->balance()->toArray());
		}
		
		public function tariffs() {
			return ($this->Api->numbers()->tariffs()->toArray());
		}
		
		public function getTzid($service = "google") {
			return ($tzid = ($this->Api->numbers()->get($service)->toArray()));
		}
		
		public function getNumByTzid($tzid) {
			return $this->Api->numbers()->stateOne($tzid)->toArray();
		}
		
		public function getSms($tzid) {
			$iterator = 0;
			
			do {
				if ($iterator > 180)
					return false;
				
				$response = $this->getNumByTzid($tzid);
				if ($response['response'] == 'TZ_NUM_ANSWER') {
					$sms = array_pop($response['msg'])['msg'];
					return $sms;
				} else {
					sleep(5);
					$iterator += 5;
				}
			} while ( !isset($sms) );
			
			return $sms;
		}		
	}