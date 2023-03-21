<?php
namespace App\Method;

abstract class LoginMethod extends Method {
	function __invoke($controller) {
		$controller->working(1);
		
		if (!$controller->hasCookies()) {
			$cookie = \App\Model\CookieBuilder::buildWithUrl($this->url);
			
			$model = $controller->get();
			$model->cookie = $cookie;
			
			$controller->set($model);
			$controller->update(['cookieId' => $cookie->id]);
			
			unset($model);
		} 

		$cookieController = new \App\Controller\CookieController($controller->get()->cookie);		
		$this->container->get('App\Command\BrowserSettings')->initCookie(
			$cookieController->getUrl(),
			$cookieController->getValue()
		);
		
		if (!$controller->hasProxy()) {
			$proxy = \App\Model\ProxyBuilder::findUnused();
			if (!is_null($proxy)) {

				$model = $controller->get();
				$model->proxy = $proxy;
				
				$controller->set($model);
				$controller->update(['proxyId' => $proxy->id]);
				
				$proxy->used += 1;
				$proxy->save();
				
				unset($model);
			}
		}
		
		if (!is_null($controller->get()->proxy)) {
			$proxyController = new \App\Controller\ProxyController($controller->get()->proxy);
			$this->container->get('App\Command\BrowserSettings')->initProxy(
				$proxyController->getIp(), 
				$proxyController->getPort(),
				$proxyController->getLogin(),
				$proxyController->getPassword(),
			);
		}
		
		if (!$controller->hasProfile()) {
			$profile = \App\Model\ProfileBuilder::buildWithData();
			
			$model = $controller->get();
			$model->profile = $profile;
			
			$controller->set($model);
			$controller->update(['profileId' => $profile->id]);
			
			unset($model);
		} 
		
		$profileController = new \App\Controller\ProfileController($controller->get()->profile);
		$this->container->get('App\Command\BrowserSettings')->initProfile([
			'useragent' => $profileController->getUseragent(), 
			'language' => $profileController->getLanguage(),
			'timezone' => $profileController->getTimezone(),
			'canvas' => $profileController->getCanvas(),
			'resolution' => $profileController->getResolution(),
			'hardware' => $profileController->getHardware(),
			'audio' => $profileController->getAudio(),
			'bound' => $profileController->getBound()
		]);
		
		if (!$authorized = $this->method($controller->getData())) {
			//$controller->deactivate();
		} else {
			$controller->onLogin();
			//$cookieController->setUrl($this->container->get('webpage')->get_url());
			$value = $this->container->call('App\Command\GetCookie');
			
			$cookieController->setValue($value);
		}
		
		$controller->used();
		$controller->onUpdate();
		$controller->working(0);
		
		return $authorized;
	}
}