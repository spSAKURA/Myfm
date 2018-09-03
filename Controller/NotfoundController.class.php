<?php
namespace Controller;

use Myfm\Controller as Controller;

class NotfoundController extends Controller{
	public function __construct(){
		header("HTTP/1.0 404 Not Found");
	}
}