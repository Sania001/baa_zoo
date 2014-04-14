<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 21.10.13
 * Time: 17:24
 * To change this template use File | Settings | File Templates.
 */
class authModel extends BaseModel{

    // Проверка данных в поле
    private function is_checked($val){

        if (isset($val)){
            $checked = preg_match('/^[a-zA-Z0-9_]{3,}$/',$val);
            if ($checked) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
// Генерация капчи
    public function cap(){
        session_start();
        $_SESSION['special'] = sha1(md5($this->_support->Cap()));
        return ''.$this->_support->Cap();
    }
    // Проверка капчи
    private function is_right_cap($val){
        if(isset($val) && (isset($_SESSION['special']) && $_SESSION['special'] == sha1(md5($val)))){
            return true;
        }
        else{
            return false;
        }
    }

    private function DB_checkout($login,$pass){
      $data = $this->_base->Query_simple($login,$pass);
        return $data;
    }
    public function setEntries(/*$access /*Переменная доступа*/){
        if((isset($_POST['accept_ko']) && !empty($_POST['login_ko'])) &&
            (!empty($_POST['pass_ko']) && $this->is_right_cap($_POST['cap_ko']))
            && $this->is_checked($_POST['login_ko']) && $this->is_checked($_POST['pass_ko'])
            && $this->is_checked($_POST['cap_ko'])
        ){
            $return = htmlspecialchars($_POST['login_ko']);
           $info = $this->DB_checkout($_POST['login_ko'],$_POST['pass_ko']);
            if ($info != null){
               $_SESSION['login'] = $info['login'];
                switch($info['rule']){
                    case 'ko_agent_guest': {
                        $_SESSION['login'] = $info['login'];
                        $_SESSION['secret'] = $this->_role->GenerateSecret($info['login'],$info['rule']);
                        header('Location: /photobase/');
                    }break;
                    case 'ko_agent_photografer':{

                        $_SESSION['login'] = $info['login'];
                        $_SESSION['secret'] = $this->_role->GenerateSecret($info['login'],$info['rule']);
                        header('Location: /uploader/');
                    }break;
                    case 'ko_agent_lead':
                    case 'ko_agent_super':{
                        $_SESSION['login'] = $info['login'];
                        $_SESSION['secret'] = $this->_role->GenerateSecret($info['login'],$info['rule']);
                        header('Location: /uploader/');
                    }break;
                    case 'ko_agent_handler':{
                        $_SESSION['login'] = $info['login'];
                        $_SESSION['secret'] = $this->_role->GenerateSecret($info['login'],$info['rule']);
                        header('Location: /inwork/');
                    }break;
                        default:{
                        header('Location: /auth/');
                        }

                }

            }
        }else{
            $return = 'Вы не смогли войти!<br/>Возможные причины:<br/> 1. Неверные логин
            или пароль; <br/> 2. Неверный проверочный код (капча).<br/>Попробуйте ввести данные снова';
        }
        return $return;
    }





    public function ShowResult($str,$str2,$str3){

       $d = $this->_base->Query_simple($str,$str2,$str3);
        return $d['balance'];

    }

}