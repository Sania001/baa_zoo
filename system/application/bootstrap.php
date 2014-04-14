<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 13.10.13
 * Time: 18:30
 * To change this template use File | Settings | File Templates.
 */
error_reporting (E_ALL);
class BootStrap{

        public  function view($name, array $vars = null){
            $view = $name.'View.php';
            $viewPath = SITE_PATH.'system/views/'.$view;

               if(is_readable($viewPath)){

                   if(isset($vars)){
                        extract($vars);
                   }
                   require($viewPath);
                   return true;
               }
            throw new Exception('View issues');
        }

        public function model($name){
            $model = $name.'Model';
            $modelPath = SITE_PATH.'system/models/'.$model.'.php';

            if(is_readable($modelPath)){
                require_once($modelPath);

                if (class_exists($model)){
                    $registry = Registry::getInstance();
                    $registry->$name = new $model;
                    return true;
                }
            }
            throw new Exception('Model issues');
        }
}