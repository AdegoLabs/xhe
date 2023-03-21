<?php

namespace Xhe;

class XheWindowsShell extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "WindowsShell";
	}
	
	
		function get_screen_width()
	{
		$params = array(  );
		return $this->call_get(__FUNCTION__,$params);
	}
   		function get_screen_height()
	{
		$params = array(  );
		return $this->call_get(__FUNCTION__,$params);
	}
   		function set_screen_resolution($width,$height)
	{
		$params = array( "width" => $width , "height" => $height );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function screenshot($path,$x=-1,$y=-1,$width=-1,$height=-1,$as_gray=false,$screen=0)
	{
	   	$params = array( "path" => $path, "x" => $x , "y" => $y , "width" => $width , "height" => $height , "as_gray" => $as_gray, "screen" => $screen);
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	
		function get_windows_title()
	{
		$params = array(  );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_windows_version()
	{
		$params = array(  );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_windows_build()
	{
		$params = array(  );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_windows_platform_id()
	{
		$params = array(  );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_windows_sp_info()
	{
		$params = array(  );
		return $this->call_get(__FUNCTION__,$params);
	}

		
		function get_computer_name()
	{
		$params = array(  );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_user_name()
	{
		$params = array(  );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_cpu_name()
	{
		$params = array(  );
		return $this->call_get(__FUNCTION__,$params);
	}

	
		function get_system_date()
	{
		$params = array(  );
		return $this->call_get(__FUNCTION__,$params);
	}
		function set_system_date($year,$month,$day)
	{
		$params = array( "year" => $year , "month" => $month , "day" => $day);
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function get_system_time()
	{
		$params = array(  );
		return $this->call_get(__FUNCTION__,$params);
	}
		function set_system_time($hour,$minute,$second)
	{
		$params = array( "hour" => $hour , "minute" => $minute , "second" => $second);
		return $this->call_boolean(__FUNCTION__,$params);
	}	

		function set_system_time_synchro_period($seconds)
	{
		$params = array( "seconds" => $seconds);
		return $this->call_boolean(__FUNCTION__,$params);
	}	

	
		function get_disk_free_space($disk)
	{
		$params = array( "disk" => $disk );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_special_folder($folder)
	{
		$params = array( "folder" => $folder );
		return $this->call_get(__FUNCTION__,$params);
	}

	
		function start_video_record($path,$fps=10,$quality=70,$x=-1,$y=-1,$width=-1,$height=-1,$as_gray=false)
	{
		$params = array( "path" => $path, "fps" => $fps, "quality" => $quality, "x" => $x, "y" => $y, "width" => $width, "height" => $height , "as_gray" => $as_gray);
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function stop_video_record()
	{
		$params = array(  );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	
};	
?>