<?php
namespace Xhe;
class XheTd  extends XheBaseVisualDom
{
	/////////////////////////////////////// SERVICE /////////////////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Td";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////
};		
?>