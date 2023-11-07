<?php

namespace App\Method;
use Psr\Log\LoggerInterface;

class GooglePlaygroundLogin extends GoogleLogin {
	public $url = 'https://accounts.google.com/o/oauth2/v2/auth/oauthchooseaccount?redirect_uri=https%3A%2F%2Fdevelopers.google.com%2Foauthplayground&prompt=consent&response_type=code&client_id=407408718192.apps.googleusercontent.com&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fcalendar%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fcalendar.events&access_type=offline&flowName=GeneralOAuthFlow';
	
	public function method($data) {
		extract($data);
		
		if (!isset($url))
			$url = $this->url;
		
		$this->navigate($url);
		
		if ($this->isChooseAccountRequired($email)) {
			$this->chooseAccount($email);
			
			if ($this->isAllowConsentRequired()) {
				$this->allowConsent();
				$this->submitAllowConsentForm();
			}
			
			if ($this->isLoggedIn($email)) {
				$this->container->get(LoggerInterface::class)->info("Logged in successfully as " . $email);
				return true;
			}
		}

		if ($this->isEmailFormVisibled()) {
			$this->inputEmail($email);
				
			if (!$this->isEnteredEmailIsFull()) {
				$fullEmulation = false;
				
				beep();
				$this->container->get(LoggerInterface::class)->error("Found SEND_INPUT bug!");
				printf("Found SEND_INPUT bug!\n");
				//die("Script work was stopped due to service errors...");
				
				$this->container->get('input')->get_by_attribute('type', 'email', false)->set_value("");
				$this->container->get('browser')->wait();
				$this->container->get('input')->get_by_attribute('type', 'email', false)->focus();
				$this->container->get('browser')->wait();
				$this->container->get('input')->get_by_attribute('type', 'email', false)->click();
				$this->container->get('browser')->wait();
				$this->container->get('browser')->wait_js();
				$this->container->get('input')->get_by_attribute('type', 'email', false)->set_value($email);
				$this->container->get('browser')->wait();
				if (!$this->isEnteredEmailIsFull()) {beep();die("FOUND SEND_INPUT BUG!");}
				
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
			echo $this->container->get('btn')->click_by_number(0) || $this->container->get('btn')->get_by_attribute("class","submitButton", false)->click();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			sleep(2);
		}
		sleep(3);
		
		if ($this->container->get('frame')->get_by_src("https://www.google.com/recaptcha", false)->is_visibled()) {
			$this->container->get('browser')->wait();
			$this->container->get('button')->get_by_number(0)->click();
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
			$this->container->get(LoggerInterface::class)->error("Sms verification required!");
			
			return false;
		}
		
		$this->phoneVerificationCheck();
		$this->phoneVerificationCheck();
		
		if ($this->isBanned()) {
			$this->container->get(LoggerInterface::class)->error("Account " . $email . " banned!");
			return false;
		}
		
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		sleep(3);
		
		if ($this->isAllowConsentRequired()) {
			$this->allowConsent();
			$this->submitAllowConsentForm();
		}
		
		if ($this->isLoggedIn($email)) {
			$this->container->get(LoggerInterface::class)->info("Logged in successfully as " . $email . "!");
			return true;
		} else {
			$this->container->get(LoggerInterface::class)->error("Error during login as " . $email . "!");
			return false;
		}
	}
	
	
	public function isAllowConsentRequired() {
		$this->container->get('browser')->wait();
		sleep(2);
		if (preg_match("#consentsummary#", $this->container->get('webpage')->get_url()))  {
			printf("Allow consent required! nice..\n");
			return true;
		} elseif(preg_match("#consent#", $this->container->get('webpage')->get_url())) {
			printf("Allow consent required! nice..\n");
			return true;
		} else {
			printf("Can not see consent! bad...\n");
		}
		return false;
	}
	
	public function submitAllowConsentForm() {
		$this->container->get('div')->get_by_id('submit_approve_access', false)->click();
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		sleep(2);
	}
	
	public function allowConsent() {
		$this->container->get('browser')->wait();
		$vars = $this->container->get('checkbox')->get_all()->elements;
			
		foreach($vars as $var) {
			if (!$var->is_checked()) {
				$this->container->get('browser')->wait();
				$var->click();
				$this->container->get('browser')->wait();
			}
		}
		$this->container->get('button')->get_by_id("submit_approve_access", false)->click();
		$this->container->get('browser')->wait();
		sleep(2);
	}
	
	public function isLoggedIn($email) {
		$this->denied();
		$this->skipRecovery();
		$this->skipFeatures();
		
		$this->container->get('browser')->wait();
		$url = $this->container->get('webpage')->get_url();
		$this->container->get('browser')->wait();
		
		if(preg_match("#code=#", $url)) {
			return true;
		} elseif($this->isBanned()) {
			$this->container->get(LoggerInterface::class)->error("Account " . $email . " banned!");
			
			return false;
		} else {
			if (!$this->container->get('browser')->check_connection($url,30)) {
				$this->container->get('browser')->wait();
				$this->container->get(LoggerInterface::class)->notice("Connection issue!");
			}
		}
	}
}