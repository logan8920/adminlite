<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContactModel;


class Home extends BaseController
{
    public $_accountsObj;
    public $_session;
    public $_contactObj;

    //load site helper session
    public function __construct(){

        helper(['site','uri','form']);
        $this->_contactObj  = new ContactModel();
        $this->_session = session();
        check_admin_logout();
    }

    //logout function admin
     public function admin_logout()
    {
       
    $this->_session->destroy(); 
    
        return redirect()->route('admin.log.get')->with('success',"Logout Successfully!");
    }
    
    //load dashboard
    public function index()
    {
        $data['page_title'] = 'Dashboard';
        //get user last 10 acc buy list



        return view('Admin/Dashboard/dashboard',$data);
    }

    //load setting page
    public function setting()
    {
        $data['page_title'] = 'Site setting';
        $name_account  =$this->_contactObj->first() ?? [];
        $data['contact_data']   = $name_account['whatsapp'].','.$name_account['fb'];

              if ($this->request->getMethod() == 'post')
            return $this->save_account_data();

        return view('Admin/Dashboard/setting',$data);
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

    //save contact in db
     public function save_account_data()
    {
      //  print_r($_POST); die;
        $rules = [                  
                  'fb' => 'required',
                  'whatsapp' => 'required'
                 ];

        $error = [
                        'fb' => ['required' => 'Please Enter Facebook url.'],
                        'whatsapp' => ['required' => 'Please Enter whatsapp.'],
    
                 ];

          $validator = $this->validate($rules,$error);

        if (!$validator) {
   
            return view('Admin/add_account',['validator' => $this->validator]);
        }else{

            $res = $this->_contactObj->where('id',1)->set($_POST)->update();
            // echo $this->_userObj->getLastQuery()->getQuery(); die;

            if ($res) {
                return redirect()->route('admin.site.setting')->with('success',"Contact Details updated!!");
            }else{
                return redirect()->route('admin.site.setting')->with('error',"Please try again!");
            }
        }
        
    }



}
