<?php
/**
 *自动加载配置文件
 * @param  string $config [description]
 * @return [type]         [description]
 */
function loadConfig($config='config')
{
	$file_path = './Res/Config/';    //配置文件路径
	$file_name = $config.'.php';     //文件名
	$path = $file_path . $file_name; //完整路径
	if(file_exists($path)){
		$temp = include $path;
		if($config == 'config'){
			foreach ($temp['CONFIG'] as $c) {
				if($other_config = loadConfig($c))
					if(!is_array($other_config))
						throw new Exception($c . '格式不正确,需要返回数组');
					else
						$temp[strtoupper($c)] = $other_config;
			}
		}
		return $temp;
	}else{
		throw new Exception($file_name.' 文件不存在');
	}		
		
}
/**
 * 读取配置文件方法 
 * @param [string] $option 配置项名称
 * @return  [array|string] [配置项的值]
 */
function C($option){
	$value = $GLOBALS['config'];
	if($option){
		$key_array = explode(',',strtoupper($option));
		foreach ($key_array as $key) {
			$value = $value[$key];
		}
	}
	return $value;
}
