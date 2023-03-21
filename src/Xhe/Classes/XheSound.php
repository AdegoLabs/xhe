<?php
namespace Xhe;

class XheSound extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Sound";
	}
	
	
        	function beep()
	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	
		function play_sound($path)
	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	
		function convert_file($src_path,$new_path,$Hz="",$timeout=60)
	{
		$params = array( "src_path" => $src_path , "new_path" => $new_path , "Hz" => $Hz , "timeout" => $timeout );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
	}

	
		function recognize_file_with_digits($path,$timeout=60)
	{
		$params = array( "path" => $path , "timeout" => $timeout );
		return $this->call_get(__FUNCTION__,$params);
	}
		function recognize_file($path,$dict,$jsgf,$hmm,$add_params="",$timeout=60)
	{
		$params = array( "path" => $path ,"dict" => $dict ,"jsgf" => $jsgf ,"hmm" => $hmm , "add_params" => $add_params , "timeout" => $timeout );
		return $this->call_get(__FUNCTION__,$params);
	}

	};	
?>