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

	protected $_response_type = '';

	protected $_response = null;
	/**
	 * 构造http应对象
	 * @param HttpRequest $r 
	 */
	public function __construct(HttpRequest $r)
	{
		$this->_response = $r->getResponse();
		$this->_response_type = $this->_response['type'];
	}

	public static function response(HttpResponse $r)
	{
		if($r->_response_type==='controller'){
			$response = new $r->_response['controller']($r->_response['params']);
			$response->pre()->main()->suf();
		}
	}
}