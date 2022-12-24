<?php

namespace App\Controllers;

class Home extends BaseController
{
    //load site helper session
    public function __construct(){

        helper('site');
        check_logout();
    }

    //load dashboard
    public function index()
    {
        return view('dashboard');
    }
}
