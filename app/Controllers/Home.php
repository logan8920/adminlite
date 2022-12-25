<?php

namespace App\Controllers;
use App\Models\AccountsModel;
use App\Models\ProductaddModel;
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

     // demo page froont end of add product pages
    public function demo()
    {
        $data['page_title'] = 'My Accounts';
        $data['acc_table'] = $this->_accountsObj->where('user_id',$this->_session->user['user_id'] ?? '')->findAll() ?? [];
        return view('demo',$data);
    }

     //code of list product to buy
    public function buy_list()
    {
        $data['page_title'] = 'My Accounts';
        $data['acc_table'] = $this->_accountsObj->where('user_id',$this->_session->user['user_id'] ?? '')->findAll() ?? [];
        return view('buy_list',$data);
    }

 //load login page
    public function add_product()
    {


        if ($this->request->getMethod() == 'post') {
            return $this->save_prodcut();
        }
        return view('Admin/add_product');
    }

    //save product name to db
    public function save_prodcut()
    {

          print_r($_POST); die;
        $rules = [
                     
                        'name' => 'required|is_unique[products.name]',
                        'img' => 'required'
                 ];

        $error = [
                        'name' => ['required' => 'Name is required.'],
                        'img' => ['required' => 'product img url is required.']
                 ];

          $validator = $this->validate($rules,$error);

        if (!$validator) {
   
            return view('Admin/add_product',['validator' => $this->validator]);
        }else{
       print_r(['validator' => $this->validator]); die;
            $res = $this->_adminObj->set($_POST)->insert();
            echo $this->_adminObj->getLastQuery()->getQuery(); die;
            if ($res) {
                return redirect()->route('Admin/add_product')->with('success',true);
            }else{
                return redirect()->route('Admin/add_product')->with('error',true);
            }
        }
        
    }


    

}
