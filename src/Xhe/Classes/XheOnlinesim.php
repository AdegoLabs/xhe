<?php
namespace Xhe;

class XheOnlineSimRu extends XheBaseObject
{
	var $dev_key= "513747";
	var $dev_id = "513747";
	var $apikey="";
	var $timeout=60;

	
                function __construct()
        {
		$this->server = "onlinesim.ru/api";
        }

        	
	        function login($user,$password,$email)
	{
		$params = array( "user" => $user , "password" => $password , "email" => $email , "dev_key" => $this->dev_key , "dev_id" => $this->dev_key );
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
	        function getServiceList()
	{
		$params = array( "apikey" => $this->apikey );
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
		function getNum($service,$form="",$forward_number="",$forward_minutes="",$clean_call="",$simoperator="",$extension="",$region="")
	{
		$params = array( "apikey" => $this->apikey , "service" => $service , "form" => $form,"forward_number" => $forward_number,"forward_minutes" => $forward_minutes, "clean_call" => $clean_call, "simoperator" => $simoperator, "extension" => $extension,"region" => $region , "dev_key" => $this->dev_key , "dev_id" => $this->dev_key);
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
		function setForwardStatusEnable($tzid)
	{
		$params = array( "apikey" => $this->apikey , "tzid" => $tzid );
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
		function getState($tzid,$message_to_code="",$form="",$orderby="")
	{
		$params = array( "apikey" => $this->apikey , "tzid" => $tzid , "message_to_code" => $message_to_code , "form" => $form , "orderby" => $orderby);
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
		function getOperations()
	{
		$params = array( "apikey" => $this->apikey );
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
		function setOperationRevise($tzid)
	{
		$params = array( "apikey" => $this->apikey , "tzid" => $tzid );
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
		function setOperationOk($tzid)
	{
		$params = array( "apikey" => $this->apikey , "tzid" => $tzid );
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
		function getBalance()
	{
		$params = array( "apikey" => $this->apikey );
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
		function getService()
	{
		$params = array( "apikey" => $this->apikey );
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
		function getServiceNumber($service)
	{
		$params = array( "apikey" => $this->apikey , "service" => $service);
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
		function getNumRepeat($service,$number)
	{
		$params = array( "apikey" => $this->apikey , "service" => $service , "number" => $number);
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
		function forwardingList($id="",$page="",$sort="")
	{
		$params = array( "apikey" => $this->apikey , "id" => $id , "page" => $page , "sort" => $sort );
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
		function forwardingSave($id,$minutes="",$auto="",$forward_number="",$max_minutes="")
	{
		$params = array( "apikey" => $this->apikey , "id" => $id , "minutes" => $minutes , "auto" => $auto , "forward_number" => $forward_number, "max_minutes" => $max_minutes );
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
		function forwardingRemove($id)
	{
		$params = array( "apikey" => $this->apikey , "id" => $id  );
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
	        function getForwardPaymentsList($id)
	{
		$params = array( "apikey" => $this->apikey , "id" => $id  );
	    	$res=$this->call_get(__FUNCTION__.".php",$params,$this->timeout);
		return json_decode($res,JSON_UNESCAPED_UNICODE);
	}
};

?>