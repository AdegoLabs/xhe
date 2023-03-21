<?php

namespace Xhe;

class XheBodyCompatible extends XheBaseDOMVisual {
			function set_text_within_iframe_by_name($name,$text,$framenum)
	{
		return $this->set_text_by_name($name,$text,$framenum);
	}
  		function set_text_within_iframe_by_number($number,$text,$framenum)
	{
		return $this->set_text_by_number($number,$text,$framenum);
	}
		function get_text_within_iframe_by_name($name,$framenum)
	{
		return $this->get_text_by_name($name,$framenum);
	}   
		function get_text_within_iframe_by_number($number,$framenum)
	{
		return $this->get_text_by_number($number,$framenum);
	}	
			function set_text_by_name($name,$text,$frame=-1)
	{
		return $this->set_inner_html_by_name($name,$text,$frame);
	}
		function set_text_by_number($number,$text,$frame=-1)
	{
		return $this->set_inner_html_by_number($number,$text,$frame);
	}
   		function get_text_by_name($name,$frame=-1)
	{
		return $this->get_inner_html_by_name($name,$frame);
	}   
        	function get_text_by_number($number,$frame=-1)
	{
		return $this->get_inner_html_by_number($number,$frame);
	}	
	};		
?>