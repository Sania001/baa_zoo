<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 13.10.13
 * Time: 18:23
 * To change this template use File | Settings | File Templates.
 */
define ('SITE_PATH',realpath(dirname(__FILE__)).'/');

require_once(SITE_PATH.'system/application/request.php');
require_once(SITE_PATH.'system/application/router.php');
require_once(SITE_PATH.'system/application/baseController.php');
require_once(SITE_PATH.'system/application/baseModel.php');
require_once(SITE_PATH.'system/application/bootstrap.php');
require_once(SITE_PATH.'system/application/rules.php');
require_once(SITE_PATH.'system/application/registry.php');
require_once(SITE_PATH.'system/application/support.php');
require_once(SITE_PATH.'system/application/database.php');
require_once(SITE_PATH.'system/controllers/errorController.php');

try{
    Router::route(new Request());
}catch (Exception $e){
    $controller = new errorController();
    $controller->error($e->getMessage());
}