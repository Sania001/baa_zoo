<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ICap
 * Date: 13.10.13
 * Time: 17:22
 * To change this template use File | Settings | File Templates.
 */

class Route {
    public static function run()
    {
        $obj = null;
        $action = false;

        $pathCtrl = TS_CODE_DIR . '/Controller/';
        $classCtrl = 'Controller_';

        $redirect = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : '';

        if (  empty ($redirect) ) {
            Ts_App::showMain();
        }

        $items = explode('/', $redirect);
        $els = array();

        for ($i=0; $i < count($items); $i++) {
            if ( !empty($items[$i]) ) {
                if ( !preg_match('/^[a-zA-Z0-9]+$/', $items[$i]) ) {
                    Ts_App::show404();
                }
                $els[] = ucfirst(strtolower($items[$i]));
            }
        }

        $cnt = count($els);
        for ($i=0; $i < $cnt; $i++) {
            if ( $i < ($cnt - 1) ) {
                $pathCtrl  .= $els[$i] . '/';
                $classCtrl .= $els[$i] . '_';
            } else {
                $pathCtrl .= $els[$i] . '.php';
                $classCtrl .= $els[$i];
            }
        }

        if ( file_exists($pathCtrl) && !is_dir($pathCtrl) ) {
            $obj = new $classCtrl();
        } else {
            // проверка наличия экшна в родительском контроллере
            preg_match('~(^.+)_([^_]+)$~', $classCtrl, $_crm);
            if ( isset($_crm[1]) && isset($_crm[2]) ) {
                $pathCtrl = preg_replace("~\/{$_crm[2]}\.php$~", '.php', $pathCtrl);

                if ( file_exists($pathCtrl) ) {
                    $action = strtolower($_crm[2]);
                    $obj = new $_crm[1]();
                }
            }
        }

        if ( empty($obj) ) {
            Ts_App::show404();
        }

        $obj->run($action);
    }

}