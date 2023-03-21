<?php

namespace Xhe;

class XheBaseDomVisual extends XheBaseDom {     
	
	function __construct($server,$password="")
	{    
		$this->prefix = "-bvd-";
		return new XheBaseDom($server,$password);
	}
	
		function wait_element_exist_by_number($number,$frame=-1)
	{
		return $this->z_wait_element_exist_by_number($number,$frame);
	}
		function wait_element_exist_by_name($name,$frame=-1)
	{
		return $this->z_wait_element_exist_by_name($name,$frame);
	}
		function wait_element_exist_by_id($id,$exactly=1,$frame=-1)
	{
		return $this->z_wait_element_exist_by_id($id,$exactly,$frame);
	}
		function wait_element_exist_by_inner_text($inner_text,$exactly=1,$frame=-1)
	{
		return $this->z_wait_element_exist_by_inner_text($inner_text,$exactly,$frame);
	}
		function wait_element_exist_by_inner_html($inner_html,$exactly=1,$frame=-1)
	{
		return $this->z_wait_element_exist_by_inner_html($inner_html,$exactly,$frame);
	}
		function wait_element_exist_by_outer_text($outer_text,$exactly=1,$frame=-1)
	{
		return $this->z_wait_element_exist_by_outer_text($outer_text,$exactly,$frame);
	}
		function wait_element_exist_by_outer_html($outer_html,$exactly=1,$frame=-1)
	{
		return $this->z_wait_element_exist_by_outer_html($outer_html,$exactly,$frame);
	}
		function wait_element_exist_by_attribute($attr_name,$attr_value,$exactly=1,$frame=-1)
	{
		return $this->z_wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}
		function wait_element_exist_by_xpath($xpath)
	{
		return $this->z_wait_element_exist_by_xpath($xpath);
	}
		function wait_element_exist_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame=-1)
	{
		return $this->z_wait_element_exist_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame);
	}
		function wait_element_exist_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame=-1)
	{
		return $this->z_wait_element_exist_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame);
	}


        
		function click_by_number($number,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_number($number,$frame,$wait_browser);
	}
        	function click_by_name($name,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_name($name,$frame,$wait_browser);
	}
   		function click_by_id($id,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_id($id,$exactly,$frame,$wait_browser);
	}
   		function click_by_value($value,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_value($value,$exactly,$frame,$wait_browser);
	}
		function click_by_alt($alt,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_alt($alt,$exactly,$frame,$wait_browser);
	}
		function click_by_src($src,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_src($src,$exactly,$frame,$wait_browser);
	}
		function click_by_href($url,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_href($url,$exactly,$frame,$wait_browser);
	}	
		function click_by_inner_text($text,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_inner_text($text,$exactly,$frame,$wait_browser);
	}
		function click_by_inner_html($inner_html,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_inner_html($inner_html,$exactly,$frame,$wait_browser);
	}
		function click_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_attribute($attr_name,$attr_value,$exactly,$frame,$wait_browser);
	}	

        	function click_by_number_by_form_number($number,$form_number,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_number_by_form_number($number,$form_number,$frame,$wait_browser);
	}
        	function click_by_name_by_form_number($name,$form_number,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_name_by_form_number($name,$form_number,$frame,$wait_browser);
	}
        	function click_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame,$wait_browser);
	}

        	function click_by_number_by_form_name($number,$form_name,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_number_by_form_name($number,$form_name,$frame,$wait_browser);
	}
        	function click_by_name_by_form_name($name,$form_name,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_name_by_form_name($name,$form_name,$frame,$wait_browser);
	}
        	function click_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame,$wait_browser);
	}

        	function click_random($frame=-1,$wait_browser=true)
	{
		return $this->z_click_random($frame,$wait_browser);
	}

	
		function send_event_by_number($number,$event,$frame=-1,$wait_browser=true)
	{
		return $this->z_send_event_by_number($number,$event,$frame,$wait_browser);
	}
		function send_event_by_name($name,$event,$frame=-1,$wait_browser=true)
	{
		return $this->z_send_event_by_name($name,$event,$frame,$wait_browser);
	}
		function send_event_by_id($id,$exactly,$event,$frame=-1,$wait_browser=true)
	{
		return $this->z_send_event_by_id($id,$exactly,$event,$frame,$wait_browser);
	}
		function send_event_by_href($url,$exactly,$event,$frame=-1,$wait_browser=true)
	{
		return $this->z_send_event_by_href($url,$exactly,$event,$frame,$wait_browser);
	}
		function send_event_by_inner_text($text,$exactly,$event,$frame=-1,$wait_browser=true)
	{
		return $this->z_send_event_by_inner_text($text,$exactly,$event,$frame,$wait_browser);
	}
		function send_event_by_inner_html($html,$exactly,$event,$frame=-1,$wait_browser=true)
	{
		return $this->z_send_event_by_inner_html($html,$exactly,$event,$frame,$wait_browser);
	}
		function send_event_by_attribute($atr_name,$atr_value,$exactly,$event,$frame=-1,$wait_browser=true)
	{
		return $this->z_send_event_by_attribute($atr_name,$atr_value,$exactly,$event,$frame,$wait_browser);
	}

	
		function set_focus_by_number($number,$frame=-1)
	{
		return $this->z_set_focus_by_number($number,$frame);
	}
   		function set_focus_by_name($name,$frame=-1)
	{
		return $this->z_set_focus_by_name($name,$frame);
	}
   		function set_focus_by_href($href,$exactly=true,$frame=-1)
	{
		return $this->z_set_focus_by_href($href,$exactly,$frame);
	}
   		function set_focus_by_inner_text($inner_text,$exactly=true,$frame=-1)
	{
		return $this->z_set_focus_by_inner_text($inner_text,$exactly,$frame);
	}
   		function set_focus_by_inner_html($inner_html,$exactly=true,$frame=-1)
	{
		return $this->z_set_focus_by_inner_html($inner_html,$exactly,$frame);
	}
   		function set_focus_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
	{
		return $this->z_set_focus_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}

	
                function set_value_by_number($number,$value,$frame=-1)
        {
		return $this->z_set_value_by_number($number,$value,$frame);
        }
                function set_value_by_name($name,$value,$frame=-1)
        {
		return $this->z_set_value_by_name($name,$value,$frame);
        }
                function set_value_by_attribute($attr_name,$attr_value,$exactly,$value,$frame=-1)
        {
		return $this->z_set_value_by_attribute($attr_name,$attr_value,$exactly,$value,$frame);
        }

                function set_value_by_number_by_form_number($number,$value,$form_number,$frame=-1)
        {
		return $this->z_set_value_by_number_by_form_number($number,$value,$form_number,$frame);
        }
                function set_value_by_name_by_form_number($name,$value,$form_number,$frame=-1)
        {
		return $this->z_set_value_by_name_by_form_number($name,$value,$form_number,$frame);
        }
                function set_value_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$value,$form_number,$frame=-1)
        {
		return $this->z_set_value_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$value,$form_number,$frame);
        }

                function set_value_by_number_by_form_name($number,$value,$form_name,$frame=-1)
        {
		return $this->z_set_value_by_number_by_form_name($number,$value,$form_name,$frame);
        }
                function set_value_by_name_by_form_name($name,$value,$form_name,$frame=-1)
        {
		return $this->z_set_value_by_name_by_form_name($name,$value,$form_name,$frame);
        }
                function set_value_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$value,$form_name,$frame=-1)
        {
		return $this->z_set_value_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$value,$form_name,$frame);
        }

	
		function set_inner_text_by_number($number,$text,$frame=-1)
	{
		 return $this->z_set_inner_text_by_number($number,$text,$frame);
	}	
        	function set_inner_text_by_name($name,$text,$frame=-1)
	{
	         return $this->z_set_inner_text_by_name($name,$text,$frame);
	}
		function set_inner_text_by_attribute($attr_name,$attr_value,$exactly=true,$text,$frame=-1)
	{
		if ($text===false || $text===true )
	        	return $this->z_set_inner_text_by_attribute($attr_name,$attr_value,$text,$exactly,$frame); 		else
	        	return $this->z_set_inner_text_by_attribute($attr_name,$attr_value,$exactly,$text,$frame);
	}

		function set_inner_html_by_number($number,$html,$frame=-1)
	{
		return $this->z_set_inner_html_by_number($number,$html,$frame);
	}	
        	function set_inner_html_by_name($name,$html,$frame=-1)
	{
		return $this->z_set_inner_html_by_name($name,$html,$frame);
	}
		function set_inner_html_by_attribute($attr_name,$attr_value,$html,$exactly=true,$frame=-1)
	{
		return $this->z_set_inner_html_by_attribute($attr_name,$attr_value,$html,$exactly,$frame);
	}

	
        	function add_attribute_by_number($number,$name_attr,$value_attr,$frame=-1)
	{
               	return $this->z_add_attribute_by_number($number,$name_attr,$value_attr,$frame);
	}
		function add_attribute_by_name($name,$name_attr,$value_attr,$frame=-1)
	{
               	return $this->z_add_attribute_by_name($name,$name_attr,$value_attr,$frame);
	}
		function add_attribute_by_inner_text($inner_text,$exactly,$name_atr,$value_atr,$frame=-1)
	{
		return $this->z_add_attribute_by_inner_text($inner_text,$exactly,$name_atr,$value_atr,$frame);
	}    
		function add_attribute_by_inner_html($inner_html,$exactly,$name_atr,$value_atr,$frame=-1)
	{
		return $this->z_add_attribute_by_inner_html($inner_html,$exactly,$name_atr,$value_atr,$frame);
	}    
		function add_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$value_atr,$frame=-1)
	{
		return $this->z_add_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$value_atr,$frame);
	}    

	        function set_attribute_by_number($number,$name_atr,$value_atr,$frame=-1)
        {
		return $this->z_set_attribute_by_number($number,$name_atr,$value_atr,$frame);
        }
	        function set_attribute_by_name($name,$name_atr,$value_atr,$frame=-1)
        {
		return $this->z_set_attribute_by_name($name,$name_atr,$value_atr,$frame);
        }
	        function set_attribute_by_inner_text($inner_text,$exactly,$name_atr,$value_atr,$frame=-1)
        {
		return $this->z_set_attribute_by_inner_text($inner_text,$exactly,$name_atr,$value_atr,$frame);
        }
	        function set_attribute_by_inner_html($inner_html,$exactly,$name_atr,$value_atr,$frame=-1)
        {
		return $this->z_set_attribute_by_inner_html($inner_html,$exactly,$name_atr,$value_atr,$frame);
        }
	        function set_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$value_atr,$frame=-1)
        {
		return $this->z_set_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$value_atr,$frame);
        }

		function remove_attribute_by_number($number,$name_atr,$frame=-1)
	{
		return $this->z_remove_attribute_by_number($number,$name_atr,$frame);
	}
		function remove_attribute_by_name($name,$name_atr,$frame=-1)
	{
		return $this->z_remove_attribute_by_name($name,$name_atr,$frame);
	}
		function remove_attribute_by_inner_text($inner_text,$exactly,$name_atr,$frame=-1)
	{               		
		return $this->z_remove_attribute_by_inner_text($inner_text,$exactly,$name_atr,$frame);
	}
		function remove_attribute_by_inner_html($inner_html,$exactly,$name_atr,$frame=-1)
	{
		return $this->z_remove_attribute_by_inner_html($inner_html,$exactly,$name_atr,$frame);
	}
		function remove_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$frame=-1)
	{
		return $this->z_remove_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$frame);
	}

	
		function screenshot_by_number($file_path,$number,$frame=-1,$as_gray=false)
	{
		return $this->z_screenshot_by_number($file_path,$number,$frame,$as_gray);
	}
  		function screenshot_by_name($file_path,$name,$frame=-1,$as_gray=false)
	{
		return $this->z_screenshot_by_name($file_path,$name,$frame,$as_gray);
	}
    		function screenshot_by_src($file_path,$src,$exactly=true,$frame=-1,$as_gray=false)
	{
		return $this->z_screenshot_by_src($file_path,$src,$exactly,$frame,$as_gray);
	}
    		function screenshot_by_attribute($file_path,$atr_name,$atr_value,$exactly=true,$frame=-1,$as_gray=false)
	{
		return $this->z_screenshot_by_attribute($file_path,$atr_name,$atr_value,$exactly,$frame,$as_gray);
	}

	
                function is_exist_by_number($number,$frame=-1)
        {
		return $this->z_is_exist_by_number($number,$frame);
        }
                function is_exist_by_name($name,$frame=-1)
        {
		return $this->z_is_exist_by_name($name,$frame);
        }
                function is_exist_by_id($id,$exactly=true,$frame=-1)
        {
		return $this->z_is_exist_by_id($id,$exactly,$frame);
        }
		function is_exist_by_href($href,$exactly=true,$frame=-1)
	{
		return $this->z_is_exist_by_href($href,$exactly,$frame);
	}	
		function is_exist_by_alt($alt,$exactly=true,$frame=-1)
	{
		return $this->z_is_exist_by_alt($alt,$exactly,$frame);
	}	
		function is_exist_by_src($src,$exactly=true,$frame=-1)
	{
		return $this->z_is_exist_by_src($src,$exactly,$frame);
	}	
		function is_exist_by_inner_text($inner_text,$exactly=true,$frame=-1)
	{
		return $this->z_is_exist_by_inner_text($inner_text,$exactly,$frame);
	}	
		function is_exist_by_inner_html($inner_html,$exactly=true,$frame=-1)
	{
		return $this->z_is_exist_by_inner_html($inner_html,$exactly,$frame);
	}	
		function is_exist_by_attribute($atr_name,$atr_value,$exactly=true,$frame=-1)
	{
		return $this->z_is_exist_by_attribute($atr_name,$atr_value,$exactly,$frame);
	}	
		function is_exist_by_xpath($xpath)
	{
		return $this->z_is_exist_by_xpath($xpath);
	}	

		function is_exist_by_attribute_by_form_number($atr_name,$atr_value,$exactly,$form_number,$frame=-1)
	{
		return $this->z_is_exist_by_attribute_by_form_number($atr_name,$atr_value,$exactly,$form_number,$frame);
	}	
		function is_exist_by_attribute_by_form_name($atr_name,$atr_value,$exactly,$form_name,$frame=-1)
	{
		return $this->z_is_exist_by_attribute_by_form_name($atr_name,$atr_value,$exactly,$form_name,$frame);
	}	

	
   		function get_number_by_name($name,$frame=-1)
	{
		return $this->z_get_number_by_name($name,$frame);
	}
   		function get_number_by_id($id,$frame=-1)
	{
		return $this->z_get_number_by_id($id,$frame);
	}
		function get_number_by_src($src,$exactly=true,$frame=-1)
	{
		return $this->z_get_number_by_src($src,$exactly,$frame);
	}
		function get_number_by_href($href,$exactly=true,$frame=-1)
	{
		return $this->z_get_number_by_href($href,$exactly,$frame);
	}
   		function get_number_by_inner_text($innertext,$exactly=true,$frame=-1)
	{
		return $this->z_get_number_by_inner_text($innertext,$exactly,$frame);
	}
   		function get_number_by_inner_html($innerhtml,$exactly=true,$frame=-1)
	{
		return $this->z_get_number_by_inner_html($innerhtml,$exactly,$frame);
	}
                function get_number_by_attribute($atr_name,$atr_value,$exactly=true,$frame=-1)
        {
		return $this->z_get_number_by_attribute($atr_name,$atr_value,$exactly,$frame);
        }

		function get_name_by_number($number,$frame=-1)
	{
		return $this->z_get_name_by_number($number,$frame);
	}

                function get_attribute_by_number($number,$name_atr,$frame=-1)
        {
		return $this->z_get_attribute_by_number($number,$name_atr,$frame);
        }
                function get_attribute_by_name($name,$name_atr,$frame=-1)
        {
		return $this->z_get_attribute_by_name($name,$name_atr,$frame);
        }
                function get_attribute_by_src($src,$exactly,$name_atr,$frame=-1)
        {
               return $this->z_get_attribute_by_src($src,$exactly,$name_atr,$frame);
        }
                function get_attribute_by_inner_text($inner_text,$exactly,$name_atr,$frame=-1)
        {
               return $this->z_get_attribute_by_inner_text($inner_text,$exactly,$name_atr,$frame);
        }
                function get_attribute_by_inner_html($inner_html,$exactly,$name_atr,$frame=-1)
        {
               return $this->z_get_attribute_by_inner_html($inner_html,$exactly,$name_atr,$frame);
        }
                function get_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$frame=-1)
        {
	       return $this->z_get_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$frame); 
        }

	
        	function get_value_by_number($number,$frame=-1)
	{
		return $this->z_get_value_by_number($number,$frame);
	}	
                function get_value_by_name($name,$frame=-1)
        {
		return $this->z_get_value_by_name($name,$frame);
        }
                function get_value_by_attribute($atr_name,$atr_value,$exactly=true,$frame=-1)
        {		
		return $this->z_get_value_by_attribute($atr_name,$atr_value,$exactly,$frame);
        }

   		function get_src_by_number($number,$frame=-1)
	{
		return $this->z_get_src_by_number($number,$frame);
	}
    		function get_src_by_name($name,$frame=-1)
	{
		return $this->z_get_src_by_name($name,$frame);
	}

		function get_alt_by_number($number,$frame=-1)
	{
		return $this->z_get_alt_by_number($number,$frame);
	}
		function get_alt_by_name($name,$frame=-1)
	{
		return $this->z_get_alt_by_name($name,$frame);
	}

		function get_href_by_number($number,$frame=-1)
	{
		return $this->z_get_href_by_number($number,$frame);
	}
        	function get_href_by_name($name,$frame=-1)
	{
		return $this->z_get_href_by_name($name,$frame);
	}
        	function get_href_by_inner_text($inner_text,$exactly=true,$frame=-1)
	{
		return $this->z_get_href_by_inner_text($inner_text,$exactly,$frame);
	}

	
		function get_inner_text_by_number($number,$frame=-1)
	{
		return $this->z_get_inner_text_by_number($number,$frame);
	}
		function get_inner_text_by_name($name,$frame=-1)
	{
		return $this->z_get_inner_text_by_name($name,$frame);
	}
                function get_inner_text_by_id($id,$frame=-1)
        {
		return $this->z_get_inner_text_by_id($id,$frame);
        }
		function get_inner_text_by_href($href,$exactly=true,$frame=-1)
	{
		return $this->z_get_inner_text_by_href($href,$exactly,$frame);
	}
		function get_inner_text_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
	{
		return $this->z_get_inner_text_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}

                function get_inner_html_by_number($number,$frame=-1)
        {
		return $this->z_get_inner_html_by_number($number,$frame);
        }
                function get_inner_html_by_name($name,$frame=-1)
        {
                return $this->z_get_inner_html_by_name($name,$frame);
        }
                function get_inner_html_by_id($id,$frame=-1)
        {
		return $this->z_get_inner_html_by_id($id,$frame);
        }
        	function get_inner_html_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
        {
		return $this->z_get_inner_html_by_attribute($attr_name,$attr_value,$exactly,$frame);
        }

	
                function is_disabled_by_number($number,$frame=-1)
        {
               return $this->z_is_disabled_by_number($number,$frame);
        }
                function is_disabled_by_name($name,$frame=-1)
        {
               return $this->z_is_disabled_by_name($name,$frame); 
        }

                function get_all_attributes_by_number($number,$frame=-1)
        {
               return $this->z_get_all_attributes_by_number($number,$frame);
        }
                function get_all_attributes_by_name($name,$frame=-1)
        {
               return $this->z_get_all_attributes_by_name($name,$frame);
        }
	        function get_all_attributes_by_src($src,$exactly="true",$frame=-1)
        {
               return $this->z_get_all_attributes_by_src($src,$exactly,$frame);
        }

                function get_all_attributes_values_by_number($number,$frame=-1)
        {
		return $this->z_get_all_attributes_values_by_number($number,$frame);
        }
                function get_all_attributes_values_by_name($name,$frame=-1)
        {
		return $this->z_get_all_attributes_values_by_name($name,$frame);
        }
                function get_all_attributes_values_by_src($src,$exactly=true,$frame=-1)
        {
		return $this->z_get_all_attributes_values_by_src($src,$exactly,$frame);
        }

                function get_all_events_by_number($number,$frame=-1)
        {
		return $this->z_get_all_events_by_number($number,$frame);
        }
                function get_all_events_by_name($name,$frame=-1)
        {
		return $this->z_get_all_events_by_name($name,$frame);
        }
	        function get_all_events_by_src($src,$exactly=true,$frame=-1)
        {
		return $this->z_get_all_events_by_src($src,$exactly,$frame);
        }

   		function get_numbers_child_by_number($number,$element_type="",$frame=-1,$include_subchildren=false)
	{
		return $this->z_get_numbers_child_by_number($number,$element_type,$frame,$include_subchildren);
	}
   		function get_numbers_child_by_name($name,$element_type="",$frame=-1,$include_subchildren=false)
	{
		return $this->z_get_numbers_child_by_name($name,$element_type,$frame,$include_subchildren);
	}
   		function get_numbers_child_by_id($id,$element_type="",$frame=-1,$include_subchildren=false)
	{
		return $this->z_get_numbers_child_by_id($id,$element_type,$frame,$include_subchildren);
	}
   		function get_numbers_child_by_attribute($attr_name,$attr_value,$exactly=true,$element_type="",$frame=-1,$include_subchildren=false)
	{
		return $this->z_get_numbers_child_by_attribute($attr_name,$attr_value,$exactly,$element_type,$frame,$include_subchildren);
	}

	
		function get_x_by_number($number,$frame=-1)
	{
        	return $this->z_get_x_by_number($number,$frame);
	}
        	function get_x_by_name($name,$frame=-1)
	{
		return $this->z_get_x_by_name($name,$frame);
	}
		function get_x_by_href($href,$exactly=true,$frame=-1)
	{
		return $this->z_get_x_by_href($href,$exactly,$frame);
	}	
		function get_x_by_inner_text($inner_text,$exactly=true,$frame=-1)
	{
		return $this->z_get_x_by_inner_text($inner_text,$exactly,$frame);
	}
                function get_x_by_inner_html($inner_html,$exactly=true,$frame=-1)
        {
		return $this->z_get_x_by_inner_html($inner_html,$exactly,$frame);
        }
		function get_x_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
	{
		return $this->z_get_x_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}

		function get_y_by_number($number,$frame=-1)
	{
        	return $this->z_get_y_by_number($number,$frame);
	}
        	function get_y_by_name($name,$frame=-1)
	{
		return $this->z_get_y_by_name($name,$frame);
	}
		function get_y_by_href($href,$exactly=true,$frame=-1)
	{
		return $this->z_get_y_by_href($href,$exactly,$frame);
	}	
		function get_y_by_inner_text($inner_text,$exactly=true,$frame=-1)
	{
		return $this->z_get_y_by_inner_text($inner_text,$exactly,$frame);
	}
                function get_y_by_inner_html($inner_html,$exactly=true,$frame=-1)
        {
		return $this->z_get_y_by_inner_html($inner_html,$exactly,$frame);
        }
		function get_y_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
	{
		return $this->z_get_y_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}	

	
		function get_width_by_number($number,$frame=-1)
	{
		return $this->z_get_width_by_number($number,$frame);
	}
                function get_width_by_name($name,$frame=-1)
        {
                return $this->z_get_width_by_name($name,$frame);
        }
                function get_width_by_src($src,$exactly=true,$frame=-1)
        {
                return $this->z_get_width_by_src($src,$exactly,$frame);
        }
                function get_width_by_href($href,$exactly=true,$frame=-1)
        {
                return $this->z_get_width_by_href($href,$exactly,$frame);
        }
                function get_width_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
        {
                return $this->z_get_width_by_attribute($attr_name,$attr_value,$exactly,$frame);
        }

		function get_height_by_number($number,$frame=-1)
	{
		return $this->z_get_height_by_number($number,$frame);
	}
                function get_height_by_name($name,$frame=-1)
        {
                return $this->z_get_height_by_name($name,$frame);
        }
                function get_height_by_src($src,$exactly=true,$frame=-1)
        {
                return $this->z_get_height_by_src($src,$exactly,$frame);
        }
                function get_height_by_href($href,$exactly=true,$frame=-1)
        {
                return $this->z_get_height_by_href($href,$exactly,$frame);
        }
                function get_height_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
        {
                return $this->z_get_height_by_attribute($attr_name,$attr_value,$exactly,$frame);
        }

        
        	function send_keyboard_input_by_number($number,$string,$timeout=INPUT_TIME,$frame=-1)
	{
		return $this->z_send_keyboard_input_by_number($number,$string,$timeout,$frame);
	}
        	function send_keyboard_input_by_name($name,$string,$timeout=INPUT_TIME,$frame=-1)
	{
		return $this->z_send_keyboard_input_by_name($name,$string,$timeout,$frame);
	}
        	function send_keyboard_input_by_inner_text($inner_text,$exactly,$string,$timeout=INPUT_TIME,$frame=-1)
	{
		return $this->z_send_keyboard_input_by_inner_text($inner_text,$exactly,$string,$timeout,$frame);
	}
        	function send_keyboard_input_by_inner_html($inner_html,$exactly,$string,$timeout=INPUT_TIME,$frame=-1)
	{
		return $this->z_send_keyboard_input_by_inner_html($inner_html,$exactly,$string,$timeout,$frame);
	}
        	function send_keyboard_input_by_attribute($attr_name,$attr_value,$exactly,$string,$timeout=INPUT_TIME,$frame=-1)
	{
		return $this->z_send_keyboard_input_by_attribute($attr_name,$attr_value,$exactly,$string,$timeout,$frame);
	}

	
		function get_count($frame=-1)
	{
		return $this->z_get_count($frame);
	}
		function get_count_by_attribute($attr_name,$attr_value,$exactly,$frame=-1)
	{
		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}

		function get_all_numbers_by_inner_text($text,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_numbers_by_inner_text($text,$exactly,$frame);
	}	
		function get_all_numbers_by_inner_html($html,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_numbers_by_inner_html($html,$exactly,$frame);
	}	
		function get_all_numbers_by_attribute($attr_name,$attr_value,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_numbers_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}	

		function get_all_inner_texts($separator="<br>",$text_filter="",$frame=-1)
	{
		return $this->z_get_all_inner_texts($separator,$text_filter,$frame);
	}	
		function get_all_inner_texts_by_attribute($attr_name,$attr_value,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_inner_texts_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}	

		function get_all_inner_htmls_by_inner_text($text,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_inner_htmls_by_inner_text($text,$exactly,$frame);
	}	
		function get_all_inner_htmls_by_attribute($attr_name,$attr_value,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_inner_htmls_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}	

		function get_all_attributes_by_inner_text($attr_name_need,$text,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_attributes_by_inner_text($attr_name_need,$text,$exactly,$frame);
	}	
		function get_all_attributes_by_attribute($attr_name_need,$attr_name,$attr_value,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_attributes_by_attribute($attr_name_need,$attr_name,$attr_value,$exactly,$frame);
	}	

	
		function get_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_by_name($name,$frame=-1)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_by_inner_text($inner_text,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_by_inner_html($inner_html,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_inner_html($inner_html,$exactly,$frame);

		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_by_outer_text($outer_text,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_outer_text($outer_text,$exactly,$frame);

		$params = array( "outer_text" => $outer_text , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_by_outer_html($outer_html,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_outer_html($outer_html,$exactly,$frame);

		$params = array( "outer_html" => $outer_html , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_by_id($id,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_attribute("id",$id,$exactly,$frame);

		$params = array( "id" => $id , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_by_src($src,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_attribute("src",$src,$exactly,$frame);

		$params = array( "src" => $src , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_by_href($href,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_attribute("href",$href,$exactly,$frame);

		$params = array( "href" => $href , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_by_alt($alt,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_attribute("alt",$alt,$exactly,$frame);

		$params = array( "alt" => $alt , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_by_value($value,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_attribute("value",$value,$exactly,$frame);

		$params = array( "value" => $value , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_by_properties($properties,$frame=-1)
	{
		
		$params = array( "properties" => $properties , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_by_xpath($xpath)
	{
		$this->wait_element_exist_by_xpath($xpath);

		$params = array( "xpath" => $xpath );
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
                function get_all($frame=-1)
        {
		$params = array( "frame" => $frame );
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
        }

        	function get_all_by_number($numbers,$frame=-1)
	{
		$params = array( "numbers" => $numbers , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        	function get_all_by_inner_text($inner_text,$exactly=false,$frame=-1)
	{
		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        	function get_all_by_inner_html($inner_html,$exactly=false,$frame=-1)
	{
		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        	function get_all_by_outer_text($outer_text,$exactly=false,$frame=-1)
	{
		$params = array( "outer_text" => $outer_text , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        	function get_all_by_outer_html($outer_html,$exactly=false,$frame=-1)
	{
		$params = array( "outer_html" => $outer_html , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        	function get_all_by_name($name,$exactly=false,$frame=-1)
	{
		$params = array( "name" => $name , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        	function get_all_by_id($id,$exactly=false,$frame=-1)
	{
		$params = array( "id" => $id , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        	function get_all_by_src($src,$exactly=false,$frame=-1)
	{
		$params = array( "src" => $src , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        	function get_all_by_href($href,$exactly=false,$frame=-1)
	{
		$params = array( "href" => $href , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        	function get_all_by_alt($alt,$exactly=false,$frame=-1)
	{
		$params = array( "alt" => $alt , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
                function get_all_by_value($value,$exactly=false,$frame=-1)
        {
		$params = array( "value" => $value , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
        }
                function get_all_by_attribute($attr_name,$attr_value,$exactly=false,$frame=-1)
        {
		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
        }
		function get_all_by_xpath($xpath)
	{
		$params = array( "xpath" => $xpath );
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
                function get_all_by_properties($properties,$frame=-1)
        {
		$params = array( "properties" => $properties , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
        }
		function run_js_by_number($number,$js,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "js" => $js , "frame" => $frame);
		return  $this->call_get(__FUNCTION__,$params);
	}
		function run_js_by_attribute($attr_name,$attr_value,$exactly,$js,$frame=-1)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "js" => $js , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
};
?>