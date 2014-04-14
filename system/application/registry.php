<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 13.10.13
 * Time: 18:58
 * To change this template use File | Settings | File Templates.
 */
class Registry{
    private  static  $_instanse;
    private $_storage;
    private function __construct(){}

    public static function getInstance(){
        if(!self::$_instanse instanceof self){
            self::$_instanse = new Registry();
        }
        return self::$_instanse;
    }
    public function __set($key,$val){
        $this->_storage[$key] = $val;
    }
    public function __get($key){
        if(isset($this->_storage[$key])){
            return $this->_storage[$key];
        }
        return false;
    }
}