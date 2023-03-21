<?php

namespace Xhe;

use XhePosition;
use App\Classes\Anticaptcha;

class XheImage extends XheImageCompatible {

	function __construct($server,$password="") {    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Image";
	}
	function show_by_number($number,$frame=-1)
        {
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // �������� �������� � �������� ������
	function show_by_name($name,$frame=-1)
        {
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // �������� �������� � �������� src
	function show_by_src($src,$exactly=true,$frame=-1)
        {
		$this->wait_element_exist_by_attribute("src",$src,$exactly,$frame);		

		$params = array( "src" => $src , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // �������� �������� � �������� alt
	function show_by_alt($alt,$exactly=true,$frame=-1)
        {
		$this->wait_element_exist_by_attribute("alt",$alt,$exactly,$frame);		

		$params = array( "alt" => $alt , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // �������� �������� � �������� ��������� ���������
	function show_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
        {
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);		

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value ,  "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// ��������� ��� �������� � �������� ������� ��� ���������
	function is_complete_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// ��������� ��� �������� � �������� ������ ��� ���������
   	function is_complete_by_name($name,$frame=-1)
	{
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params); 
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// �������� ���� �������� �������� �� � ������
	function get_file_create_date_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
   	// �������� ���� �������� �������� �� � �����
	function get_file_create_date_by_name($name,$frame=-1)
	{
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params); 
	}

	// �������� ���� ���������� ��������� �������� �� � ������
	function get_file_modification_date_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
	// �������� ���� ���������� ��������� �������� �� � �����
	function get_file_modification_date_by_name($name,$frame=-1)
	{
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params); 
	}

	// �������� ������ �������� �� � ������
	function get_file_size_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
	// �������� ������ �������� �� � �����
	function get_file_size_by_name($name,$frame=-1)
	{
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params); 
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

    	// ���������� ����� �� �������� ����������� ���������
	function recognize_captcha($file_path,$type)
	{
		$params = array( "file_path" => $file_path , "type" => $type );
		return $this->call_get(__FUNCTION__,$params);
	}
    
	function recognize_by_anticaptcha($src,$file_path,$key,$path='http://anti-captcha.com',$is_verbose = true, $rtimeout = 5, $mtimeout = 120, $is_phrase = 0, $is_regsense = 0, $is_numeric = 0, $min_len = 0, $max_len = 0,$frame=-1,$is_russian = 0) {
		if ($src!="") {
			$this->wait_element_exist_by_attribute("src",$src,false,$frame);		

			if (!$this->screenshot_by_src($file_path,$src,false,$frame))
				return false;
        }
		
		$anticaptcha = new Anticaptcha($this->server);

		return $anticaptcha->recognize($file_path,$key,$path,$is_verbose,$rtimeout,$mtimeout,$is_phrase,$is_regsense,$is_numeric,$min_len,$max_len,$is_russian);
    }
	
	/*
	function recognize_by_rucaptcha($src,$file_path,$key,$path='http://rucaptcha.com',$is_verbose = true, $rtimeout = 5, $mtimeout = 120, $is_phrase = 0, $is_regsense = 0, $is_numeric = 0, $min_len = 0, $max_len = 0,$frame=-1,$is_russian = 0)
        {
		// save
		if ($src!="")
                {
			$this->wait_element_exist_by_attribute("src",$src,false,$frame);		

			if (!$this->screenshot_by_src($file_path,$src,false,$frame))
				return false;
                }

		// recognize
               	global $rucaptcha;
               	return $rucaptcha->recognize($file_path,$key,$path,$is_verbose,$rtimeout,$mtimeout,$is_phrase,$is_regsense,$is_numeric,$min_len,$max_len,$is_russian);
        }
        // ���������� ����� �� �������� ����� ������ bypasscaptcha.com
	function recognize_by_bypasscaptcha($systemkey,$file_path,$src="",$frame=-1)
        {
		// save
		if ($src!="")
		{
			$this->wait_element_exist_by_attribute("src",$src,false,$frame);

			if (!$this->screenshot_by_src($file_path,$src,false,$frame))
				return false;
		}

          
		// recognize
          	global $bypasscaptcha;
          	$bypasscaptcha->set_system_key($systemkey);
          	return $bypasscaptcha->recognize($file_path);
        }        	
*/
        /////////////////////////////////////////////////////////////////////////////////////////////////////

        // �������� ����� �������� - ��� ����� ��������
	function get_image($src_path,$image_path,$x,$y,$width,$height)
        {
		$params = array( "src_path" => $src_path , "image_path" => $image_path , "x" => $x , "y" => $y , "width" => $width , "height" => $height  );
		return $this->call_boolean(__FUNCTION__,$params);
        }        	
        // �������� x - ���������� ��������� �������� ��������
	function get_x_of_image($src_path,$image_path,$koeff=0.95)
        {
		$params = array( "src_path" => $src_path , "image_path" => $image_path , "koeff" => $koeff );
		return $this->call_get(__FUNCTION__,$params);
        }        	
        // �������� y - ���������� ��������� �������� ��������
	function get_y_of_image($src_path,$image_path,$koeff=0.95)
        {
		$params = array( "src_path" => $src_path , "image_path" => $image_path , "koeff" => $koeff );
		return $this->call_get(__FUNCTION__,$params);
        }        	
        // �������� ������� ��������� �������� ��������
	function get_pos_of_image($src_path,$image_path,$koeff=0.95)
        {
		$params = array( "src_path" => $src_path , "image_path" => $image_path , "koeff" => $koeff );
	        $res = explode("@",$this->call_get(__FUNCTION__,$params,600));
		if (count($res)>=2)
			return new XHEPosition($res[0],$res[1]);
		else
			return new XHEPosition(-1,-1);
        }        	
        // �������� ������� ��������� �������� ��������
	function get_all_pos_of_image($src_path,$image_path,$koeff=0.95)
        {
		$out= array();				
		$params = array( "src_path" => $src_path , "image_path" => $image_path , "koeff" => $koeff );
		$res = $this->call_get(__FUNCTION__,$params,600);			        
		if ($res=="")
			return $out;		
		$res = explode("@",$res);		
		for ($i=0;$i<count($res);$i++)		
		{
			$pp = explode(":",$res[$i]);
			array_push($out, new XhePosition($pp[0],$pp[1]));
		}
		return $out;
        }        	
        // �������� �������� � ��������
	function add_image($src_path,$image_path,$side="right")
        {
		$params = array( "src_path" => $src_path , "image_path" => $image_path , "side" => $side );
		return $this->call_boolean(__FUNCTION__,$params);
        }        		

        /////////////////////////////////////////////////////////////////////////////////////////////////////

	// ������� ��������� ���������� ��� ����� � ������������� (��� ����� ������� ������)
	function create_median_image_by_folder_of_images($image_path, $folder)
	{
		$params = array( "image_path" => $image_path , "folder" => $folder );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// ��������� ��� ����������
	function save_as_gray($inpath,$outpath)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// �������� ������� �������� (� ����������� ���������)
	function resize($inpath,$outpath,$scale,$scaleType=1)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath , "scale" => $scale , "scaleType" => $scaleType );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// ������������� ��������
	function invert($inpath,$outpath)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// ������ ���
	function remove_noise($inpath,$outpath,$kernel_size=3)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath , "kernel_size" => $kernel_size
 );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////
};	
?>