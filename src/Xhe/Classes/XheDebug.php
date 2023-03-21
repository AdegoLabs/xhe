<?php
namespace Xhe;

class XheDebug extends XheBaseObject
{
		function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Debug";
	}
	
	   		function open_tab($page)
	{
		$params = array( "page" => $page);
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_tab_content($page,$text,$is_add=false)
	{
		$params = array( "page" => $page , "text" => $text, "is_add" => $is_add);
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function save_tab_content_to_file($page,$filepath,$is_add=false)
	{
		$params = array( "page" => $page , "filepath" => $filepath , "is_add" => $is_add );
		return $this->call_boolean(__FUNCTION__,$params);
	}	
		function get_tab_content($page)
	{
		$params = array( "page" => $page );
		return $this->call_get(__FUNCTION__,$params);
	}	
		function clear_tab_content($page)
	{
		$params = array( "page" => $page);
		return $this->call_boolean(__FUNCTION__,$params);
	}	
		function close_tab($page)
	{
		$params = array( "page" => $page);
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_encoding($page,$charset)
	{
		$params = array( "page" => $page , "charset" => $charset);
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function view_tab_as_text($page,$as_text=true)
	{
		$params = array( "page" => $page , "as_text" => $as_text);
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function close_tabs()
	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	
		function message_box($text)
	{
		$params = array( "text" => $text);
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function notification_box($rtf_text,$show_time=9999)
	{
		$params = array( "rtf_text" => $rtf_text , "show_time" => $show_time);
		return $this->call_boolean(__FUNCTION__,$params);
	}

	
		function get_min_mem_size()
	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
	}	
		function get_max_mem_size()
	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
	}	

		function get_cur_mem_size()
	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
	}	
		function get_free_physical_mem_size()
	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
	}	
		function optimize_memory($onlyGarbageCollector=false)
	{
		$params = array( "onlyGarbageCollector" => $onlyGarbageCollector );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function get_gui_resources($type)
	{
		$params = array( "type" => $type );
		return $this->call_get(__FUNCTION__,$params);
	}	
		
		function get_process_id()
	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_cpu_usage()
	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
	}
	
		function set_hook($action,$php_script)
	{
		$params = array( "action" => $action , "php_script" => $php_script );
		return $this->call_boolean(__FUNCTION__,$params);
	}

        
        	function get_cur_script_path()
	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
	}	
        	function set_cur_script_path($path)
	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
	}	
        	function get_cur_script_folder()
	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
	}	
		function is_script_run()
	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
	}
                function run_current_script($params)
	{
		$params = array( "params" => $params);
		return $this->call_boolean(__FUNCTION__,$params);
	}

	};	
?>