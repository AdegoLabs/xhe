<?php
namespace App\Method;

use Psr\Log\LoggerInterface;
use App\Classes\OnlineSim;
use \s00d\OnlineSimApi\OnlineSimApi as OnlineSimApi;

class GoogleLogin extends LoginMethod {
	public $url = 'https://accounts.google.com/signin/v2/identifier?service=accountsettings&flowName=GlifWebSignIn&flowEntry=ServiceLogin';
	
	public function denied() {
		$url = $this->container->get('webpage')->get_url();

		if (preg_match("#deniedsigninrejected#", $url)) 
			printf("Account sign-in was denied!\n");		
	}
	
	public function method($data) {
		extract($data);
		
		if (!isset($url))
			$url = $this->url;
		
		$this->navigate($url);
		
		if ($this->isChooseAccountRequired($email)) {
			$this->chooseAccount($email);
			
			if ($this->isLoggedIn()) {
				$this->container->get(LoggerInterface::class)->info("Logged in successfully as " . $email . "!\n");
				//printf("Logged in successfully as %s!\n", $email);
				return true;
			}
		}
		
		sleep(5);
		
		if ($this->isCaptchaExist()) {
			$captcha = $this->solveGoogleCaptchaV1();
			$this->inputCaptcha($captcha);
			$this->submitEmailForm();
		}
		
		if ($this->isPasswordFormVisibled()) {
			$this->inputPassword($password);
			$this->submitPasswordForm();
		}
		
		if ($this->isReserveEmailRequired()) {
			$this->chooseREmailChallenge($email);
			$this->inputReserveEmail($reserveEmail);
			$this->submitReserveEmailForm();
		}
		
		if ($this->isPhoneRequired()) {
			$this->inputPhone($phone);
			$this->submitPhoneForm();
		}
		
		if ($this->isSmsVerificationRequired()) {
			printf("Sms verification required!\n");
			return false;
		}
		
		$this->phoneVerificationCheck();
		$this->phoneVerificationCheck();
		
		if ($this->isLoggedIn()) {
			//printf("Logged in successfully as %s!\n", $email);
			$this->container->get(LoggerInterface::class)->info("Logged in successfully as " . $email . "!\n");
			return true;
		} else {
			//printf("Error during login as %s!\n", $email);
			$this->container->get(LoggerInterface::class)->error("Error during login as " . $email . "!\n");
			return false;
		}
	}
	
	public function isSmsVerificationRequired() {
		if (preg_match("#challenge\/password\/empty#", $this->container->get('webpage')->get_url()))
			return true;
		return false;
	}
	
	public function isPhoneRequiredUsed() {
		$this->container->get('browser')->wait();
		return $this->container->get('span')->get_by_id('error', false)->is_visibled();
		
	}
	
	public function isCaptchaExist() {
		/*if ($this->container->get('image')->get_by_id('captchaimg', true)->is_visibled()) {
			$this->container->get('browser')->wait();
			
			$this->container->get(LoggerInterface::class)->notice("Captcha found!");
			
			return true;
		}*/
		if ($this->container->get('input')->get_by_id('ca')->is_visibled()) {
			$this->container->get(LoggerInterface::class)->notice("Captcha found!");
			return true;
		}
		
		return false;	
	}
	
	public function inputCaptcha($captcha) {
		$this->container->get('input')->get_by_id('ca')->focus();
		$this->container->get('input')->get_by_id('ca')->send_input($captcha);
		$this->container->get('browser')->wait();
	}
	
	public function solveGoogleCaptchaV1() {
		$captchaPath = "C:\\tmp\\captcha.jpg";
		$this->container->get('image')->screenshot_by_attribute($captchaPath,"id","captchaimg",false);
		$this->container->get('browser')->wait();
		
		/*
		if (!file_exists($captchaPath)) {
			die('Unable to save captcha image :(');
			return false;
		}
		*/
		
		$captcha = $this->container->get('image')->recognize_by_anticaptcha("",$captchaPath,"",'http://anti-captcha.com',false);
		$this->container->get('browser')->wait();
		
		if ($captcha)
			return $captcha;
		return false;
	}
	
	public function phoneVerificationCheck() {
		if ($this->isPhoneVerificationRequired()) {
			$api = new \App\Classes\OnlineSim(new OnlineSimApi($key = '', 'RU'));
			$tzid = ($api->getTzid('google')['tzid']);
			$phone = $api->getNumByTzid($tzid)['number'];
			
			$this->inputPhoneRequired($phone);
			$this->submitPhoneRequiredForm();
			
			if ($this->isPhoneRequiredUsed())
				return $this->phoneVerificationCheck();
			
			$sms = $api->getSms($tzid);
			$this->inputSms($sms);
			$this->submitSmsForm();
		} 
		
		sleep(1);
	}
	
