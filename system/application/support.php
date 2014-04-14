<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 18.10.13
 * Time: 15:04
 * To change this template use File | Settings | File Templates.
 */
class Support{

    public function Cap(){
        $r=rand(1000000,9999999);

        for($i=0;$i < 7;$i++)//разбиваем секретный код на массив чисел
        $arr[$i]=substr($r,$i,1);

        $im=imagecreate(240,37);//создаем картинку
        $font = SITE_PATH.'system/ui/fonts/verdana.ttf';
        imagecolorallocate($im,0,0,0);
        $a=0;
        for($i=0;$i < 7;$i++)//наносим код на картинку
        {
            $color=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
            imagettftext($im, 13, rand(-50,50), $a+=29,rand(15,25), $color, $font, $arr[$i]);
        }

        header("Content-type: image/png");
       imagepng($im);//выводим капчу
        return $r;
    }


}
class PhotoWork{
    var $image;
    var $type;

    public function load($filename){
        $img_info = getimagesize($filename);
        $this->type = $img_info[2];
        if ($this->type == IMAGETYPE_JPEG){
            $this->image = imagecreatefromjpeg($filename);
        }elseif($this->type == IMAGETYPE_GIF){
            $this->image = imagecreatefromgif($filename);
        }elseif($this->type == IMAGETYPE_PNG){
            $this->image = imagecreatefrompng($filename);
        }
    }
    public  function save($filename,$type=IMAGETYPE_JPEG,$compression=75, $permissions=null){
        if( $type == IMAGETYPE_JPEG ) {
            imagejpeg($this->image,$filename,$compression);
        } elseif( $type == IMAGETYPE_GIF ){
            imagegif($this->image,$filename);
        }elseif( $type == IMAGETYPE_PNG ){
            imagepng($this->image,$filename); }
        if( $permissions != null) {
            chmod($filename,$permissions);
        }
    }
    public  function output($type=IMAGETYPE_JPEG){
        if($type == IMAGETYPE_JPEG){
            imagejpeg($this->image);
        }elseif($type == IMAGETYPE_GIF){
            imagegif($this->image);
        }elseif($type == IMAGETYPE_PNG){
            imagepng($this->image);
        }
    }
    public  function getWidth(){
        return imagesx($this->image);
    }
    public  function getHeight(){
        return imagesy($this->image);
    }
    public  function resizeToHeight($height){
        $ratio = $height/ $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width,$height);
    }
    public  function resizeToWidth($width){
        $ratio = $width/ $this->getWidth();
        $height = $this->getHeight() * $ratio;
        $this->resize($width,$height);
    }
    public  function scale($scale){
        $width = $this->getWidth()*$scale/100;
        $height = $this->getHeight()*$scale/100;
        $this->resize($width,$height);
    }
    public  function resize($width,$height){
        $new_img = imagecreatetruecolor($width,$height);
        imagecopyresampled($new_img,$this->image,0,0,0,0,$width,$height,$this->getWidth(),$this->getHeight());
        $this->image = $new_img;
    }
}
