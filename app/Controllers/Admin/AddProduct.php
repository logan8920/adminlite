<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductaddModel;

class AddProduct extends BaseController
{
    public $_session;
    public $_adminObj;

    //load helper models session
    public function __construct(){

        helper(['site','form','url']);
        $this->_adminObj = new ProductaddModel();
        $this->_session = session();
        //check_admin_login();

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
      
            $res = $this->_adminObj->set($_POST)->insert();
           
            if ($res) {

                  $this->_session->set('user', ['product_added' => true]);

                return redirect()->route('admin.add_product')->with('product_added',true);
            }else{
                return redirect()->route('admin.add_product')->with('error',true);
            }
        }
        
    }

}
