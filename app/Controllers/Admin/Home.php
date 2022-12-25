<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public $_accountsObj;
    public $_session;

    //load site helper session
    public function __construct(){

        helper(['site','uri','form']);
        //$this->_accountsObj  = new AccountsModel();
        $this->_session = session();
        check_admin_logout();
    }

    //load dashboard
    public function index()
    {
        $data['page_title'] = 'Admin | Dashboard';
        return view('Admin/Dashboard/dashboard',$data);
    }

    //demo 
    public function add_product()
    {
        return view('admin/demo');
    }
}
