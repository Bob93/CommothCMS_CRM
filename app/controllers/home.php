<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 24-5-2016
 * Time: 12:57
 */
/* niet dingen echo'en in de controller maar in de view */

class Home extends Controller {

    public function index($name = '', $otherName = '') {
        echo $name;

       $user =  $this->model('User');
       $user->name = 'Tijs';

        echo $user->name;
}

    public function test() {
        echo 'home/test';
    }
}