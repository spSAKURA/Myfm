<?php 
namespace Http;

use Http\Http as Http;
use Myfm\Route as Route;

class HttpRequest{

	protected $_url      = '';//请求地址
	protected $_method   = '';
	protected $_pathinfo = '';
	protected $_response = null;

	public function __construct(){

		$this->_url      = urldecode($_SERVER['REQUEST_URI']);
		$this->_method   = $_SERVER['REQUEST_METHOD'];
		$this->_pathinfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : config('<Route>.DEFAULT_ROUTE') ;
		$this->_response = Route::route($this->_url, $this->_pathinfo, $this->_method);

	} 

	public function getResponse(){
		return $this->_response;
	}

	public function __destruct(){
		// echo '1';
	}
}