<?php
namespace Xhe;

class XheKeyboardCompatible extends XheBaseObject
{
		
		function press_key_by_code($code)
	{			  
		return $this->key($code);
	}

	};		
?>