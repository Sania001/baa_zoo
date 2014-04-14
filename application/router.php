<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 13.10.13
 * Time: 18:55
 * To change this template use File | Settings | File Templates.
 */
class Router{

    public static  function route(Request $request){
        $controller = $request->getController().'Controller';
        $method = $request->getMethod();
        $args = $request->getArgs();

        $controllerFile = SITE_PATH.'system/controllers/'.$controller.'.php';

        if(is_readable($controllerFile)){
            require_once $controllerFile;

            $controller = new $controller;
            $method = (is_callable(array($controller,$method))) ? $method : 'index';

            if(!empty($args)){
                call_user_func_array(array($controller,$method),$args);
            }else{
                call_user_func(array($controller,$method));
            }
            return;
        }

        throw new Exception('404 - '.$request->getController().'not found');
    }
}