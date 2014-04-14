<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 07.11.13
 * Time: 18:20
 * To change this template use File | Settings | File Templates.
 */
class inworkModel extends BaseModel{
    public function CheckRule($login, $secret /* Нужный уровень*/){
        if ($secret ==$this->_role->GenerateSecret($login,$this->_role->UserLevel(3)) ||
            $secret ==$this->_role->GenerateSecret($login,$this->_role->UserLevel(4)) ||
            $secret ==$this->_role->GenerateSecret($login,$this->_role->UserLevel(5))
        ){
            if ($secret == $this->_role->GenerateSecret($login,$this->_role->UserLevel(3))){
                return 'hand_1';
            }else{
                return 'adm_2';
            }
        }else{
            return 'novalid';
        }
    }
    public function Protect($login, $secret /* Нужный уровень*/){
        if ($secret ==$this->_role->GenerateSecret($login,$this->_role->UserLevel(3)) ||
            $secret ==$this->_role->GenerateSecret($login,$this->_role->UserLevel(4)) ||
            $secret ==$this->_role->GenerateSecret($login,$this->_role->UserLevel(5))
        ){
            if ($secret == $this->_role->GenerateSecret($login,$this->_role->UserLevel(3))){
                return 'hand_1';
            }else{
                return 'adm_2';
            }
        }else{
            return 'novalid';
        }
    }

    public function Update_Selected($data = array()){
        foreach($data as $row){
            $this->_base->UpdateHandler($row['iid'],$row['hid']);
        }
    }
    public function Commit_Selected($data = array()){
        foreach($data as $row){
            $this->_base->CommitSel($row['comment'],$row['state'],$row['iid']);
        }
    }
    public function Delete_Selected($data = array()){
        foreach($data as $row){
            $this->_base->DeleteSource($row['iid']);
        }
    }
    public function SendToCheckData($data = array()){
        foreach($data as $row){
            $this->_base->SendToCheck($row['id']);
        }
    }
    function file_force_download($file) {
        if (file_exists($file)) {
            // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
            // если этого не сделать файл будет читаться в память полностью!
            if (ob_get_level()) {
                ob_end_clean();
            }
            // заставляем браузер показать окно сохранения файла
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            // читаем файл и отправляем его пользователю
            readfile($file);
            exit;
        }
    }
    /*
    public function file_force_download($file) {
        if (file_exists($file)) {
            header('X-SendFile: ' . realpath($file));
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            exit;
        }
    }*/
    public function ParseManagerData($elem = 0){
        return $this->_base->GetManagerData($elem);
    }
    public function GetManagerDataCount($array_ko = array()){
        return count($array_ko);
    }
    public function ParseHandlerData($handler,$elem =0){
        return $this->_base->GetHandlerData($handler,$elem);
    }
    public function GetHandlerDataCount($array_ko = array()){
        return count($array_ko);
    }
    public function AllHandler(){
        return $this->_base->All_Handler();
    }

}