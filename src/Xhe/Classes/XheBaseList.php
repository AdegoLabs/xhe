<?php
namespace Xhe;
use ArrayAccess,IteratorAggregate, Countable;

class XheBaseList implements ArrayAccess,IteratorAggregate,Countable
{
	/////////////////////////////////////// SERVICE VARIABLES ///////////////////////////////////////////
	// inner number
	var $inner_numbers;
	var $elements=array();
	// server address and port
	var $server;
	// server password
	var $password;
	/////////////////////////////////////// SERVICE FUNCTIONS ///////////////////////////////////////////
	// server initialization
	function __construct($inner_numbers,$server,$password="")
	{    
		$this->inner_number = $inner_numbers;
		$this->server = $server;
		$this->password = $password;
	}

        /////////////////////////////////////////////////////////////////////////////////////////////////////

    	public function __call($name, $arguments) 
	{
		$res=array();
		for ($i=0;$i<count($this->elements);$i++) 
		{	
			if (count($arguments)==0)		
				$res[$i]=$this->elements[$i]->$name();
			if (count($arguments)==1)		
				$res[$i]=$this->elements[$i]->$name($arguments[0]);
			else if (count($arguments)==2)		
				$res[$i]=$this->elements[$i]->$name($arguments[0],$arguments[1]);
			else if (count($arguments)==3)		
				$res[$i]=$this->elements[$i]->$name($arguments[0],$arguments[1],$arguments[2]);
			else if (count($arguments)==4)		
				$res[$i]=$this->elements[$i]->$name($arguments[0],$arguments[1],$arguments[2],$arguments[3]);
			else if (count($arguments)==5)		
				$res[$i]=$this->elements[$i]->$name($arguments[0],$arguments[1],$arguments[2],$arguments[3],$arguments[4]);
			else if (count($arguments)==6)		
				$res[$i]=$this->elements[$i]->$name($arguments[0],$arguments[1],$arguments[2],$arguments[3],$arguments[4],$arguments[4]);
		}
		return $res;
	}
        /////////////////////////////////////////////////////////////////////////////////////////////////////

	public function offsetExists($offset): bool
	{ 
		if(isset($this->elements[$offset]))  
			return TRUE;
		else 
			return FALSE;           
	} 
	public function offsetGet($offset): mixed
	{ 
		if ($this->offsetExists($offset))  
			return $this->elements[$offset];
		else 
			return (false);
	}
	public function offsetSet($offset, $value): void
	{    
        	if ($offset)  
			$this->elements[$offset] = $value;
        	else  
			$this->elements[] = $value;
	}
        public function offsetUnset($offset): void
	{ 
		unset ($this->elements[$offset]);
        } 
    	function getIterator(): Traversable
    	{
        	return new ArrayIterator($this->elements);
    	}
	public function count() : int //This is necessary for the Countable interface. It could as easily return
	{ 
    		return count($this->elements);    //count($this->container). The number of elements will be the same.
  	}
        // получить число элементов
   	function get_count()
   	{
		return count ($this->elements);
   	}
        // получить элемент
   	function get($index)
   	{
		if ($index<count($this->elements))
			return $this->elements[$index];
		else
			return false;
   	}
        /////////////////////////////////////////////////////////////////////////////////////////////////////


}

?>