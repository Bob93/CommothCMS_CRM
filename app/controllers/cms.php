<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 24-5-2016
 * Time: 12:57
 */
/* niet dingen echo'en in de controller maar in de view */

class CMS extends Controller {
    public $public_dir = "/COMMOTH CO-1.0/website/CommothCMS_CRM/public/";

    public function index($name = '', $otherName = '') {
        $user =  $this->model('User');

        $this->view('cms-defaults/header');
        //Versturen van data naar de view
        $this->view('cms/index');
        //$this->view('cms/index', [ 'currentPage'=> $this->GetCurrentPage()]);
        $this->view('cms-defaults/footer');
}

    public function GetCurrentPage() {
        $current_page = explode("/", $_SERVER['REQUEST_URI']);
        $search = "cms";
        while (($next = next($current_page)) !== NULL) {
            if ($next == $search) {
                return next($current_page);
            }
            }
        }


    public function test() {
        echo 'home/test';

        $userm = $this->model('user');
        $userm->getUserById(3);
        echo $userm->name;
    }

}