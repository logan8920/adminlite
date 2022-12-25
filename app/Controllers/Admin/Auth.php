<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    public $_session;
    public $_adminObj;

    //load helper models session
    public function __construct(){

        helper(['site','form','url']);
        $this->_adminObj = new AdminModel();
        $this->_session = session();
        check_admin_login();

    }

    //load login page
    public function index()
    {
        if ($this->request->getMethod() == 'post') {
            return $this->login_check();
        }
        return view('Admin/login');
    }

    //check username password function
    public function login_check($value='')
    {
        $rules = [
                        'email' => 'required|valid_email',
                        'password' => 'required'
                 ];

        $error = [
                        'email' => ['required' => 'This Field is required.'],
                        'password' => ['required' => 'This Field is required.']
                 ];

        if ($this->validate($rules,$error)) {

            $email = strip_tags($this->request->getVar('email'));
            $password = strip_tags($this->request->getVar('password'));

            $res = $this->_adminObj->where('email',$email)->where('password',$password)->first();

            if (! $res) 
                return redirect()->route('admin.log.get')->with('invalid_pass',true);

            

            if ($res == '')
                return redirect()->route('admin.log.get')->with('error',true);


            $this->_session->set('user', ['login' => true,'name' => $res['name'],'email' => $res['email'],'is_admin' => true]);
            return redirect()->route('admin.dashboard');
        
        }
        
    }

}
