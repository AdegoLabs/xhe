<?php
namespace Xhe;

class XheApplicationCompatible extends XheBaseObject
{
			function set_winodw_position($x_pos,$y_pos,$width,$height)
	{
		return set_window_position($x_pos,$y_pos,$width,$height);
	}
	};		
?>