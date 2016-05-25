<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 24-5-2016
 * Time: 12:08
 */

 class App {

     protected $controller = 'home';
     protected $method = 'index';
     protected $params = [];


    public function __construct()
    {
        $url = $this->parseUrl();

        print_r($url);

        if(file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';

        echo $this->controller;
    }

     public function parseUrl() {
         if(isset($_GET['url'])) {

             return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));


         }
     }

 }