<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\BalanceModel;

class Signup extends BaseController
{
    public $_session;
    public $_userObj;
    public $_balanceObj;

    //load helper models session
    public function __construct(){
        helper(['site','uri','form']);
        $this->_session = session();
        $this->_userObj = new UserModel();
        $this->_balanceObj = new BalanceModel();
        check_login();


    }

    public function index()
     {
        if ($this->request->getMethod() == 'post')
            return $this->save_user_data();
        
        return view('signup');
    }

    public function save_user_data()
    {

        $rules = [
                        'name' => 'required',
                        'email' => 'required|is_unique[user.email]',
                        'phone' => 'required|min_length[10]',
                        'password' => 'required',
                        'c_password' => 'required|matches[password]'
                    ];


        $error = [

                        'name' => ['required' => 'This Field is required.'],
                        'email' => ['required' => 'This Field is required.'],
                        'phone' => ['required' => 'This Field is required.','min_length' => 'Enter 10 digit mobile number'],
                        'password' => ['required' => 'This Field is required.'],
                        'c_password' => ['required' => 'This Field is required.','matches' => 'conform password is not matched']

                 ];

        $validator = $this->validate($rules,$error);

        if (! $validator) {
            // print_r(['validator' => $this->validator]); die;
            return view('signup',['validator' => $this->validator]);
        }else{
            $_POST['created_at'] = date('Y-m-d H:i:s');
            // $_POST['status'] = date('Y-m-d H:i:s');
            unset($_POST['c_password']);
            $res = $this->_userObj->set($_POST)->insert();
            // echo $this->_userObj->getLastQuery()->getQuery(); die;
            if ($res) {
                $this->_balanceObj->insert(['amount' => 0, 'user_id' => $this->_userObj->insertID() ?? 0,'updated_at' => date('Y-m-d H:i:s')]);
                return redirect()->route('admin.login')->with('success',true);
            }else{
                return redirect()->route('signup.get')->with('error',true);
            }
        }
    }
}
