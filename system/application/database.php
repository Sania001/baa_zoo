<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 23.10.13
 * Time: 19:26
 * To change this template use File | Settings | File Templates.
 */
class Database {

    protected $connector;
    public  function Connect(){
        if (is_readable(SITE_PATH.'system/application/config/configuration.php')){
            require_once(SITE_PATH . 'system/application/config/configuration.php');
          $this->connector = mysql_connect(HOST,USER_DB,PASS_DB);
            mysql_select_db(CURRENT_DB);
            return 'I';
        }
        else{
            return 'II';
        }
     //   throw new Exception('Config is not exist'.SITE_PATH.'system/application/config/configuration.php');


    }

    public function Query_simple($login,$pass){
        $where = $this->Mirroring($login);
        $where2 = $this->Mirroring($pass);
        //Добавить шифровку

        //

        $queryString = 'SELECT uid,login,rule,balance FROM users_ko WHERE login="'.$where.'" AND pass="'.$where2.'";';
        $preData = mysql_query($queryString,$this->connector) or die (mysql_error());
        $data = mysql_fetch_array($preData);
        return $data;
    }

    // Добавление загруженного фото
    public function AddPhoto($name,$path,$comment,$author,$small){

        $n = $this->Mirroring($name);
        $p = $this->Mirroring($path);
        $c = $this->Mirroring($comment);

        $queryString = 'INSERT INTO images_ko(iname,iauthor,locate,comment,state,idate,slocate)
         VALUES("'.$n.'","'.$author.'","'.$p.'","'.$c.'","новый","'.date("y.m.d").'","'.$small.'")';
        $query = mysql_query($queryString) or die (mysql_error());

        $additional = 'SELECT iid FROM images_ko WHERE iname ="'.$n.'" AND iauthor="'.$author.'" AND locate LIKE"'.$p.'"';
        $sE = mysql_query($additional);
        $getData = mysql_fetch_array($sE);

        $inputString = 'INSERT INTO handled_ko(hname,himg) VALUES("'.$n.'",'.$getData['iid'].');';
        $in = mysql_query($inputString) or die (mysql_error());
    }
    public function AddWorkJPG($hid,$hlocate){
        $hloc = $this->Mirroring($hlocate);
        $queryString ='UPDATE handled_ko SET hlocate ="'.$hloc.'" WHERE hid='.$hid.';';
        $query = mysql_query($queryString) or die (mysql_error());
    }
    public function AddWorkTIFF($hid,$hlocate){
        $hloc = $this->Mirroring($hlocate);
        $queryString ='UPDATE handled_ko SET hlocatetiff ="'.$hloc.'" WHERE hid='.$hid.';';
        $query = mysql_query($queryString) or die (mysql_error());
    }
    public function GetUId($login){
        $l = $this->Mirroring($login);
        $queryString = 'SELECT uid FROM users_ko WHERE login="'.$l.'"';
        $query = mysql_query($queryString) or die (mysql_error());
        $data = mysql_fetch_array($query);
        return $data['uid'];
    }
    public function All_Handler(){
        $queryString = 'SELECT uid,name,second,otch FROM users_ko WHERE rule LIKE "ko_agent_handler"';
        $query = mysql_query($queryString) or die (mysql_error());
        $uID =0;
        $dataArray = array();
        while ($data = mysql_fetch_array($query)){
            $dataArray[$uID]['uid'] = $data['uid'];
            $dataArray[$uID]['handler'] = $data['second'].' '.$data['name'].' '.$data['otch'];
            $uID++;
        }
        return $dataArray;
    }

