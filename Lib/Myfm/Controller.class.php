<?php
namespace Myfm;

class Controller {

	protected $_params = array();

	public function __construct(){
		$this->_params =  func_get_args()[0];
	}

	public function __get($key){
		if(isset($this->_params[$key]))
			return $this->_params[$key];
		else
			return NULL;
	}

	public function pre(){
		return $this;
	}

	public function main(){
		return $this;
	}

	public function suf(){
		return $this;
	}
}