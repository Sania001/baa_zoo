<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 22.10.13
 * Time: 2:06
 * To change this template use File | Settings | File Templates.
 */
class uploaderController extends baseController{
    public function index(){
        $vars = array();
        $vars['path']= '/system/ui/images/nofoto.gif';
        session_start();
        $author = null;
        $aID = null;
        $this->bootstrap->model('uploader');
        if (isset($_SESSION['login']) && (isset($_SESSION['secret'])
            && !empty($_SESSION['login'])) && !empty($_SESSION['secret'])
        ){

            $login =$_SESSION['login'];
            $author = $login;
            $secret = $_SESSION['secret'];
            if ($this->uploader->CheckRule($login,$secret)){

            }else{
                header('Location: /auth/');
            }
        }else{
            header('Location: /auth/');
        }
        if (isset($_POST['exit_ko'])){
            header('Location: /auth/close');
        }
//  отправка в обработку
        if (isset($_POST['upload_ok']) && $_POST['name_up']!=null
        ){
           $tempPhoto = $this->uploader->Uploader();
            if ($tempPhoto[0]!=null && $tempPhoto[1]!=null){
                $vars['path'] =$tempPhoto[0];
                $tempID = $this->uploader->IndefUs($author);
               if($tempID!=null){
                    $aID = $tempID;
                }
                $author = 'None';
                if ($_POST['name_up']!=null && $tempPhoto[0]!=null &&
                    $tempPhoto[1]!=null && $aID!=null && $tempPhoto[0]!='/'

                ){
                    $comment = null;
                    if (isset($_POST['com_up'])){
                        $comment = $_POST['com_up'];
                    }
                    $this->uploader->InsertToBase($_POST['name_up'],$tempPhoto[0],$comment,$aID,$tempPhoto[1]);
                }
            }
        }
        $this->bootstrap->view('uploader',$vars);
    }
    public function jpgUpload(){
        $this->bootstrap->model("inwork");
        $vars = array();
        $vars['path']= '/system/ui/images/nofoto.gif';
        session_start();
        $author = null;
        $aID = null;
        $this->bootstrap->model('uploader');
        if (isset($_SESSION['login']) && (isset($_SESSION['secret'])
                && !empty($_SESSION['login'])) && !empty($_SESSION['secret'])
        ){

            $login =$_SESSION['login'];
            $author = $login;
            $secret = $_SESSION['secret'];
            if ($this->uploader->CheckRuleHandler($login,$secret)){

            }else{
                header('Location: /auth/');
            }
        }else{
            header('Location: /auth/');
        }
        if (isset($_POST['exit_ko'])){
            header('Location: /auth/close');
        }
//  отправка в обработку
        if (isset($_POST['upload_ok'])
        ){
            if (isset($_SESSION['hid'])){
                $hid = $_SESSION['hid'];
            }
            $tempPhoto = $this->uploader->UploaderJPG();
            if ($tempPhoto[0]!=null){
                $vars['path'] =$tempPhoto[0];
                $tempID = $this->uploader->IndefUs($author);
                if($tempID!=null){
                    $aID = $tempID;
                }
                $author = 'None';
                if ($tempPhoto[0]!=null && $aID!=null
                    && $tempPhoto[0]!='/' && isset($hid)

                ){
                    $this->uploader->InsertToBaseJPG($hid,$tempPhoto[0]);
                    echo $hid;
                }
            }
        }
        $this->bootstrap->view('handlerUp',$vars);
    }
    public function tiffUpload(){
        $this->bootstrap->model("inwork");
        $vars = array();
        $vars['path']= '/system/ui/images/nofoto.gif';
        session_start();
        $author = null;
        $aID = null;
        $this->bootstrap->model('uploader');
        if (isset($_SESSION['login']) && (isset($_SESSION['secret'])
                && !empty($_SESSION['login'])) && !empty($_SESSION['secret'])
        ){

            $login =$_SESSION['login'];
            $author = $login;
            $secret = $_SESSION['secret'];
            if ($this->uploader->CheckRuleHandler($login,$secret)){

            }else{
                header('Location: /auth/');
            }
        }else{
            header('Location: /auth/');
        }
        if (isset($_POST['exit_ko'])){
            header('Location: /auth/close');
        }
//  отправка в обработку
        if (isset($_POST['upload_ok'])
        ){
            if (isset($_SESSION['hid'])){
                $hid = $_SESSION['hid'];
            }
            $tempPhoto = $this->uploader->UploaderTIFF();
            if ($tempPhoto[0]!=null){
                $vars['path'] =$tempPhoto[0];
                $tempID = $this->uploader->IndefUs($author);
                if($tempID!=null){
                    $aID = $tempID;
                }
                $author = 'None';
                if ($tempPhoto[0]!=null && $aID!=null
                    && $tempPhoto[0]!='/' && isset($hid)

                ){
                    $this->uploader->InsertToBaseTIFF($hid,$tempPhoto[0]);
                    echo $hid;
                }
            }
        }
        $this->bootstrap->view('handlerUp',$vars);
    }
}