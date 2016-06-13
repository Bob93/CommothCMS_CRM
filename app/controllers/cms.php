<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 24-5-2016
 * Time: 12:57
 */
/* niet dingen echo'en in de controller maar in de view */

class CMS extends Controller {
    public $public_dir = "/CommothCMS_CRM/public/";

    public function index($name = '', $otherName = '') {
        $user =  $this->model('user');

        $this->view('cms-defaults/header');
        //Versturen van data naar de view
        $this->view('cms/index');
        //$this->view('cms/index', [ 'currentPage'=> $this->GetCurrentPage()]);
        $this->view('cms-defaults/footer');
}

    public function user_overview() {
        $user =  $this->model('user');

        $this->view('cms-defaults/header');
        //Versturen van data naar de view

        // Alle gebruikers ophalen met de functie get all users.
        $all_users = $user->getAllUsers();

        // uit het array data de array ophalen van alle gebruikers.
        $this->view('cms-users/user-overview', ['users' => $all_users]);
        //$this->view('cms/index', [ 'currentPage'=> $this->GetCurrentPage()]);
        $this->view('cms-defaults/footer');
    }

    public function user_edit() {
        $user =  $this->model('user');

        $this->view('cms-defaults/header');
        //Versturen van data naar de view
        $this->view('cms-users/user-edit');
        //$this->view('cms/index', [ 'currentPage'=> $this->GetCurrentPage()]);
        $this->view('cms-defaults/footer');
    }

    public function user_create() {
        $user =  $this->model('user');

        $this->view('cms-defaults/header');
        //Versturen van data naar de view
        $this->view('cms-users/user-create');
        //$this->view('cms/index', [ 'currentPage'=> $this->GetCurrentPage()]);
        $this->view('cms-defaults/footer');
    }

    public function user_delete() {
        $user =  $this->model('user');

        $this->view('cms-defaults/header');
        //Versturen van data naar de view
        $this->view('cms-users/user-delete');
        //$this->view('cms/index', [ 'currentPage'=> $this->GetCurrentPage()]);
        $this->view('cms-defaults/footer');
    }

    public function user_suspend() {
        $user =  $this->model('user');

        $this->view('cms-defaults/header');
        //Versturen van data naar de view
        $this->view('cms-users/user-suspend');
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