<?php
/**
 * 全局函数
 */

/**
 * 读取配置项
 * @param  String $key 配置项
 * @return string|array      值
 */
function config($key){
	$value     = NULL;
	$filename  = 'Config.php';
	$key_array = explode('.',$key);
	$first_key = $key_array[0];
	$flag      = 0;
	if($first_key[0]==='<'&&$first_key[strlen($first_key)-1]==='>'){
		$filename = ltrim(rtrim($first_key,'>'),'<') . '.php';
		$flag     = 1;
	}
	$value = include CONFIG_PATH . $filename;
	for (;$flag < count($key_array); $flag++) {
		if(isset($value[$key_array[$flag]])){
			$value = $value[$key_array[$flag]];
		}else{
			$value = NULL;
			break;
		}
	}
	return $value;
}