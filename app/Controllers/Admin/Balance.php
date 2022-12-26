<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BalanceModel;
use App\Models\UserModel;

class Balance extends BaseController
{
    public $_balanceObj;
    public $_userObj;
    public $_session;

    //load site helper session
    public function __construct(){

        helper(['site','uri','form']);
        $this->_userObj  = new UserModel();
        $this->_balanceObj = new BalanceModel();
        $this->_session = session();
        check_admin_logout();
    }

    //load user list
    public function index()
    {

        $data['page_title'] = 'Add Balance';
        $data['action'] = '"add.balance.post"';
        $data['userList'] = $this->_userObj->select('name,id')->findAll() ?? [];

        if ($this->request->getMethod() == 'post')
            return $this->save($data);

        return view('Admin/Balance/form',$data);
    }

    //save balance function
    public function save($data='')
    {
        $rules  =   [
                        'email' => 'required|valid_email',
                        'amount' => 'required|numeric'
                    ];


        $error = [

                        'email' => ['required' => 'This Field is required.'],
                        'amount' => ['required' => 'This Field is required.','numeric' => 'Only Numeric Values are allowed']

                 ];

        if ($this->validate($rules,$error)) {

            $post_data = $m = array_map( 'strip_tags', $_POST );
            $post_datas['user_id'] = $this->_userObj->where('email',$_POST['email'])->first()['id'] ?? '';
            //echo $this->_userObj->getLastQuery()->getQuery(); die;
            if (!$post_datas['user_id']) 
                return redirect()->route('add.balance')->with('invalid_email',true);

            $post_data['updated_at'] = date('Y-m-d H:i:s');

            $last_balance = $this->_balanceObj->where('user_id',$post_datas['user_id'])->first()['amount'] ?? 0; 
            
            $post_data['amount'] = $_POST['amount'] + $last_balance;

            $res = $this->_balanceObj->where('user_id', $post_datas['user_id'])->set($post_data)->update();
            // echo $this->_balanceObj->getLastQuery()->getQuery(); die;

            if ($res) {
                
                return redirect()->route('user.list')->with('success',true);

            }else{

                return redirect()->route('add.balance')->with('error',true);
            }
            
        }else{

            return view('Admin/Balance/form',$data);

        }
    }


    
}
