<?php
namespace Xhe;

class XheFolder extends XheFolderCompatible
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Folder";
	}
	
	
		function create($path)
	{			  
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function copy($path,$new_folder_place,$flag_fail_exist="true",$timeout=-1)
	{			  
		$params = array( "path" => $path , "new_folder_place" => $new_folder_place , "flag_fail_exist" => $flag_fail_exist );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
	}
		function move($path,$new_folder_place,$timeout=-1)
	{			  
		$params = array( "path" => $path , "new_folder_place" => $new_folder_place );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
	}
		function rename($path,$new_folder_name,$timeout=-1)
	{			  
		$params = array( "path" => $path , "new_folder_name" => $new_folder_name );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
	}
		function delete($path)
	{			  
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function clear($path)
	{			  
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function rar($path,$path_to_rar="",$options="u -m5 -mdE -s -r -ed -ep1")
	{			  
		$params = array( "path" => $path , "path_to_rar" => $path_to_rar , "options" => $options );
		return $this->call_boolean(__FUNCTION__,$params);
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
		function get_items_count($path,$include_subfolders=false,$only_folders=false,$timeout=-1)
	{			  
		$params = array( "path" => $path , "include_subfolders" => $include_subfolders , "only_folders" => $only_folders);
		return $this->call_get(__FUNCTION__,$params,$timeout);
	}
		function get_all_items($path,$include_subfolders=false,$only_folders=false,$timeout=-1)
	{			  
		$params = array( "path" => $path , "include_subfolders" => $include_subfolders , "only_folders" => $only_folders);
		return $this->call_get(__FUNCTION__,$params,$timeout);
	}
		function get_random_file($path,$extension="txt",$include_subfolders=false,$timeout=-1)
	{			  
		$params = array( "path" => $path  , "extension" => $extension , "include_subfolders" => $include_subfolders);
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
		$attr="NORMAL";
		$params = array( "path" => $path , "attr" => $attr );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	        function is_readonly($path)
	{			  
		$attr="READONLY";
		$params = array( "path" => $path , "attr" => $attr );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function is_hidden($path)
	{			  
		$attr="HIDDEN";
		$params = array( "path" => $path , "attr" => $attr );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function is_system($path)
	{			  
		$attr="SYSTEM";
		$params = array( "path" => $path , "attr" => $attr );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function is_archive($path)
	{			  
		$attr="ARCHIVE";
		$params = array( "path" => $path , "attr" => $attr );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	
		function set_normal($path,$on=true)
	{			  
		$attr="NORMAL";
		$params = array( "path" => $path , "attr" => $attr , "on" => $on );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	        function set_readonly($path,$on=true)
	{			  
		$attr="READONLY";
		$params = array( "path" => $path , "attr" => $attr , "on" => $on );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_hidden($path,$on=true)
	{			  
		$attr="HIDDEN";
		$params = array( "path" => $path , "attr" => $attr , "on" => $on );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_system($path,$on=true)
	{			  
		$attr="SYSTEM";
		$params = array( "path" => $path , "attr" => $attr , "on" => $on );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_archive($path,$on=true)
	{			  
		$attr="ARCHIVE";
		$params = array( "path" => $path , "attr" => $attr , "on" => $on );
		return $this->call_boolean(__FUNCTION__,$params);
	}	          

	};	
?>