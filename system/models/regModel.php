<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 11.11.13
 * Time: 10:34
 * To change this template use File | Settings | File Templates.
 */
class regModel extends BaseModel{

    // Проверка данных в поле
    private function is_checked($val){

        if (isset($val)){
            $checked = preg_match('/^[a-zA-Z0-9А-яЁ _]{3,}$/ui',$val);
            if ($checked) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    private function is_right_cap($val){
        if(isset($val) && (isset($_SESSION['special']) && $_SESSION['special'] == sha1(md5($val)))){
            return true;
        }
        else{
            return false;
        }
    }
    public function CheckLogin($login){
       return $this->_base->SearchLogin($login);
    }

    public function Register(){
        if (isset($_POST['name_r']) && $this->is_checked($_POST['name_r']) &&
            isset($_POST['fam_r']) && $this->is_checked($_POST['fam_r']) &&
            isset($_POST['otch_r']) && $this->is_checked($_POST['otch_r']) &&
            isset($_POST['login_r']) && $this->is_checked($_POST['login_r']) &&
            isset($_POST['pass_r']) && $this->is_checked($_POST['pass_r']) &&
            $_POST['pass_r']==$_POST['checkpass_r']  && $this->is_right_cap($_POST['cap_r']) &&
            $this->CheckLogin($_POST['login_r']) == false && isset($_POST['role_r'])
        ){
            $this->_base->AddUser($_POST['name_r'],$_POST['fam_r'],$_POST['otch_r'],$_POST['login_r'],$_POST['pass_r'],$_POST['role_r']);
            echo "<script>window.location.href = '/auth/'</script>";
            return 'Пользователь успешно создан';
        }else{

            return 'При создании пользователя произошил ошибки в заполнении полей. Попробуйте еще раз';
        }
    }

}