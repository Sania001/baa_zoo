<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 13.10.13
 * Time: 18:54
 * To change this template use File | Settings | File Templates.
 */
class indexController extends baseController{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $vars = array();
        $vars['title'] = 'Сеть магазинов зоотоваров';

        $this->bootstrap->view('index',$vars);

    }

}