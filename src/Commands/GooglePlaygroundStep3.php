<?php

namespace App\Command;

class GooglePlaygroundStep3 extends Command {
	public $authCode;
	public $refreshToken;
	public $accessToken;
	
	public function credentials() {
		$container = $this->container;
		
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		$this->setAuthCode($container->call(function() use (&$container) {
			preg_match("#code=(.*?)\&#", $container->get('webpage')->get_url(), $match);

			if (is_array($match) && isset($match[1]))
				return $match[1];
			return false;
		}));
		
		
		$this->container->get('browser')->navigate('about:blank');
		
		$this->container->get('browser')->navigate('https://developers.google.com/oauthplayground?code=' . $this->getAuthCode() . '&scope=https://www.googleapis.com/auth/calendar.events&https://www.googleapis.com/auth/calendar');
		$this->container->get('browser')->wait();
		
		$this->container->call('App\Command\ExchangeTokens'); 
		
		$this->setRefreshToken($container->call('App\Command\GetRefreshToken'));
		$this->setAccessToken($container->call('App\Command\GetAccessToken'));
		
		return $this->getResponse();
	}
	
	public function setAuthCode($authCode) {
		$this->authCode = $authCode;
	}
	
	public function getAuthCode() {
		return $this->authCode;
	}
	
	public function getRefreshToken() {
		return $this->refreshToken;
	}
	
	public function getAccessToken() {
		return $this->accessToken;
	}
	
	public function setRefreshToken($refreshToken) {
		$this->refreshToken = $refreshToken;
	}
	
	public function setAccessToken($accessToken) {
		$this->accessToken = $accessToken;
	}
	
	public function __invoke($uri, $method, $body = false, $file = false) {
		$url = 'https://developers.google.com/oauthplayground/#step3&auth_code=' . $this->getAuthCode() . '&refresh_token=' . $this->getRefreshToken() . '&access_token_field=' . $this->getAccessToken() . '&url=' . urlencode($uri) . '&content_type=application%2Fjson&http_method=' . $method . '&useDefaultOauthCred=unchecked&oauthEndpointSelect=Google&oauthAuthEndpointValue=https%3A%2F%2Faccounts.google.com%2Fo%2Foauth2%2Fv2%2Fauth&oauthTokenEndpointValue=https%3A%2F%2Foauth2.googleapis.com%2Ftoken&expires_in=3598&for_access_token=' . $this->getAccessToken() . '&includeCredentials=checked&accessTokenType=bearer&autoRefreshToken=checked&accessType=offline&prompt=consent&response_type=code&wrapLines=on';
		
		$this->container->get('browser')->navigate('https://localhost/dashboard');
		$this->container->get('browser')->navigate($url);
		$this->container->get('browser')->wait();
		
		$this->container->get('anchor')->get_by_id('requestBodyButton')->click();
		$this->container->get('browser')->wait();
		
		if ($file) {
			$this->container->get('window')->execute_open_file("File Upload", trim($file), "&Открыть", false, true);
			$this->container->get('inputfile')->get_by_number(0)->send_mouse_click();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
		} elseif ($body) {
			$this->container->get('textarea')->get_by_id('postData')->set_value($body);
			$this->container->get('browser')->wait();
		}
		
		$this->container->get('button')->get_by_id('sendRequestButton')->click();
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();

		if (!$response = $this->getResponse())
			return $this->__invoke($uri, $method, $body, $file);
		
		return $response;
	}
	
	public function getResponse() {
		$this->wait();
		
		if ($responseHeader = $this->container->get('element')->get_by_id('response', true)->get_child_by_number(0)->get_inner_text()) {
			$this->container->get('browser')->wait();
			
			if (preg_match("#HTTP\/1\.1 (.*?) #", $responseHeader, $match)) {
				$this->container->get('browser')->wait();
				
				$responseCode = (int) $match[1];
				unset($match);
			} else {$responseCode = 0;}
		}
		
		if (!isset($responseCode))
			return false;
		
		if ($responseCode == 0) {
			$html = $this->container->get('webpage')->get_body();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			
			if (preg_match("#HTTP\/1\.1 (.*?) #", $html, $match)) {
				$this->container->get('browser')->wait();
				$this->container->get('browser')->wait_js();
				
				$responseCode = (int) $match[1];
			} else {$responseCode = false;}
			
		}
		
		return $responseCode;
	}
	
	public function wait() {
		$this->container->get('browser')->wait();
		
		for($i = 0; $i < 30, $this->container->get('div')->get_by_id("waitingWheel", false)->is_visibled(); $i++) {
			$this->container->get('browser')->wait();
			sleep(1);
		}
	}
}