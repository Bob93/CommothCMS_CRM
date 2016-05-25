<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 24-5-2016
 * Time: 12:13
 */

class Controller {

    protected function model($model) {
        require_once '../app/models/' . $model .'.php';
        return new $model();
    }
}