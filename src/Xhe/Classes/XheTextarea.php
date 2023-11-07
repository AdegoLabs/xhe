<?php
namespace Xhe;
class XheTextarea extends XheTextareaCompatible
{
	/////////////////////////////////////// SERVICE /////////////////////////////////////////////////////
        // server initialization
        function __construct($server,$password="")
        {    
                $this->server = $server;
                $this->password = $password;
		$this->prefix = "TextArea";
        }
	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // прокрутить курсор в самый конец в текстарии с заданным номером
        function seek_to_end_by_number($number,$frame=-1)
        {
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // прокрутить курсор в самый конец в текстарии с заданным именем
        function seek_to_end_by_name($name,$frame=-1)
        {
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // прокрутить курсор в самый конец в текстарии с заданным значением аттрибута
        function seek_to_end_by_attribute($attr_name,$attr_value,$exactly=false,$frame=-1)
        {
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame);
		return $this->call_boolean(__FUNCTION__,$params);
        }		

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // прокрутить курсор в заданную позицию в текстарии с заданным номером
        function seek_to_pos_by_number($number,$pos,$frame=-1)
        {
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "pos" => $pos, "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // прокрутить курсор в заданную позицию в текстарии с заданным именем
        function seek_to_pos_by_name($name,$pos,$frame=-1)
        {
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "pos" => $pos , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // прокрутить курсор в заданную позицию в текстарии с заданным значением аттрибута
        function seek_to_pos_by_attribute($attr_name,$attr_value,$exactly,$pos,$frame=-1)
        {
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "pos" => $pos , "frame" => $frame);
		return $this->call_boolean(__FUNCTION__,$params);
        }		

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // изменить режим 'только чтение' в текстарии с заданным номером
        function set_readonly_by_number($number,$readonly,$frame=-1)
        {
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "value" => $readonly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // изменить режим 'только чтение' в текстарии с заданным именем
        function set_readonly_by_name($name,$readonly,$frame=-1)
        {
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "value" => $readonly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // получить режим 'только чтение' у текстарии с заданным номером
        function get_readonly_by_number($number,$frame=-1)
        {
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // получить режим 'только чтение' у текстарии с заданным именем
        function get_readonly_by_name($name,$frame=-1)
        {
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }

        // получить число строк у текстарии с заданным номером
        function get_rows_by_number($number,$frame=-1)
        {
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
        // получить число строк у текстарии с заданным именем
        function get_rows_by_name($name,$frame=-1)
        {
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }

        // получить число столбцов у текстарии с заданным номером
        function get_cols_by_number($number,$frame=-1)
        {
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
        // получить число столбцов у текстарии с заданным именем
        function get_cols_by_name($name,$frame=-1)
        {
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }

	/////////////////////////////////////////////////////////////////////////////////////////////////////
};      
?>