    public function UpdateHandler($iid,$handler){
        $supQuery = 'SELECT handler FROM images_ko WHERE iid='.$iid.';';
        $sup = mysql_query($supQuery) or die (mysql_error());
        $dataSup = mysql_fetch_array($sup);
        if (empty($dataSup['handler'])){
            if($handler!="Нет исполнителя"){
                $queryString = 'UPDATE images_ko SET handler = "'.$handler.'", state="в работе" WHERE iid="'.$iid.'"';
                $query = mysql_query($queryString) or die (mysql_error());
                $getString = 'SELECT iname,state FROM images_ko WHERE iid="'.$iid.'";';
                $getS = mysql_query($getString) or die (mysql_error());
                $getData = mysql_fetch_array($getS);
                $inputString = 'UPDATE handled_ko SET hname="'.$getData['iname'].'",hdate="'.date("y.m.d").'" WHERE himg="'.$iid.'" ';
                $in = mysql_query($inputString) or die (mysql_error());
            }else{
                if ($handler=="Нет исполнителя" || $handler=="" ){
                    $queryString = 'UPDATE images_ko SET handler = "null",state="новый" WHERE iid='.$iid.'';
                    $query = mysql_query($queryString) or die (mysql_error());
                    $inputString = 'UPDATE handled_ko SET hdate="null" WHERE himg="'.$iid.'" ';
                    $in = mysql_query($inputString) or die (mysql_error());
                }

            }
        }else{
            if($handler!="Нет исполнителя"){
                $queryString = 'UPDATE images_ko SET handler = "'.$handler.'", state="в работе" WHERE iid="'.$iid.'"';
                $query = mysql_query($queryString) or die (mysql_error());
                $getString = 'SELECT iname,state FROM images_ko WHERE iid="'.$iid.'";';
                $getS = mysql_query($getString) or die (mysql_error());
                $getData = mysql_fetch_array($getS);
                $inputString = 'UPDATE handled_ko SET hname="'.$getData['iname'].'",hdate="'.date("y.m.d").'" WHERE himg="'.$iid.'" ';
                $in = mysql_query($inputString) or die (mysql_error());
            }else{
                if ($handler=="Нет исполнителя" || $handler=="" ){
                    $queryString = 'UPDATE images_ko SET handler = "null",state="новый" WHERE iid='.$iid.'';
                    $query = mysql_query($queryString) or die (mysql_error());
                    $inputString = 'UPDATE handled_ko SET hdate="null" WHERE himg="'.$iid.'" ';
                    $in = mysql_query($inputString) or die (mysql_error());
                }

            }



            $queryString1 = 'UPDATE images_ko SET handler = "'.$handler.'",state="в работе" WHERE iid='.$iid.'';
            $query = mysql_query($queryString1) or die (mysql_error());

        }
    }
    public function CommitSel($comment,$state,$iid){
        $c = $this->Mirroring($comment);
        $s = $this->Mirroring($state);
        if ($state!="в работе" && $state!="новый" && $state!="обработан"){
            $queryString ='UPDATE images_ko SET comment="'.$c.'",state="'.$s.'" WHERE iid='.$iid;
            $query = mysql_query($queryString) or die (mysql_error());
        }elseif($state=="обработан"){
            $queryString ='SELECT iname,hlocate,hlocatetiff,hconf,iauthor,handler FROM images_ko INNER JOIN handled_ko ON iid = himg WHERE iid='.$iid;
            $query = mysql_query($queryString) or die (mysql_error());
            $qData = mysql_fetch_array($query);
            $queryString2 ='UPDATE handled_ko SET hconf="'.date("y.m.d").'" WHERE himg='.$iid;
            $query2 = mysql_query($queryString2) or die (mysql_error());
            $queryString3 = 'INSERT INTO photobase_ko(pname,plocate,plocatetiff,pauthor,phandler,pconf,piid) VALUES (
            "'.$qData['iname'].'","'.$qData['hlocate'].'","'.$qData['hlocatetiff'].'","'.$qData['iauthor'].'","'.$qData['handler'].'","'.$qData['hconf'].'","'.$iid.'"
            );';
            $query3 = mysql_query($queryString3) or die (mysql_error());
            $queryString4 = 'DELETE FROM images_ko WHERE iid="'.$iid.'"';
            $query4 = mysql_query($queryString4) or die (mysql_error());
        }

    }
    public function DeleteSource($iid){
        $queryString ='DELETE FROM images_ko WHERE iid='.$iid;
        $query = mysql_query($queryString) or die (mysql_error());
        $queryString1 ='DELETE FROM handled_ko WHERE himg='.$iid;
        $query1 = mysql_query($queryString1) or die (mysql_error());
    }
    public function SendToCheck($hid){
        $queryString ='UPDATE images_ko SET state="на проверку" WHERE iid=(SELECT himg FROM handled_ko WHERE hid='.$hid.')';
        $query = mysql_query($queryString) or die (mysql_error());
    }

    //Получение данных с базы с возможностью подключения постраничного вывода
    public function GetManagerData($first = 0){
        $queryString = 'SELECT DISTINCT iid,iname,iauthor,locate,comment,state,idate,name,second,otch,slocate,hlocate,hdate,handler FROM (images_ko AS a INNER JOIN users_ko AS b ON a.iauthor = b.uid) INNER JOIN handled_ko ON himg=iid ORDER BY idate DESC'.'';
        $query = mysql_query($queryString) or die (mysql_error());
        $count = mysql_num_rows($query);
        $uID =0;
        $datArray = array();
        $resArray = array();
        while($data = mysql_fetch_array($query)){
            $datArray[$uID]['iid'] = $data['iid'];
            $datArray[$uID]['iname'] = $data['iname'];
            $datArray[$uID]['iauthor'] = $data['second'].' '.$data['name'].' '.$data['otch'];
            $datArray[$uID]['locate'] = $data['locate'];
            $datArray[$uID]['comment'] = $data['comment'];
            $datArray[$uID]['state'] = $data['state'];
            $datArray[$uID]['idate'] = $data['idate'];
            $datArray[$uID]['name'] = $data['name'];
            $datArray[$uID]['second'] = $data['second'];
            $datArray[$uID]['otch'] = $data['otch'];
            $datArray[$uID]['slocate'] =$data['slocate'];



        if (!empty($data['handler'])){
            if ($data['hlocate']!=""){
                $datArray[$uID]['hlocate'] = $data['hlocate'];
            }else{
                $datArray[$uID]['hlocate'] = "/system/ui/images/nofoto.gif";
            }
            $datArray[$uID]['hdate'] = $data['hdate'];
            if ($data['hdate']!=null){

                $datArray[$uID]['time'] = floor((strtotime(date("y.m.d"))-strtotime($data['hdate']))/(3600*24));
            }else{
                $datArray[$uID]['time'] = 0;
            }
            $SecondQueryString = 'SELECT name,second,otch FROM users_ko INNER JOIN images_ko ON uid=handler WHERE iid='.$data['iid'].'';
            $secQuery = mysql_query($SecondQueryString);
            $sec = mysql_fetch_array($secQuery);
            $datArray[$uID]['handlerdata']= $sec['second'].' '.$sec['name'].' '.$sec['otch'];
        }else{
            $datArray[$uID]['hlocate'] = "/system/ui/images/nofoto.gif";
            $datArray[$uID]['hdate'] = 0;
            $datArray[$uID]['time'] = 0;
            $datArray[$uID]['handlerdata'] = 'Нет исполнителя';
        }
            if ($data['hdate']!=null){

                $datArray[$uID]['time'] = floor((strtotime(date("y.m.d"))-strtotime($data['hdate']))/(3600*24));
            }else{
                $datArray[$uID]['time'] = 0;
            }

            $newItem = floor((strtotime(date("y.m.d"))-strtotime($data['idate']))/(3600*24));
            if ($newItem<2){
                $datArray[$uID]['red'] = 'selectedMP';
            }else{
                $datArray[$uID]['red'] = 'noselectedMP';
            }
            if($data['state']=="обработан"){
                $datArray[$uID]['red']='final';
            }
            $uID++;
        }
        if ($count>20 && ($first+20<=$count)){
            for($dR=$first;$dR<20+$first;$dR++){
                $resArray[$dR] = $datArray[$dR];
            }
        }else{
            $tempCount = $count-$first;
            for($dR=$first;$dR<$tempCount+$first;$dR++){
                $resArray[$dR] = $datArray[$dR];
            }
        }

        return $resArray;
    }
    public function GetHandlerData($handler,$first = 0){
        $Id = $this->GetUId($handler);
        $querySting = 'SELECT hid,locate,iname,idate,state,hlocate,hlocatetiff,hdate FROM images_ko INNER JOIN handled_ko ON iid = himg WHERE handler ='.$Id.'';
        $query = mysql_query($querySting) or die (mysql_error());
        $count = mysql_num_rows($query);
        $dataArray = array();
        $resArray = array();
        $uID =0;
        while ($data = mysql_fetch_array($query)){
            $dataArray[$uID]['prevSource'] = $data['locate'];
            $dataArray[$uID]['name'] = $data['iname'];
            $dataArray[$uID]['date'] = $data['idate'];
            $dataArray[$uID]['state'] = $data['state'];
            if ($data['hlocate']!=""){
                $dataArray[$uID]['hlocate'] = $data['hlocate'];
            }else{
                $dataArray[$uID]['hlocate'] = "/system/ui/images/nofoto.gif";
            }
            if ($data['hlocatetiff']!=""){
                $dataArray[$uID]['hlocatetiff'] = $data['hlocatetiff'];
            }else{
                $dataArray[$uID]['hlocatetiff'] = "/system/ui/images/nofoto.gif";
            }
            $dataArray[$uID]['hdate'] = $data['hdate'];
            $dataArray[$uID]['time'] = floor((strtotime(date("y.m.d"))-strtotime($data['hdate']))/(3600*24));
            $dataArray[$uID]['id'] = $data['hid'];
            $uID++;
        }
        if ($count>20 && ($first+20<=$count)){
            for($dR=$first;$dR<20+$first;$dR++){
                $resArray[$dR] = $dataArray[$dR];
            }
        }else{
            $tempCount = $count-$first;
            for($dR=$first;$dR<$tempCount+$first;$dR++){
                $resArray[$dR] = $dataArray[$dR];
            }
        }
        return $resArray;
    }

    public function SearchLogin($login){
        $login = $this->Mirroring($login);
        $queryString = 'SELECT COUNT(login) AS existLogin FROM users_ko WHERE login="'.$login.'"';
        $query = mysql_query($queryString);
        $data = mysql_fetch_array($query);
        if ($data['existLogin']>0){
            return true;
        }else{
            return false;
        }

    }

    public function GetBillingData($first = 0,$filterDate1,$filterDate2,$filterName,$filterSec,$filterOtch){
        $querySting = 'SELECT hid,pname,name,second,otch,hdate,hconf FROM (photobase_ko AS a INNER JOIN users_ko AS b ON a.phandler = b.uid) INNER JOIN handled_ko ON himg=piid WHERE
        name LIKE "'.$filterName.'" OR second LIKE "'.$filterSec.'" OR otch LIKE "'.$filterOtch.'"  OR (hconf >="'.$filterDate1.'" AND  hconf<="'.$filterDate2.'") ORDER BY hconf DESC'.'';
        $query = mysql_query($querySting) or die (mysql_error());
        $count = mysql_num_rows($query);
        $dataArray = array();
        $resArray = array();
        $uID =0;
        while ($data = mysql_fetch_array($query)){
            $dataArray[$uID]['name'] = $data['pname'];
            $dataArray[$uID]['author'] = $data['second'].' '.$data['name'].' '.$data['otch'];
            $dataArray[$uID]['second'] = $data['second'];
            $dataArray[$uID]['aname'] = $data['name'];
            $dataArray[$uID]['otch'] = $data['otch'];
            $dataArray[$uID]['conf'] = $data['hconf'];
            $dataArray[$uID]['id'] = $data['hid'];
            $dataArray[$uID]['time'] = floor((strtotime($data['hconf'])-strtotime($data['hdate']))/(3600*24));
            if (!empty($data['hdate']) && !empty($data['hconf'])){
                if ($dataArray[$uID]['time']<=5){
                    $dataArray[$uID]['managed'] = "Успел";
                }else{
                    $dataArray[$uID]['managed'] = "Не успел";
                }
            }else{
                $dataArray[$uID]['managed'] = "Неизвестно";
            }

            switch ($dataArray[$uID]['time']){
                case 0:
                case 1:
                case 2:
                case 3: $dataArray[$uID]['price'] = 20;
                break;
                case 4:
                case 5: $dataArray[$uID]['price'] = 10;
                break;
                default:
                    $dataArray[$uID]['price'] = 0;
                    break;

            }
            $uID++;
        }
        if ($count>20 && ($first+20<=$count)){
            for($dR=$first;$dR<20+$first;$dR++){
                $resArray[$dR] = $dataArray[$dR];
            }
        }else{
            $tempCount = $count-$first;
            for($dR=$first;$dR<$tempCount+$first;$dR++){
                $resArray[$dR] = $dataArray[$dR];
            }
        }

        return $resArray;
    }

    public function GetPhotoBaseData($dataG = array()){
        $pre = null;
        switch (count($dataG)){
            case 0: $pre = 'pname LIKE "%"';
            break;
            default:
                {
                    $pre .= 'pname LIKE ""';
                    foreach($dataG as $row){
                        $pre .= 'OR pname LIKE "'.$row.'"';
                    }
                }
                break;
        }


        $queryString ='SELECT pid,pname,plocate,plocatetiff,pauthor,phandler FROM photobase_ko WHERE '.$pre;
        $query = mysql_query($queryString) or die (mysql_error());
        $dataArray = array();
        $uID = 0;
        while ($data = mysql_fetch_array($query)){
            $dataArray[$uID]['pid'] = $data['pid'];
            $dataArray[$uID]['pname'] = $data['pname'];
            $dataArray[$uID]['plocate'] = $data['plocate'];
            $dataArray[$uID]['plocatetiff'] = $data['plocatetiff'];
            $dataArray[$uID]['pauthor'] = $data['pauthor'];
            $dataArray[$uID]['phandler'] = $data['phandler'];
            $uID++;
        }

        return $dataArray;
    }

    public function AddUser($name,$fam,$otch,$login,$pass,$rule){
        $queryString = 'INSERT INTO users_ko(name,second,otch,login,pass,rule) VALUES("'.$name.'","'.$fam.'","'.$otch.'","'.$login.'","'.$pass.'","'.$rule.'");';
        $query = mysql_query($queryString) or die ("Произошла ошибка при создании пользователя");
    }



