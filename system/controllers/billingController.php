<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 22.10.13
 * Time: 11:12
 * To change this template use File | Settings | File Templates.
 */
class billingController extends baseController{
    public function index(){
        $vars = array();
        session_start();
        $this->bootstrap->model("billing");
        if (isset($_SESSION['login']) && (isset($_SESSION['secret'])
                && !empty($_SESSION['login'])) && !empty($_SESSION['secret'])
        ){

            $login =$_SESSION['login'];
            $author = $login;
            $secret = $_SESSION['secret'];
            if ($this->billing->CheckRule($login,$secret)){

            }else{
                header('Location: /auth/');
            }
        }else{
            header('Location: /auth/');
        }
        if (isset($_POST['datepicker'])  && isset($_POST['datepicker2']) &&
            isset($_POST['Name_f']) && isset($_POST['Fam_f']) && isset($_POST['Otch_f'])){
            $vars['data'] = $this->billing->ParseBillingData($_SESSION['page'],
                $_POST['datepicker'],$_POST['datepicker2'],$_POST['Name_f'],$_POST['Fam_f'],$_POST['Otch_f']
            );
        }else{
            if (!isset($_SESSION['page'])){
                session_start();
            }
            $vars['data'] = $this->billing->ParseBillingData($_SESSION['page']);
        }

        $kol = $this->billing->GetBillingDataCount($vars['data']);
        if (isset($_POST['page_next']) && $kol>=$_SESSION['page']+20){
            $_SESSION['page'] = $_SESSION['page']+20;
            if (isset($_POST['datepicker'])  && isset($_POST['datepicker2']) &&
                isset($_POST['Name_f']) && isset($_POST['Fam_f']) && isset($_POST['Otch_f'])){
                $vars['data'] = $this->billing->ParseBillingData($_SESSION['page'],
                    $_POST['datepicker'],$_POST['datepicker2'],$_POST['Name_f'],$_POST['Fam_f'],$_POST['Otch_f']
                );
            }else{
                $vars['data'] = $this->billing->ParseBillingData($_SESSION['page']);
            }
        }
        if(isset($_POST['page_pre']) && ($_SESSION['page']-20)>=0){
            $_SESSION['page'] = $_SESSION['page']-20;
            if (isset($_POST['datepicker'])  && isset($_POST['datepicker2']) &&
                isset($_POST['Name_f']) && isset($_POST['Fam_f']) && isset($_POST['Otch_f'])){
                $vars['data'] = $this->billing->ParseBillingData($_SESSION['page'],
                    $_POST['datepicker'],$_POST['datepicker2'],$_POST['Name_f'],$_POST['Fam_f'],$_POST['Otch_f']
                );
            }else{
                $vars['data'] = $this->billing->ParseBillingData($_SESSION['page']);
            }
        }
        $vars['test'] = "";
        $this->bootstrap->view('billing',$vars);
    }
}