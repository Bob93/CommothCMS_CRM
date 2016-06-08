<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 24-5-2016
 * Time: 12:57
 */
/* niet dingen echo'en in de controller maar in de view */

class Home extends Controller {
    public $public_dir = "/COMMOTH CO-1.0/website/CommothCMS_CRM/public/";

    public function index($name = '', $otherName = '') {
        $user =  $this->model('User');
        //echo $user->name;

        $this->view('defaults/header');
        $this->view('home/index', [ 'name'=> $user->name]);
        $this->view('defaults/footer');
}

    public function contact() {
        //if(isset($_POST['email'])){
            //Test deze informatie wordt gepushed naar de view:
            $user =  $this->model('User');

            $this->view('defaults/header');
            //De informatie wordt hier gepushed naar de view.
            $this->view('home/contact', [ 'name'=> $user->name]);
            $this->view('defaults/footer');
        //}
    }

    public function portfolio() {
        //if(isset($_POST['email'])){
        //Test deze informatie wordt gepushed naar de view:
        $user =  $this->model('User');

        $this->view('defaults/header');
        //De informatie wordt hier gepushed naar de view.
        $this->view('home/portfolio', [ 'name'=> $user->name]);
        $this->view('defaults/footer');
        //}
    }

    public function aboutus() {
        //if(isset($_POST['email'])){
        //Test deze informatie wordt gepushed naar de view:
        $user =  $this->model('User');

        $this->view('defaults/header');
        //De informatie wordt hier gepushed naar de view.
        $this->view('home/aboutus', [ 'name'=> $user->name]);
        $this->view('defaults/footer');
        //}
    }

    public function test() {
        echo 'home/test';

        $userm = $this->model('user');
        $userm->getUserById(3);
        echo $userm->name;
    }

}