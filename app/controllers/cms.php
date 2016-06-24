<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 24-5-2016
 * Time: 12:57
 */
/* niet dingen echo'en in de controller maar in de view */
class CMS extends Controller {
    public $public_dir = '';

    public function __construct()
    {
        $this->public_dir = Config::$public_dir . 'cms/';
    }

    public function index($name = '', $otherName = '') {
        $user =  $this->model('user');

        $this->view('cms-defaults/header');
        //Versturen van data naar de view
        $this->view('cms/index');
        //$this->view('cms/index', [ 'currentPage'=> $this->GetCurrentPage()]);
        $this->view('cms-defaults/footer');
    }

    public function login() {
        $user =  $this->model('user');

        //Versturen van data naar de view
        $this->view('cms/login', ['user' => $user]);
        //$this->view('cms/index', [ 'currentPage'=> $this->GetCurrentPage()]);
    }

    public function logout() {
        $user =  $this->model('user');

        //Versturen van data naar de view
        $this->view('cms/logout', ['user' => $user]);
        //$this->view('cms/index', [ 'currentPage'=> $this->GetCurrentPage()]);
    }

    public function user_overview($offset = 0) {
        $user =  $this->model('user');


        $this->view('cms-defaults/header', ['user' => $user]);

        //Versturen van data naar de view
        // Alle gebruikers ophalen met de functie get all users.
        $all_users = $user->getAllUsers($offset);

        $count = $user->countAllUsers();

        // uit het array data de array ophalen van alle gebruikers.
        $this->view('cms-users/user-overview', ['users' => $all_users, 'count' => $count, 'offset' => $offset]);
        //$this->view('cms/index', [ 'currentPage'=> $this->GetCurrentPage()]);
        $this->view('cms-defaults/footer');
    }

    public function user_edit($id = null) {
        $user =  $this->model('user');

        if($id != null)
        {
            $user->getUserById($id);
            $user->getBanData($id);
        }

        $this->view('cms-defaults/header');
        //Versturen van data naar de view
        $all_users = $user->getUserById($id);
        $get_bandata = $user->getBanData($id);

        $this->view('cms-users/user-edit', ['users' => $all_users, 'user' => $user, 'UserID' => $id, 'bandata' => $get_bandata]);
        //$this->view('cms/index', [ 'currentPage'=> $this->GetCurrentPage()]);
        $this->view('cms-defaults/footer');
    }

    public function user_create() {
        $user =  $this->model('user');


        $this->view('cms-defaults/header');
        //Versturen van data naar de view
        $this->view('cms-users/user-create', ['users' => $user]);
        //$this->view('cms/index', [ 'currentPage'=> $this->GetCurrentPage()]);
        $this->view('cms-defaults/footer');
    }

    public function user_delete($offset = 0, $id = null) {
        $user =  $this->model('user');


        // Kijken of het ID niet 0 is als die wordt gevraagd.
        if($id != null)
        {
            $user->deleteUser($id);
        }

        $this->view('cms-defaults/header');
        //Versturen van data naar de view
        // Alle gebruikers ophalen met de functie get all users.
        $all_users = $user->getAllUsers($offset);
        $count = $user->countAllUsers();

        $this->view('cms-users/user-delete', ['users' => $all_users, 'count' => $count, 'offset' => $offset]);
        //$this->view('cms/index', [ 'currentPage'=> $this->GetCurrentPage()]);
        $this->view('cms-defaults/footer');
    }

    public function user_search($term = null){
        $user =  $this->model('user');
        echo json_encode($user->searchUsers($term));
    }

    public function user_suspend($id = null)
    {
        $user =  $this->model('user');

        if($id != null)
        {
            $user->getUserById($id);
        }

        $get_user = $user->getUserById($id);

        $this->view('cms-defaults/header');
        //Versturen van data naar de view
        $this->view('cms-users/user-suspend', ['users' => $get_user, 'user' => $user]);
        //$this->view('cms/index', [ 'currentPage'=> $this->GetCurrentPage()]);
        $this->view('cms-defaults/footer');
    }

    public function GetCurrentPage()
        {
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