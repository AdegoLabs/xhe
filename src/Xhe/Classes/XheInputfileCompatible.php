<?php

namespace Xhe;

class XheInputFileCompatible extends XheBaseDOMVisual {
			function click_by_atribute($atr_name,$atr_value,$exactly=true)
	{
		return $this->click_by_atribute($atr_name,$atr_value,$exactly,-1);
	}	
		function send_event_by_atribute($atr_name,$atr_value,$exactly,$event)
	{
		return $this->send_event_by_attribute($atr_name,$atr_value,$exactly,$event,-1);
	}
                function get_atribute_by_name($name,$name_attr)
        {
               return $this->get_attribute_by_name($name,$name_attr);
        }
                function get_atribute_by_number($number,$name_attr)
        {
               return $this->get_attribute_by_number($number,$name_attr);
        }
                function get_atribute_by_attribute($attr_name,$attr_value,$exactly,$name_attr)
        {
               return $this->get_attribute_by_attribute($attr_name,$attr_value,$exactly,$name_attr);
        }
                function get_atribute_by_attribute_in_frame_by_number($attr_name,$attr_value,$exactly,$name_attr,$frame_number)
        {
		return $this->get_attribute_by_attribute_in_frame_by_number($attr_name,$attr_value,$exactly,$name_attr,$frame_number);
        }
			function get_count_within_iframe_by_number($number)
	{
		return $this->get_count($number);
	}
                function is_exist_with_name($name,$frame=-1)
        {
		return $this->is_exist_by_name($name,$frame);
        }
		function click_within_iframe_by_attribute($attr_name,$attr_value,$exactly,$frame)
	{
		return $this->click_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}
        	function click_random_in_frame($frame)
	{
		return $this->click_random($frame);
	}	
        	function send_event_by_name_in_frame($name,$event,$frame)
	{
		return $this->send_event_by_name($name,$event,$frame);
	}
		function send_event_by_number_in_frame($number,$event,$frame)
	{
		return $this->send_event_by_number($number,$event,$frame);
	}
		function send_event_by_inner_text_in_frame($text,$exactly,$event,$frame)
	{
		return $this->send_event_by_inner_text($text,$exactly,$event,$frame);
	}
   		function set_focus_by_attribute_in_frame_by_number($attr_name,$attr_value,$exactly,$frame_num)
	{
		return $this->set_focus_by_attribute($attr_name,$attr_value,$exactly,$frame_num);
	}
		function is_exist_with_attribute($attr_name,$attr_value,$exactly)
	{
		return $this->is_exist_by_attribute($attr_name,$attr_value,$exactly,-1);
	}	
		function is_exist_with_attribute_in_frame_by_number($attr_name,$attr_value,$exactly,$frame_number)
	{
		return $this->is_exist_by_attribute($attr_name,$attr_value,$exactly,$frame_number);
	}	
                function get_attribute_by_attribute_in_frame_by_number($attr_name,$attr_value,$exactly,$name_attr,$frame_number)
        {
		return $this->get_attribute_by_attribute($attr_name,$attr_value,$exactly,$name_attr,$frame_number);
        }
		function set_value_by_name_by_frame_num($name,$value,$framenum)
	{
		return $this->set_value_by_name($name,$value,$framenum);
	}
		function set_value_by_number_by_frame_num($number,$value,$framenum)
	{
		return $this->set_value_by_number($number,$value,$framenum);
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