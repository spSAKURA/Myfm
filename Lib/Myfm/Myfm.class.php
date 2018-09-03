<?php
namespace Myfm;

use Http\HttpRequest as HttpRequest;

use Http\HttpResponse as HttpResponse;

final class Myfm {

	//核心类库
	private static $_sys_lib = array(
		'Vendor',
		'Myfm',
		'Http',
		);

	/**
	 * 初始化服务
	 * @return [type] [description]
	 */
	public static $http_request;
	public static $http_response;

	public static function run(){
		# 绑定自动加载方法
		spl_autoload_register('Myfm\Myfm::autoload');
		
		#接收http请求
		self::getHttpRequest();

		#预处理请求
		self::makeHttpResponse();

		#做出应答
		// self::sendHttpResponse();

	}
	/**
	 * 自动加载方法
	 * @param  [type] $class [description]
	 * @return [type]        [description]
	 */
	public static function autoload($class){

		$path = '';

		$first_path = strstr($class, '\\', true);

		if(in_array($first_path,self::$_sys_lib)){//判断是否为系统类库
			$path = LIB_PATH;
		}elseif($first_path === 'Controller' || $first_path === 'Route'){
			$path = ROOT_PATH;
		}else{
			$path = VENDOR_PATH;
		}

		include $path . (IS_WIN ? $class : str_replace('\\', '/', $class)) . EXT;
	}
	/**
	 * 获取请求数据
	 * @return [type] [description]
	 */
	public static function getHttpRequest()
	{
		self::$http_request = new HttpRequest();
	}
	/**
	 * [makeHttpResponse description]
	 * @return [type] [description]
	 */
	public static function makeHttpResponse()
	{
		self::$http_response = new HttpResponse($this);
	}

	// public static function sendHttpResponse()
	// {
	// 	self::$http_request = new HttpRequest();
	// }
}