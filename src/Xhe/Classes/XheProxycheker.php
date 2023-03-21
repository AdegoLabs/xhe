<?php
namespace Xhe;

class XheProxyCheker extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "ProxyCheker";
	}
	  	
	
	   	function run($is_wait=false)
	{
	   	$params = array(  );
	    	$res = $this->call_boolean(__FUNCTION__,$params);

				while($is_wait && $this->is_running())
			sleep(1);

		return $res;
	}
	        function stop()
	{
	   	$params = array(  );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

		function is_running()
	{
	   	$params = array( );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	        function set_speed_testing($speed)
	{
		$params = array( "speed" => $speed );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	        function set_quality_testing($quality)
	{
		$params = array( "quality" => $quality );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	
	        function add_proxy($str_proxy)
	{
		$params = array( "str_proxy" => $str_proxy );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	        function add_proxy_from_file($path)
	{
		$params = array( "path" => $path );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	        function add_proxy_from_url($url)
	{
		$params = array( "url" => $url );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	        function delete_proxy($param_proxy="all")
	{
		$params = array( "param_proxy" => $param_proxy );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	        function save_proxy($path,$param_proxy="all")
	{
		$params = array( "path" => $path , "param_proxy" => $param_proxy );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	        
	        function dedupe_proxy()
	{
		$params = array( );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	
	        function get_count_proxy($param_proxy="all")
	{
		$params = array( "param_proxy" => $param_proxy );
	    	return $this->call_get(__FUNCTION__,$params);
	}
	        function get_proxy($n,$param_proxy="all")
	{
		$params = array( "n" => $n , "param_proxy" => $param_proxy );
	    	return $this->call_get(__FUNCTION__,$params);
	}
	        function get_fastest_proxy($param_proxy="all")
	{
		$params = array( "param_proxy" => $param_proxy );
	    	return $this->call_get(__FUNCTION__,$params);
	}

	};
?>