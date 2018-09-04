<?php
return array(
	'DEFAULT_ROUTE' => 'auto', //默认路由

	'ROUTE' => array(
		'auto'  =>  '@hello',
		),

	'ARGS_ROUTE' => array(
		//test
		'user/:args' => '@User',
		'wtf/:s/:m'=>'@User',
		),
	);