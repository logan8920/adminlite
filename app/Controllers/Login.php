<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{

    public $_session;

    //load helper models session
    public function __construct(){

        helper(['site','form','url']);
        check_login();
        $this->_session = session();

    }

    //load login page
    public function index()
    {
        if ($this->request->getMethod() == 'post') {
            return $this->login_check();
        }
        return view('login');
    }

    //check username password function
    public function login_check($value='')
    {
        $db_user = 'admin@gmail.com';
        $db_pass = '123456';
        $email = $this->request->getVar('email') ?? '';
        $password = $this->request->getVar('password') ?? '';

        if ($email == $db_user && $db_pass == $password) {
            $this->_session->set('user', ['login' => true]);
            return redirect()->route('home.dashboard');
        }else{
            return redirect()->route('admin.login')->with('invalid_pass', true);
        }
    }
}
