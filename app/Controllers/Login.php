<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{

    public $_session;

    //load helper models session
    public function __construct(){

        $this->_session = session();

    }

    //load login page
    public function index()
    {
        return view('login');
    }
}
