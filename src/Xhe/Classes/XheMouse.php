<?php
namespace Xhe;

class XheMouse extends XheBaseObject
{
		   	var $x;
   	var $y;
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Mouse";
	}
   	
   	
		function click($x="-1",$y="-1",$scroll=true)
	{
		$params = array( "x" => $x , "y" => $y , "scroll" => $scroll  );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function click_to_screen($x="-1",$y="-1")
	{
		$params = array( "x" => $x , "y" => $y  );
		return $this->call_boolean(__FUNCTION__,$params);
	}
   	   	function double_click($x="-1",$y="-1",$scroll=true)
   	{
		$params = array( "x" => $x , "y" => $y , "scroll" => $scroll  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
   	   	function left_button_down($x="-1",$y="-1",$scroll=true)
   	{
		$params = array( "x" => $x , "y" => $y , "scroll" => $scroll  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
   	   	function left_button_up($x="-1",$y="-1",$scroll=true)
   	{
		$params = array( "x" => $x , "y" => $y , "scroll" => $scroll  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

   	   	function right_button_click($x="-1",$y="-1",$scroll=true)
   	{
		$params = array( "x" => $x , "y" => $y , "scroll" => $scroll  );
		return $this->call_boolean(__FUNCTION__,$params);
	}
   	   	function right_button_click_to_screen($x="-1",$y="-1")
   	{
		$params = array( "x" => $x , "y" => $y );
		return $this->call_boolean(__FUNCTION__,$params);
	}
   	   	function right_button_down($x="-1",$y="-1",$scroll=true)
   	{
		$params = array( "x" => $x , "y" => $y , "scroll" => $scroll  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
   	   	function right_button_up($x="-1",$y="-1",$scroll=true)
   	{
		$params = array( "x" => $x , "y" => $y , "scroll" => $scroll  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

		function move($x,$y,$scroll=true,$time=0,$tremble=2,$buttons="")
	{
		if ($time==0)
		{
			$params = array( "x" => $x , "y" => $y , "scroll" => $scroll , "buttons" => $buttons  );
			return $this->call_boolean(__FUNCTION__,$params);
		}
		else
		{
			$browser = new XheBrowser($this->server);
			$xc=$this->get_x(true);
			$yc=$this->get_y(true);
			if ($scroll)
			{
				$sc_x=$browser->get_horizontal_scroll_pos();
				$sc_y=$browser->get_vertical_scroll_pos();
				$xc+=$sc_x;
				$yc+=$sc_y;
			}
			$StepX=($x-$xc-0.0001)/$time/30;
			$StepY=($y-$yc-0.0001)/$time/30;
			$prevRandX=0;$prevRandY=0;
			for ($i=0;$i<30*$time-1;$i++)
			{
				$xc+=$StepX-$prevRandX;
				$yc+=$StepY-$prevRandY;
				$prevRandX=rand(-$tremble,$tremble);
				$prevRandY=rand(-$tremble,$tremble);
				$params = array( "x" => $xc , "y" => $yc , "scroll" => $scroll , "buttons" => $buttons );				
				$this->call_boolean(__FUNCTION__,$params);
				usleep(20000);
			}
			$params = array( "x" => $x , "y" => $y , "scroll" => $scroll , "buttons" => $buttons );
			return $this->call_boolean(__FUNCTION__,$params);
		}
	}
		function move_on_screen($x,$y,$time=0,$tremble=2,$buttons="")
	{
		if ($time==0)
		{
			$params = array( "x" => $x , "y" => $y , "buttons" => $buttons);
			return $this->call_boolean(__FUNCTION__,$params);
		}
		else
		{
			$xc=$this->get_x();
			$yc=$this->get_y();
			$StepX=($x-$xc-0.0001)/$time/30;
			$StepY=($y-$yc-0.0001)/$time/30;
			$prevRandX=0;$prevRandY=0;
			for ($i=0;$i<30*$time-1;$i++)
			{
				$xc+=$StepX-$prevRandX;
				$yc+=$StepY-$prevRandY;
				$prevRandX=rand(-$tremble,$tremble);
				$prevRandY=rand(-$tremble,$tremble);
				$params = array( "x" => $xc , "y" => $yc , "buttons" => $buttons);
				$this->call_boolean(__FUNCTION__,$params);
				usleep(20000);
			}
			$params = array( "x" => $x , "y" => $y , "buttons" => $buttons);
			return $this->call_boolean(__FUNCTION__,$params);
		}
	}
   	   	function wheel($time,$x,$y)
   	{
		$params = array( "x" => $x , "y" => $y , "time" => $time  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
		function move_to($x, $y, $type_, $time_ )
	{
		$params = array( "x" => $x , "y" => $y , "type" => $type_ , "time" => $time_ );
		return $this->call_boolean(__FUNCTION__, $params);
	}

   	
		function send_click($x="-1",$y="-1",$scroll=true)
	{
		$params = array( "x" => $x , "y" => $y , "scroll" => $scroll );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function send_double_click($x="-1",$y="-1",$scroll=true)
	{
		$params = array( "x" => $x , "y" => $y , "scroll" => $scroll  );
		return $this->call_boolean(__FUNCTION__,$params);
	}
   	   	function send_left_button_down($x="-1",$y="-1",$scroll=true)
   	{
		$params = array( "x" => $x , "y" => $y , "scroll" => $scroll  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
   	   	function send_left_button_up($x="-1",$y="-1",$scroll=true)
   	{
		$params = array( "x" => $x , "y" => $y , "scroll" => $scroll  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

   	   	function send_right_button_click($x="-1",$y="-1",$scroll=true)
   	{
		$params = array( "x" => $x , "y" => $y , "scroll" => $scroll  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
   	   	function send_right_button_down($x="-1",$y="-1",$scroll=true)
   	{
		$params = array( "x" => $x , "y" => $y , "scroll" => $scroll  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
   	   	function send_right_button_up($x="-1",$y="-1",$scroll=true)
   	{
		$params = array( "x" => $x , "y" => $y , "scroll" => $scroll  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

		function send_move($x,$y,$scroll=true,$time=0,$tremble=5,$buttons="")
	{
		if ($time==0)
		{
			$params = array( "x" => $x , "y" => $y , "scroll" => $scroll, "buttons" => $buttons);
			return $this->call_boolean(__FUNCTION__,$params);
		}
		else
		{
			$browser = new XheBrowser($this->server);
			$xc=$this->get_x(true,true);
			$yc=$this->get_y(true,true);
			if ($scroll)
			{
				$sc_x=$browser->get_horizontal_scroll_pos();
				$sc_y=$browser->get_vertical_scroll_pos();
				$xc+=$sc_x;
				$yc+=$sc_y;
			}
			$StepX=($x-$xc-0.0001)/$time/30;
			$StepY=($y-$yc-0.0001)/$time/30;
			$prevRandX=0;$prevRandY=0;
			for ($i=0;$i<30*$time-1;$i++)
			{
				$xc+=$StepX-$prevRandX;
				$yc+=$StepY-$prevRandY;
				$prevRandX=rand(-$tremble,$tremble);
				$prevRandY=rand(-$tremble,$tremble);
				$params = array( "x" => $xc , "y" => $yc , "scroll" => $scroll, "buttons" => $buttons);
				$this->call_boolean(__FUNCTION__,$params);
				usleep(20000);
			}
			$params = array( "x" => $x , "y" => $y , "scroll" => $scroll, "buttons" => $buttons);
			return $this->call_boolean(__FUNCTION__,$params);
		}
	}
   	   	function send_wheel($n,$x=1200,$y=600,$key=0)
   	{
		$params = array( "x" => $x , "y" => $y , "n" => $n , "key" => $key );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
		function send_move_to($x, $y, $type_, $time_ )
	{
		$params = array( "x" => $x , "y" => $y , "type" => $type_ , "time" => $time_ );
		return $this->call_boolean(__FUNCTION__, $params);
	}
   	   	function send_touch($id,$touch_type,$x,$y,$radiusX=0,$radiusY=0,$rotationAngle=0,$pressure=0,$modiefiers=0,$pointerType=0)
   	{
		$params = array( "x" => $x , "y" => $y ,"id" => $id , "touch_type" => $touch_type , "radiusX" => $radiusX, "radiusY" => $radiusY, "rotationAngle" => $rotationAngle, "pressure" => $pressure, "modiefiers" => $modiefiers, "pointerType" => $pointerType);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
   	   	function send_touch_to($x0,$y0,$x,$y,$type_,$time_)
   	{
		$params = array( "x0" => $x0 , "y0" => $y0 , "x" => $x , "y" => $y , "type_" => $type_, "time_" => $time_);
		return $this->call_boolean(__FUNCTION__,$params);
   	}

   	
   	   	function get_position ($in_browser=false,$virtual=false)
   	{
		$params = array( "in_browser" => $in_browser , "virtual" => $virtual );
		$res=$this->call_get(__FUNCTION__,$params);

     		$pos =strpos($res," ");
     		$this->x = substr($res ,0,$pos);
     		$this->y = substr($res ,$pos+1,strlen($res)-$pos-1);
		return $res;
   	}

   	   	function get_x($in_browser=false,$virtual=false)
   	{
		$params = array( "in_browser" => $in_browser , "virtual" => $virtual );
		return $this->call_get(__FUNCTION__,$params);
   	}
   	    	function get_y($in_browser=false,$virtual=false)
   	{
		$params = array( "in_browser" => $in_browser , "virtual" => $virtual );
		return $this->call_get(__FUNCTION__,$params);
   	}

        
        	function send_click_to_flash_player($x,$y,$flash_num,$bUseFlashXY=false,$scroll=true)
	{
		$params = array( "x" => $x , "y" => $y , "flash_num" => $flash_num , "bUseFlashXY" => $bUseFlashXY, "scroll" => $scroll );
		return $this->call_boolean(__FUNCTION__,$params);
	}
        	function send_right_click_to_flash_player($x,$y,$flash_num,$bUseFlashXY=false,$scroll=true)
	{
		$params = array( "x" => $x , "y" => $y , "flash_num" => $flash_num , "bUseFlashXY" => $bUseFlashXY, "scroll" => $scroll );
		return $this->call_boolean(__FUNCTION__,$params);
	}

        	function send_mouse_move_to_flash_player($x,$y,$flash_num,$bUseFlashXY=false,$scroll=true)
	{
		$params = array( "x" => $x , "y" => $y , "flash_num" => $flash_num , "bUseFlashXY" => $bUseFlashXY, "scroll" => $scroll );
		return $this->call_boolean(__FUNCTION__,$params);
	}

        	function get_mouse_pos_to_flash_player($flash_num,$x="",$y="")
	{
		$params = array( "x" => $x , "y" => $y , "flash_num" => $flash_num );
		return $this->call_get(__FUNCTION__,$params);
	}

        };
?>