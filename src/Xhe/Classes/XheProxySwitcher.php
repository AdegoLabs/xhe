<?php
namespace Xhe;

class XheProxySwitcher extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "ProxySwitcher";
	}
	  	
	
	   	function init($folder)
	{
		$params = array( "folder" => $folder);
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	   	function clear()
	{
		$params = array( );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	   	function add_proxies($proxies)
	{
		$params = array( "proxies" => $proxies);
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	   	function add_proxies_from_file($path)
	{
		$params = array( "path" => $path);
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	   	function add_proxies_from_url($url)
	{
		$params = array( "url" => $url);
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	   	function set_random_rotate_mode($mode)
	{
		$params = array( "mode" => $mode);
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	
	   	function update()
	{
		$params = array( );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_update_path($path)
	{
	   	$params = array( "path" => $path);
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_update_url($url)
	{
	   	$params = array( "url" => $url);
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_update_period($minutes)
	{
	   	$params = array( "minutes" => $minutes);
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_update_proxy_count($count)
	{
	   	$params = array( "count" => $count);
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	
	        function get_next_proxy($delete=false)
	{
		$params = array( "delete" => $delete);
	    	return $this->call_get(__FUNCTION__,$params);
	}
	        function get_all_proxies()
	{
		$params = array(  );
	    	return $this->call_get(__FUNCTION__,$params);
	}
	        function get_proxy_count()
	{
		$params = array(  );
	    	return $this->call_get(__FUNCTION__,$params);
	}

	};
?>