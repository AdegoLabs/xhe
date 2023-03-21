<?php

namespace Xhe;

use XheBrowser;

class XheBaseDOM extends XheBaseObject {
	
	protected function z_wait_element_exist_by_number($number,$frame=-1)
	{
 		$bWaitElementExistBeforeAction = false;
		$iSecondsWaitElementExistBeforeAction = 15;

		$iSec=0;
		if ($bWaitElementExistBeforeAction)
		{
		   $is_exist = $this->z_is_exist_by_number($number,$frame);
		   while(!$is_exist)
		   {
  			usleep(250000);
			$is_exist = $this->z_is_exist_by_number($number,$frame);
			$iSec+=0.25;
			if ($iSec>$iSecondsWaitElementExistBeforeAction)
				return false;	
		   }
		}
		return true;
	}
		protected function z_wait_element_exist_by_name($name,$frame=-1)
	{
 		$bWaitElementExistBeforeAction = false;
		$iSecondsWaitElementExistBeforeAction = 15;

		$iSec=0;
		if ($bWaitElementExistBeforeAction)
		{
		   $is_exist = $this->z_is_exist_by_name($name,$frame);
		   while(!$is_exist)
		   {
  			usleep(250000);
			$is_exist = $this->z_is_exist_by_name($name,$frame);
			$iSec+=0.25;
			if ($iSec>$iSecondsWaitElementExistBeforeAction)
				return false;	
		   }
		}
		return true;
	}
		protected function z_wait_element_exist_by_id($id,$exactly,$frame=-1)
	{
 		$bWaitElementExistBeforeAction = false;
		$iSecondsWaitElementExistBeforeAction = 15;

		$iSec=0;
		if ($bWaitElementExistBeforeAction)
		{
		   $is_exist = $this->z_is_exist_by_id($id,$exactly,$frame);
		   while(!$is_exist)
		   {
  			usleep(250000);
			$is_exist = $this->z_is_exist_by_id($id,$exactly,$frame);
			$iSec+=0.25;
			if ($iSec>$iSecondsWaitElementExistBeforeAction)
				return false;	
		   }
		}
		return true;
	}
		protected function z_wait_element_exist_by_inner_text($inner_text,$exactly,$frame=-1)
	{
 		$bWaitElementExistBeforeAction = false;
		$iSecondsWaitElementExistBeforeAction = 15;

		$iSec=0;
		if ($bWaitElementExistBeforeAction)
		{
		   $is_exist = $this->z_is_exist_by_inner_text($inner_text,$exactly,$frame);
		   while(!$is_exist)
		   {
  			usleep(250000);
			$is_exist = $this->z_is_exist_by_inner_text($inner_text,$exactly,$frame);
			$iSec+=0.25;
			if ($iSec>$iSecondsWaitElementExistBeforeAction)
				return false;	
		   }
		}
		return true;
	}
		protected function z_wait_element_exist_by_inner_html($inner_html,$exactly,$frame=-1)
	{
 		$bWaitElementExistBeforeAction = false;
		$iSecondsWaitElementExistBeforeAction = 15;
		
		$iSec=0;
		if ($bWaitElementExistBeforeAction)
		{
		   $is_exist = $this->z_is_exist_by_inner_html($inner_html,$exactly,$frame);
		   while(!$is_exist)
		   {
  			usleep(250000);
			$is_exist = $this->z_is_exist_by_inner_html($inner_html,$exactly,$frame);
			$iSec+=0.25;
			if ($iSec>$iSecondsWaitElementExistBeforeAction)
				return false;	
		   }
		}
		return true;
	}
		protected function z_wait_element_exist_by_outer_text($outer_text,$exactly,$frame=-1)
	{
 		$bWaitElementExistBeforeAction = false;
		$iSecondsWaitElementExistBeforeAction = 15;

		$iSec=0;
		if ($bWaitElementExistBeforeAction)
		{
		   $is_exist = $this->z_is_exist_by_outer_text($outer_text,$exactly,$frame);
		   while(!$is_exist)
		   {
  			usleep(250000);
			$is_exist = $this->z_is_exist_by_outer_text($outer_text,$exactly,$frame);
			$iSec+=0.25;
			if ($iSec>$iSecondsWaitElementExistBeforeAction)
				return false;	
		   }
		}
		return true;
	}
		protected function z_wait_element_exist_by_outer_html($outer_html,$exactly,$frame=-1)
	{
 		$bWaitElementExistBeforeAction = false;
		$iSecondsWaitElementExistBeforeAction = 15;

		$iSec=0;
		if ($bWaitElementExistBeforeAction)
		{
		   $is_exist = $this->z_is_exist_by_outer_html($outer_html,$exactly,$frame);
		   while(!$is_exist)
		   {
  			usleep(250000);
			$is_exist = $this->z_is_exist_by_outer_html($outer_html,$exactly,$frame);
			$iSec+=0.25;
			if ($iSec>$iSecondsWaitElementExistBeforeAction)
				return false;	
		   }
		}
		return true;
	}
		protected function z_wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame=-1)
	{
 		$bWaitElementExistBeforeAction = false;
		$iSecondsWaitElementExistBeforeAction = 15;

		$iSec=0;
		if ($bWaitElementExistBeforeAction)
		{
		   $is_exist = $this->z_is_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);
		   while(!$is_exist)
		   {
  			usleep(500000);
			$is_exist = $this->z_is_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);
			$iSec+=0.5;
			if ($iSec>$iSecondsWaitElementExistBeforeAction)
				return false;	
		   }
		}
		return true;
	}
		protected function z_wait_element_exist_by_xpath($xpath)
	{
 		$bWaitElementExistBeforeAction = false;
		$iSecondsWaitElementExistBeforeAction = 15;

		$iSec=0;
		if ($bWaitElementExistBeforeAction)
		{
		   $is_exist = $this->z_is_exist_by_xpath($xpath);
		   while(!$is_exist)
		   {
  			usleep(500000);
			$is_exist = $this->z_is_exist_by_xpath($xpath);
			$iSec+=0.5;
			if ($iSec>$iSecondsWaitElementExistBeforeAction)
				return false;	
		   }
		}
		return true;
	}
		protected function z_wait_element_exist_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame=-1)
	{
 		$bWaitElementExistBeforeAction = false;
		$iSecondsWaitElementExistBeforeAction = 15;

		$iSec=0;
		if ($bWaitElementExistBeforeAction)
		{
		   $is_exist = $this->z_is_exist_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame);
		   while(!$is_exist)
		   {
  			usleep(500000);
			$is_exist = $this->z_is_exist_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame);
			$iSec+=0.5;
			if ($iSec>$iSecondsWaitElementExistBeforeAction)
				return false;	
		   }
		}
		return true;
	}
		protected function z_wait_element_exist_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame=-1)
	{
 		$bWaitElementExistBeforeAction = false;
		$iSecondsWaitElementExistBeforeAction = 15;

		$iSec=0;
		if ($bWaitElementExistBeforeAction)
		{
		   $is_exist = $this->z_is_exist_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame);
		   while(!$is_exist)
		   {
  			usleep(500000);
			$is_exist = $this->z_is_exist_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame);
			$iSec+=0.5;
			if ($iSec>$iSecondsWaitElementExistBeforeAction)
				return false;	
		   }
		}
		return true;
	}

	
        	protected function z_click_by_name($name,$frame,$wait_browser)
	{	
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
		protected function z_click_by_number($number,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
   		protected function z_click_by_id($id,$exactly=true,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_attribute("id",$id,$exactly,$frame);		

		$params = array( "id" => $id , "exactly" => $exactly , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
   		protected function z_click_by_value($value,$exactly=true,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_attribute("value",$value,$exactly,$frame);		

		$params = array( "value" => $value , "exactly" => $exactly , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
		protected function z_click_by_href($href,$exactly=true,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_attribute("href",$href,$exactly,$frame);

		$params = array( "href" => $href , "exactly" => $exactly , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}	
		protected function z_click_by_alt($alt,$exactly=true,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_attribute("alt",$alt,$exactly,$frame);

		$params = array( "alt" => $alt , "exactly" => $exactly , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
		protected function z_click_by_src($src,$exactly=true,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_attribute("src",$src,$exactly,$frame);

		$params = array( "src" => $src , "exactly" => $exactly , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
		protected function z_click_by_inner_text($inner_text,$exactly=true,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
		protected function z_click_by_inner_html($inner_html,$exactly=true,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_inner_html($inner_html,$exactly,$frame);

		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
		protected function z_click_by_attribute($attr_name,$attr_value,$exactly=true,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}	
        	protected function z_click_all($frame,$wait_browser=true)
	{
		$params = array( "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
		protected function z_click_random($frame,$wait_browser)
	{
		$params = array( "frame" => $frame );
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res!=-1 && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
        	protected function z_click_by_name_and_value($name,$value="",$frame,$wait_browser)
	{
		$params = array( "name" => $name , "value" => $value , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}

	
        	protected function z_click_by_name_by_form_name($name,$form_name,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_attribute_by_form_name("name",$name,true,$form_name,$frame);

		$params = array( "name" => $name , "form_name" => $form_name , "frame" => $frame);
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
        	protected function z_click_by_name_by_form_number($name,$form_number,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_attribute_by_form_number("name",$name,true,$form_number,$frame);

		$params = array( "name" => $name , "form_number" => $form_number , "frame" => $frame);
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}

        	protected function z_click_by_number_by_form_name($number,$form_name,$frame,$wait_browser)
	{
		$params = array( "number" => $number , "form_name" => $form_name , "frame" => $frame);
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
        	protected function z_click_by_number_by_form_number($number,$form_number,$frame,$wait_browser)
	{
		$params = array( "number" => $number , "form_number" => $form_number , "frame" => $frame);
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}

        	protected function z_click_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame=-1,$wait_browser=true)
	{
		$this->wait_element_exist_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "form_name" => $form_name , "frame" => $frame);
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
        	protected function z_click_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame=-1,$wait_browser=true)
	{
		$this->wait_element_exist_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "form_number" => $form_number , "frame" => $frame);
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}

	
                protected function z_click_in_by_name($name,$x=-1,$y=-1,$frame=-1)
        {
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "x" => $x , "y" => $y , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
			sleep(1);
		}        
		return $res;
        }
                protected function z_click_in_by_number($number,$x=-1,$y=-1,$frame=-1)
        {
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "x" => $x , "y" => $y , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
			sleep(1);
		}        
		return $res;
        }
                protected function z_click_in_by_src($src,$exactly="true",$x=-1,$y=-1,$frame=-1)
        {
		$this->wait_element_exist_by_attribute("src",$src,$exactly,$frame);

		$params = array( "src" => $src , "exactly" => $exactly , "x" => $x , "y" => $y , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
			sleep(1);
		}        
		return $res;
        }
                protected function z_click_in_by_attribute($attr_name,$attr_value,$exactly="true",$x=-1,$y=-1,$frame=-1)
        {
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "x" => $x , "y" => $y , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
			sleep(1);
		}        
		return $res;
        }

        
		protected function z_send_event_by_name($name,$event,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "event" => $event ,"frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
		protected function z_send_event_by_id($id,$exactly,$event,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_id($id,$frame);

		$params = array( "id" => $id , "exactly" => $exactly , "event" => $event ,"frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
		protected function z_send_event_by_number($number,$event,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "event" => $event , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
		protected function z_send_event_by_href($href,$exactly,$event,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_attribute("href",$href,$exactly,$frame);

		$params = array( "href" => $href , "exactly" => $exactly , "event" => $event , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
		protected function z_send_event_by_inner_text($inner_text,$exactly,$event,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "event" => $event , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
		protected function z_send_event_by_inner_html($inner_html,$exactly,$event,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_inner_html($inner_html,$exactly,$frame);

		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "event" => $event , "frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}
		protected function z_send_event_by_attribute($attr_name,$attr_value,$exactly,$event,$frame,$wait_browser)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "event" => $event ,"frame" => $frame );
		$res=$this->call_boolean(__FUNCTION__,$params);
		if ($res==true && $wait_browser)
		{
			$browser = new XheBrowser($this->server);
			$browser->wait_for();
		}        
		return $res;
	}

	
   		protected function z_set_focus_by_name($name,$frame)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		protected function z_set_focus_by_number($number,$frame)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
   		protected function z_set_focus_by_inner_text($inner_text,$exactly=true,$frame)
	{
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
   		protected function z_set_focus_by_inner_html($inner_html,$exactly=true,$frame)
	{
		$this->wait_element_exist_by_inner_html($inner_html,$exactly,$frame);

		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
   		protected function z_set_focus_by_href($href,$exactly=true,$frame)
	{
		$this->wait_element_exist_by_attribute("href",$href,$exactly,$frame);

		$params = array( "href" => $href , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
   		protected function z_set_focus_by_attribute($attr_name,$attr_value,$exactly=true,$frame)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	
                protected function z_set_value_by_name($name,$value,$frame=-1)
        {
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "value" => $value , "frame" => $frame);
		return $this->call_boolean(__FUNCTION__,$params,600);
        }
                protected function z_set_value_by_number($number,$value,$frame=-1)
        {
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "value" => $value , "frame" => $frame);
		return $this->call_boolean(__FUNCTION__,$params,600);
        }
                protected function z_set_value_by_attribute($attr_name,$attr_value,$exactly,$value,$frame=-1)
        {
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "value" => $value , "frame" => $frame);
		return $this->call_boolean(__FUNCTION__,$params,600);
        }

                protected function z_set_value_by_name_by_form_name($name,$value,$form_name,$frame=-1)
        {
		$this->wait_element_exist_by_attribute_by_form_name("name",$name,true,$form_name,$frame);

		$params = array( "name" => $name , "value" => $value , "form_name" => $form_name , "frame" => $frame);
		return $this->call_boolean(__FUNCTION__,$params,600);
        }
                protected function z_set_value_by_name_by_form_number($name,$value,$form_number,$frame=-1)
        {
		$this->wait_element_exist_by_attribute_by_form_number("name",$name,true,$form_number,$frame);

		$params = array( "name" => $name , "value" => $value , "form_number" => $form_number , "frame" => $frame);
		return $this->call_boolean(__FUNCTION__,$params,600);
        }

                protected function z_set_value_by_number_by_form_name($number,$value,$form_name,$frame=-1)
        {
		$params = array( "number" => $number , "value" => $value , "form_name" => $form_name , "frame" => $frame);
		return $this->call_boolean(__FUNCTION__,$params,600);
        }
                protected function z_set_value_by_number_by_form_number($number,$value,$form_number,$frame=-1)
        {
		$params = array( "number" => $number , "value" => $value , "form_number" => $form_number , "frame" => $frame);
		return $this->call_boolean(__FUNCTION__,$params,600);
        }

                protected function z_set_value_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$value,$form_name,$frame=-1)
        {
		$this->wait_element_exist_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "value" => $value , "form_name" => $form_name , "frame" => $frame);
		return $this->call_boolean(__FUNCTION__,$params,600);
        }
                protected function z_set_value_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$value,$form_number,$frame=-1)
        {
		$this->wait_element_exist_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "value" => $value , "form_number" => $form_number , "frame" => $frame);
		return $this->call_boolean(__FUNCTION__,$params,600);
        }

        
        	protected function z_set_inner_text_by_name($name,$inner_text,$frame)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "inner_text" => $inner_text , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params,600);
	}
		protected function z_set_inner_text_by_number($number,$inner_text,$frame)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "inner_text" => $inner_text , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params,600);
	}	
		protected function z_set_inner_text_by_attribute($attr_name,$attr_value,$exactly,$inner_text,$frame)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "inner_text" => $inner_text , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params,600);
	}       

        	protected function z_set_inner_html_by_name($name,$inner_html,$frame)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "inner_html" => $inner_html , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params,600);
	}
		protected function z_set_inner_html_by_number($number,$inner_html,$frame)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "inner_html" => $inner_html , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params,600);
	}	
		protected function z_set_inner_html_by_attribute($attr_name,$attr_value,$exactly,$inner_html,$frame)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "inner_html" => $inner_html , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params,600);
	}       

	
		protected function z_add_attribute_by_name($name,$name_attr,$value_attr,$frame)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "name_attr" => $name_attr , "value_attr" => $value_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		protected function z_add_attribute_by_number($number,$name_attr,$value_attr,$frame)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "name_attr" => $name_attr , "value_attr" => $value_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
        	protected function z_add_attribute_by_inner_text($inner_text,$exactly,$name_attr,$value_attr,$frame)
	{
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "name_attr" => $name_attr , "value_attr" => $value_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
        	protected function z_add_attribute_by_inner_html($inner_html,$exactly,$name_attr,$value_attr,$frame)
	{
		$this->wait_element_exist_by_inner_html($inner_html,$exactly,$frame);

		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "name_attr" => $name_attr , "value_attr" => $value_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
        	protected function z_add_attribute_by_attribute($attr_name,$attr_value,$exactly,$name_attr,$value_attr,$frame)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "name_attr" => $name_attr , "value_attr" => $value_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	        protected function z_set_attribute_by_name($name,$name_attr,$value_attr,$frame=-1)
        {
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "name_attr" => $name_attr , "value_attr" => $value_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
	        protected function z_set_attribute_by_number($number,$name_attr,$value_attr,$frame=-1)
        {
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "name_attr" => $name_attr , "value_attr" => $value_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
	        protected function z_set_attribute_by_inner_text($inner_text,$exactly,$name_attr,$value_attr,$frame=-1)
        {
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "name_attr" => $name_attr , "value_attr" => $value_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
	        protected function z_set_attribute_by_inner_html($inner_html,$exactly,$name_attr,$value_attr,$frame=-1)
        {
		$this->wait_element_exist_by_inner_html($inner_html,$exactly,$frame);

		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "name_attr" => $name_attr , "value_attr" => $value_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
	        protected function z_set_attribute_by_attribute($attr_name,$attr_value,$exactly,$name_attr,$value_attr,$frame=-1)
        {
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "name_attr" => $name_attr , "value_attr" => $value_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }

		protected function z_remove_attribute_by_name($name,$name_attr,$frame)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "name_attr" => $name_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		protected function z_remove_attribute_by_number($number,$name_attr,$frame)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "name_attr" => $name_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		protected function z_remove_attribute_by_inner_text($inner_text,$exactly,$name_attr,$frame)
	{
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "name_attr" => $name_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		protected function z_remove_attribute_by_inner_html($inner_html,$exactly,$name_attr,$frame)
	{
		$this->wait_element_exist_by_inner_html($inner_html,$exactly,$frame);

		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "name_attr" => $name_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		protected function z_remove_attribute_by_attribute($attr_name,$attr_value,$exactly,$name_attr,$frame)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "name_attr" => $name_attr , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	
  		protected function z_screenshot_by_name($file_path,$name,$frame=-1,$as_gray=false)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "file_path" => $file_path , "frame" => $frame , "as_gray" => $as_gray );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		protected function z_screenshot_by_number($file_path,$number,$frame=-1,$as_gray=false)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "file_path" => $file_path , "frame" => $frame , "as_gray" => $as_gray);
		return $this->call_boolean(__FUNCTION__,$params);
	}
    		protected function z_screenshot_by_src($file_path,$src,$exactly=true,$frame=-1,$as_gray=false)
	{
		$this->wait_element_exist_by_attribute("src",$src,$exactly,$frame);

		$params = array( "src" => $src , "exactly" => $exactly , "file_path" => $file_path , "frame" => $frame , "as_gray" => $as_gray);
		return $this->call_boolean(__FUNCTION__,$params);
	}
    		protected function z_screenshot_by_attribute($file_path,$attr_name,$attr_value,$exactly=true,$frame=-1,$as_gray=false)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "file_path" => $file_path , "frame" => $frame , "as_gray" => $as_gray);
		return $this->call_boolean(__FUNCTION__,$params);
	}

        
                protected function z_is_exist_by_number($number,$frame)
        {
		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
                protected function z_is_exist_by_name($name,$frame)
        {
		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
                protected function z_is_exist_by_id($id,$exactly,$frame)
        {
		$params = array( "id" => $id , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
		protected function z_is_exist_by_href($href,$exactly,$frame)
	{
		$params = array( "href" => $href , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}	
		protected function z_is_exist_by_alt($alt,$exactly,$frame)
	{
		$params = array( "alt" => $alt , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}	
		protected function z_is_exist_by_src($src,$exactly,$frame)
	{
		$params = array( "src" => $src , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}	
		protected function z_is_exist_by_inner_text($inner_text,$exactly,$frame)
	{
		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}	
		protected function z_is_exist_by_inner_html($inner_html,$exactly,$frame)
	{
		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}	
		protected function z_is_exist_by_outer_text($outer_text,$exactly,$frame)
	{
		$params = array( "outer_text" => $outer_text , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}	
		protected function z_is_exist_by_outer_html($outer_html,$exactly,$frame)
	{
		$params = array( "outer_html" => $outer_html , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}	
		protected function z_is_exist_by_attribute($attr_name,$attr_value,$exactly,$frame)
	{
		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		protected function z_is_exist_by_xpath($xpath)
	{
		$params = array( "xpath" => $xpath );
		return $this->call_boolean(__FUNCTION__,$params);
	}

		protected function z_is_exist_by_attribute_by_form_number($attr_name,$attr_value,$exactly,$form_number,$frame)
	{
		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "form_number" => $form_number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		protected function z_is_exist_by_attribute_by_form_name($attr_name,$attr_value,$exactly,$form_name,$frame)
	{
		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "form_name" => $form_name , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	
		protected function z_get_name_by_number($number,$frame)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}

   		protected function z_get_number_by_name($name,$frame)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
   		protected function z_get_number_by_inner_text($inner_text,$exactly=true,$frame)
	{
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
   		protected function z_get_number_by_inner_html($inner_html,$exactly=true,$frame)
	{
		$this->wait_element_exist_by_inner_html($inner_html,$exactly,$frame);

		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
   		protected function z_get_number_by_id($id,$frame)
	{
		$this->wait_element_exist_by_attribute("id",$id,true,$frame);

		$params = array( "id" => $id , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
   		protected function z_get_number_by_src($src,$exactly=true,$frame)
	{
		$this->wait_element_exist_by_attribute("src",$src,$exactly,$frame);

		$params = array( "src" => $src , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
   		protected function z_get_number_by_href($href,$exactly=true,$frame)
	{
		$this->wait_element_exist_by_attribute("href",$href,$exactly,$frame);

		$params = array( "href" => $href , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
                protected function z_get_number_by_attribute($attr_name,$attr_value,$exactly=true,$frame)
        {
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }

		protected function z_get_inner_text_by_name($name,$frame)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_inner_text_by_number($number,$frame)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_inner_text_by_id($id,$frame)
	{
		$this->wait_element_exist_by_attribute("id",$id,true,$frame);

		$params = array( "id" => $id , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_inner_text_by_href($href,$exactly,$frame)
	{
		$this->wait_element_exist_by_attribute("href",$href,$exactly,$frame);

		$params = array( "href" => $href , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
        	protected function z_get_inner_text_by_attribute($attr_name,$attr_value,$exactly=true,$frame)
        {
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }

                protected function z_get_inner_html_by_name($name,$frame)
        {
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
                protected function z_get_inner_html_by_number($number,$frame)
        {
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
                protected function z_get_inner_html_by_id($id,$frame)
        {
		$this->wait_element_exist_by_attribute("id",$id,true,$frame);

		$params = array( "id" => $id , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
        	protected function z_get_inner_html_by_attribute($attr_name,$attr_value,$exactly=true,$frame)
        {
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }

        	protected function z_get_value_by_name($name,$frame)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
        	protected function z_get_value_by_number($number,$frame)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
        	protected function z_get_value_by_attribute($attr_name,$attr_value,$exactly,$frame)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}

    		protected function z_get_src_by_name($name,$frame=-1)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
   		protected function z_get_src_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_alt_by_name($name,$frame=-1)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_alt_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}

        	protected function z_get_href_by_name($name,$frame)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_href_by_number($number,$frame)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
        	protected function z_get_href_by_inner_text($inner_text,$exactly=true,$frame)
	{
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}               

                protected function z_get_attribute_by_name($name,$name_attr,$frame)
        {
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "name_attr" => $name_attr , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
                protected function z_get_attribute_by_number($number,$name_attr,$frame)
        {
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "name_attr" => $name_attr , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
                protected function z_get_attribute_by_src($src,$exactly,$name_attr,$frame)
        {
		$this->wait_element_exist_by_attribute("src",$src,$exactly,$frame);

		$params = array( "src" => $src , "exactly" => $exactly , "name_attr" => $name_attr , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
                protected function z_get_attribute_by_inner_text($inner_text,$exactly,$name_attr,$frame)
        {
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "name_attr" => $name_attr , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
                protected function z_get_attribute_by_inner_html($inner_html,$exactly,$name_attr,$frame)
        {
		$this->wait_element_exist_by_inner_html($inner_html,$exactly,$frame);

		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "name_attr" => $name_attr , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
                protected function z_get_attribute_by_attribute($attr_name,$attr_value,$exactly,$name_attr,$frame)
        {
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "name_attr" => $name_attr , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }

                protected function z_get_all_attributes_by_name($name,$frame)
        {
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
                protected function z_get_all_attributes_by_number($number,$frame)
        {
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
	        protected function z_get_all_attributes_by_src($src,$exactly,$frame)
        {
		$this->wait_element_exist_by_attribute("src",$src,$exactly,$frame);

		$params = array( "src" => $src , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }

                protected function z_get_all_attributes_values_by_name($name,$frame)
        {
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
                protected function z_get_all_attributes_values_by_number($number,$frame)
        {
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
                protected function z_get_all_attributes_values_by_src($src,$exactly,$frame)
        {
		$this->wait_element_exist_by_attribute("src",$src,$exactly,$frame);

		$params = array( "src" => $src , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }

                protected function z_get_all_events_by_name($name,$frame)
        {
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
                protected function z_get_all_events_by_number($number,$frame)
        {
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }
	        protected function z_get_all_events_by_src($src,$exactly,$frame)
        {
		$this->wait_element_exist_by_attribute("src",$src,$exactly,$frame);

		$params = array( "src" => $src , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
        }

                protected function z_is_disabled_by_name($name,$frame)
        {
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
                protected function z_is_disabled_by_number($number,$frame)
        {
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }

   		protected function z_get_numbers_child_by_name($name,$element_type,$frame,$include_subchildren)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "element_type" => $element_type , "frame" => $frame , "include_subchildren" => $include_subchildren);
		return $this->call_get(__FUNCTION__,$params);
	}
   		protected function z_get_numbers_child_by_number($number,$element_type,$frame,$include_subchildren)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "element_type" => $element_type , "frame" => $frame , "include_subchildren" => $include_subchildren);
		return $this->call_get(__FUNCTION__,$params);
	}
   		protected function z_get_numbers_child_by_id($id,$element_type,$frame,$include_subchildren)
	{
		$this->wait_element_exist_by_attribute("id",$id,true,$frame);

		$params = array( "id" => $id , "element_type" => $element_type , "frame" => $frame , "include_subchildren" => $include_subchildren);
		return $this->call_get(__FUNCTION__,$params);
	}
   		protected function z_get_numbers_child_by_attribute($attr_name,$attr_value,$exactly,$element_type,$frame,$include_subchildren)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "element_type" => $element_type , "frame" => $frame , "include_subchildren" => $include_subchildren);
		return $this->call_get(__FUNCTION__,$params);
	}

	
        	protected function z_send_keyboard_input_by_name($name,$string,$timeout,$frame)
	{
		$PHP_Use_Trought_Shell = false; //careful
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "string" => $string , "timeout" => $timeout , "frame" => $frame);
		$res=$this->call_boolean(__FUNCTION__,$params);

		if ($res!=false && $PHP_Use_Trought_Shell)
			fgets(STDIN);
		else
			usleep(120000);

		return $res;
	}
        	protected function z_send_keyboard_input_by_number($number,$string,$timeout,$frame)
	{
		$PHP_Use_Trought_Shell = false; //careful
		
		$params = array( "number" => $number , "string" => $string , "timeout" => $timeout , "frame" => $frame);
		$res=$this->call_boolean(__FUNCTION__,$params);

		if ($res!=false && $PHP_Use_Trought_Shell)
			fgets(STDIN);
		else
			usleep(120000);

		return $res;
	}
        	protected function z_send_keyboard_input_by_inner_text($inner_text,$exactly,$string,$timeout,$frame)
	{
		$PHP_Use_Trought_Shell = false; //careful
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "string" => $string , "timeout" => $timeout , "frame" => $frame);
		$res=$this->call_boolean(__FUNCTION__,$params);

		if ($res!=false && $PHP_Use_Trought_Shell)
			fgets(STDIN);
		else
			usleep(120000);

		return $res;
	}
        	protected function z_send_keyboard_input_by_inner_html($inner_html,$exactly,$string,$timeout,$frame)
	{
		$PHP_Use_Trought_Shell = false; //careful
		$this->wait_element_exist_by_inner_html($inner_html,$exactly,$frame);

		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "string" => $string , "timeout" => $timeout , "frame" => $frame);
		$res=$this->call_boolean(__FUNCTION__,$params);

		if ($res!=false && $PHP_Use_Trought_Shell)
			fgets(STDIN);
		else
			usleep(120000);

		return $res;
	}
        	protected function z_send_keyboard_input_by_attribute($attr_name,$attr_value,$exactly,$string,$timeout,$frame)
	{
		$PHP_Use_Trought_Shell = false; //careful
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "string" => $string , "timeout" => $timeout , "frame" => $frame);
		$res=$this->call_boolean(__FUNCTION__,$params);

		if ($res!=false && $PHP_Use_Trought_Shell)
			fgets(STDIN);
		else
			usleep(120000);

		return $res;
	}

        
        	protected function z_get_x_by_name($name,$frame)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_x_by_number($number,$frame)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_x_by_inner_text($inner_text,$exactly,$frame)
	{
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_x_by_inner_html($inner_html,$exactly,$frame)
	{
		$this->wait_element_exist_by_inner_html($inner_html,$exactly,$frame);

		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_x_by_href($href,$exactly,$frame)
	{
		$this->wait_element_exist_by_attribute("href",$href,$exactly,$frame);

		$params = array( "href" => $href , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}	
		protected function z_get_x_by_attribute($attr_name,$attr_value,$exactly,$frame)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
        	protected function z_get_y_by_name($name,$frame)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_y_by_number($number,$frame)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_y_by_inner_text($inner_text,$exactly,$frame)
	{
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_y_by_inner_html($inner_html,$exactly,$frame)
	{
		$this->wait_element_exist_by_inner_html($inner_html,$exactly,$frame);

		$params = array( "inner_html" => $inner_html , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_y_by_href($href,$exactly,$frame)
	{
		$this->wait_element_exist_by_attribute("href",$href,$exactly,$frame);

		$params = array( "href" => $href , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}	
		protected function z_get_y_by_attribute($attr_name,$attr_value,$exactly,$frame)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	} 

	
		protected function z_get_count($frame=-1)
	{
		$params = array( "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_all_inner_texts($separator,$text_filter,$frame=-1)
	{
		$params = array( "separator" => $separator , "text_filter" => $text_filter , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}


        	protected function z_get_all_inner_texts_by_href($href,$separator,$exactly,$frame)
	{
		$params = array( "href" => $href , "separator" => $separator , "exactly" => $exactly , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
        	protected function z_get_all_inner_texts_in_frame($frame, $separator="<br>")
	{
		return $this->call("$this->prefix.GetAllInnerTextsInFrame?separator=".base64_encode($separator)."&frame=".base64_encode($frame));
	}	

		protected function z_get_all_numbers_by_inner_text($text,$exactly=false,$frame=-1)
	{
		$separator="<@@@b@r@@@>";
		$params = array( "text" => $text , "exactly" => $exactly , "separator" => $separator , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")
			return array();
		return explode($separator,$res);
	}	
		protected function z_get_all_numbers_by_inner_html($html,$exactly=false,$frame=-1)
	{
		$separator="<@@@b@r@@@>";
		$params = array( "html" => $html , "exactly" => $exactly , "separator" => $separator , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")
			return array();
		return explode($separator,$res);
	}	
		protected function z_get_all_inner_htmls_by_inner_text($text,$exactly=false,$frame=-1)
	{
		$separator="<@@@b@r@@@>";
		$params = array( "text" => $text , "exactly" => $exactly , "separator" => $separator , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")
			return array();
		return explode($separator,$res);
	}	
		protected function z_get_all_attributes_by_inner_text($attr_name_need,$text,$exactly=false,$frame=-1)
	{
		$separator="<@@@b@r@@@>";
		$params = array( "attr_name_need" => $attr_name_need ,"text" => $text , "exactly" => $exactly , "separator" => $separator , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")
			return array();
		return explode($separator,$res);
	}
	
		protected function z_get_all_numbers_by_attribute($attr_name,$attr_value,$exactly=false,$frame=-1)
	{
		$separator="<@@@b@r@@@>";
		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "separator" => $separator , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")
			return array();
		return explode($separator,$res);
	}	
		protected function z_get_all_inner_texts_by_attribute($attr_name,$attr_value,$exactly=false,$frame=-1)
	{
		$separator="<@@@b@r@@@>";
		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "separator" => $separator , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")
			return array();
		return explode($separator,$res);
	}	
		protected function z_get_all_inner_htmls_by_attribute($attr_name,$attr_value,$exactly=false,$frame=-1)
	{
		$separator="<@@@b@r@@@>";
		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "separator" => $separator , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")
			return array();
		return explode($separator,$res);
	}	
		protected function z_get_all_attributes_by_attribute($attr_name_need,$attr_name,$attr_value,$exactly=false,$frame=-1)
	{
		$separator="<@@@b@r@@@>";
		$params = array( "attr_name_need" => $attr_name_need , "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "separator" => $separator , "frame" => $frame);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")
			return array();
		return explode($separator,$res);
	}	

	
		protected function z_get_width_by_number($number,$frame)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_width_by_name($name,$frame)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_width_by_href($href,$exactly,$frame)
	{
		$this->wait_element_exist_by_attribute("href",$href,$exactly,$frame);

		$params = array( "href" => $href , "exactly" => $exactly , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_width_by_src($src,$exactly,$frame)
	{
		$this->wait_element_exist_by_attribute("src",$src,$exactly,$frame);

		$params = array( "src" => $src , "exactly" => $exactly , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
                protected function z_get_width_by_attribute($attr_name,$attr_value,$exactly,$frame)
        {
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
        }

		protected function z_get_height_by_number($number,$frame)
	{
		$this->wait_element_exist_by_number($number,$frame);

		$params = array( "number" => $number , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_height_by_name($name,$frame)
	{
		$this->wait_element_exist_by_name($name,$frame);

		$params = array( "name" => $name , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_height_by_href($href,$exactly,$frame)
	{
		$this->wait_element_exist_by_attribute("href",$href,$exactly,$frame);

		$params = array( "href" => $href , "exactly" => $exactly , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
		protected function z_get_height_by_src($src,$exactly,$frame)
	{
		$this->wait_element_exist_by_attribute("src",$src,$exactly,$frame);

		$params = array( "src" => $src , "exactly" => $exactly , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
                protected function z_get_height_by_attribute($attr_name,$attr_value,$exactly,$frame)
        {
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
        }

	};
?>