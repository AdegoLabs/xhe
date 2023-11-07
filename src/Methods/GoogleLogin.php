<?php
namespace App\Method;

use Psr\Log\LoggerInterface;
use App\Classes\OnlineSim;
use \s00d\OnlineSimApi\OnlineSimApi as OnlineSimApi;

class GoogleLogin extends LoginMethod {
	//public $url = 'https://accounts.google.com/signin/v2/identifier?service=accountsettings&flowName=GlifWebSignIn&flowEntry=ServiceLogin';
	public $url = 'https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F';
	
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
			
			if ($this->isLoggedIn($email)) {
				$this->container->get(LoggerInterface::class)->info("Logged in successfully as " . $email . "!\n");
				//printf("Logged in successfully as %s!\n", $email);
				return true;
			}
		}
		
		if ($this->isEmailFormVisibled()) {
			$this->inputEmail($email);
				
			if (!$this->isEnteredEmailIsFull()) {
				beep();
				$this->container->get(LoggerInterface::class)->error("Found set_value bug!");
				printf("Found set_value bug!\n");
				die("Script work was stopped due to service errors...");
				//sleep(1000);
			}
			
			$this->submitEmailForm();
		}
		
		sleep(3);
		
		do {
			if ($this->isCaptchaExist()) {
				$captcha = $this->solveGoogleCaptchaV1();
				$this->inputCaptcha($captcha);
				$this->submitEmailForm();
			}
		} while ($this->isCaptchaWrong());
		
		if ($this->isReCaptchaExist()) {
			$this->solveGoogleCaptchaRecaptcha();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			//printf("WAITING BEFORE SUBMIT BUTTON...");
			//sleep(10);
			//echo $this->container->get('btn')->click_by_number(0) || $this->container->get('btn')->get_by_attribute("class","submitButton", false)->click();
			$this->container->get('button')->get_by_xpath("/html/body/div[1]/div[1]/div[2]/div/div[2]/div/div/div[2]/div/div[2]/div/div[1]/div/div/button")->click();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			sleep(2);
		}
		
		sleep(3);
		
		if ($this->container->get('frame')->get_by_src("https://www.google.com/recaptcha", false)->is_visibled()) {
			$this->container->get('browser')->wait();
			$this->container->get('button')->get_by_number(1)->click();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			sleep(3);
		}
			
	
		if ($this->isPasswordFormVisibled()) {
			$this->inputPassword($password);
			$this->submitPasswordForm();
		}
		
		if ($this->isPasswordChanged()) {
			$this->container->get(LoggerInterface::class)->error("Password was changed for " . $email . "!");
			printf("Password was changed for %s!\n", $email);
			
			return false;
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
			
		
		if ($this->isLoggedIn($email)) {
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
		return ($this->container->get('span')->get_by_id('error', false)->is_visibled() || $this->container->get('div')->get_by_inner_text("This phone number cannot be used for verification.", false)->is_visibled() || $this->container->get('div')->get_by_inner_text("This phone number has already been used too many times for verification", false)->is_visibled() || $this->container->get('div')->get_by_inner_text("не может быть использован", false)->is_visibled());
		
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
		$this->container->get('input')->get_by_id('ca')->set_value("");
		$this->container->get('browser')->wait();
		$this->container->get('input')->get_by_id('ca')->focus();
		$this->container->get('browser')->wait();
		$this->container->get('input')->get_by_id('ca')->set_value($captcha);
		$this->container->get('browser')->wait();
	}
	
	public function isPasswordChanged() {
		$this->container->get('browser')->wait();
		
		return $this->container->get('span')->get_by_inner_text("Пароль был изменен ", false)->is_visibled();
	}
	
	public function solveGoogleCaptchaV1() {
		$this->container->get('browser')->wait();
		$captchaPath = "C:\\tmp\\captcha.jpg";//$this->container->get('image')->screenshot_by_attribute($captchaPath,"id","captchaimg",false);
		$this->container->get('image')->get_by_number(0)->screenshot($captchaPath);
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
	
	public function isCaptchaWrong() {
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		return ($this->container->get('div')->get_by_inner_text("Снова введите символы", false)->is_exist() || $this->container->get('div')->get_by_inner_text("again", false)->is_exist());
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
			$this->container->get('input')->get_by_attribute('id', 'i4', false)->set_value(mt_rand(1,28));
			$this->container->get('browser')->wait();
			$this->container->get('input')->get_by_attribute('id', 'i9', false)->set_value("1985");
			$this->container->get('browser')->wait();
			$this->container->get('element')->get_by_attribute('data-value', mt_rand(1,12), false)->click();
			$this->container->get('browser')->wait();
		}
	}
	
	public function notNow() {
		$this->container->get('browser')->wait();
		$this->container->get('button')->get_by_xpath("/html/body/div/c-wiz/div/div/div/div[2]/div[4]/div[1]/button")->click();
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
	}
	
	public function isLoggedIn($email) {
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		$this->denied();
		$this->skipRecovery();
		$this->skipFeatures();
		$this->notNow();
		
		$this->container->get('browser')->wait();
		$url = $this->container->get('webpage')->get_url();
		$this->container->get('browser')->wait();
		if (preg_match("#disabled#i", $url))
			return false;
		
		if(preg_match("#myaccount#i", $url) || preg_match("#mail\.google\.com#i", $url)) {
			printf("Becasue of mail google in url\n");
			echo $url . "\n";
			return true;
		} else {
			if (!$this->container->get('browser')->check_connection($url,30)) {
				$this->container->get('browser')->wait();
				
				//printf("Connection issue!\n");
				$this->container->get(LoggerInterface::class)->error("Connection issue!");
				return false;
			}
		}
	}
	
	public function isEmailFormVisibled() {
		$result = $this->container->get('input')->get_by_attribute('type', 'email', false)->is_visibled();
		$this->container->get('browser')->wait();

		return $result;
	}
	
	public function inputEmail($email) {
		$this->container->get('input')->get_by_attribute('type', 'email', false)->set_value($email);
		//$this->container->get('input')->get_by_attribute('type', 'email', false)->set_value($email);
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
		$this->container->get('input')->get_by_attribute('type', 'password', false)->set_value($password);
			//$this->container->get('input')->get_by_name('password')->set_value($password);
		$this->container->get('browser')->wait();
	}
	
	public function submitEmailForm() {
		if ($this->container->get('div')->get_by_id('identifierNext', false)->is_visibled())
			$this->container->get('div')->get_by_id('identifierNext', false)->click();
		elseif ($this->container->get('button')->get_by_id('identifierNext', false)->is_visibled())
			$this->container->get('button')->get_by_id('identifierNext', false)->click();
		elseif 	($this->container->get('btn')->get_by_name('signIn')->is_visibled())
			$this->container->get('btn')->get_by_name('signIn')->click();
			
		$this->container->get('browser')->wait();
		sleep(1);
	}
	
	public function submitPasswordForm() {
		if ($this->container->get('btn')->get_by_id('submit')->is_visibled()) 
			$this->container->get('btn')->get_by_id('submit')->click();
		elseif($this->container->get('div')->get_by_id('passwordNext', false)->is_visibled())
			$this->container->get('div')->get_by_id('passwordNext', false)->click();
		elseif($this->container->get('button')->get_by_id('passwordNext', false)->is_visibled())
			$this->container->get('button')->get_by_id('passwordNext', false)->click();
		
		$this->container->get('browser')->wait();
		
		sleep(2);
	}
	
	public function isReserveEmailRequired() {
		$this->container->get('browser')->wait();
		
		if(preg_match("#challenge\/selection#", $this->container->get('webpage')->get_url()))
			return true;
	}
	
	public function inputReserveEmail($reserveEmail) {
		$this->container->get('input')->get_by_id('knowledge-preregistered-email-response', false)->set_value($reserveEmail);
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
		} elseif ($this->container->get('input')->get_by_id("idvreenablePhoneNumberId", false)->is_exist()) {
			return true;
		}
		
		return false;
	}
	
	public function inputPhoneRequired($phone) {
		if ($this->container->get('input')->get_by_name('deviceAddress')->is_visibled()) {
			//$this->container->get('listbox')->multi_select_indexes_by_number(0,"166");
			$this->container->get('listbox')->multi_select_texts_by_number(0,"Russia (Россия)");
			$this->container->get('browser')->wait();
			$this->container->get('input')->get_by_name('deviceAddress')->set_value("");
			$this->container->get('input')->get_by_name('deviceAddress')->set_value($phone);
			$this->container->get('browser')->wait();
		} else {
			$this->container->get('browser')->wait();
			$this->container->get('input')->get_by_id('phoneNumberId')->set_value("");
			$this->container->get('browser')->wait();
			$this->container->get('input')->get_by_id('idvreenablePhoneNumberId')->set_value("");
			$this->container->get('browser')->wait();
			$this->container->get('input')->get_by_id('phoneNumberId')->set_value($phone);
			$this->container->get('browser')->wait();
			$this->container->get('input')->get_by_id('idvreenablePhoneNumberId')->set_value($phone);
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
		sleep(1);
		
		if ($this->container->get('span')->get_by_inner_text("Get code", false)->is_visibled() || $this->container->get('span')->get_by_inner_text("Получить код", false)->is_visibled()) {
			$this->container->get('browser')->wait();
			$this->container->get('span')->get_by_inner_text("Get code", false)->click() || $this->container->get('span')->get_by_inner_text("Получить код", false)->click();;
			$this->container->get('browser')->wait();
			sleep(1);
		}
	}
	
	public function inputSms($sms) {
		$this->container->get('browser')->wait();
		if ($this->container->get('input')->get_by_id('code')->is_visibled()) {
			$this->container->get('browser')->wait();
			$this->container->get('input')->get_by_id('code')->set_value($sms);
			$this->container->get('browser')->wait();
		} elseif ($this->container->get('input')->get_by_id('idvAnyPhonePin')->is_visibled()) {
			$this->container->get('browser')->wait();
			$this->container->get('input')->get_by_id('idvAnyPhonePin')->set_value($sms);
			$this->container->get('browser')->wait();
		} else {
			$this->container->get('input')->get_by_id('smsUserPin')->set_value($sms);
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
		
	public function solveGoogleCaptchaRecaptcha($proxy = array()) {		
		$url = $this->container->get('webpage')->get_url();
		$key = '';
		
		//6LdD2OMZAAAAAAv2xVpeCk8yMtBtY3EhDWldrBbh
		/* Most cases, but not working with Google *
		preg_match("#sitekey\": \"(.*?)\"#i", $this->container->get('webpage')->get_body(), $match);
		$siteKey = $match[1];
		*/
		
		/* Works only with Google */
		$src = $this->container->get('frame')->get_by_src("https://www.google.com/recaptcha", false)->get_attribute('src');
		//https://www.google.com/recaptcha/api2/anchor?ar=1&k=6LdD2OMZAAAAAAv2xVpeCk8yMtBtY3EhDWldrBbh&co=aHR0cHM6Ly9hY2NvdW50cy5n

		preg_match("#https.*?\&k\=(.*?)\&#i", $src, $match);

		if (isset($match[1]))
			$siteKey = $match[1];
		else $siteKey = '6LdD2OMZAAAAAAv2xVpeCk8yMtBtY3EhDWldrBbh';
		
		if (isset($proxy['login']))
			$proxy['login']='Selyansolo2021';
		if (isset($proxy['password']))
			$proxy['password']='E3k2LiP';
		if (isset($proxy['ip']))
			$proxy['ip']='109.172.6.95';
		if (isset($proxy['port']))
		$proxy['port']=50100;
		
		$request = 'http://2captcha.com/in.php?key=' . $key . '&method=userrecaptcha&googlekey=' . $siteKey . '&pageurl=' . $url;// . "&proxy=" . $proxy['login'] . ':' . $proxy['password'] . "@" . $proxy['ip'] . ':' . $proxy['port'];
		
		$tryI = 0;
		
		do {
			$response = $this->container->get('webpage')->load_web_page($request);
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			preg_match("#(.*?)\|(.*?)$#i", $response, $match);
			echo $response . "\n";
			
			if ($tryI > 7) break;
			sleep(2);
			$tryI += 1;
		} while(!isset($match[1]));
		
		if ($match[1] == 'OK' ) {
			$id = $match[2];
			
			$resultUrl = 'http://2captcha.com/res.php?key=' . $key . '&action=get&id=' . $id;
			
			do {
				$ready = $this->container->get('webpage')->load_web_page($resultUrl);

				printf("Waiting 5 seconds...");
				sleep(5);
			} while ($ready == 'CAPCHA_NOT_READY');
			
			preg_match("#OK\|(.*?)$#", $ready, $match2);
			if (isset($match2[1])) {
				$captcha = $match2[1];
			} 
		} 
		
		if (isset($captcha)) {
			$this->container->get('textarea')->set_value_by_attribute("id", "g-recaptcha-response", true, $captcha);
			$this->container->get('browser')->wait();
			
			$this->container->get('textarea')->set_value_by_attribute("id", "g-recaptcha-response-1", true, $captcha);
			$this->container->get('browser')->wait();
			$this->container->get('textarea')->set_value_by_attribute("id", "g-recaptcha-response-2", true, $captcha);
			$this->container->get('browser')->wait();
			$this->container->get('browser')->run_java_script("let submitToken = (token) => {document.querySelector('#g-recaptcha-response').value = token;___grecaptcha_cfg.clients['0']['Y']['Y']['callback'] (token);};submitToken('" . $captcha . "');");
			printf("Recaptcha solved!\n");
			
			return true;
		}
		
		printf("Recaptcha not solved!\n");
		return false;
	}
	
	public function isReCaptchaExist() {
		if (preg_match("#recaptcha#", $this->container->get('webpage')->get_url())) {
			printf("Recaptcha found!\n");
			return true;
		}
		printf("Recaptcha not found.\n");
		return false;
	}
	
	
}