	public function chooseREmailChallenge($email) {
		sleep(1);
		$this->container->get('browser')->wait();
		$result = $this->container->get('div')->get_by_attribute('data-challengetype', '12', false)->click();
		$this->container->get('browser')->wait();
		
		if (!$result)
			$this->container->get(LoggerInterface::class)->error("Confirmation challenge issue! " . $email);
		
	}
	
	public function navigate($url) {
		$this->container->get('browser')->navigate($url);
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		sleep(2);
	}
	
	public function spin() {
		$this->container->get('div')->get_by_attribute('role', 'progressbar');
		$this->container->get('browser')->wait();
	}
	
	public function isChooseAccountRequired($email) {		
		$this->container->get('browser')->wait();
		$result = $this->container->get('div')->get_by_attribute('data-email', strtolower($email))->is_visibled() || 
		$this->container->get('button')->get_by_value(strtolower($email), false)->is_visibled();
		
		return $result;
	}
	
	public function chooseAccount($email) {
		$this->container->get('browser')->wait();
		$this->container->get('div')->get_by_attribute('data-email', strtolower($email), false)->click() || 
		$this->container->get('button')->get_by_value(strtolower($email), false)->click();
		$this->container->get('browser')->wait();
	}
	
	public function skipRecovery() {
		if (preg_match("#signinoptions\/recovery-options-collection#", $this->container->get('webpage')->get_url())) {
			($btn = array_pop($this->container->get('div')->get_all_by_attribute('role', 'button')))->click();
			$this->container->get('browser')->wait();
		}
	}
	
	public function skipFeatures() {
		if (preg_match("#signin\/newfeatures#", $this->container->get('webpage')->get_url())) {
			$this->container->get('div')->get_by_attribute('role', 'button')->click();
			$this->container->get('browser')->wait();
			
			$this->container->get('div')->get_by_attribute('role', 'button')->click();
			$this->container->get('browser')->wait();
					
			$this->container->get('button')->get_by_number(0)->click();
			$this->container->get('browser')->wait();
		}
	}
	
	public function setBirthday() {
		if (preg_match("#interstitials\/birthday#", $this->container->get('webpage')->get_url())) {
			$this->container->get('input')->get_by_attribute('id', 'i4', false)->send_input(mt_rand(1,28));
			$this->container->get('browser')->wait();
			$this->container->get('input')->get_by_attribute('id', 'i9', false)->send_input("1985");
			$this->container->get('browser')->wait();
			$this->container->get('element')->get_by_attribute('data-value', mt_rand(1,12), false)->click();
			$this->container->get('browser')->wait();
		}
	}
	
	public function isLoggedIn() {
		$this->denied();
		$this->skipRecovery();
		$this->skipFeatures();
		
		$this->container->get('browser')->wait();
		$url = $this->container->get('webpage')->get_url();
		$this->container->get('browser')->wait();
		
		if(preg_match("#myaccount#i", $url)) {
			return true;
		} else {
			if (!$this->container->get('browser')->check_connection($url,30)) {
				$this->container->get('browser')->wait();
				
				//printf("Connection issue!\n");
				$this->container->get(LoggerInterface::class)->error("Connection issue!");
			}
		}
	}
	
	public function isEmailFormVisibled() {
		$result = $this->container->get('input')->get_by_attribute('type', 'email', false)->is_visibled();
		$this->container->get('browser')->wait();

		return $result;
	}
	
	public function inputEmail($email) {
		$this->container->get('input')->get_by_attribute('type', 'email', false)->send_input($email);
		$this->container->get('browser')->wait();
	}
	
	public function isEnteredEmailIsFull() {
		$entered = $this->container->get('input')->get_by_attribute('type', 'email', false)->get_value();
		$this->container->get('browser')->wait();
		
		if (strlen($entered) > 1)
			return true;
		return false;
	}
	
	public function isPasswordFormVisibled() {
		$result = $this->container->get('input')->get_by_attribute('type', 'password', false)->is_visibled() || $this->container->get('input')->get_by_name('password')->is_visibled();
		
		$this->container->get('browser')->wait();
		
		return $result;
	}
	
	public function inputPassword($password) {
		$this->container->get('input')->get_by_attribute('type', 'password', false)->send_input($password);
			//$this->container->get('input')->get_by_name('password')->send_input($password);
		$this->container->get('browser')->wait();
	}
	
	public function submitEmailForm() {
		if (!$this->container->get('btn')->get_by_name('signIn')->is_visibled()) {
			$this->container->get('div')->get_by_id('identifierNext', false)->click();
			$this->container->get('browser')->wait();
		} else {
			$this->container->get('btn')->get_by_name('signIn')->click();
			$this->container->get('browser')->wait();
			
		}
	}
	
