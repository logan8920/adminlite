<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductaddModel;
use App\Models\PlanModel;
use App\Models\AccountsModel;
class AddProduct extends BaseController
{
    public $_session;
    public $_productObj;
    public $_db;
    //load helper models session
    public function __construct(){

        helper(['site','form','url']);
        $this->_productObj = new ProductaddModel();
        $this->_planObj = new PlanModel();
        $this->_accountObj = new AccountsModel();
        $this->_db         = \Config\Database::connect();
        $this->_session = session();
        check_admin_logout();

    }

        //add account todb
    public function add_account() {


        $data['page_title'] = 'Add Account';
        $data['product_list'] = $this->_planObj->findAll() ?? [];
        if ($this->request->getMethod() == 'post') 
            return $this->save_account($data); 
    
        return view('Admin/Product/add_account',$data);

    }

        //add account to products
        public function save_account($data = '')
        { 

           // print_r($_FILES); die;
        $rules = [                  
                  'product_name' => 'required',
                  'price' => 'required',
                  'validity' => 'required',
                   'plan_varient_id' => 'required'

                  
                 ];

        $error = [
                        'product_name' => ['required' => 'Please Select Product plan.'],
                        'validity' => ['required' => 'Please Select Product plan.'],
                        'price' => ['required' => 'Please Select Product plan.'],
                         'plan_varient_id' => ['required' => 'Please Select Product plan.']
                 ];
                 if(empty($_FILES['upload_account']['name'])){
                            $rules['upload_account'] = 'required';
                            $error['upload_account'] = ['required' => 'Please Upload CVS file.'];
                 }


          $validator = $this->validate($rules,$error);

           if (!$validator) {


             $data['validator'] = $this->validator;
            return view('Admin/Product/add_account',$data);
            }else{

                //handel cvs file get email pass
                $file_to_read = fopen($_FILES["upload_account"]["tmp_name"], 'r');
                if($file_to_read !== FALSE){

                $cvs =  'INSERT INTO accounts (plan_varient_id,product_name,price,validity,email,password) VALUES ';
                while(($data = fgetcsv($file_to_read, 100, ',')) !== FALSE){
                $cvs .= '("'.$_POST['plan_varient_id'].'","'.$_POST['product_name'].'","'.$_POST['price'].'","'.$_POST['validity'].'","'.$data[0].'","'.$data[1].'"),';

                }
                $query= trim($cvs, ',');
                fclose($file_to_read);
               
                }
$res =$this->_db->simpleQuery($query);
 
      
           
           
            if ($res) {
                return redirect()->route('admin.add_account')->with('account_added',true);
            }else{
                return redirect()->route('admin.add_account')->with('plan_empty',true);
            }
        }

        }





//show all products page page
    public function product_list() {
            $data['page_title'] = 'Products List';

             //SELECT * FROM products JOIN price ON products.name = price.product_name
                $db      = \Config\Database::connect();
                $builder = $db->table('products as product');
                $builder->select('*');
                $builder->join('price as price', 'product.name = price.product_name');
                $query = $builder->get()->getResultArray();


            //
            $data['join'] = $query;
            $data['product_list'] = $this->_productObj->findAll() ?? [];
            return view('Admin/Product/product_list',$data);
    }

//show add plan page page
    public function add_plan() {
            $data['page_title'] = 'product List';
            $data['product_list'] = $this->_productObj->findAll() ?? [];

        if ($this->request->getMethod() == 'post') {
            return $this->save_plan();
        }
        return view('Admin/add_plan',$data);
    }

 //save produt plan to db
    public function save_plan()
    {
      //  print_r($_POST); die;
        $rules = [                  
                  'product_name' => 'required',
                  'price' => 'required',
                  'validity' => 'required'
                 ];

        $error = [
                        'product_name' => ['required' => 'Please Select Product.'],
                        'price' => ['required' => 'Please Enter a Price.'],
                         'validity' => ['required' => 'Please Enter Plan Period.']
                 ];

          $validator = $this->validate($rules,$error);

        if (!$validator) {
   
            return view('Admin/add_plan',['validator' => $this->validator]);
        }else{
      
            $res = $this->_planObj->set($_POST)->insert();
           
            if ($res) {
                return redirect()->route('admin.add_plan')->with('plan_added',true);
            }else{
                return redirect()->route('admin.add_plan')->with('error',true);
            }
        }
        
    }




    //load login page
    public function add_product() {


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
      
            $res = $this->_productObj->set($_POST)->insert();
           
            if ($res) {

                  $this->_session->set('user', ['product_added' => true]);

                return redirect()->route('admin.add_product')->with('product_added',true);
            }else{
                return redirect()->route('admin.add_product')->with('error',true);
            }
        }
        
    }

}
