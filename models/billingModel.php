<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 19.11.13
 * Time: 11:06
 * To change this template use File | Settings | File Templates.
 */
class billingModel extends BaseModel{
    public function CheckRule($login, $secret /* Нужный уровень*/){
        if ($secret ==$this->_role->GenerateSecret($login,$this->_role->UserLevel(4)) ||
            $secret ==$this->_role->GenerateSecret($login,$this->_role->UserLevel(5))

        ){
            return true;
        }else{
            return false;
        }
    }
    public function ParseBillingData($elem = 0,$data1= '2013.10.01',$data2 = null,$name = '%',$sec = '%',$otch = '%'){
            if ($data2 == null){
              $data2 = date("y.m.d");
            }
        return $this->_base->GetBillingData($elem,$data1,$data2,$name,$sec,$otch);
    }
    public function GetBillingDataCount($array_ko = array()){
        return count($array_ko);
    }

}