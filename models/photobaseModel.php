<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 25.11.13
 * Time: 9:44
 * To change this template use File | Settings | File Templates.
 */
class photobaseModel extends BaseModel{
    public function PhotoData($data = array()){
        return $this->_base->GetPhotoBaseData($data);
    }
}