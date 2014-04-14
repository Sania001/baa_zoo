<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 17.10.13
 * Time: 12:35
 * To change this template use File | Settings | File Templates.
 */
class capController extends baseController{
    public function index(){
        $this->bootstrap->model('auth');
        $this->auth->cap();
    }

}