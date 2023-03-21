<?php

namespace Xhe;

class XheAnchorCompatible extends XheBaseDOMVisual {
			function click_by_atribute($atr_name,$atr_value,$exactly=true)
	{
		return $this->click_by_attribute($atr_name,$atr_value,$exactly,-1);
	}	
		function send_event_by_atribute($atr_name,$atr_value,$exactly,$event)
	{
		return $this->send_event_by_attribute($atr_name,$atr_value,$exactly,$event,-1);
	}
			function is_exist_with_atribute($atr_name,$atr_value,$exactly=true)
	{
		return $this->is_exist_by_attribute($atr_name,$atr_value,$exactly,-1);
	}	
		function is_exist_with_attribute($atr_name,$atr_value,$exactly=true)
	{
		return $this->is_exist_by_attribute($atr_name,$atr_value,$exactly,-1);
	}	
                function is_exist_with_name($name)
        {
		return $this->is_exist_by_name($name,-1);
        }
                function get_attribute_by_attribute_in_frame_by_number($attr_name,$attr_value,$exactly,$name_attr,$frame_number)
        {
               return $this->get_attribute_by_attribute_in_frame($attr_name,$attr_value,$exactly,$name_attr,$frame_number);
        }
		function is_exist_with_inner_text($text,$exactly=true)
	{
		return $this->is_exist_by_inner_text($text,$exactly,-1);
	}	
		function is_exist_with_href($href,$exactly=true)
	{
		return $this->is_exist_by_href($href,$exactly,-1);
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
			function remove_atribute_by_name($name,$name_atr)
	{
		return $this->remove_attribute_by_name($name,$name_atr,-1);
	}
		function remove_atribute_by_number($number,$name_atr)
	{
		return $this->remove_attribute_by_number($number,$name_atr,-1);
	}
        	function add_atribute_by_number($number,$name_atr,$value_atr)
	{
               return $this->add_attribute_by_number($number,$name_atr,$value_atr,-1);
	}
		function add_atribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$value_atr)
	{
               return $this->add_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$value_atr,-1);
	}
		function add_atribute_by_atribute($atr_name,$atr_value,$exactly,$name_atr,$value_atr)
	{
               return $this->add_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$value_atr,-1);
	}
	                function get_number_by_atribute($atr_name,$atr_value,$exactly=true)
        {
               return $this->get_number_by_attribute($atr_name,$atr_value,$exactly,-1);
        }
	   		function set_focus_by_atribute($attr_name,$attr_value,$exactly=true)
	{
		return $this->set_focus_by_attribute($attr_name,$attr_value,$exactly,-1);
	}
			function is_exist_with_atribute_in_frame_by_number($attr_name,$attr_value,$exactly,$frame_number)
	{
	       return $this->is_exist_by_attribute($atr_name,$atr_value,$frame_number,$exactly,$frame_number);	
	}
		function remove_atribute_by_name_in_frame($name,$name_atr,$frame_number)
	{
		return $this->remove_attribute_by_name($name,$name_atr,$frame_number);
	}
		function remove_atribute_by_number_in_frame($number,$name_atr,$frame_number)
	{
		return $this->remove_attribute_by_number($number,$name_atr,$frame_number);
	}
		function remove_atribute_by_attribute_in_frame_by_number($atr_name,$atr_value,$exactly,$name_atr,$frame_number)
	{
		return $this->remove_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$frame_number);
	}
		function get_x_by_atribute($attr_name,$attr_value,$exactly=true)
	{
		return $this->get_x_by_attribute($attr_name,$attr_value,$exactly);
	}
		function get_y_by_atribute($attr_name,$attr_value,$exactly=true)
	{
		return $this->get_y_by_attribute($attr_name,$attr_value,$exactly);
	}
		function is_exist_by_atribute_in_frame($atr_name,$atr_value,$frame,$exactly=true)
	{
		return $this->is_exist_by_attribute($atr_name,$atr_value,$exactly,$frame);
	}

		function get_all_urls($separator="<br>")
	{
		return $this->get_all_hrefs($separator);
	}
		function get_all_urls_by_inner_text($inner_text,$separator="<br>")
	{
		return $this->get_all_hrefs_by_inner_text($inner_text,$separator);
	}
        	function get_all_urls_in_frame($frame, $separator="<br>")
	{
		return $this->get_all_hrefs_in_frame($frame, $separator);
	}
		function get_all_urls_by_inner_text_in_frame($inner_text,$frame,$separator="<br>")
	{
		return $this->get_all_hrefs_by_inner_text_in_frame($inner_text,$frame,$separator);
	}
   		function get_all_external_texts_and_url($url,$navigate="false",$separator="<br>")
	{
		return $this->get_all_external_inner_texts_and_hrefs($url,$navigate,$separator);
	}
   		function get_all_external_texts_and_url_in_frame($url,$frame,$separator="<br>")
	{
		return $this->get_all_external_inner_texts_and_hrefs_in_frame($url,$frame,false,$separator);
	}
   		function click_within_iframe_by_name($name,$frame)
	{
		return $this->click_by_name_in_frame($name,$frame);
	}
		function click_within_iframe_by_number($number,$frame)
	{
		return $this->click_by_number_in_frame($number,$frame);
	}
		function click_within_iframe_by_inner_text($text,$exactly,$frame)
	{
		return $this->click_by_inner_text_in_frame($text,$exactly,$frame);
	}
		function click_within_iframe_by_href($url,$exactly,$frame)
	{
		return $this->click_by_href_in_frame($url,$exactly,$frame);
	}	
		function click_within_iframe_by_attribute($attr_name,$attr_value,$exactly,$frame)
	{
		return $this->click_by_attribute_in_frame($attr_name,$attr_value,$exactly,$frame);
	}

   		function set_focus_by_attribute_in_frame_by_number($attr_name,$attr_value,$exactly,$frame_num)
	{
		return $this->set_focus_by_attribute_in_frame($attr_name,$attr_value,$exactly,$frame_num);
	}
		function add_attribute_by_attribute_in_frame_by_number($attr_name,$attr_value,$exactly,$name_attr,$value_attr,$frame_number)
	{
		return $this->add_attribute_by_attribute_in_frame($attr_name,$attr_value,$exactly,$name_attr,$value_attr,$frame_number);
	}
		function remove_attribute_by_attribute_in_frame_by_number($atr_name,$atr_value,$exactly,$name_atr,$frame_number)
	{
		return $this->remove_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$frame_number);
	}
		function get_count_within_iframe_by_number($number)
	{
		return $this->get_count($number);
	}	
                function is_exist_by_name_in_frame($name,$frame)
        {
		return $this->is_exist_by_name($name,$frame);
        }
   		function click_by_name_in_frame($name,$frame)
	{
		return $this->click_by_name($name,$frame);
	}
		function add_attribute_by_attribute_in_frame($attr_name,$attr_value,$exactly,$name_attr,$value_attr,$frame_number)
	{
               return $this->add_attribute_by_attribute($attr_name,$attr_value,$exactly,$name_attr,$value_attr,$frame_number);
	}
		function click_by_number_in_frame($number,$frame)
	{
               return $this->click_by_number($number,$frame);
	}
		function click_by_attribute_in_frame($attr_name,$attr_value,$exactly,$frame)
	{		
		return $this->click_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}
		function click_by_href_in_frame($url,$exactly,$frame)
	{
		return $this->click_by_href($url,$exactly,$frame);
	}	
		function click_by_inner_text_in_frame($text,$exactly,$frame)
	{
		return $this->click_by_inner_text($text,$exactly,$frame);
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
   		function set_focus_by_attribute_in_frame($attr_name,$attr_value,$exactly,$frame_num)
	{
		return $this->set_focus_by_attribute($attr_name,$attr_value,$exactly,$frame_num);
	}
		function remove_attribute_by_name_in_frame($name,$name_atr,$frame_number)
	{
		return $this->remove_attribute_by_name($name,$name_atr,$frame_number);
	}
		function remove_attribute_by_number_in_frame($number,$name_atr,$frame_number)
	{
		return $this->remove_atribute_by_number($number,$name_atr,$frame_number);
	}
		function remove_attribute_by_attribute_in_frame($atr_name,$atr_value,$exactly,$name_atr,$frame_number)
	{
		return $this->remove_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$frame_number);
	}
		function is_exist_by_inner_text_in_frame($text,$frame,$exactly=true)
	{
		return $this->is_exist_by_inner_text($text,$exactly,$frame);
	}	
		function is_exist_by_href_in_frame($href,$frame,$exactly=true)
	{
		return $this->is_exist_by_href($href,$exactly,$frame);
	}	
		function is_exist_by_attribute_in_frame($atr_name,$atr_value,$frame,$exactly=true)
	{
		return $this->is_exist_by_attribute($atr_name,$atr_value,$exactly,$frame);
	}
                function get_attribute_by_attribute_in_frame($attr_name,$attr_value,$exactly,$name_attr,$frame_number)
        {
               return $this->get_attribute_by_attribute($attr_name,$attr_value,$exactly,$name_attr,$frame_number);
        }
		function get_all_inner_texts_in_frame($frame, $separator="<br>")
	{
		return $this->get_all_inner_texts($separator,"",$frame);
	}	
        	function get_all_hrefs_in_frame($frame, $separator="<br>")
	{
		return $this->get_all_hrefs($separator,$frame);
	}
		function get_all_hrefs_by_inner_text_in_frame($inner_text,$frame,$separator="<br>")
	{
		return $this->get_all_hrefs_by_inner_text($inner_text,$separator,$frame);
	}
   		function get_all_external_inner_texts_and_hrefs_in_frame($url,$frame,$navigate="false",$separator="<br>")
	{
		return $this->get_all_external_inner_texts_and_hrefs($url,$navigate,$separator,$frame);
	}
	};		
?>