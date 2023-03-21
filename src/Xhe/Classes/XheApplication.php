<?php
namespace Xhe;

class XheApplication extends XheApplicationCompatible
{
			var $enable_exit=true;
	var $finished=false;
	
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->enable_exit=true;
		$this->prefix = "Application";
	}
	
   	   	function dlg_question($message)
   	{
		$params = array( "message" => $message );
	     	$ret=$this->call_get(__FUNCTION__,$params,99999);

		$PHP_Use_Trought_Shell = true;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

         	return $ret;
   	}
   	   	function get_dlg_input_string($dlg_name,$dlg_text,$default_answer="")
   	{
		$params = array( "dlg_name" => $dlg_name , "dlg_text" => $dlg_text , "default_answer" => $default_answer );
	     	$ret=$this->call_get(__FUNCTION__,$params,99999);

		$PHP_Use_Trought_Shell = true;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

         	return $ret;
   	}
   	   	function get_dlg_select_file($path,$action)
   	{
		$params = array( "path" => $path , "action" => $action );
	     	$ret=$this->call_get(__FUNCTION__,$params,99999);

		$PHP_Use_Trought_Shell = true;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

         	return $ret;
   	}
   	   	function get_dlg_select_folder($path,$caption,$action)
   	{
		$params = array( "path" => $path , "caption" => $caption , "action" => $action   );
	     	$ret=$this->call_get(__FUNCTION__,$params,99999);

		$PHP_Use_Trought_Shell = true;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

         	return $ret;
   	}
   		function show_free_dlg($xml,$is_ret_xml="true",$separator="\r\n")
	{
		$params = array( "xml" => $xml , "is_ret_xml" => $is_ret_xml , "separator" => $separator );
	     	$ret=$this->call_get(__FUNCTION__,$params,99999);

		$PHP_Use_Trought_Shell = true;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

		return $ret;
	}

	
   	   	function dlg_captcha_from_image_number($number,$frame=-1)
   	{
		$params = array( "number" => $number , "frame" => $frame );
		$res = $this->call_get(__FUNCTION__,$params,99999);

		$PHP_Use_Trought_Shell = true;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

        	return $res;
   	}
   	   	function dlg_captcha_from_url($url)
   	{
		$params = array( "url" => $url );
		$res = $this->call_get(__FUNCTION__,$params,99999);

		$PHP_Use_Trought_Shell = true;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

        	return $res;
   	}
   	   	function dlg_captcha_from_url_exactly($url,$exactly=true,$frame=-1)
   	{
		$params = array( "url" => $url , "exactly" => $exactly , "frame" => $frame );
		$res = $this->call_get(__FUNCTION__,$params,99999);

		$PHP_Use_Trought_Shell = true;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

        	return $res;
   	}

	
		function set_window_position($x,$y,$width,$height)
	{
		$params = array( "x" => $x , "y" => $y , "width" => $width , "height" => $height );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_title($title)
	{
		$params = array( "title" => $title );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_blink($blink)
	{
		$params = array( "blink" => $blink );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function show_left_pane($show)
	{
		$params = array( "show" => $show );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function show_bottom_pane($show)
	{
		$params = array( "show" => $show );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function enable_full_screen($enable)
	{
		$params = array( "enable" => $enable );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function minimize_to_tray()
	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function minimize_to_tray_by_start($minimize=true)
	{
		$params = array( "minimize" => $minimize );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function maximize()
	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function show_from_tray()
	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function show_tray_icon($show)
	{
		$params = array( "show" => $show );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_tray_icon($path)
	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_tray_tooltip($tooltip)
	{
		$params = array( "tooltip" => $tooltip );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_foreground_window()
	{       
		$params = array( );
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="true")
			return true;
		else
			return $res;
	}
		function set_always_on_top($ontop)
	{
		$params = array( "ontop" => $ontop );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function get_cursor_type($x=-1,$y=-1,$as_text=false)
	{
		$params = array( "x" => $x , "y" => $y , "as_text" => $as_text );
		return $this->call_get(__FUNCTION__,$params);
	}

	
	   	function pause($timeout=0)
   	{
		$res=false;
		if ($timeout==0)
		{
			$params = array( "timeout" => $timeout);
			$res = $this->call_boolean(__FUNCTION__,$params);

			$PHP_Use_Trought_Shell = true;
			while(true)
			{
				sleep(1);
				if (!$this->is_script_paused())
					break;
			}
		}
		else
		{
			$res=true;
			usleep($timeout*1000);
		}

		return $res;
   	}
	   	function exitapp()
   	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
	   	function stop_script()
   	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
	   	function restart($scriptpath="",$params="",$port="",$cache_folder="",$cookies_folder="",$pause_before_start_s=0)
   	{
		$params = array( "scriptpath" => $scriptpath , "params" => $params , "port" => $port , "cache_folder" => $cache_folder , "cookies_folder" => $cookies_folder , "pause_before_start_s" => $pause_before_start_s );
		$res=$this->call_boolean(__FUNCTION__,$params);

                if ($scriptpath!="")
                  die("");
	
		return $res;
   	}
		function clear()
	{
		$params = array( );
		$res = $this->call_get(__FUNCTION__,$params,6000);
		sleep(2);
						return $res;
	}
		function quit($message="")
	{
		sleep(1);
		if ($this->enable_exit)
		{
		  $params = array( );
		  $res=$this->call_boolean(__FUNCTION__,$params);

		  if ($message=="")
		  	echo $message;
		  $this->finished=true;
		  //usleep(1000000);
		  //die("app@exit");
		  return $res;
		}

		return false;
	}
		function enable_quit($enable_exit)
	{
		$this->enable_exit=$enable_exit;
		return true;
	}

	
		function get_port()
	{       
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_install_id()
	{       
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_version($extended=false)
	{       
		$params = array( "extended" => $extended );
		return $this->call_get(__FUNCTION__,$params);
	}

   	   	function get_program_path()
   	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
   	}
   	   	function get_program_folder()
   	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
   	}

	
	   	function get_file_from_disk($path)
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}
	
	   	function set_params_object_search($regsense=false)
   	{
		$params = array( "regsense" => $regsense );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	   	function set_params_outofmemory_action($restart_type=0)
   	{
		$params = array( "restart_type" => $restart_type );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	   	function set_dont_ask_me_again_mode($mode=1)
   	{
		$params = array( "mode" => $mode );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
   	   	function set_script_as_unicode($is_unicode = true)
   	{
		$params = array( "is_unicode" => $is_unicode );
		return $this->call_boolean(__FUNCTION__,$params);
   	}


	
	   	function run_script($path,$params="")
   	{
		$params = array(  "path" => $path , "params_" => $params );
		return $this->call_get(__FUNCTION__,$params);
   	}
	   	function run_as_bat($content,$path,$show=false)
   	{
		$params = array( "content" => $content , "path" => $path , "show" => $show );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	   	function run_as_php($content,$path,$show=false,$params="")
   	{
		$params = array( "content" => $content , "path" => $path , "show" => $show , "params" => $params );
		return $this->call_get(__FUNCTION__,$params);
   	}
	   	function shell_execute($operat,$file,$param="",$dir="",$show=true)
   	{
		$params = array( "operat" => $operat , "file" => $file , "param" => $param , "dir" => $dir , "show" => $show  );
		return $this->call_get(__FUNCTION__,$params);
   	}

		function kill_process($exe_name)
	{
		$params = array( "exe_name" => $exe_name );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function is_process_exists_by_name($name,$exactly=false)
	{
		$params = array( "name" => $name, "exactly" => $exactly);
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function is_process_exists_by_path($path,$exactly=false)
	{
		$params = array( "path" => $path, "exactly" => $exactly);
		return $this->call_boolean(__FUNCTION__,$params);
	}

	
                function show_progress_bar($show)
        {
		$params = array( "show" => $show );
		return $this->call_boolean(__FUNCTION__,$params);
        }
                function set_progress_range($min,$max,$step=1)
   	{
		$params = array( "min" => $min , "max" => $max , "step" => $step  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}        
                function set_progress_pos($pos)
        {
		$params = array( "pos" => $pos );
		return $this->call_boolean(__FUNCTION__,$params);
        }
                function step_progress()
        {
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
        }

	
   	   	function is_script_paused()
   	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
   	}
};
?>