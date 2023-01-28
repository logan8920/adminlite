<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransactionModel;

class Transaction extends BaseController
{
    public function __construct()
    {
        helper(['site','uri','form']);
        $this->_transactionObj  = new TransactionModel();
        $this->_session = session();
        check_admin_logout();
    }

    //load transaction list
    public function index()
    {
       $data['page_title'] = 'Transaction List';
        $data['trasactionLog'] = $this->_transactionObj
            ->orderBy('id','DESE')
            ->orderBy('order_date_time','DESE')
            ->findAll();
        return view('Admin/Transaction/list',$data); 
    }
}
