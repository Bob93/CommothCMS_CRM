<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 24-5-2016
 * Time: 12:13
 */

/* Returnen en echo'en op view inplaats van hier echo'en */

class Controller {

    protected function model($model) {
        require_once '../app/models/' . $model .'.php';
        return new $model();
    }

    protected function view($view, $data = []) {
        require_once('../app/views/' . $view . '.php');
    }

    protected function ImportCSS($stylesheet) {
        return "<link href=\"" . Config::$public_dir . 'css/' . $stylesheet . "\" REL=\"stylesheet\" TYPE=\"text/css\">";
    }

    protected function ImportJQuery($JQuery, $altPath = false) {
        if ($altPath == false) {
            return "<script type=\"text/javascript\" src=\"" . Config::$public_js_dir . 'js/' . $JQuery . "\"></script>";
        } else {
            return "<script type=\"text/javascript\" src=\"" . $JQuery . "\"></script>";
        }
    }
}