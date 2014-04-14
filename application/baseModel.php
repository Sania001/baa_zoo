<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 13.10.13
 * Time: 18:58
 * To change this template use File | Settings | File Templates.
 */
 abstract class BaseModel{

    protected $_registry;
    protected $_role;
    protected $_support;
    protected $_base;

    public function __construct(){
        $this->_registry = Registry::getInstance();
        $this->_role = new UserManagement();
        $this->_support = new Support();
        $this->_base = new Database();
        $this->_base->Connect();
    }

     final public function __get($key){
         if ($return = $this->_registry->$key){
             return $return;
         }
         return false;
     }

}