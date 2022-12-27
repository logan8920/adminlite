<?php

namespace App\Controllers;
use App\Models\AccountsModel;
use App\Models\ProductaddModel;
use App\Models\BalanceModel;
use App\Models\UserModel;
use App\Models\ContactModel;
class Home extends BaseController
{

    public $_accountsObj;
    public $_session;
    public $_db;
    //load site helper session
    public function __construct(){

        helper(['site','uri','form']);

        $this->_accountsObj  = new AccountsModel();
        $this->_contactObj  = new ContactModel();
        $this->_productObj = new ProductaddModel();
        $this->_userObj  = new UserModel();
        $this->_balanceObj = new BalanceModel();
        $this->_db         = \Config\Database::connect();
        $this->_session = session();
        check_logout();
    }

        //logout function
    public function logout_user()
    {
      
$this->_session->destroy();  
  return redirect()->route('admin.login')->with('success',"Logout Successfully!");
    }
 


    //load dashboard
    public function index()
    {
        $data['page_title'] = 'Dashboard';
         $user_id = $this->_session->user['user_id'];
        //get user balance
         $data['balance_user'] =   $this->_balanceObj->where('user_id',$user_id)->first()['amount'] ?? '0';
          //get all stock of acc
         // $data['all_accounts'] =   $this->_accountsObj->where('status',0)->first()['amount'];
              

                $db      = \Config\Database::connect();
                $builder = $db->table('products as product');
                $builder->select('*');
                $builder->join('accounts as account', 'product.name = account.product_name');
                $builder->where('account.user_id',$user_id);
                $query = $builder->get()->getResultArray();
                $data['acc_table'] = $query;
                $data['available_acc'] =   $this->_accountsObj->where('status','0' ?? '')->countAllResults() ?? '0';
                 $data['your_acc'] =   $this->_accountsObj->where('user_id',$user_id ?? '')->countAllResults() ?? '0';
                 $db      = \Config\Database::connect();
     //  echo      $query = $db->getLastQuery(); die;
        return view('dashboard',$data);
    }

    // show add fund page 
    public function add_fund()
    {
         $data['page_title'] = 'Add Balance';
         $data['contact_data']= $this->_contactObj->where('id',1 ?? '')->first()['whatsapp'] ?? [];

        // print_r($_SESSION); die;
         $data['emailaddress']=  $this->_session->user['useremail'];
        return view('add_fund',$data);
    }

    //my account page
    public function my()
    {
        $data['page_title'] = 'My Accounts';
       
        //get user balance
             $user_id = $this->_session->user['user_id'];

                $db      = \Config\Database::connect();
                $builder = $db->table('products as product');
                $builder->select('*');
                $builder->join('accounts as account', 'product.name = account.product_name');
                $builder->where('account.user_id',$user_id);
                $query = $builder->get()->getResultArray();
                $data['acc_table'] = $query;
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
         $data['page_title'] = 'Products List';
        
                $db      = \Config\Database::connect();
                $builder = $db->table('products as product');
                $builder->select('*');
                $builder->join('price as price', 'product.name = price.product_name');
                $query = $builder->get()->getResultArray();
                $data['join'] = $query;
                $data['product_list'] = $this->_productObj->findAll() ?? [];
               
                return view('buy_list',$data);
    }



        //load accounts to buy page
    public function buy_accounts($id='')
    {            if (! is_numeric($id))
                 return route_to('account.buy.list');

          $data['page_title']  = "Your Buying Info";
        

        //set db for get prodcut img 
               $db      = \Config\Database::connect();
                $builder = $db->table('products as product');
                $builder->select('*');
                $builder->join('accounts as account', 'product.name = account.product_name');
                $builder->where('account.plan_varient_id',$id);
                $builder->where('account.status',0);
               
                $query =  $builder->limit(1)->get()->getResultArray();
                $data['account_info'] = $query;


         //$account_info  =$this->_accountsObj->where('id',$id)->where('status',0)->first() ?? [];
        // $data['account_info'] = $account_info;
        return view('buy_accounts',$data);
    }


 //load login page
    public function add_product()
    {


        if ($this->request->getMethod() == 'post') {
            return $this->save_prodcut();
        }
        return view('Admin/add_product');
    }

    
     //assign account to user purchase done
    public function purchase($id='')
    {   if (! is_numeric($id)){
        return route_to('account.buy.list');
          } else {
           //get user balance
             $user_id = $this->_session->user['user_id'];
             $user_balance =  $this->_balanceObj->where('user_id',$user_id)->first()['amount'];
             //get product plan price
              $acc_price=  $this->_accountsObj->where('id',$id)->first()['price'];
              //check balance is grater then acc price or equal
              if($user_balance  >= $acc_price){
//UPDATE `accounts` SET `user_id` = '6' WHERE `id` = '2'
                $data1 = [
    'status' => '1',
    'used_date'    => date('Y-m-d H:i:s'),
    'user_id'    => $user_id
];
     $res = $this->_accountsObj->where('id',$id)->set($data1)->update();
 
                        if ($res) {
                        $updated_bal = $user_balance  - $acc_price;
       $updated_query = $this->_balanceObj->where('user_id',$user_id)->set(['amount' => $updated_bal,'updated_at' => date('Y-m-d H:i:s')])->update();    
        return redirect()->route('home.dashboard')->with('success',"Transaction Successfully!");
                   
                        }else{
                        echo "error api";        
                        }
                        } else{
                      return redirect()->route('home.dashboard')->with('error',"Balance is Low, Please Topup!");
                        }
          }
       
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
       print_r(['validator' => $this->validator]); die;
            $res = $this->_adminObj->set($_POST)->insert();
            echo $this->_adminObj->getLastQuery()->getQuery(); die;
            if ($res) {
                return redirect()->route('Admin/add_product')->with('success',"Product Added Successfully!");
            }else{
                return redirect()->route('Admin/add_product')->with('error',"Please try again!");
            }
        }
        
    }


    

}
