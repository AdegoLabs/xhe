<?php
namespace Xhe;
class XheB  extends XheBaseDOMVisual
{
	/////////////////////////////////////// SERVICE /////////////////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "B";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////
};		
?>