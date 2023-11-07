<?php
namespace Xhe;

use Xhe\XheUi;

class XheUis extends XheBaseList
{
	/////////////////////////////////////// SERVICE FUNCTIONS ///////////////////////////////////////////

	// server initialization
	function __construct($inner_numbers,$server,$password="")
	{    
		XheBaseList::XheBaseList($inner_numbers,$server,$password);

		if ($inner_numbers!="" && $inner_numbers!="Ignore")
		{
			if ($inner_numbers===false)
				return;			
			$elms_nums=explode(";",$inner_numbers);
			for ($i=0;$i<count($elms_nums);$i++) 
			{
			     if (trim($elms_nums[$i])!="")
				     $this->elements[$i]=new Xhe\XheUi(trim($elms_nums[$i]),$server,$password);
			}
		}
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////
};		
?>