<?php
namespace Xhe;

class XheFTP extends XheFTPCompatible
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "FTP";
	}
	  	
	
	        function connect($server,$user="",$password="",$iport="",$flag_passive=true,$timeout=-1)
	{
                if ($iport=="");
			$iport=21;
	   	$params = array( "iport" => $iport , "flag_passive" => $flag_passive , "server" => $server , "user" => $user , "password" => $password  , "timeout" => $timeout);
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
		function disconnect($server)
	{
	   	$params = array( "server" => $server );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}        
		function disconnect_all()
	{
	   	$params = array( );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	
		function list_files($server,$folder="")
	{
	   	$params = array( "server" => $server , "folder" => $folder);		
	    	return explode("\n",$this->call_get(__FUNCTION__,$params));
	}        
		function list_folders($server,$folder="")
	{
	   	$params = array( "server" => $server, "folder" => $folder );		
	    	return explode("\n",$this->call_get(__FUNCTION__,$params));
	}        

	
		function create_directory($server,$dir_name)
	{
	   	$params = array( "server" => $server , "dir_name" => $dir_name );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
		function remove_directory($server,$dir_name)
	{
	   	$params = array( "server" => $server , "dir_name" => $dir_name );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	
	        function get_file($server,$remote_file,$local_file,$flag_fail_exist="true",$file_attributes="128",$transfer_attributes="2",$context="1")
	{
	   	$params = array( "server" => $server , "remote_file" => $remote_file , "local_file" => $local_file , "flag_fail_exist" => $flag_fail_exist , "file_attributes" => $file_attributes , "transfer_attributes" => $transfer_attributes , "context" => $context  );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	        function put_file($server,$local_file,$remote_file,$flag_fail_exist="true",$transfer_attributes="2",$context="1")
	{
	   	$params = array( "server" => $server , "local_file" => $local_file , "remote_file" => $remote_file , "flag_fail_exist" => $flag_fail_exist , "transfer_attributes" => $transfer_attributes , "context" => $context  );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
		function remove_file($server,$file_name)
	{
	   	$params = array( "server" => $server , "file_name" => $file_name );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

        
		function rename($server,$exist_file_name,$new_file_name)
	{
	   	$params = array( "server" => $server , "exist_file" => $exist_file_name , "new_file_name" => $new_file_name );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}  
		function command($server,$command,$response="2",$transfer_attributes="1",$context="1")
	{
	   	$params = array( "server" => $server , "command" => $command , "response" => $response ,"transfer_attributes" => $transfer_attributes , "context" => $context  );
	    	return $this->call_get(__FUNCTION__,$params);
	}

	};	
?>