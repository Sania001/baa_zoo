<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 30.10.13
 * Time: 2:30
 * To change this template use File | Settings | File Templates.
 */

class uploaderModel extends BaseModel{
    public function CheckRule($login, $secret /* Нужный уровень*/){
        if ($secret ==$this->_role->GenerateSecret($login,$this->_role->UserLevel(2)) ||
            $secret ==$this->_role->GenerateSecret($login,$this->_role->UserLevel(4)) ||
            $secret ==$this->_role->GenerateSecret($login,$this->_role->UserLevel(5))

        ){
            return true;
        }else{
            return false;
        }
    }

    public function CheckRuleHandler($login, $secret /* Нужный уровень*/){
        if ($secret ==$this->_role->GenerateSecret($login,$this->_role->UserLevel(3)) ||
            $secret ==$this->_role->GenerateSecret($login,$this->_role->UserLevel(4)) ||
            $secret ==$this->_role->GenerateSecret($login,$this->_role->UserLevel(5))

        ){
            return true;
        }else{
            return false;
        }
    }
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

    public function Uploader(){
        $dataUpload = array();
        $default = '/system/ui/images/nofoto.gif';
        $list = array(".php", ".phtml", ".php3", ".php4",".php5");
        foreach ($list as $item) {
            if(preg_match("/$item\$/i", $_FILES['upload']['name'])) {
                echo "Разрешена загрузка только TIFF и JPG файлов\n";
                exit;
            }
        }

        $dir = SITE_PATH.'system/imagestore/';
        $filename =date('i_s').basename($_FILES['upload']['name']);
        $file = $dir . $filename;
        $dataUpload[0] = '/system/imagestore/'. $filename;
    if (isset($_POST['name_up']) && !empty($_POST['name_up'])
        && $this->is_checked($_POST['name_up'])
    ){
        if (move_uploaded_file($_FILES['upload']['tmp_name'], $file)) {
            echo "Закачка файла успешно завершена.\n";
        try{
            $image = new PhotoWork();
            $image->load($file);
            if ($image->getWidth()>=250){
                $image->resizeToWidth(400);
                $image->save($dir.'/small/'.$filename);
                $dataUpload[1]= '/system/imagestore/small/'.$filename;
            }else{
                $image->resizeToWidth(250);
                $image->save($dir.'/small/'.$filename);
                $dataUpload[1]= '/system/imagestore/small/'.$filename;
            }
        }catch (ErrorException $e){
            echo 'Повторите загрузку. Произошел сбой';
        }


            return $dataUpload;
        } else {
            echo "Закачка файла завершилась с ошибкой. Загружайте только jpg,png или tiff формат\n";
            return $default;
        }
    }else{
        echo 'Возможные проблемы: '.'<br/>'.'Отсутствует комментарий.'.'<br/>'.'Отсутствует название файла';
    }

    }
    public function UploaderJPG(){
        $dataUpload = array();
        $default = '/system/ui/images/nofoto.gif';
        $list = array(".php", ".phtml", ".php3", ".php4",".php5");
        foreach ($list as $item) {
            if(preg_match("/$item\$/i", $_FILES['upload']['name'])) {
                echo "Разрешена загрузка только TIFF и JPG файлов\n";
                exit;
            }
        }

        $dir = SITE_PATH.'system/imagestore/handlerJPG/';
        $filename =date('i_s').basename($_FILES['upload']['name']);
        $file = $dir . $filename;
        $dataUpload[0] = '/system/imagestore/handlerJPG/'. $filename;
            if (move_uploaded_file($_FILES['upload']['tmp_name'], $file)) {
                echo "Закачка файла успешно завершена.\n";
                return $dataUpload;
            } else {
                echo "Закачка файла завершилась с ошибкой. Загружайте только jpg,png или tiff формат\n";
                return $default;
            }

    }
    public function UploaderTIFF(){
        $dataUpload = array();
        $default = '/system/ui/images/nofoto.gif';
        $list = array(".php", ".phtml", ".php3", ".php4",".php5");
        foreach ($list as $item) {
            if(preg_match("/$item\$/i", $_FILES['upload']['name'])) {
                echo "Разрешена загрузка только TIFF и JPG файлов\n";
                exit;
            }
        }

        $dir = SITE_PATH.'system/imagestore/handlerTIFF/';
        $filename =date('i_s').basename($_FILES['upload']['name']);
        $file = $dir . $filename;
        $dataUpload[0] = '/system/imagestore/handlerTIFF/'. $filename;
        if (move_uploaded_file($_FILES['upload']['tmp_name'], $file)) {
            echo "Закачка файла успешно завершена.\n";
            return $dataUpload;
        } else {
            echo "Закачка файла завершилась с ошибкой. Загружайте только jpg,png или tiff формат\n";
            return $default;
        }

    }
    public function InsertToBase($name,$path,$comment=null,$author,$small){
        $this->_base->AddPhoto($name,$path,$comment,$author,$small);
    }
    public function InsertToBaseJPG($hid,$hlocate){
        $this->_base->AddWorkJPG($hid,$hlocate);
    }
    public function InsertToBaseTIFF($hid,$hlocate){
        $this->_base->AddWorkTIFF($hid,$hlocate);
    }
    public function IndefUs($login){
        return $this->_base->GetUId($login);
    }
}