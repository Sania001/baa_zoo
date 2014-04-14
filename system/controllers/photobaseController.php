<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 22.10.13
 * Time: 11:13
 * To change this template use File | Settings | File Templates.
 */
class photobaseController extends baseController{
    public function index(){
        $vars = array();
        $this->bootstrap->model("photobase");
        $dataArray = array();
        if (isset($_POST['goSearch'])){
            for ($xR=1;$xR<=5;$xR++){
                if (isset($_POST['nameS'.$xR]) && !empty($_POST['nameS'.$xR])){
                    $dataArray[$xR] = $_POST['nameS'.$xR].'%';
                }
            }
        }
            $vars['data'] = $this->photobase->PhotoData($dataArray);
        $dataZ = $vars['data'];

//        $zip = new ZipArchive;
 //       $zip->open(SITE_PATH.'system/temp/download.zip', ZipArchive::CREATE);
     //   if ($zip->open(SITE_PATH.'system/temp/download.zip') === true) {
  //          echo SITE_PATH.'system/temp/download.zip';
  //          foreach($dataZ as $data){
 //              $zip->addFile($data['plocatetiff'], $data['pname'].'tiff');

 //          }
    /*        echo 'ok';
        }else {*/
   //         echo 'ошибка';
//        }
      //  $zip->close();

   /*     $zip = new ZipArchive();
        $filename = "test112.zip";

        if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
            exit("Невозможно открыть <$filename>\n");
        }else{
            echo 'lol';
        }*/


        $this->bootstrap->view("photobase",$vars);
    }
}