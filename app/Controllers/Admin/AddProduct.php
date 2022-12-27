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
     public $_planObj; //chnegd 
    public $_db;
    public $_accountObj;
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

            //delete accounts if admin want
        public function account_delete($id='') {
           echo "del not setup yet!"; die;
                if (! is_numeric($id)) 
                 return route_to('admin.account_delete',$id);

            $del = $this->_accountObj->where('id', $id)->delete();
            return redirect()->route('admin.account_delete',$id)->with('success',"user account deleted!");
            
         }


            //plan account list to page
    public function account_list($id='') {
                if (! is_numeric($id)) 
                 return route_to('admin.product_list');

                $data['page_title'] = 'Accounts List';
                $name_account  =$this->_planObj->where('id',$id)->first() ?? [];
$data['plan_data'] = $name_account['product_name'].'('. $name_account['price'] .' PKR/'. $name_account['validity'].' Days)';
 //SELECT * FROM products JOIN accounts ON products.name = accounts.product_name WHERE plan_varient_id
                $db      = \Config\Database::connect();
                $builder = $db->table('products as product');
                $builder->select('*');
                $builder->join('accounts as account', 'product.name = account.product_name');
                $builder->where('account.plan_varient_id',$id);
                $builder->where('account.status',0);
                $query = $builder->get()->getResultArray();
                $data['all_accounts'] = $query;
            
         
            return view('Admin/Product/account_list',$data);
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
                return redirect()->route('admin.add_account')->with('success',"Account added successfully!");
            }else{
                return redirect()->route('admin.add_account')->with('error',"Failed, please try again!!");
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
            $data['page_title'] = 'Add New Plan';
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
                return redirect()->route('admin.add_plan')->with('success',"Plan added successfully!");
            }else{
                return redirect()->route('admin.add_plan')->with('error',"Failed, please try again!");
            }
        }
        
    }




    //load login page
    public function add_product() {
         $data['page_title'] = 'Add New Product';

        if ($this->request->getMethod() == 'post') {
            return $this->save_prodcut();
        }
        return view('Admin/add_product',$data);
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

                return redirect()->route('admin.add_product')->with('success',"Product added successfully!");
            }else{
                return redirect()->route('admin.add_product')->with('error',"Failed, please try again!");
            }
        }
        
    }

}
