<?php
namespace Http;

use Http\Http as Http;

use Http\HttpRequest as HttpRequest;
/**
 * http应答类
 * 静态方法  执行操作 发送应答等
 * 非静态方法 构造应答对象 数据预处理 存储临时数据
 */
class HttpResponse {
	// 应答类型
	const RES_JSON   = 0;//json字符串
	const RES_LAYOUT = 1;//html页面
	const RES_STATIC = 2;//静态资源


	protected $_response_type = '';
	/**
	 * 构造http应对象
	 * @param HttpRequest $r 
	 */
	public function __construct(HttpRequest $r)
	{

	}

	public static function response(HttpResponse $r)
	{

	}
}