<?php
namespace Xhe;
class XheSoap extends XheBaseObject
{
	/////////////////////////// СЕРВИСНЫЕ ФУНКЦИИ /////////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Soap";
	}
	////////////////////////////////////////////////////////////////////////////////////////////
  	
	// задать версию
	function set_version($version=11)
	{
	   	$params = array( "version" => $version );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	// задать версию
	function set_action($action="")
	{
	   	$params = array( "action" => $action );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	// задать версию
	function set_headers($headers="")
	{
		$jheaders="";
		if ($headers!=null)
			$jheaders=json_encode($headers);
	   	$params = array( "headers" => $jheaders );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	////////////////////////////////////////////////////////////////////////////////////////////

	// вызвать метод без параметров по имени
	function call_simple_method($url,$namespace,$method)
	{
	   	$params = array( "url" => $url , "namespace" => $namespace , "method" => $method );
	    	return $this->call_get(__FUNCTION__,$params);
	}
	// вызвать с использованием bodies
	function call_by_bodies($url,$bodies)
	{
		$jbodies="";
		if ($bodies!=null)
			$jbodies=json_encode($bodies);
	   	$params = array( "url" => $url , "bodies" => $jbodies );
	    	return $this->call_get(__FUNCTION__,$params);
	}
	// вызвать метод используя xml
	function call_from_xml($url,$xml,$action = "")
	{
	   	$params = array( "url" => $url , "xml" => $xml , "action" => $action );
	    	return $this->call_get(__FUNCTION__,$params);
	}

	////////////////////////////////////////////////////////////////////////////////////////////
};	
?>