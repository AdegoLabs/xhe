<?php
namespace Xhe;

use XhePosition;
use \App\Classes\Anticaptcha;

class XheImage extends XheImageCompatible
{
	/////////////////////////////////////// SERVICE /////////////////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Image";
	}
        /////////////////////////////////////////////////////////////////////////////////////////////////////

        // показать картинку с заданным номером
        function show_by_number($number,$frame=-1)
        {
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // показать картинку с заданным именем
        function show_by_name($name,$frame=-1)
        {
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // показать картинку с заданным src
        function show_by_src($src,$exactly=true,$frame=-1)
        {
		$this->wait_element_exist_by_attribute("src",$src,$exactly,$frame);		

		$params = array( "src" => $src , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // показать картинку с заданным alt
        function show_by_alt($alt,$exactly=true,$frame=-1)
        {
		$this->wait_element_exist_by_attribute("alt",$alt,$exactly,$frame);		

		$params = array( "alt" => $alt , "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // показать картинку с заданным значением аттрибута
        function show_by_attribute($attr_name,$attr_value,$exactly=true,$frame=-1)
        {
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);		

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value ,  "exactly" => $exactly , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
        }

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// проверить что картинка с заданным номером уже загружена
	function is_complete_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// проверить что картинка с заданным именем уже загружена
   	function is_complete_by_name($name,$frame=-1)
	{
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params); 
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить дату создания картинки по её номеру
	function get_file_create_date_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
   	// получить дату создания картинки по её имени
	function get_file_create_date_by_name($name,$frame=-1)
	{
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params); 
	}

	// получить дату последнего изменения картинки по её номеру
	function get_file_modification_date_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
	// получить дату последнего изменения картинки по её имени
	function get_file_modification_date_by_name($name,$frame=-1)
	{
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params); 
	}

	// получить размер картинки по её номеру
	function get_file_size_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params);
	}
	// получить размер картинки по её имени
	function get_file_size_by_name($name,$frame=-1)
	{
		$this->wait_element_exist_by_name($name,$frame);		

		$params = array( "name" => $name , "frame" => $frame );
		return $this->call_get(__FUNCTION__,$params); 
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

    	// распознать капчу из картинки встроенными функциями
	function recognize_captcha($file_path,$type)
	{
		$params = array( "file_path" => $file_path , "type" => $type );
		return $this->call_get(__FUNCTION__,$params);
	}
        // распознать капчу из картинки через сервис antigate.com
        function recognize_by_anticaptcha($src,$file_path,$key,$path='http://anti-captcha.com',$is_verbose = true, $rtimeout = 5, $mtimeout = 120, $is_phrase = 0, $is_regsense = 0, $is_numeric = 0, $min_len = 0, $max_len = 0,$frame=-1,$is_russian = 0)
        {
		// save
		if ($src!="")
                {
			$this->wait_element_exist_by_attribute("src",$src,false,$frame);		

			if (!$this->screenshot_by_src($file_path,$src,false,$frame))
				return false;
                }

		// recognize
               	$anticapcha = new Anticaptcha($this->server);
               	return $anticapcha->recognize($file_path,$key,$path,$is_verbose,$rtimeout,$mtimeout,$is_phrase,$is_regsense,$is_numeric,$min_len,$max_len,$is_russian);
        }
        
		// распознать капчу из картинки через сервис rucaptcha.com
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
		*/
        // распознать капчу из картинки через сервис bypasscaptcha.com
		/*
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

        // получить новую картинку - как часть заданной
        function get_image($src_path,$image_path,$x,$y,$width,$height)
        {
		$params = array( "src_path" => $src_path , "image_path" => $image_path , "x" => $x , "y" => $y , "width" => $width , "height" => $height  );
		return $this->call_boolean(__FUNCTION__,$params);
        }        	
        // получить x - координату вхождения заданной картинки
        function get_x_of_image($src_path,$image_path,$koeff=0.95)
        {
		$params = array( "src_path" => $src_path , "image_path" => $image_path , "koeff" => $koeff );
		return $this->call_get(__FUNCTION__,$params);
        }        	
        // получить y - координату вхождения заданной картинки
        function get_y_of_image($src_path,$image_path,$koeff=0.95)
        {
		$params = array( "src_path" => $src_path , "image_path" => $image_path , "koeff" => $koeff );
		return $this->call_get(__FUNCTION__,$params);
        }        	
        // получить позицию вхождения заданной картинки
        function get_pos_of_image($src_path,$image_path,$koeff=0.95)
        {
		$params = array( "src_path" => $src_path , "image_path" => $image_path , "koeff" => $koeff );
	        $res = explode("@",$this->call_get(__FUNCTION__,$params,600));
		if (count($res)>=2)
			return new XhePosition($res[0],$res[1]);
		else
			return new XhePosition(-1,-1);
        }        	
        // получить позицию вхождения заданной картинки
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
        // добавить картинку к заданной
        function add_image($src_path,$image_path,$side="right")
        {
		$params = array( "src_path" => $src_path , "image_path" => $image_path , "side" => $side );
		return $this->call_boolean(__FUNCTION__,$params);
        }        		

        /////////////////////////////////////////////////////////////////////////////////////////////////////

	// создать медианное изображние для папки с изображениями (для теста водяных знаков)
	function create_median_image_by_folder_of_images($image_path, $folder)
	{
		$params = array( "image_path" => $image_path , "folder" => $folder );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// сохранить как GrayScale
	function save_as_gray($inpath,$outpath)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// сохранить как Blackhat
	function save_as_blackhat($inpath,$outpath)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// изменить размер
	function resize($inpath,$outpath,$scale,$scaleType=1)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath , "scale" => $scale , "scaleType" => $scaleType );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// инвертировать
	function invert($inpath,$outpath)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// удалить шум
	function remove_noise($inpath,$outpath,$kernel_size=3)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath , "kernel_size" => $kernel_size );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// получить картинку с MRZ областью
	function get_mrz_image($inpath,$outpath)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// исправить наклонный текст на картинке
	function fix_skew_text($inpath,$outpath)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// распарсить MRZ
	function parse_mrz($mrz,$mrz_type="PNRUS")
	{
		$params = array( "mrz" => $mrz , "mrz_type" => $mrz_type );
		$res = $this->call_get(__FUNCTION__,$params);
		if ($res!="")
			return json_decode($res);
		else
			return false;
	}
	// преобработать картинку перед передачей OCR
	function preprocess_for_ocr($inpath,$outpath,$image_size=1800,$binary_treshhold=180,$need_deskew=true)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath , "image_size" => $image_size , "binary_treshhold" => $binary_treshhold , "need_deskew" => $need_deskew );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// конвертация картинки в другой тип
	function convert($inpath,$outpath)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// убрать лишние границы у картинки
	function unborder($inpath,$outpath,$struct_x=220,$struct_y=20,$smooth_xy=3)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath , "struct_x" => $struct_x , "struct_y" => $struct_y , "smooth_xy" => $smooth_xy );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// получить угол поворота
	function get_rotated_angle($inpath,$min=-8,$max=8,$step=1)
	{
		$params = array( "inpath" => $inpath , "min" => $min , "max" => $max , "step" => $step );
		return $this->call_get(__FUNCTION__,$params);
	}
	// повернуть на заданный угол
	function rotate($inpath,$outpath,$angle,$center_x=-1, $center_y=-1)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath , "angle" => $angle , "center_x" => $center_x , "center_y" => $center_y );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// изменить ширину (сохранением пропорций картинки)
	function rewidth($inpath,$outpath,$width)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath , "width" => $width );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// получить область с QR кодом
	function get_qr_code($inpath,$outpath)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath);
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// распознать картинку с QR кодом
	function recognize_qr_code($path)
	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
	}
	// удалить вертикальные и горизонтальные линии с картинки
	function remove_lines($inpath,$outpath,$is_remove_h=true,$is_remove_v=true,$struct_h=50,$struct_v=50,$thickness=5)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath , "is_remove_h" => $is_remove_h , "is_remove_v" => $is_remove_v , "struct_v" => $struct_v , "struct_h" => $struct_h , "thickness" => $thickness );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// получить пиксели заданного цвета с картинки
	function filter_by_color($inpath,$outpath,$min_color,$max_color)
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath , "min_color" => $min_color , "max_color" => $max_color );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// получить DPI картинки
	function get_dpi($path,$is_horizontal=true,$in_pixels=false)
	{
		$params = array( "path" => $path , "is_horizontal" => $is_horizontal , "in_pixels" => $in_pixels );
		return $this->call_get(__FUNCTION__,$params);
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////
};	
?>