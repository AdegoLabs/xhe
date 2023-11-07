<?php
namespace Xhe;
class XheClipboard extends XheBaseObject
{
	//////////////////////////////// СЕРВИСНЫЕ ФУНКЦИИ /////////////////////////////////////////////////
	// конструктор
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Clipboard";
	}	
	/////////////////////////////////////////////////////////////////////////////////////////////////////

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить текущий текст из буффера обмена
	function get_text()
	{			  
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// очистить буффер обмена
	function clear()
	{
		$params = array(  );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// задать тект в буффер обмена
	function put_text($text)
	{
		$params = array( "text" => $text );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// задать html в буффер обмена
	function put_html($html, $url = "")
	{
		$params = array( "html" => $html , "url" => $url);
		return $this->call_boolean(__FUNCTION__,$params);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////
};	
?>