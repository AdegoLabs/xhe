<?php

namespace Xhe;

class XheFileOs extends XheFileOsCompatible
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "File";
	}
	
	
		function copy($path,$new_path,$fail_if_exist=false)
	{			  
		$params = array( "path" => $path , "new_path" => $new_path , "fail_if_exist" => $fail_if_exist);
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function move($path,$new_path,$fail_if_exist=false)
	{			  
		$params = array( "path" => $path , "new_path" => $new_path , "fail_if_exist" => $fail_if_exist);
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function rename($path,$new_path)
	{			  
		$params = array( "path" => $path , "new_path" => $new_path );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function delete($path)
	{			  
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	
		function wait_for_exist($path,$wait_count=60,$wait_step=1,$is_verbose=true)
	{
		$params = array( "path" => $path , "wait_count" => $wait_count, "wait_step" => $wait_step, "is_verbose" => $is_verbose );
		return $this->call_boolean(__FUNCTION__,$params,$wait_count*$wait_step*2);
	}	
		function is_exist($path)
	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
	}
        	function get_name($path)
	{			  
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
	}
        	function get_title($path)
	{			  
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
	}
        	function get_ext($path)
	{			  
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
	}
        	function get_folder($path)
	{			  
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
	}
        	function get_disk($path)
	{			  
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_size($path)
	{			  
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_random_file_content($folder,$ext,$include_subfolders,$timeout=-1)
	{			  
		$params = array( "folder" => $folder , "extension" => $ext , "include_subfolders" => $include_subfolders );
		return $this->call_get(__FUNCTION__,$params,$timeout);
	}
	
	
        	function get_creation_date($path,$time=false)
	{			  
		$params = array( "path" => $path , "time" => $time );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_modification_date($path,$time=false)
	{			  
		$params = array( "path" => $path , "time" => $time );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_lastacess_date($path,$time=false)
	{			  
		$params = array( "path" => $path , "time" => $time );
		return $this->call_get(__FUNCTION__,$params);
	}

		
		function is_normal($path)
	{			  
		$params = array( "path" => $path);
		return $this->call_boolean(__FUNCTION__,$params);
	}
	        function is_readonly($path)
	{			  
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function is_hidden($path)
	{			  
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function is_system($path)
	{			  
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function is_archive($path)
	{			  
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	
		function set_normal($path,$on=true)
	{			  
		$params = array( "path" => $path , "on" => $on, "attribute" => "NORMAL" );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	        function set_readonly($path,$on=true)
	{			  
		$params = array( "path" => $path , "on" => $on, "attribute" => "READONLY" );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_hidden($path,$on=true)
	{			  
		$params = array( "path" => $path , "on" => $on, "attribute" => "HIDDEN" );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_system($path,$on=true)
	{			  
		$params = array( "path" => $path , "on" => $on, "attribute" => "SYSTEM" );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_archive($path,$on=true)
	{			  
		$params = array( "path" => $path , "on" => $on, "attribute" => "ARCHIVE" );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	
	};	
?>