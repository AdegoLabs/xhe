<?php

namespace Xhe;

class XheFlash  extends XheBaseDOMVisual {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Flash";
	}
	
		function get_version_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_ready_state_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		function is_playing_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	
		function play_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function forward_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function back_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function stop_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}

		function go_to_frame_by_number($frame_number,$number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "frame_number" => $frame_number , "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function get_current_frame_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_frame_count_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}

        
		function get_background_color_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		function set_background_color_by_number($color,$number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "color" => $color , "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}

        
		function get_movie_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		function set_movie_by_number($path,$number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "path" => $path , "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}

        
		function get_current_label_by_number($time,$number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "time" => $time , "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		function call_label_by_number($label,$time,$number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "label" => $label , "time" => $time , "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function call_frame_by_number($frame_number,$time,$number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "frame_number" => $frame_number , "time" => $time , "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}

        
		function get_variable_by_number($name,$number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "name" => $name , "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		function set_variable_by_number($name,$value,$number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "name" => $name , "value" => $value , "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
};		
?>