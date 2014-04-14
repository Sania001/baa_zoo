<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 22.10.13
 * Time: 11:12
 * To change this template use File | Settings | File Templates.
 */
class inworkController extends baseController{
    public function index(){
        session_start();
        $this->bootstrap->model('inwork');
        if (isset($_SESSION['login']) && (isset($_SESSION['secret'])
                && !empty($_SESSION['login'])) && !empty($_SESSION['secret'])
        ){

            $login =$_SESSION['login'];
            $author = $login;
            $secret = $_SESSION['secret'];
            if ($this->inwork->CheckRule($login,$secret)=='hand_1' ||
                $this->inwork->CheckRule($login,$secret)=='adm_2'
            ){
                if($this->inwork->CheckRule($login,$secret)=='hand_1'){
                    header('Location: /inwork/handler/');
                }else{
                    header('Location: /inwork/manager/');
                }
            }else{
                header('Location: /auth/');
            }
        }else{
            header('Location: /auth/');
        }

    }
    public function handler(){
        session_start();
        $this->bootstrap->model('inwork');
        if(!isset($_SESSION['page'])){
            $_SESSION['page'] = 0;
        }

        if (isset($_SESSION['login']) && (isset($_SESSION['secret'])
                && !empty($_SESSION['login'])) && !empty($_SESSION['secret'])
        ){

            $login =$_SESSION['login'];
            $author = $login;
            $secret = $_SESSION['secret'];
            if ($this->inwork->CheckRule($login,$secret)=='hand_1' ||
                $this->inwork->CheckRule($login,$secret)=='adm_2'
            ){
                if($this->inwork->CheckRule($login,$secret)=='hand_1'){
                  /*  header('Location: /inwork/handler/');*/
                }else{
                    header('Location: /inwork/manager/');
                }
            }else{
                header('Location: /auth/');
            }
        }else{
            header('Location: /auth/');
        }
        $vars['data'] = $this->inwork->ParseHandlerData($_SESSION['login'],$_SESSION['page']);
        $kol = $this->inwork->GetManagerDataCount($vars['data']);
        if (isset($_POST['page_next']) && $kol>=$_SESSION['page']+20){
            $_SESSION['page'] = $_SESSION['page']+20;
            $vars['data'] = $this->inwork->ParseHandlerData($_SESSION['page']);
        }
        if(isset($_POST['page_pre']) && ($_SESSION['page']-20)>=0){
            $_SESSION['page'] = $_SESSION['page']-20;
            $vars['data'] = $this->inwork->ParseHandlerData($_SESSION['page']);
        }
        foreach ($vars['data'] as $data){
            if (isset($_POST['Download_'.$data['id']])){
                $this->inwork->file_force_download(SITE_PATH.$data['prevSource']);
            }
        }
        foreach ($vars['data'] as $data){
            if (isset($_POST['upload_'.$data['id']])){
                $_SESSION['hid']=$data['id'];
               /* echo "<a id='download_jpg' href='/uploader/jpgUpload/'</a>";*/
            }
        }
        $xK=0;
        $upToDataS = array();
        if(isset($_POST['sendTocheck'])){
            foreach($vars['data'] as $data){
                if (isset($_POST['check_'.$data['id']])){
                    /*    echo "<script>alert(".$_POST['state_ko_now'].");</script>";*/
                    $upToDataS[$xK]['id'] = $data['id'];
                }
                $xK++;
            }
            $this->inwork->SendToCheckData($upToDataS);
            header("Location: /inwork/handler/");
        }



        $this->bootstrap->view('handler',$vars);
    }
    public function manager(){
        session_start();
        if(!isset($_SESSION['page'])){
            $_SESSION['page'] = 0;
        }
        if (isset($_POST['exit_ko'])){
            header('Location: /auth/close');
        }

        $this->bootstrap->model('inwork');
        //Доступ
        if (isset($_SESSION['login']) && (isset($_SESSION['secret'])
                && !empty($_SESSION['login'])) && !empty($_SESSION['secret'])
        ){

            $login =$_SESSION['login'];
            $author = $login;
            $secret = $_SESSION['secret'];
            if ($this->inwork->CheckRule($login,$secret)=='hand_1' ||
                $this->inwork->CheckRule($login,$secret)=='adm_2'
            ){
                if($this->inwork->CheckRule($login,$secret)=='hand_1'){
                    header('Location: /inwork/handler/');
                }else{
                }
            }else{
                header('Location: /auth/');
            }
        }else{
            header('Location: /auth/');
        }

        // Пейджлистинг
        $vars['handler'] = $this->inwork->AllHandler();
        $vars['data'] = $this->inwork->ParseManagerData($_SESSION['page']);
        $kol = $this->inwork->GetManagerDataCount($vars['data']);
        if (isset($_POST['page_next']) && $kol>=$_SESSION['page']+20){
            $_SESSION['page'] = $_SESSION['page']+20;
            $vars['data'] = $this->inwork->ParseManagerData($_SESSION['page']);
        }
        if(isset($_POST['page_pre']) && ($_SESSION['page']-20)>=0){
            $_SESSION['page'] = $_SESSION['page']-20;
            $vars['data'] = $this->inwork->ParseManagerData($_SESSION['page']);
        }
        $xR = 0;
        $upToData = array();
        if(isset($_POST['setHandler'])){
            foreach($vars['data'] as $data){
                if (isset($_POST['check_'.$data['iid']])){
                /*    echo "<script>alert(".$data['iid'].");</script>";*/
                    $upToData[$xR]['iid'] = $data['iid'];
                    $upToData[$xR]['hid'] = $_POST['handler_'.$data['iid'].''];
                  /*  $upToData[$xR]['comment'] = $data['comment'];*/
                }
                $xR++;
            }
            $this->inwork->Update_Selected($upToData);
            header("Location: /inwork/manager/");
        }
        if(isset($_POST['setCommit'])){
            foreach($vars['data'] as $data){
                if (isset($_POST['check_'.$data['iid']])){
                    /*    echo "<script>alert(".$_POST['state_ko_now'].");</script>";*/
                    $upToData[$xR]['iid'] = $data['iid'];
                    $upToData[$xR]['comment'] = $_POST['com_'.$data['iid'].''];
                    $upToData[$xR]['state'] = $_POST['state_'.$data['iid'].''];
                }
                $xR++;
            }
            $this->inwork->Commit_Selected($upToData);
            header("Location: /inwork/manager/");
        }
        if(isset($_POST['delWork'])){
            foreach($vars['data'] as $data){
                if (isset($_POST['check_'.$data['iid']])){
                    /*    echo "<script>alert(".$_POST['state_ko_now'].");</script>";*/
                    $upToData[$xR]['iid'] = $data['iid'];
                }
                $xR++;
            }
            $this->inwork->Delete_Selected($upToData);
            header("Location: /inwork/manager/");
        }




        $this->bootstrap->view('inwork',$vars);
    }
}