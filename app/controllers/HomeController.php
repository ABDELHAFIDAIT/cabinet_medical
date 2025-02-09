<?php

use Core\Controller;

class HomeController extends Controller
{
    public function index(){
        $this->view('auth/login');
    }
}