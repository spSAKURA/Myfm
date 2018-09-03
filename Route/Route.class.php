<?php
namespace Route;
class Route {
	/**
	 * 存放不含参数的路由规则
	 * @var array
	 */
	protected static $_route = array(
		'auto' => '@Hello',
		);
	/**
	 * 存放含有参数路由规则
	 * @var array
	 */
	protected static $_args_route = array(
		'user/{:args}' => '@User',
		);

	public static function route($url, $pathinfo, $method){
		$pathinfo        = trim($pathinfo,'/');
		$is_route = isset(self::$_route[$pathinfo]) ;
		// $is_route        = isset(self::$_route[$pathinfo]) ;
		$controller = 'Controller\NotfoundController';
		if($is_route) {

			if(self::$_route[$pathinfo][0]==='@') 
				$controller = 'Controller\\' . ltrim(self::$_route[$pathinfo],'@') . 'Controller';

		}
		return $controller;
	}
}