<?php

namespace Xhe;

use XheInterface, XheInterfaces;

class XheElement  extends XheElementCompatible {
     function __construct($server,$password="")
        {    
                $this->server = $server;
                $this->password = $password;
		$this->prefix = "Element";

        }
	
                function get_tag_by_number($number,$frame=-1)
        {
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }

        
                function get_x_by_tag_by_number($tag,$number,$frame=-1)
        {
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "tag" => $tag , "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
                function get_y_by_tag_by_number($tag,$number,$frame=-1)
        {
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "tag" => $tag , "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }

	
                function get_all_by_tag($tag,$frame=-1)
        {
		$params = array( "tag" => $tag , "frame" => $frame );
		$res=$this->call_get(__FUNCTION__,$params);
		return new XheInterfaces($res,$this->server,$this->password);
        }

                function convert_number($number,$object_name,$frame=-1)
        {
		$elm=$this->get_by_number($number,$frame);
		if (!$elm->is_exist())
			return -1;
		
		return $elm->get_number($object_name);
        }

	
		function get_by_query_selector($selector,$frame=-1)
	{
		$params = array( "selector" => $selector , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_all_by_query_selector($selector,$frame=-1)
	{
		$params = array( "selector" => $selector , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);		
	}	
		function get_by_js($js,$add_file="",$frame=-1)
	{
		$params = array( "js" => $js , "add_file" => $add_file , "frame" => $frame);
		$internal_number=$this->call_get(__FUNCTION__,$params);

		return new XheInterface($internal_number,$this->server,$this->password);
	}	
		function get_all_by_js($js,$add_file="",$frame=-1)
	{
		$params = array( "js" => $js , "add_file" => $add_file , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);

		return new XheInterfaces($res,$this->server,$this->password);		
	}	

	
};      
?>