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

        $user =  $this->model('User');
        //echo $user->name;

        $this->view('home/index', [ 'name'=> $user->name]);
}

    public function test() {
        echo 'home/test';
    }
}