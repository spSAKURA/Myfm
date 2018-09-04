<?php
namespace Myfm;
class Route {
	/**
	 * 存放不含参数的路由规则
	 * @var array
	 */
	protected static $_route = array();
	/**
	 * 存放含有参数路由规则
	 * @var array
	 */
	protected static $_args_route = array();

	public static function route($url, $pathinfo, $method){
		#加载路由配置
		self::$_route = config('<Route>.ROUTE');
		self::$_args_route = config('<Route>.ARGS_ROUTE');
		#初始化变量
		$pathinfo   = trim($pathinfo,'/');
		$type       = 'controller';
		$controller = 'Controller\NotfoundController';
		$params     = array();

		if(isset(self::$_route[$pathinfo])) {//判断是否为不带变量的路由
			if(self::$_route[$pathinfo][0]==='@') 
				$controller = 'Controller\\' . ltrim(self::$_route[$pathinfo],'@') . 'Controller';
		}else{
			$pathinfo = explode('/', $pathinfo);
			foreach (self::$_args_route as $route => $control) {
				$route = explode('/', $route);
				$count = count($route);
				if($count!=count($pathinfo))
					continue;
				$is_args_route = true;
				for($i=0;$i<$count;$i++){
					if($route[$i][0]===':'){
						$params[ltrim($route[$i],':')] = $pathinfo[$i];
					}else{
						if($pathinfo[$i]!=$route[$i]){
							$is_args_route = false;
							break;
						}
					}
				}
				if($is_args_route){
					$controller = 'Controller\\' . ltrim($control,'@') . 'Controller';
					break;
				}
			}
		}

		return [
			'type'       => $type,
			'controller' => $controller,
			'params'     => $params
			];
	}
}