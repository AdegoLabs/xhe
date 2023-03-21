<?php

namespace Xhe;

class XheFormCompatible extends XHEBaseDOMVisual {
	                function get_atribute_by_name($name,$name_attr)
        {
               return $this->get_attribute_by_name($name,$name_attr);
        }
                function get_atribute_by_number($number,$name_attr)
        {
               return $this->get_attribute_by_number($number,$name_attr);
        }
	   		function get_content_by_name($name,$as_html,$frame=-1)
	{
		if ($as_html)
			return $this->get_inner_html_by_name($name,$frame);
		else
			return $this->get_inner_text_by_name($name,$frame);
	}
   		function get_content_by_id($id,$as_html,$frame=-1)
	{
		if ($as_html)
			return $this->get_inner_html_by_id($id,$frame);
		else
			return $this->get_inner_text_by_id($id,$frame);
	}
   		function get_content_by_number($number,$as_html,$frame=-1)
	{
		if ($as_html)
			return $this->get_inner_html_by_number($number,$frame);
		else
			return $this->get_inner_text_by_number($number,$frame);
	}

   		function get_all_elements_by_name($name,$element_type="",$frame=-1)
	{
		return $this->get_numbers_child_by_name($name,$element_type,$frame);
	}
   		function get_all_elements_by_id($id,$element_type="",$frame=-1)
	{
		return $this->get_numbers_child_by_id($id,$element_type,$frame);
	}
   		function get_all_elements_by_number($number,$element_type="",$frame=-1)
	{
		return $this->get_numbers_child_by_number($number,$element_type,$frame);
	}
        	function add_atribute_by_number($number,$name_atr,$value_atr)
	{
               return $this->add_attribute_by_number($number,$name_atr,$value_atr,-1);
	}
	};		
?>