	public function submitPasswordForm() {
		if (!$this->container->get('btn')->get_by_id('submit')->is_visibled()) {
			$this->container->get('div')->get_by_id('passwordNext', false)->click();
			$this->container->get('browser')->wait();
		} else {
			$this->container->get('btn')->get_by_id('submit')->click();
			$this->container->get('browser')->wait();
		}
		
		sleep(2);
	}
	
	public function isReserveEmailRequired() {
		$this->container->get('browser')->wait();
		
		if(preg_match("#challenge\/selection#", $this->container->get('webpage')->get_url()))
			return true;
	}
	
	public function inputReserveEmail($reserveEmail) {
		$this->container->get('input')->get_by_id('knowledge-preregistered-email-response', false)->send_input($reserveEmail);
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
	}
	
	public function submitReserveEmailForm() {
		$this->container->get('button')->get_by_number(0)->click();
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
	}
	
	public function isPhoneRequired() {
		$this->container->get('browser')->wait();
	}
	
	public function isBanned() {
		return $this->container->get('form')->get_by_inner_text(" g.co/AccountAppeal", false)->is_exist();
	}
	
	public function inputPhone($phone) {}
	
	public function submitPhoneForm() {
		
	}
	
	public function isPhoneVerificationRequired() {
		$this->container->get('browser')->wait();
		
		if ($this->container->get('input')->get_by_id('phoneNumberId')->is_visibled()) {
			$this->container->get('browser')->wait();
			return true;
			
		} elseif($this->container->get('form')->get_by_inner_text('detected unusual activity', false)->is_visibled() || $this->container->get('form')->get_by_inner_text('подозрительную активность', false)->is_visibled()) {
			$this->container->get('browser')->wait();
			return true;
		} elseif($this->container->get('input')->get_by_id('deviceAddress')->is_visibled()) {
			$this->container->get('browser')->wait();
			return true;
		}
		
		return false;
	}
	
	public function inputPhoneRequired($phone) {
		if ($this->container->get('input')->get_by_name('deviceAddress')->is_visibled()) {
			//$this->container->get('listbox')->multi_select_indexes_by_number(0,"166");
			$this->container->get('listbox')->multi_select_texts_by_number(0,"Russia (Россия)");
			$this->container->get('browser')->wait();
			$this->container->get('input')->get_by_name('deviceAddress')->send_input($phone);
			$this->container->get('browser')->wait();
		} else {
			$this->container->get('browser')->wait();
			$this->container->get('input')->get_by_id('phoneNumberId')->send_input($phone) ||
			$this->container->get('input')->get_by_id('idvreenablePhoneNumberId')->send_input($phone);
			$this->container->get('browser')->wait();
		}
		
	}
	
	public function submitPhoneRequiredForm() {
		if (!$this->container->get('input')->get_by_id('deviceAddress')->is_visibled()) {
			$this->container->get('browser')->wait();
			$this->container->get('button')->get_by_inner_text("Next")->click() || 
			$this->container->get('button')->get_by_inner_text("Далее")->click();
			$this->container->get('browser')->wait();
			sleep(1);
			$this->container->get('span')->get_by_inner_text("Verify", false)->click();
			$this->container->get('browser')->wait();
			sleep(1);
		} elseif($this->container->get('div')->get_by_id('idvreenablesendNext')->is_visibled()) {
			$this->container->get('button')->get_by_inner_text("Next")->send_mouse_click() || 
			$this->container->get('button')->get_by_inner_text("Далее")->send_mouse_click();
			$this->container->get('browser')->wait();
		} else {
			$this->container->get('btn')->get_by_id('next-button')->click();
			$this->container->get('browser')->wait();
		}
	}
	
	public function inputSms($sms) {
		$this->container->get('browser')->wait();
		if ($this->container->get('input')->get_by_id('code')->is_visibled()) {
			$this->container->get('browser')->wait();
			$this->container->get('input')->get_by_id('code')->send_input($sms);
			$this->container->get('browser')->wait();
		} elseif ($this->container->get('input')->get_by_id('idvAnyPhonePin')->is_visibled()) {
			$this->container->get('browser')->wait();
			$this->container->get('input')->get_by_id('idvAnyPhonePin')->send_input($sms);
			$this->container->get('browser')->wait();
		} else {
			$this->container->get('input')->get_by_id('smsUserPin')->send_input($sms);
			$this->container->get('browser')->wait();
		}
	}
	
	public function submitSmsForm() {
		
		$this->container->get('browser')->wait();
		if ($this->container->get('webpage')->get_url() == 'https://accounts.google.com/speedbump/idvreenable/sendidv'	) {		
			$this->container->get('button')->get_by_inner_text('Далее', false)->click() ||
			$this->container->get('element')->get_by_id('next-button')->click();
			$this->container->get('browser')->wait();
		} else {
			
			$this->container->get('button')->get_by_inner_text('Next', false)->click() || $this->container->get('button')->get_by_inner_text('Далее', false)->click();
			$this->container->get('browser')->wait();
		}
		sleep(1);
	}
}