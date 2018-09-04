<?php
namespace Controller;

use Myfm\Controller as Controller;

class UserController extends Controller{
	public function main(){
		var_dump($this->_params);
	}
}
