<?php
/**
 * @date 20180127
 * @author ZhaoJ zhaojangyu@outlook.com
 */
#框架入口文件

#操作系统 是否为windows
define('IS_WIN'          ,
	(substr(PHP_OS, 0, 3) === 'WIN')? true : false
	);

#目录分隔符
define('S'               ,
	IS_WIN ? '\\' : '/'
	);
/**
 *   定义目录
 */
#框架根目录绝对路径
define('ROOT_PATH'       ,   __DIR__ . S ); 

#入口文件文件名
define('INDEX'           ,   'index.php');

#类文件后缀
define('EXT'             ,   '.class.php');

#核心类库目录
define('LIB_PATH'        ,   ROOT_PATH     . 'Lib'        . S);

#第三方类库目录
define('VENDOR_PATH'     ,   LIB_PATH      . 'Vendor'     . S);

#控制器目录
define('CONTROLLER_PATH' ,   ROOT_PATH     . 'Controller' . S);

#资源目录
define('RESOURCE_PATH'   ,   ROOT_PATH     . 'Res'        . S);

#视图模板目录
define('LAYOUT_PATH'     ,   RESOURCE_PATH . 'Layout'     . S);

#静态资源目录
define('PUBLIC_PATH'     ,   RESOURCE_PATH . 'Public'     . S);

/**
 *
 *
 *
 *
 * 
 */

#加载核心类文件
include LIB_PATH . 'Myfm' . S . 'Myfm' . EXT;

#初始化服务
Myfm\Myfm::run();
