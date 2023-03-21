<?php
namespace Xhe;

class XheBrowserCompatible extends XheBaseObject
{
			function clear_cash()
	{
		return $this->clear_cache("");
	}
        	function disable_download_file_dialog($enable)
	{
		return $this->enable_download_file_dialog($enable==0);
	}
        	function is_disable_download_file_dialog()
	{		
		return $this->is_enable_download_file_dialog()==0;
	}
     		function change_cookies_folder($folder)
	{
		$params = array( "folder" => $folder );
		return $this->call_boolean(__FUNCTION__,$params);
	}
     		function change_cache_folder($folder)
	{
		$params = array( "folder" => $folder );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function set_accept($accept_string)
	{
		$params = array( "accept_string" => $accept_string );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
   		function set_accept_encoding($accept_string)
	{
		$params = array( "accept_string" => $accept_string );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
   		function set_accept_charset($accept_string)
	{
		$params = array( "accept_string" => $accept_string );
		return $this->call_boolean(__FUNCTION__,$params);
   	}	
   		function set_referer($referer)
	{
		$params = array( "referer" => $referer );
		return $this->call_boolean(__FUNCTION__,$params);
   	}	
		function enable_web_socket($enable=true,$refresh=true)
	{
		$params = array( "enable" => $enable , "refresh" => $refresh  );
		return $this->call_boolean(__FUNCTION__,$params);
	}	
   		function is_enable_web_socket()
	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
	}
   		function set_internazionalization($locale="",$timeZone="",$calendar="",$numberingSystem="",$year="",$month="",$day="")
	{	
		return $this->set_internationalization($locale,$timeZone,$calendar,$numberingSystem,$year,$month,$day);
   	}	
};		
?>