<?php

namespace Xhe;

class XheElementCompatible extends XheBaseDOMVisual {
			function click_by_atribute($atr_name,$atr_value,$exactly=true)
	{
		return $this->click_by_attribute($atr_name,$atr_value,$exactly,-1);
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
	                function get_element_value_by_name($name,$frame=-1)
	{
		return $this->get_value_by_name($name,$frame);
	}
                function get_element_innerText_by_name($name,$frame=-1)
        {
                return $this->get_inner_text_by_name($name,$frame);
        }
                function get_element_innerHtml_by_name($name,$frame=-1)
        {
                return $this->get_inner_html_by_name($name,$frame);
        }
                function get_element_innerText_by_number($number,$frame=-1)
        {
                return $this->get_inner_text_by_number($number,$frame);
        }
                function get_element_innerHtml_by_number($number,$frame=-1)
        {
		                return $this->get_inner_html_by_number($number,$frame);
        }
                function get_element_innerText_by_id($id,$frame=-1)
        {
		                return $this->get_inner_text_by_id($id,$frame);
        }
                function get_element_innerHtml_by_id($id,$frame=-1)
        {
                return $this->get_inner_html_by_id($id,$frame);
        }
                function get_element_attribute_by_name($name,$attribute,$frame=-1)
        {
                return $this->get_attribute_by_name($name,$attribute,$frame);
        }
                function get_element_attribute_by_number($number,$attribute,$frame=-1)
        {
                return $this->get_attribute_by_number($number,$attribute,$frame);
        }
                function is_exist_with_name($name)
        {
                return $this->is_exist_by_name($name);
        }
		function is_exist_with_attribute($attr_name,$attr_value,$exactly)
	{
		return $this->is_exist_by_attribute($attr_name,$attr_value,$exactly);
	}	
                function set_element_attribute_by_name($name,$attribute,$value)
        {
                return $this->set_attribute_by_name($name,$attribute,$value);
        }
                function set_element_value_by_name($name,$text)
        {
                return $this->set_value_by_name($name,$text);
        }
                function click_on_element_by_name($name)
        {
                return $this->click_by_name($name);
        }
                function click_on_element_by_number($number)
        {
                return $this->click_by_number($number);
        }
                function click_on_element_by_inner_text($inner_text,$exactly="true")
        {
                return $this->click_by_inner_text($inner_text,$exactly);
        }
                function get_left_offset_on_page_by_att($name_attr,$value_attr,$exactly=true,$frame=-1)
        {
                return $this->get_x_by_attribute($name_attr,$value_attr,$exactly,$frame);
        }
                function get_top_offset_on_page_by_att($name_attr,$value_attr,$exactly=true,$frame=-1)
        {
                return $this->get_y_by_attribute($name_attr,$value_attr,$exactly,$frame);
        }
                function get_left_offset_on_page_by_name($name)
        {
                return $this->get_x_by_name($name);
        }
                function get_top_offset_on_page_by_name($name)
        {
                return $this->get_y_by_name($name);
        }
                function get_left_offset_on_page_by_href($href,$exactly=false)
        {
                return $this->get_x_by_href($href,$exactly);
        }
                function get_top_offset_on_page_by_href($href,$exactly=false)
        {
                return $this->get_y_by_href($href,$exactly);
        }
                function get_left_offset_on_page_by_tag_by_number($tag,$number)
        {
                return $this->get_x_by_tag_by_number($tag,$number);
        }
                function get_top_offset_on_page_by_tag_by_number($tag,$number)
        {
                return $this->get_y_by_tag_by_number($tag,$number);
        }

                function click_on_element_by_name_withiniframe($name,$frame)
        {
		return $this->click_by_name($name,$frame);
        }
                function click_on_element_by_inner_text_withiniframe($inner_text,$frame,$exactly)
        {
		return $this->click_by_inner_text($inner_text,$frame,$exactly);
        }
		function click_within_iframe_by_attribute($attr_name,$attr_value,$exactly,$frame)
	{
		return $this->click_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}	

		function send_event_by_name_in_frame($name,$event,$frame)
	{
		return $this->send_event_by_name($name,$event,$frame,-1);
	}
		function send_event_by_number_in_frame($number,$event,$frame)
	{
		return $this->send_event_by_number($number,$event,$frame);
	}
		function send_event_by_inner_text_in_frame($text,$exactly,$event,$frame)
	{
		return $this->send_event_by_inner($text,$exactly,$event,$frame);
	}
		function send_event_by_href_in_frame($url,$exactly,$event,$frame)
	{
		return $this->send_event_by_href($url,$exactly,$event,$frame);
	}
		function send_event_by_atribute_in_frame($atr_name,$atr_value,$exactly,$event,$frame)
	{
		return $this->send_event_by_attribute($atr_name,$atr_value,$exactly,$event,$frame);
	}
		function send_event_by_attribute_in_frame($atr_name,$atr_value,$exactly,$event,$frame)
	{
		return $this->send_event_by_attribute($atr_name,$atr_value,$exactly,$event,$frame);
	}
		function get_count_within_iframe_by_number($number)
	{
		return $this->get_count($number);
	}
		function set_text_html_by_attribute($attr_name,$attr_value,$html,$exactly=true,$frame=-1)
	{
		return $this->set_inner_html_by_attribute($attr_name,$attr_value,$html,$exactly,$frame);
	}
		function set_inner_html_by_atribute($attr_name,$attr_value,$html,$exactly=true,$frame=-1)
	{
		return $this->set_inner_html_by_attribute($attr_name,$attr_value,$html,$exactly,$frame);
	}
		function set_inner_text_by_atribute($attr_name,$attr_value,$text,$exactly=true,$frame=-1)
	{
		return $this->set_text_html_by_attribute($attr_name,$attr_value,$text,$exactly,$frame);
	}
	};		
?>