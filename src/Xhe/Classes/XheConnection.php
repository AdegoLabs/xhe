<?php
namespace Xhe;
class XheConnection extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Connection";
	}
	  	
	
	        function dial_ras($name,$login,$password) 
	{
	   	$params = array( "name" => $name , "login" => $login , "password" => $password );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	        function hang_up_ras()
	{
	   	$params = array(  );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	        function create_vpn($name,$server,$user,$password,$psk,$type)
	{
	   	$params = array( "name" => $name , "server" => $server , "user" => $user , "password" => $password , "psk" => $psk , "type" => $type );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	        function get_name_by_number_ras($number)
	{
	   	$params = array( "number" => $number );
	    	return $this->call_get(__FUNCTION__,$params);
	}
	        function get_all_connection_ras()
        {
	   	$params = array( );
	    	return $this->call_get(__FUNCTION__,$params);
        }

	
	        function restart_lan_by_name($name)
	{
	   	$params = array( "name" => $name );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	        function restart_lan_by_number($number)
	{
	   	$params = array( "number" => $number );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	
		function set_local_ip($number,$ip,$subnetMask="",$gateway="",$defaultDNS="",$subDNS="")
	{
	   	$params = array( "number" => $number , "ip" => $ip , "subnetMask" => $subnetMask , "gateway" => $gateway , "defaultDNS" => $defaultDNS, "subDNS" => $subDNS);
	    	$res = $this->call_boolean(__FUNCTION__,$params);
		sleep(5);
		return $res;
	}
		function get_local_ip($number=0)
	{
	   	$params = array( );
	    	return $this->call_get(__FUNCTION__,$params);
	}
		function get_real_ip()
	{
	   	$params = array( );
	    	return $this->call_get(__FUNCTION__,$params);
	}

		function get_mac_address_by_number($number)
	{
	   	$params = array( "number" => $number );
	    	return $this->call_get(__FUNCTION__,$params);
	}
		function set_mac_address_by_number($number, $mac)
	{
	   	$params = array( "number" => $number , "mac" => $mac);
	    	$res = $this->call_boolean(__FUNCTION__,$params);
		sleep(3);
		return $res;
	}
                function check_ping_site($site)
        {
	   	$params = array( "site" => $site );
	    	return $this->call_boolean(__FUNCTION__,$params);
        }
		function is_connect_to_internet()
	{
	   	$params = array( );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
		function get_connection_parameters()
	{
	   	$params = array( );
	    	return $this->call_get(__FUNCTION__,$params);
	}

	
		function enable_proxy($connection,$proxy)
	{
	   	$params = array( "connection" => $connection , "proxy" => $proxy );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
		function disable_proxy($connection)
	{
	   	$params = array( "connection" => $connection );
	    	return $this->call_boolean(__FUNCTION__,$params);
  	}	
		function get_current_proxy($connection)
	{
	   	$params = array( "connection" => $connection );
	    	return $this->call_get(__FUNCTION__,$params);
  	}	

	};	
?>