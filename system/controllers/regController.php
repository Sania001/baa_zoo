<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 11.11.13
 * Time: 10:33
 * To change this template use File | Settings | File Templates.
 */
class regController extends baseController{
    public function index(){
        session_start();
        $vars = array();
        $this->bootstrap->model("reg");
        if(isset($_POST['reg_r'])){
           $vars['data'] =$this->reg->Register();
        }
        $this->bootstrap->view("reg",$vars);
    }
}