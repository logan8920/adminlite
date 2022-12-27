<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{

    public $_session;
    public $_userObj;

    //load helper models session
    public function __construct(){

        helper(['site','form','url']);
        $this->_userObj = new UserModel();
        $this->_session = session();
        check_login();

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
        date_default_timezone_set("Asia/Kolkata");
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

            $res = $this->_userObj->where('email',$email)->where('password',$password)->first();

            if (! $res) 
                return redirect()->route('admin.login')->with('error',"Invaild Username Password!");

            $status = ($res['status'] == 1) ? true : false;

            if ($status)
                return redirect()->route('admin.login')->with('error',"Account Block, Please Contact to Admin!");

            $this->_userObj->where('id',$res['id'])->set(['last_login' => date('Y-m-d h:i:s')])->update();
            $this->_session->set('user', ['login' => true, 'useremail' => $res['email'],'name' => $res['name'],'user_id' => $res['id']]);
            return redirect()->route('home.dashboard')->with('success',"SignIn Successfully!");


        
        }else{
            return view('login',['validator' => $this->validator]);
        }
        
    }
}
