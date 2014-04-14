<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 21.10.13
 * Time: 1:04
 * To change this template use File | Settings | File Templates.
 */
class UserManagement{


    public function UserLevel($mode){

        switch ($mode){
            case 1:
                return 'ko_agent_guest';
                break;
            case 2:
                return 'ko_agent_photografer';
                break;
            case 3:
                return 'ko_agent_handler';
                break;
            case 4:
                return 'ko_agent_lead';
                break;
            case 5:
                return 'ko_agent_super';
                break;
            default:
                return 'ko_agent_guest';
        }
    }
    public function is_granted($pageLevel,$currentUser){
        if (isset($currentUser) && isset($pageLevel)){
            if ($currentUser == $pageLevel){
                return true;
            }
            else{
                return false;
            }
        }
    }

    public function GenerateSecret($login,$rule){
        $dataEnc =strtoupper($rule);
        return sha1(md5($dataEnc).md5($login));
    }
}