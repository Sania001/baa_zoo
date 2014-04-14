<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 17.10.13
 * Time: 13:24
 * To change this template use File | Settings | File Templates.
 */
class errorController extends baseController{
    public function index(){

    }
    public function  error($message = 'No information about the error'){
        echo '<pre>'.print_r($message,1).'</pre>';
    }
}