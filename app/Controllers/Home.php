<?php

namespace App\Controllers;
use App\Models\AccountsModel;

class Home extends BaseController
{

    public $_accountsObj;
    public $_session;

    //load site helper session
    public function __construct(){

        helper(['site','uri','form']);
        $this->_accountsObj  = new AccountsModel();
        $this->_session = session();
        check_logout();
    }

    //load dashboard
    public function index()
    {
        $data['page_title'] = 'Dashboard';
        return view('dashboard',$data);
    }

    //my account page
    public function my()
    {
        $data['page_title'] = 'My Accounts';
        $data['acc_table'] = $this->_accountsObj->where('user_id',$this->_session->user['user_id'] ?? '')->findAll() ?? [];
        return view('user_acc',$data);
    }

}
