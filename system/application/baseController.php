<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 13.10.13
 * Time: 18:59
 * To change this template use File | Settings | File Templates.
 */
abstract class baseController{
    protected  $_registry;
    protected $_role;
    protected $accessLevel;

    protected  $bootstrap;
    public function __construct(){
        $this->_registry = Registry::getInstance();
        $this->bootstrap = new BootStrap();
        $this->_role = new UserManagement();
        $this->accessLevel = $this->_role->UserLevel(1);
    }
        abstract  public function  index();

    final public function __get($key){
        if ($return = $this->_registry->$key){
            return $return;
        }
        return false;
    }
}