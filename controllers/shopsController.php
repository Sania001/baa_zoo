<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 18.12.13
 * Time: 11:38
 * To change this template use File | Settings | File Templates.
 */
class shopsController extends baseController{
    public function index(){
        $vars = array();
        $this->bootstrap->view("shops",$vars);
    }
}