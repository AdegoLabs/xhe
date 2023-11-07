<?php
namespace Xhe;
class XheBody extends XheBodyCompatible
{
	/////////////////////////////////////// SERVICE /////////////////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Body";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// запретить сообщение, подтверждающее желание покинуть текущую страницу (без учета проверки : существует ли элемент)
	function disable_onunload_message($frame=-1) 
	{
		$params = array( "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////	
};		
?>