<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 21.10.13
 * Time: 17:15
 * To change this template use File | Settings | File Templates.
 */
class authController extends baseController{
    public function index(){
        session_start();
        $this->bootstrap->model('auth');
        //Проверка ввода
     // Проверка уровня доступа   $vars['test'] = $this->accessLevel;
        $vars['c'] = $this->auth->setEntries();
        $this->bootstrap->view('auth',$vars);
        if (isset($_POST['go_ko'])){
            echo "<script>window.location.href = '/reg/'</script>";
        }
    }
    public function close(){
        session_start();
        session_destroy();
        echo 'Выход произведен! ';
    }
}