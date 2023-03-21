<?php
namespace Xhe;

class XheSFTP extends XheFTPCompatible
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "SFTP";
	}
	  	
	
	        function connect($server,$user="",$password="",$iport=22,$timeout=-1)
	{
	   	$params = array( "iport" => $iport , "server" => $server , "user" => $user , "password" => $password  , "timeout" => $timeout);
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

	
	        function get_file($server,$remote_file,$local_file,$flag_fail_exist="true")
	{
	   	$params = array( "server" => $server , "remote_file" => $remote_file , "local_file" => $local_file , "flag_fail_exist" => $flag_fail_exist  );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	        function put_file($server,$local_file,$remote_file,$flag_fail_exist="true")
	{
	   	$params = array( "server" => $server , "local_file" => $local_file , "remote_file" => $remote_file , "flag_fail_exist" => $flag_fail_exist );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
		function remove_file($server,$file_name)
	{
	   	$params = array( "server" => $server , "file_name" => $file_name );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	};	
?>