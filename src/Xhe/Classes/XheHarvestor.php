<?php
namespace Xhe;

class XheHarvestor extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Harvestor";
	}
	  	
	
	   	function init($in_file,$proxy_file="",$proceed_js=true)
	{
		$params = array( "in_file" => $in_file , "proxy_file" => $proxy_file ,  "proceed_js" => $proceed_js );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
		function make_screenshots($enable=true)
	{
		$params = array( "enable" => $enable );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_browser_size($width,$height)
	{
		$params = array( "height" => $height , "width" => $width );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	
	        function start($is_wait=true)
	{
	   	$params = array(  );
	    	$res = $this->call_boolean(__FUNCTION__,$params);

				while($is_wait && !$this->is_finished())
			sleep(1);
		return $res;
	}
		function stop()
	{
	   	$params = array( );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	        function is_finished()
	{
		$params = array(  );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	
	        function get_html($position)
	{
		$params = array( "position" => $position );
	    	return $this->call_get(__FUNCTION__,$params);
	}
		function get_screenshot_path($position)
	{
		$params = array( "position" => $position );
	    	return $this->call_get(__FUNCTION__,$params);
	}
	        function get_completed_count()
	{
		$params = array(  );
	    	return $this->call_get(__FUNCTION__,$params);
	}

	};
?>