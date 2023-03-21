<?php

namespace Xhe;

class XheFrameCompatible extends XheBaseDOMVisual {
	                function get_atribute_by_name($name,$name_attr)
        {
               return $this->get_attribute_by_name($name,$name_attr);
        }
                function get_atribute_by_number($number,$name_attr)
        {
               return $this->get_attribute_by_number($number,$name_attr);
        }
	   		function get_all_elements_by_number($number,$frame=-1)
	{		
		return $this->get_numbers_child_by_number($number,"",$frame);
	}
        	function add_atribute_by_number($number,$name_atr,$value_atr)
	{
               return $this->add_attribute_by_number($number,$name_atr,$value_atr,-1);
	}
		function get_x_by_atribute($attr_name,$attr_value,$exactly=true)
	{
		return $this->get_x_by_attribute($attr_name,$attr_value,$exactly,-1);
	}
		function get_y_by_atribute($attr_name,$attr_value,$exactly=true)
	{
		return $this->get_y_by_attribute($attr_name,$attr_value,$exactly,-1);
	}
	};		
?>