<?php
namespace Xhe;


define ("VK_UP", "38");
define ("VK_DOWN", "40");
define ("VK_LEFT", "37");
define ("VK_RIGHT", "39");

define ("VK_HOME", "36");
define ("VK_END", "35");
define ("VK_PAGEUP", "33");
define ("VK_PAGEDOWN", "34");

define ("VK_TAB", "9");
define ("VK_ENTER", "13");
define ("VK_SPACE", "32");
define ("VK_ESC", "27");

class XheKeyboard extends XheKeyboardCompatible
{

			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Keyboard";
	}
	
	
	   	function input($string,$timeout="20:40",$inFlash=false,$auto_change=true)
   	{
		$PHP_Use_Trought_Shell = false; //careful;

		$params = array( "string" => $string , "timeout" => $timeout , "inFlash" => $inFlash, "auto_change" => $auto_change, "auto_change" => $auto_change);
		$res=$this->call_boolean(__FUNCTION__,$params);

		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

		sleep(1);
		return $res;
   	}
	   	function key($code,$is_key=true,$ctrl=false,$alt=false,$shift=false)
   	{
		$params = array( "code" => $code , "is_key" => $is_key, "ctrl" => $ctrl, "alt" => $alt, "shift" => $shift );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	   	function key_down($key,$is_key=true)
   	{
		$params = array( "key" => $key , "is_key" => $is_key );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
	   	function key_up($key,$is_key=true)
   	{
		$params = array( "key" => $key , "is_key" => $is_key );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

	
	   	function send_input($string,$timeout="0:2",$inFlash=false,$auto_change=true)
   	{
		$PHP_Use_Trought_Shell = false; //careful;

		$params = array( "string" => $string , "timeout" => $timeout , "inFlash" => $inFlash , "auto_change" => $auto_change );
		$res=$this->call_boolean(__FUNCTION__,$params);
		
		//if ($PHP_Use_Trought_Shell)
		//	fgets(STDIN);

		sleep(1);
		return $res;
   	}
	   	function send_key($key,$is_key=false,$ctrl=false,$alt=false,$shift=false)
   	{
		$params = array( "key" => $key , "is_key" => $is_key, "ctrl" => $ctrl, "alt" => $alt, "shift" => $shift);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
	   	function send_key_down($key,$is_key=false)
   	{
		$params = array( "key" => $key , "is_key" => $is_key);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
	   	function send_key_up($key,$is_key=false)
   	{
		$params = array( "key" => $key , "is_key" => $is_key);
		return $this->call_boolean(__FUNCTION__,$params);
   	}

	
	   	function set_ctrl_prefix($on)
   	{
		$params = array( "on" => $on );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
		function set_alt_prefix($on)
   	{
		$params = array( "on" => $on );
		return $this->call_boolean(__FUNCTION__,$params);
   	}	
	   	function set_shift_prefix($on)
   	{
		$params = array( "on" => $on );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

	   	
		function press_caps_lock() 
   	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
   	}  
   		function press_num_lock()
   	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
   		function press_scroll_lock()
   	{ 
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

		function is_caps_lock_pressed() 
   	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
   	}  
   		function is_num_lock_pressed()
   	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
   		function is_scroll_lock_pressed()
   	{ 
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

	
	   	function get_current_language()
   	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
   	}
	   	function set_current_language($language)
   	{
		$params = array( "language" => $language );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

	};
?>