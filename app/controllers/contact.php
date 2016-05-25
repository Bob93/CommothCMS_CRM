<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 25-5-2016
 * Time: 12:00
 */

/* niet dingen echo'en in de controller maar in de view */

class Contact extends Controller {

    public function index() {
        echo 'contact/index';
    }
}