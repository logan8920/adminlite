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
        return view('Admin/dashboard',$data);
    }

    //add product to db 
    public function add_product()
    {
         $data['page_title'] = 'Add New Product';
        return view('Admin/add_product',$data);
    }

    //add product to db 
    public function add_price()
    {
         $data['page_title'] = 'Add Plan';
        return view('Admin/add_plan',$data);
    }

    //add product to db 
    public function add_account()
    {
         $data['page_title'] = 'Add New Product';
        return view('Admin/add_account',$data);
    }


}
