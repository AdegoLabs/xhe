<?php
////////////////////////////////////////////////////// Section //////////////////////////////////////////////////
class XHESection  extends XHEBaseDOMVisual
{
	/////////////////////////////////////// SERVICE /////////////////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Section";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////
};		
?>