/*str - строка выборки до условия
  where - поле условия значение
  mode - условие
*/
/*

    public function Query_simple($str,$where,$mode,$sup=null,$for2=null, $where2 = null,$mode2=null){
        $where = $this->Mirroring($where);
        $temp = '';
        switch($mode){
            case 1: $temp = '=';
                break;
            case 2: $temp = '>';
                break;
            case 3: $temp = '<';
                break;
            case 4: $temp = '>=';
                break;
            case 5: $temp = '<=';
                break;
            default: $temp = '=';
            break;
        }
        $queryString = $str.$temp.'"'.$where.'" '.$sup.' '.$for2.$mode2.' "'.$where2.'" ';
        $preData = mysql_query($queryString,$this->connector) or die (mysql_error());
        $data = mysql_fetch_array($preData);
        return $data;
    }

*/









    /*значение выборки DEVELOPMENT */
    public  function Query_select(array $selected, array $from = null, $where,$where2){
     //   $str = $this->Mirroring($str);
        $sel = '';
        $fr = '';
        $result = array();

        if (count($selected)>1){
            $sel.=array_shift($selected);
            foreach($selected as $d){
                $sel.=','.$d;
            }
        }
        else{
            $sel = $selected[0];
        }
        $sel=$this->Mirroring($sel);
        if (count($from)>1){
            $fr.=array_shift($from);
            foreach($from as $dk){
                $fr.=','.$dk;
            }
        }else{
            $fr = $from[0];
        }
        $where=$this->Mirroring($where);
        $where2 = $this->Mirroring($where2);

        $queryString = "SELECT ".$sel." FROM ".$fr." WHERE ".$where." = '".$where2."';";

        $data = mysql_query($queryString,$this->connector) or die(mysql_error());
        while($result = mysql_fetch_array($data)){
           $result =  $result[$selected[0]];
        }
        return $result;
    }
    //Экранирование
    private function Mirroring($data){
        return mysql_real_escape_string($data);
    }
}