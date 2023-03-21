<?php

namespace Xhe;

class XheRange {
  var $Left;
  var $Top;
  var $Right;
  var $Bottom;

  
  function __construct($left,$top,$right,$bottom) {    
	$this->Left=$left;
	$this->Top=$top;
	$this->Right=$right;
	$this->Bottom=$bottom;
  }
  
  public function __toString() {
	return $this->Top.":".$this->Left.":".$this->Bottom.":".$this->Right;
  }
}
?>