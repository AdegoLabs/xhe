<?php
namespace Xhe;
class XheHead  extends XheBaseVisualDom
{
	/////////////////////////////////////// SERVICE /////////////////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Head";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////
};		
?>