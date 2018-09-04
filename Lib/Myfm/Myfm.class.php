<?php
namespace Myfm;

use Http\HttpRequest as HttpRequest;

use Http\HttpResponse as HttpResponse;
/**
 * 引导类
 */
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
		# 注册错误处理方法
		// set_exception_handler('Myfm\Myfm::exception_hander');
		#接收http请求
		self::getHttpRequest();
		#处理请求
		self::makeHttpResponse();
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
	 * 错误异常处理
	 * @return [type] [description]
	 */
	public static function exception_hander($e){
		#code here
		var_dump($e);
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
		self::$http_response = new HttpResponse(self::$http_request);

		HttpResponse::response(self::$http_response);
	}

	// public static function sendHttpResponse()
	// {
	// 	self::$http_request = new HttpRequest();
	// 
	
}