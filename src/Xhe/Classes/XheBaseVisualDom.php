<?php
namespace Xhe;

class XheBaseVisualDom extends XheBaseDom
{     
	/////////////////////////////////////// SERVICE /////////////////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->prefix = "-bvd-";
		return XheBaseDom($server,$password);
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// check and wait element exist by number
	function wait_element_exist_by_number($number,$frame=-1)
	{
		return $this->z_wait_element_exist_by_number($number,$frame);
	}
	// check and wait element exist by name
	function wait_element_exist_by_name($name,$frame=-1)
	{
		return $this->z_wait_element_exist_by_name($name,$frame);
	}
	// check and wait element exist by id
	function wait_element_exist_by_id($id,$exactly=1,$frame=-1)
	{
		return $this->z_wait_element_exist_by_id($id,$exactly,$frame);
	}
	// check and wait element exist by inner text
	function wait_element_exist_by_inner_text($inner_text,$exactly=1,$frame=-1)
	{
		return $this->z_wait_element_exist_by_inner_text($inner_text,$exactly,$frame);
	}
	// check and wait element exist by inner html
	function wait_element_exist_by_inner_html($inner_html,$exactly=1,$frame=-1)
	{
		return $this->z_wait_element_exist_by_inner_html($inner_html,$exactly,$frame);
	}
	// check and wait element exist by outer text
	function wait_element_exist_by_outer_text($outer_text,$exactly=1,$frame=-1)
	{
		return $this->z_wait_element_exist_by_outer_text($outer_text,$exactly,$frame);
	}
	// check and wait element exist by outer html
	function wait_element_exist_by_outer_html($outer_html,$exactly=1,$frame=-1)
	{
		return $this->z_wait_element_exist_by_outer_html($outer_html,$exactly,$frame);
	}
	// check and wait element exist by attribute
	function wait_element_exist_by_attribute($attr_name,$attr_value,$exactly=1,$frame=-1)
	{
		return $this->z_wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}
	// check and wait element exist by xpath
	function wait_element_exist_by_xpath($xpath)
	{
		return $this->z_wait_element_exist_by_xpath($xpath);
	}
	// check and wait element exist by attribute in form by name
	function wait_element_exist_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame=-1)
	{
		return $this->z_wait_element_exist_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame);
	}
	// check and wait element exist by attribute in form by number
	function wait_element_exist_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame=-1)
	{
		return $this->z_wait_element_exist_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame);
	}


        /////////////////////////////////////////////////////////////////////////////////////////////////////

	// щелкнуть по элементу, используя его номер
	function click_by_number($number,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_number($number,$frame,$wait_browser);
	}
        // щелкнуть по элементу, используя его имя 
	function click_by_name($name,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_name($name,$frame,$wait_browser);
	}
   	// щелкнуть по элементу, используя его id
	function click_by_id($id,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_id($id,$exactly,$frame,$wait_browser);
	}
   	// щелкнуть по элементу, используя его value
	function click_by_value($value,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_value($value,$exactly,$frame,$wait_browser);
	}
   	// щелкнуть по элементу, используя его alt
	function click_by_alt($alt,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_alt($alt,$exactly,$frame,$wait_browser);
	}
   	// щелкнуть по элементу, используя его src
	function click_by_src($src,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_src($src,$exactly,$frame,$wait_browser);
	}
   	// щелкнуть по элементу, используя его href
	function click_by_href($url,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_href($url,$exactly,$frame,$wait_browser);
	}	
   	// щелкнуть по элементу, используя его внутренний текст
	function click_by_inner_text($text,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_inner_text($text,$exactly,$frame,$wait_browser);
	}
   	// щелкнуть по элементу, используя его внутренний html
	function click_by_inner_html($inner_html,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_inner_html($inner_html,$exactly,$frame,$wait_browser);
	}
   	// щелкнуть по элементу, используя значение его атрибута
	function click_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_attribute($attr_name,$attr_value,$exactly,$frame,$wait_browser);
	}	

   	// щелкнуть по элементу, используя его номер в форме с заданным номером
	function click_by_number_by_form_number($number,$form_number,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_number_by_form_number($number,$form_number,$frame,$wait_browser);
	}
   	// щелкнуть по элементу, используя его имя в форме с заданным номером
	function click_by_name_by_form_number($name,$form_number,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_name_by_form_number($name,$form_number,$frame,$wait_browser);
	}
   	// щелкнуть по элементу, используя значение его атрибута в форме с заданным номером 
	function click_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame,$wait_browser);
	}

   	// щелкнуть по элементу, используя его номер в форме с заданным именем
	function click_by_number_by_form_name($number,$form_name,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_number_by_form_name($number,$form_name,$frame,$wait_browser);
	}
   	// щелкнуть по элементу, используя его имя в форме с заданным именем
	function click_by_name_by_form_name($name,$form_name,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_name_by_form_name($name,$form_name,$frame,$wait_browser);
	}
   	// щелкнуть по элементу, используя его значение атрибута в форме с заданным именем
	function click_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame=-1,$wait_browser=true)
	{
		return $this->z_click_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame,$wait_browser);
	}

        // щелкнуть по случайному элементу
	function click_random($frame=-1,$wait_browser=true)
	{
		return $this->z_click_random($frame,$wait_browser);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// послать событие элементу с заданным номером
	function send_event_by_number($number,$event,$frame=-1,$wait_browser=true)
	{
		return $this->z_send_event_by_number($number,$event,$frame,$wait_browser);
	}
	// послать событие элементу с заданным именем
	function send_event_by_name($name,$event,$frame=-1,$wait_browser=true)
	{
		return $this->z_send_event_by_name($name,$event,$frame,$wait_browser);
	}
	// послать событие элементу с заданным id
	function send_event_by_id($id,$exactly,$event,$frame=-1,$wait_browser=true)
	{
		return $this->z_send_event_by_id($id,$exactly,$event,$frame,$wait_browser);
	}
	// послать событие элементу с заданным href
	function send_event_by_href($url,$exactly,$event,$frame=-1,$wait_browser=true)
	{
		return $this->z_send_event_by_href($url,$exactly,$event,$frame,$wait_browser);
	}
	// послать событие элементу с заданным внутренним текстом
	function send_event_by_inner_text($text,$exactly,$event,$frame=-1,$wait_browser=true)
	{
		return $this->z_send_event_by_inner_text($text,$exactly,$event,$frame,$wait_browser);
	}
	// послать событие элементу с заданным внутренним html
	function send_event_by_inner_html($html,$exactly,$event,$frame=-1,$wait_browser=true)
	{
		return $this->z_send_event_by_inner_html($html,$exactly,$event,$frame,$wait_browser);
	}
	// послать событие элементу с заданным внутренним значением атрибута
	function send_event_by_attribute($atr_name,$atr_value,$exactly,$event,$frame=-1,$wait_browser=true)
	{
		return $this->z_send_event_by_attribute($atr_name,$atr_value,$exactly,$event,$frame,$wait_browser);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// задать фокус по номеру
	function set_focus_by_number($number,$frame=-1)
	{
		return $this->z_set_focus_by_number($number,$frame);
	}
   	// задать фокус по имени
	function set_focus_by_name($name,$frame=-1)
	{
		return $this->z_set_focus_by_name($name,$frame);
	}
   	// задать фокус по href
	function set_focus_by_href($href,$exactly=true,$frame=-1)
	{
		return $this->z_set_focus_by_href($href,$exactly,$frame);
	}
   	// задать фокус по внутреннему тексту
	function set_focus_by_inner_text($inner_text,$exactly=true,$frame=-1)
	{
		return $this->z_set_focus_by_inner_text($inner_text,$exactly,$frame);
	}
   	// задать фокус по внутреннему html
	function set_focus_by_inner_html($inner_html,$exactly=true,$frame=-1)
	{
		return $this->z_set_focus_by_inner_html($inner_html,$exactly,$frame);
	}
   	// задать фокус по значению атрибута
	function set_focus_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
	{
		return $this->z_set_focus_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // задать значение по номеру
        function set_value_by_number($number,$value,$frame=-1)
        {
		return $this->z_set_value_by_number($number,$value,$frame);
        }
        // задать значение по имени
        function set_value_by_name($name,$value,$frame=-1)
        {
		return $this->z_set_value_by_name($name,$value,$frame);
        }
        // задать значение по значению атрибута
        function set_value_by_attribute($attr_name,$attr_value,$exactly,$value,$frame=-1)
        {
		return $this->z_set_value_by_attribute($attr_name,$attr_value,$exactly,$value,$frame);
        }

        // задать значение по номеру в форме с заданным номером
        function set_value_by_number_by_form_number($number,$value,$form_number,$frame=-1)
        {
		return $this->z_set_value_by_number_by_form_number($number,$value,$form_number,$frame);
        }
        // задать значение по имени в форме с заданным номером
        function set_value_by_name_by_form_number($name,$value,$form_number,$frame=-1)
        {
		return $this->z_set_value_by_name_by_form_number($name,$value,$form_number,$frame);
        }
        // задать значение по значению атрибута в форме с заданным номером
        function set_value_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$value,$form_number,$frame=-1)
        {
		return $this->z_set_value_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$value,$form_number,$frame);
        }

        // задать значение по номеру в форме с заданным именем
        function set_value_by_number_by_form_name($number,$value,$form_name,$frame=-1)
        {
		return $this->z_set_value_by_number_by_form_name($number,$value,$form_name,$frame);
        }
        // задать значение по имени в форме с заданным именем
        function set_value_by_name_by_form_name($name,$value,$form_name,$frame=-1)
        {
		return $this->z_set_value_by_name_by_form_name($name,$value,$form_name,$frame);
        }
        // задать значение по значению атрибута в форме с заданным именем
        function set_value_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$value,$form_name,$frame=-1)
        {
		return $this->z_set_value_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$value,$form_name,$frame);
        }

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // задать внутренний текст по номеру
	function set_inner_text_by_number($number,$text,$frame=-1)
	{
		 return $this->z_set_inner_text_by_number($number,$text,$frame);
	}	
        // задать внутренний текст по имени
	function set_inner_text_by_name($name,$text,$frame=-1)
	{
	         return $this->z_set_inner_text_by_name($name,$text,$frame);
	}
        // задать внутренний текст по значению атрибута
	function set_inner_text_by_attribute($attr_name,$attr_value,$exactly,$text,$frame=-1)
	{
		if ($text===false || $text===true )
	        	return $this->z_set_inner_text_by_attribute($attr_name,$attr_value,$text,$exactly,$frame); // ��� ������� � �������� ���������� - �������
		else
	        	return $this->z_set_inner_text_by_attribute($attr_name,$attr_value,$exactly,$text,$frame);
	}

        // задать внутренний html по номеру
	function set_inner_html_by_number($number,$html,$frame=-1)
	{
		return $this->z_set_inner_html_by_number($number,$html,$frame);
	}	
        // задать внутренний html по имени
	function set_inner_html_by_name($name,$html,$frame=-1)
	{
		return $this->z_set_inner_html_by_name($name,$html,$frame);
	}
        // задать внутренний html по значению атрибута
	function set_inner_html_by_attribute($attr_name,$attr_value,$html,$exactly=true,$frame=-1)
	{
		return $this->z_set_inner_html_by_attribute($attr_name,$attr_value,$html,$exactly,$frame);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // добавить атрибут к элементу с заданным номером
	function add_attribute_by_number($number,$name_attr,$value_attr,$frame=-1)
	{
               	return $this->z_add_attribute_by_number($number,$name_attr,$value_attr,$frame);
	}
	// добавить атрибут к элементу с заданным именем
	function add_attribute_by_name($name,$name_attr,$value_attr,$frame=-1)
	{
               	return $this->z_add_attribute_by_name($name,$name_attr,$value_attr,$frame);
	}
	// добавить атрибут к элементу с заданным внутренним текстом
	function add_attribute_by_inner_text($inner_text,$exactly,$name_atr,$value_atr,$frame=-1)
	{
		return $this->z_add_attribute_by_inner_text($inner_text,$exactly,$name_atr,$value_atr,$frame);
	}    
	// добавить атрибут к элементу с заданным внутренним html
	function add_attribute_by_inner_html($inner_html,$exactly,$name_atr,$value_atr,$frame=-1)
	{
		return $this->z_add_attribute_by_inner_html($inner_html,$exactly,$name_atr,$value_atr,$frame);
	}    
	// добавить атрибут к элементу с заданным значением атрибута
	function add_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$value_atr,$frame=-1)
	{
		return $this->z_add_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$value_atr,$frame);
	}    

	// задать атрибут у элемента с заданным номером
        function set_attribute_by_number($number,$name_atr,$value_atr,$frame=-1)
        {
		return $this->z_set_attribute_by_number($number,$name_atr,$value_atr,$frame);
        }
	// задать атрибут у элемента с заданным именем
        function set_attribute_by_name($name,$name_atr,$value_atr,$frame=-1)
        {
		return $this->z_set_attribute_by_name($name,$name_atr,$value_atr,$frame);
        }
	// задать атрибут у элемента с заданным внутренним текстом
        function set_attribute_by_inner_text($inner_text,$exactly,$name_atr,$value_atr,$frame=-1)
        {
		return $this->z_set_attribute_by_inner_text($inner_text,$exactly,$name_atr,$value_atr,$frame);
        }
	// задать атрибут у элемента с заданным внутренним html
        function set_attribute_by_inner_html($inner_html,$exactly,$name_atr,$value_atr,$frame=-1)
        {
		return $this->z_set_attribute_by_inner_html($inner_html,$exactly,$name_atr,$value_atr,$frame);
        }
	// задать атрибут у элемента с заданным значением атрибута
        function set_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$value_atr,$frame=-1)
        {
		return $this->z_set_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$value_atr,$frame);
        }

	// удалить атрибут у элемента с заданным номером
	function remove_attribute_by_number($number,$name_atr,$frame=-1)
	{
		return $this->z_remove_attribute_by_number($number,$name_atr,$frame);
	}
	// удалить атрибут у элемента с заданным именем
	function remove_attribute_by_name($name,$name_atr,$frame=-1)
	{
		return $this->z_remove_attribute_by_name($name,$name_atr,$frame);
	}
	// удалить атрибут у элемента с заданным inner text
	function remove_attribute_by_inner_text($inner_text,$exactly,$name_atr,$frame=-1)
	{               		
		return $this->z_remove_attribute_by_inner_text($inner_text,$exactly,$name_atr,$frame);
	}
	// удалить атрибут у элемента с заданным inner html
	function remove_attribute_by_inner_html($inner_html,$exactly,$name_atr,$frame=-1)
	{
		return $this->z_remove_attribute_by_inner_html($inner_html,$exactly,$name_atr,$frame);
	}
	// удалить атрибут у элемента с заданным значением атрибута
	function remove_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$frame=-1)
	{
		return $this->z_remove_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$frame);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// сделеть скриншот элемента с заданным номером
	function screenshot_by_number($file_path,$number,$frame=-1,$as_gray=false)
	{
		return $this->z_screenshot_by_number($file_path,$number,$frame,$as_gray);
	}
	// сделеть скриншот элемента с заданным именем
	function screenshot_by_name($file_path,$name,$frame=-1,$as_gray=false)
	{
		return $this->z_screenshot_by_name($file_path,$name,$frame,$as_gray);
	}
	// сделеть скриншот элемента с заданным src
	function screenshot_by_src($file_path,$src,$exactly=true,$frame=-1,$as_gray=false)
	{
		return $this->z_screenshot_by_src($file_path,$src,$exactly,$frame,$as_gray);
	}
	// сделеть скриншот элемента с заданным значением атрибута
	function screenshot_by_attribute($file_path,$atr_name,$atr_value,$exactly=true,$frame=-1,$as_gray=false)
	{
		return $this->z_screenshot_by_attribute($file_path,$atr_name,$atr_value,$exactly,$frame,$as_gray);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// проверить существование элемента с заданным номером
        function is_exist_by_number($number,$frame=-1)
        {
		return $this->z_is_exist_by_number($number,$frame);
        }
	// проверить существование элемента с заданным именем
        function is_exist_by_name($name,$frame=-1)
        {
		return $this->z_is_exist_by_name($name,$frame);
        }
        // ���������, ���� �� ������� � �������� id
        function is_exist_by_id($id,$exactly=true,$frame=-1)
        {
		return $this->z_is_exist_by_id($id,$exactly,$frame);
        }
	// проверить существование элемента с заданным href
	function is_exist_by_href($href,$exactly=true,$frame=-1)
	{
		return $this->z_is_exist_by_href($href,$exactly,$frame);
	}	
	// проверить существование элемента с заданным alt
	function is_exist_by_alt($alt,$exactly=true,$frame=-1)
	{
		return $this->z_is_exist_by_alt($alt,$exactly,$frame);
	}	
	// проверить существование элемента с заданным src
	function is_exist_by_src($src,$exactly=true,$frame=-1)
	{
		return $this->z_is_exist_by_src($src,$exactly,$frame);
	}	
	// проверить существование элемента с заданным inner text
	function is_exist_by_inner_text($inner_text,$exactly=true,$frame=-1)
	{
		return $this->z_is_exist_by_inner_text($inner_text,$exactly,$frame);
	}	
	// проверить существование элемента с заданным inner html
	function is_exist_by_inner_html($inner_html,$exactly=true,$frame=-1)
	{
		return $this->z_is_exist_by_inner_html($inner_html,$exactly,$frame);
	}	
	// проверить существование элемента с заданным значением атрибута
	function is_exist_by_attribute($atr_name,$atr_value,$exactly=true,$frame=-1)
	{
		return $this->z_is_exist_by_attribute($atr_name,$atr_value,$exactly,$frame);
	}	
	// проверить существование элемента с заданным xpath
	function is_exist_by_xpath($xpath)
	{
		return $this->z_is_exist_by_xpath($xpath);
	}	

	// проверить существование элемента с заданным значением атрибута в форме с заданным номером
	function is_exist_by_attribute_by_form_number($atr_name,$atr_value,$exactly,$form_number,$frame=-1)
	{
		return $this->z_is_exist_by_attribute_by_form_number($atr_name,$atr_value,$exactly,$form_number,$frame);
	}	
	// проверить существование элемента с заданным значением атрибута в форме с заданным именем
	function is_exist_by_attribute_by_form_name($atr_name,$atr_value,$exactly,$form_name,$frame=-1)
	{
		return $this->z_is_exist_by_attribute_by_form_name($atr_name,$atr_value,$exactly,$form_name,$frame);
	}	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

   	// получить номер элемента с заданным именем
	function get_number_by_name($name,$frame=-1)
	{
		return $this->z_get_number_by_name($name,$frame);
	}
   	// получить номер элемента с заданным id
	function get_number_by_id($id,$frame=-1)
	{
		return $this->z_get_number_by_id($id,$frame);
	}
	// получить номер элемента с заданным src
	function get_number_by_src($src,$exactly=true,$frame=-1)
	{
		return $this->z_get_number_by_src($src,$exactly,$frame);
	}
	// получить номер элемента с заданным href
	function get_number_by_href($href,$exactly=true,$frame=-1)
	{
		return $this->z_get_number_by_href($href,$exactly,$frame);
	}
   	// получить номер элемента с заданным inner text
	function get_number_by_inner_text($innertext,$exactly=true,$frame=-1)
	{
		return $this->z_get_number_by_inner_text($innertext,$exactly,$frame);
	}
   	// получить номер элемента с заданным inner html
	function get_number_by_inner_html($innerhtml,$exactly=true,$frame=-1)
	{
		return $this->z_get_number_by_inner_html($innerhtml,$exactly,$frame);
	}
        // получить номер элемента с заданным значением атрибута
        function get_number_by_attribute($atr_name,$atr_value,$exactly=true,$frame=-1)
        {
		return $this->z_get_number_by_attribute($atr_name,$atr_value,$exactly,$frame);
        }

	// получить name у элемента с заданным номером
	function get_name_by_number($number,$frame=-1)
	{
		return $this->z_get_name_by_number($number,$frame);
	}

        // получить значение атрибута у элемента с заданным номером
        function get_attribute_by_number($number,$name_atr,$frame=-1)
        {
		return $this->z_get_attribute_by_number($number,$name_atr,$frame);
        }
        // получить значение атрибута у элемента с заданным name
        function get_attribute_by_name($name,$name_atr,$frame=-1)
        {
		return $this->z_get_attribute_by_name($name,$name_atr,$frame);
        }
        // получить значение атрибута у элемента с заданным src
        function get_attribute_by_src($src,$exactly,$name_atr,$frame=-1)
        {
               return $this->z_get_attribute_by_src($src,$exactly,$name_atr,$frame);
        }
        // получить значение атрибута у элемента с заданным inner text
        function get_attribute_by_inner_text($inner_text,$exactly,$name_atr,$frame=-1)
        {
               return $this->z_get_attribute_by_inner_text($inner_text,$exactly,$name_atr,$frame);
        }
        // получить значение атрибута у элемента с заданным inner html
        function get_attribute_by_inner_html($inner_html,$exactly,$name_atr,$frame=-1)
        {
               return $this->z_get_attribute_by_inner_html($inner_html,$exactly,$name_atr,$frame);
        }
        // получить значение атрибута у элемента с заданным значением атрибута
        function get_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$frame=-1)
        {
	       return $this->z_get_attribute_by_attribute($atr_name,$atr_value,$exactly,$name_atr,$frame); 
        }

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // получить value у элемента с заданным номером
	function get_value_by_number($number,$frame=-1)
	{
		return $this->z_get_value_by_number($number,$frame);
	}	
        // получить value у элемента с заданным именем
        function get_value_by_name($name,$frame=-1)
        {
		return $this->z_get_value_by_name($name,$frame);
        }
        // получить value у элемента с заданным значением атрибута
        function get_value_by_attribute($atr_name,$atr_value,$exactly=true,$frame=-1)
        {		
		return $this->z_get_value_by_attribute($atr_name,$atr_value,$exactly,$frame);
        }

   	// получить src у элемента с заданным номером
	function get_src_by_number($number,$frame=-1)
	{
		return $this->z_get_src_by_number($number,$frame);
	}
    	// получить src у элемента с заданным name
	function get_src_by_name($name,$frame=-1)
	{
		return $this->z_get_src_by_name($name,$frame);
	}

	// получить alt у элемента с заданным номером
	function get_alt_by_number($number,$frame=-1)
	{
		return $this->z_get_alt_by_number($number,$frame);
	}
	// получить alt у элемента с заданным name
	function get_alt_by_name($name,$frame=-1)
	{
		return $this->z_get_alt_by_name($name,$frame);
	}

	// получить href у элемента с заданным номером
	function get_href_by_number($number,$frame=-1)
	{
		return $this->z_get_href_by_number($number,$frame);
	}
        // получить href у элемента с заданным name
	function get_href_by_name($name,$frame=-1)
	{
		return $this->z_get_href_by_name($name,$frame);
	}
        // получить href у элемента с заданным внутренним текстом
	function get_href_by_inner_text($inner_text,$exactly=true,$frame=-1)
	{
		return $this->z_get_href_by_inner_text($inner_text,$exactly,$frame);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить inner text у элемента с заданным номером
	function get_inner_text_by_number($number,$frame=-1)
	{
		return $this->z_get_inner_text_by_number($number,$frame);
	}
	// получить inner text у элемента с заданным name
	function get_inner_text_by_name($name,$frame=-1)
	{
		return $this->z_get_inner_text_by_name($name,$frame);
	}
        // получить inner text у элемента с заданным id
        function get_inner_text_by_id($id,$frame=-1)
        {
		return $this->z_get_inner_text_by_id($id,$frame);
        }
	// получить inner text у элемента с заданным href
	function get_inner_text_by_href($href,$exactly=true,$frame=-1)
	{
		return $this->z_get_inner_text_by_href($href,$exactly,$frame);
	}
	// получить inner text у элемента с заданным значением атрибута
	function get_inner_text_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
	{
		return $this->z_get_inner_text_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}

        // получить inner html у элемента с заданным номером
        function get_inner_html_by_number($number,$frame=-1)
        {
		return $this->z_get_inner_html_by_number($number,$frame);
        }
        // получить inner html у элемента с заданным name
        function get_inner_html_by_name($name,$frame=-1)
        {
                return $this->z_get_inner_html_by_name($name,$frame);
        }
        // получить inner html у элемента с заданным id
        function get_inner_html_by_id($id,$frame=-1)
        {
		return $this->z_get_inner_html_by_id($id,$frame);
        }
        // получить inner html у элемента с заданным значением атрибута
	function get_inner_html_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
        {
		return $this->z_get_inner_html_by_attribute($attr_name,$attr_value,$exactly,$frame);
        }

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // проверить доступность элемента с заданным номером
        function is_disabled_by_number($number,$frame=-1)
        {
               return $this->z_is_disabled_by_number($number,$frame);
        }
        // проверить доступность элемента с заданным именем
        function is_disabled_by_name($name,$frame=-1)
        {
               return $this->z_is_disabled_by_name($name,$frame); 
        }

        // получить имена всех атрибутов у элемента с заданным номером
        function get_all_attributes_by_number($number,$frame=-1)
        {
               return $this->z_get_all_attributes_by_number($number,$frame);
        }
        // получить имена всех атрибутов у элемента с заданным name
        function get_all_attributes_by_name($name,$frame=-1)
        {
               return $this->z_get_all_attributes_by_name($name,$frame);
        }
	// получить имена всех атрибутов у элемента с заданным src
        function get_all_attributes_by_src($src,$exactly="true",$frame=-1)
        {
               return $this->z_get_all_attributes_by_src($src,$exactly,$frame);
        }

        // получить значения всех атрибутов у элемента с заданным номером
        function get_all_attributes_values_by_number($number,$frame=-1)
        {
		return $this->z_get_all_attributes_values_by_number($number,$frame);
        }
        // получить значения всех атрибутов у элемента с заданным name
        function get_all_attributes_values_by_name($name,$frame=-1)
        {
		return $this->z_get_all_attributes_values_by_name($name,$frame);
        }
        // получить значения всех атрибутов у элемента с заданным src
        function get_all_attributes_values_by_src($src,$exactly=true,$frame=-1)
        {
		return $this->z_get_all_attributes_values_by_src($src,$exactly,$frame);
        }

        // получить все события у элемента с заданным номером
        function get_all_events_by_number($number,$frame=-1)
        {
		return $this->z_get_all_events_by_number($number,$frame);
        }
        // получить все события у элемента с заданным name
        function get_all_events_by_name($name,$frame=-1)
        {
		return $this->z_get_all_events_by_name($name,$frame);
        }
	// получить все события у элемента с заданным src
        function get_all_events_by_src($src,$exactly=true,$frame=-1)
        {
		return $this->z_get_all_events_by_src($src,$exactly,$frame);
        }

   	// получить номера дочерних элементов у элемента с заданным номером
	function get_numbers_child_by_number($number,$element_type="",$frame=-1,$include_subchildren=false)
	{
		return $this->z_get_numbers_child_by_number($number,$element_type,$frame,$include_subchildren);
	}
   	// получить номера дочерних элементов у элемента с заданным name
	function get_numbers_child_by_name($name,$element_type="",$frame=-1,$include_subchildren=false)
	{
		return $this->z_get_numbers_child_by_name($name,$element_type,$frame,$include_subchildren);
	}
   	// получить номера дочерних элементов у элемента с заданным id
	function get_numbers_child_by_id($id,$element_type="",$frame=-1,$include_subchildren=false)
	{
		return $this->z_get_numbers_child_by_id($id,$element_type,$frame,$include_subchildren);
	}
   	// получить номера дочерних элементов у элемента с заданным значением атрибута
	function get_numbers_child_by_attribute($attr_name,$attr_value,$exactly=true,$element_type="",$frame=-1,$include_subchildren=false)
	{
		return $this->z_get_numbers_child_by_attribute($attr_name,$attr_value,$exactly,$element_type,$frame,$include_subchildren);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить X координату элемента с заданным номером
	function get_x_by_number($number,$frame=-1)
	{
        	return $this->z_get_x_by_number($number,$frame);
	}
        // получить X координату элемента с заданным name
	function get_x_by_name($name,$frame=-1)
	{
		return $this->z_get_x_by_name($name,$frame);
	}
	// получить X координату элемента с заданным href
	function get_x_by_href($href,$exactly=true,$frame=-1)
	{
		return $this->z_get_x_by_href($href,$exactly,$frame);
	}	
	// получить X координату элемента с заданным inner text
	function get_x_by_inner_text($inner_text,$exactly=true,$frame=-1)
	{
		return $this->z_get_x_by_inner_text($inner_text,$exactly,$frame);
	}
        // получить X координату элемента с заданным inner html
        function get_x_by_inner_html($inner_html,$exactly=true,$frame=-1)
        {
		return $this->z_get_x_by_inner_html($inner_html,$exactly,$frame);
        }
	// получить X координату элемента с заданным значением атрибута
	function get_x_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
	{
		return $this->z_get_x_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}

	// получить Y координату элемента с заданным номером
	function get_y_by_number($number,$frame=-1)
	{
        	return $this->z_get_y_by_number($number,$frame);
	}
        // получить Y координату элемента с заданным name
	function get_y_by_name($name,$frame=-1)
	{
		return $this->z_get_y_by_name($name,$frame);
	}
	// получить Y координату элемента с заданным href
	function get_y_by_href($href,$exactly=true,$frame=-1)
	{
		return $this->z_get_y_by_href($href,$exactly,$frame);
	}	
	// получить Y координату элемента с заданным inner text
	function get_y_by_inner_text($inner_text,$exactly=true,$frame=-1)
	{
		return $this->z_get_y_by_inner_text($inner_text,$exactly,$frame);
	}
        // получить Y координату элемента с заданным inner html
        function get_y_by_inner_html($inner_html,$exactly=true,$frame=-1)
        {
		return $this->z_get_y_by_inner_html($inner_html,$exactly,$frame);
        }
	// получить Y координату элемента с заданным значением атрибута
	function get_y_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
	{
		return $this->z_get_y_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}	

	//////////////////////////////////// GET SIZES /////////////////////////////////////////

	// получить ширину элемента с заданным номером
	function get_width_by_number($number,$frame=-1)
	{
		return $this->z_get_width_by_number($number,$frame);
	}
        // получить ширину элемента с заданным name
        function get_width_by_name($name,$frame=-1)
        {
                return $this->z_get_width_by_name($name,$frame);
        }
        // получить ширину элемента с заданным src
        function get_width_by_src($src,$exactly=true,$frame=-1)
        {
                return $this->z_get_width_by_src($src,$exactly,$frame);
        }
        // получить ширину элемента с заданным href
        function get_width_by_href($href,$exactly=true,$frame=-1)
        {
                return $this->z_get_width_by_href($href,$exactly,$frame);
        }
        // получить ширину элемента с заданным значением атрибута
        function get_width_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
        {
                return $this->z_get_width_by_attribute($attr_name,$attr_value,$exactly,$frame);
        }

	// получить высоту элемента с заданным номером
	function get_height_by_number($number,$frame=-1)
	{
		return $this->z_get_height_by_number($number,$frame);
	}
        // получить высоту элемента с заданным name 
        function get_height_by_name($name,$frame=-1)
        {
                return $this->z_get_height_by_name($name,$frame);
        }
        // получить высоту элемента с заданным src
        function get_height_by_src($src,$exactly=true,$frame=-1)
        {
                return $this->z_get_height_by_src($src,$exactly,$frame);
        }
        // получить высоту элемента с заданным href
        function get_height_by_href($href,$exactly=true,$frame=-1)
        {
                return $this->z_get_height_by_href($href,$exactly,$frame);
        }
        // получить высоту элемента с заданным значением атрибута
        function get_height_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
        {
                return $this->z_get_height_by_attribute($attr_name,$attr_value,$exactly,$frame);
        }

        /////////////////////////////////////////////////////////////////////////////////////////////////////

        // эмулировать ввод с клавиатуры в элемент с заданным номером
	function send_keyboard_input_by_number($number,$string,$timeout=INPUT_TIME,$frame=-1)
	{
		return $this->z_send_keyboard_input_by_number($number,$string,$timeout,$frame);
	}
        // эмулировать ввод с клавиатуры в элемент с заданным name
	function send_keyboard_input_by_name($name,$string,$timeout=INPUT_TIME,$frame=-1)
	{
		return $this->z_send_keyboard_input_by_name($name,$string,$timeout,$frame);
	}
        // эмулировать ввод с клавиатуры в элемент с заданным inner text
	function send_keyboard_input_by_inner_text($inner_text,$exactly,$string,$timeout=INPUT_TIME,$frame=-1)
	{
		return $this->z_send_keyboard_input_by_inner_text($inner_text,$exactly,$string,$timeout,$frame);
	}
        // эмулировать ввод с клавиатуры в элемент с заданным inner html
	function send_keyboard_input_by_inner_html($inner_html,$exactly,$string,$timeout=INPUT_TIME,$frame=-1)
	{
		return $this->z_send_keyboard_input_by_inner_html($inner_html,$exactly,$string,$timeout,$frame);
	}
        // эмулировать ввод с клавиатуры в элемент с заданным значением атрибута
	function send_keyboard_input_by_attribute($attr_name,$attr_value,$exactly,$string,$timeout=INPUT_TIME,$frame=-1)
	{
		return $this->z_send_keyboard_input_by_attribute($attr_name,$attr_value,$exactly,$string,$timeout,$frame);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить количество элементов
	function get_count($frame=-1)
	{
		return $this->z_get_count($frame);
	}
	// получить нколичество элементов с заданынм значением атрибута
	function get_count_by_attribute($attr_name,$attr_value,$exactly,$frame=-1)
	{
		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}

	// получить номера всех элементов с заданным inner text
	function get_all_numbers_by_inner_text($text,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_numbers_by_inner_text($text,$exactly,$frame);
	}	
	// получить номера всех элементов с заданным inner html
	function get_all_numbers_by_inner_html($html,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_numbers_by_inner_html($html,$exactly,$frame);
	}	
	// получить номера всех элементов с заданным значением атрибута
	function get_all_numbers_by_attribute($attr_name,$attr_value,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_numbers_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}	

	// получить внутренние текста у всех элементов  
	function get_all_inner_texts($separator="<br>",$text_filter="",$frame=-1)
	{
		return $this->z_get_all_inner_texts($separator,$text_filter,$frame);
	}	
	// получить внтуренние текста у элементов с заданным значением атрибута
	function get_all_inner_texts_by_attribute($attr_name,$attr_value,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_inner_texts_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}	

	// получить внтуренние html у элементов с заданным inner text
	function get_all_inner_htmls_by_inner_text($text,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_inner_htmls_by_inner_text($text,$exactly,$frame);
	}	
	// получить внтуренние html у элементов с заданным значением атрибута
	function get_all_inner_htmls_by_attribute($attr_name,$attr_value,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_inner_htmls_by_attribute($attr_name,$attr_value,$exactly,$frame);
	}	

	// получить значения заданного атрибута у элементов с заданным inner text
	function get_all_attributes_by_inner_text($attr_name_need,$text,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_attributes_by_inner_text($attr_name_need,$text,$exactly,$frame);
	}	
	// получить значения заданного атрибута у элементов с заданным значением атрибута
	function get_all_attributes_by_attribute($attr_name_need,$attr_name,$attr_value,$exactly=false,$frame=-1)
	{
		return $this->z_get_all_attributes_by_attribute($attr_name_need,$attr_name,$attr_value,$exactly,$frame);
	}	

	//////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить элемент по номеру
	function get_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
	// получить элемент по name
	function get_by_name($name,$frame=-1)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
	// получить элемент по inner text
	function get_by_inner_text($inner_text,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
	// получить элемент по inner html
	function get_by_inner_html($inner_html,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_inner_html($inner_html,$exactly,$frame);

		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
	// получить элемент по outer text
	function get_by_outer_text($outer_text,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_outer_text($outer_text,$exactly,$frame);

		$params = array( "outer_text" => $outer_text , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
	// получить элемент по outer html
	function get_by_outer_html($outer_html,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_outer_html($outer_html,$exactly,$frame);

		$params = array( "outer_html" => $outer_html , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
	// получить элемент по id
	function get_by_id($id,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_attribute("id",$id,$exactly,$frame);

		$params = array( "id" => $id , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
	// получить элемент по src
	function get_by_src($src,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_attribute("src",$src,$exactly,$frame);

		$params = array( "src" => $src , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
	// получить элемент по href
	function get_by_href($href,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_attribute("href",$href,$exactly,$frame);

		$params = array( "href" => $href , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
	// получить элемент по alt
	function get_by_alt($alt,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_attribute("alt",$alt,$exactly,$frame);

		$params = array( "alt" => $alt , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
	// получить элемент по value
	function get_by_value($value,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_attribute("value",$value,$exactly,$frame);

		$params = array( "value" => $value , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
	// получить элемент по значению атрибута
	function get_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
	// получить элемент с заданными свойствами : name1;value1;exactly1; ... nameN;valueN;exactlyN;
	function get_by_properties($properties,$frame=-1)
	{
		//$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "properties" => $properties , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
	// получить элемент по xpath
	function get_by_xpath($xpath)
	{
		$this->wait_element_exist_by_xpath($xpath);

		$params = array( "xpath" => $xpath );
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
        // получить все элементы
        function get_all($frame=-1)
        {
		$params = array( "frame" => $frame );
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
        }

        // получить все элементы с заданными номерами
	function get_all_by_number($numbers,$frame=-1)
	{
		$params = array( "numbers" => $numbers , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        // получить все элементы с заданными inner text
	function get_all_by_inner_text($inner_text,$exactly=false,$frame=-1)
	{
		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        // получить все элементы с заданными inner html
	function get_all_by_inner_html($inner_html,$exactly=false,$frame=-1)
	{
		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        // получить все элементы с заданными outer text
	function get_all_by_outer_text($outer_text,$exactly=false,$frame=-1)
	{
		$params = array( "outer_text" => $outer_text , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        // получить все элементы с заданными outer html
	function get_all_by_outer_html($outer_html,$exactly=false,$frame=-1)
	{
		$params = array( "outer_html" => $outer_html , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        // получить все элементы с заданными name
	function get_all_by_name($name,$exactly=false,$frame=-1)
	{
		$params = array( "name" => $name , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        // получить все элементы с заданными id
	function get_all_by_id($id,$exactly=false,$frame=-1)
	{
		$params = array( "id" => $id , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        // получить все элементы с заданными src
	function get_all_by_src($src,$exactly=false,$frame=-1)
	{
		$params = array( "src" => $src , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        // получить все элементы с заданными href
	function get_all_by_href($href,$exactly=false,$frame=-1)
	{
		$params = array( "href" => $href , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        // получить все элементы с заданными alt
	function get_all_by_alt($alt,$exactly=false,$frame=-1)
	{
		$params = array( "alt" => $alt , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        // получить все элементы с заданными value 
        function get_all_by_value($value,$exactly=false,$frame=-1)
        {
		$params = array( "value" => $value , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
        }
        // получить все элементы с заданными значением атрибута
        function get_all_by_attribute($attr_name,$attr_value,$exactly=false,$frame=-1)
        {
		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
        }
	// получить все элементы с заданными xpath
	function get_all_by_xpath($xpath)
	{
		$params = array( "xpath" => $xpath );
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
	}	
        // получить все элементы с заданными свойствами
        function get_all_by_properties($properties,$frame=-1)
        {
		$params = array( "properties" => $properties , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);
        }
	// выполнить JS для элемента с зданным номером
	function run_js_by_number($number,$js,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "js" => $js , "frame" => $frame);
		return  $this->call_get(__FUNCTION__,$params);
	}
	// выполнить JS для элемента с зданным значение атрибута
	function run_js_by_attribute($attr_name,$attr_value,$exactly,$js,$frame=-1)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "js" => $js , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
};
?>