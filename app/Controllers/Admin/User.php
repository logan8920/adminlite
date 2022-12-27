<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\BalanceModel;

class User extends BaseController
{
    public $_userObj;
    public $_session;
    public $_db;

    //load site helper session
    public function __construct(){

        helper(['site','uri','form']);
        $this->_db = \Config\Database::connect();
        $this->_userObj  = new UserModel();
        $this->_balanceObj = new BalanceModel();
        $this->_session = session();
        check_admin_logout();
    }

    //load user list
    public function index()
    {

        // $builder = $this->_db->table('user as user');
        // $builder->select('bal.amount,user.*');
        // $builder->join('balance as bal', 'bal.user_id = user.id');
        // $data['userList'] = $builder->get()->getResultArray() ?? [];
        $userLists = $this->_userObj->findAll() ?? [];
        $userList = [];
        foreach ($userLists as $key => $value) :
            $userList[] = array(
                                'id' => $value['id'],
                                'name' => $value['name'],
                                'email' => $value['email'],
                                'phone' => $value['phone'],
                                'last_login' => $value['last_login'],
                                'password' => $value['password'],
                                'status' => $value['status'],
                                'amount' => $this->_balanceObj->where('user_id',$value['id'])->first()['amount'] ?? '0'
                            );
        endforeach;
        $data['userList'] = $userList;

        $data['page_title'] = 'User List';
        return view('Admin/User/list',$data);
    }


    //add user
    public function add()
    {
        $data['action'] = '"user.list.add.post"';
        $data['page_title'] = 'Add User';
        $data['button'] = 'ADD USER';
        if ($this->request->getMethod() == 'post')
            return $this->store();

        return view('Admin/User/edit',$data);
    }


    //store user data
    public function store()
    {

        $rules = [
                        'name' => 'required',
                        'email' => 'required|is_unique[user.email]',
                        'phone' => 'required|min_length[10]',
                        'password' => 'required'
                    ];


        $error = [

                        'name' => ['required' => 'This Field is required.'],
                        'email' => ['required' => 'This Field is required.'],
                        'phone' => ['required' => 'This Field is required.','min_length' => 'Enter 10 digit mobile number'],
                        'password' => ['required' => 'This Field is required.']

                 ];

        $validator = $this->validate($rules,$error);

        if (! $validator) {
           
            return view('Admin/User/edit',['validator' => $this->validator,'action' => '"user.list.add.post"', 'page_title' => 'Add User']);

        }else{
            $_POST['created_at'] = date('Y-m-d H:i:s');
            
            $res = $this->_userObj->set($_POST)->insert();


            // echo $this->_userObj->getLastQuery()->getQuery(); die;
            if ($res) {
 
                $this->_balanceObj->insert(['amount' => 0, 'user_id' => $this->_userObj->insertID() ?? 0,'updated_at' => date('Y-m-d H:i:s')]);
                return redirect()->route('user.list')->with('success',"User Added Successfully!");
            }else{
                return redirect()->route('user.list')->with('error',"Please try again!");
            }
        }

    }

    //edit user function
    public function edit($id='')
    {
        if (! is_numeric($id)) 
            return route_to('admin.dashboard');

        $data['action'] = '"user.list.edit.post",'.$id;
        $data['page_title'] = 'Edit User';
        $data['all_data'] = $this->_userObj->where('id',$id)->first() ?? [];

        if ($this->request->getMethod() == 'post')
            return $this->update($id,$data);

        return view('Admin/User/edit',$data);
    }

    //update user data
    public function update($id='',$data='')
    {
        if (! is_numeric($id)) 
            return route_to('admin.dashboard');

        $rules = [
                        'name' => 'required',
                        'email' => 'required|valid_email',
                        'phone' => 'required|min_length[10]',
                        'password' => 'required'
                    ];


        $error = [

                        'name' => ['required' => 'This Field is required.'],
                        'email' => ['required' => 'This Field is required.'],
                        'phone' => ['required' => 'This Field is required.','min_length' => 'Enter 10 digit mobile number'],
                        'password' => ['required' => 'This Field is required.']

                 ];

        $validator = $this->validate($rules,$error);
        
        if (! $validator) {

            $data['validator'] = $this->validator;

            return view('Admin/User/edit', $data);

        }else{

            $res = $this->_userObj->where('id',$id)->set($_POST)->update();
            // echo $this->_userObj->getLastQuery()->getQuery(); die;

            if ($res) {
                return redirect()->route('user.list')->with('success',"user update Successfully");
            }else{
                return redirect()->route('user.list')->with('error',"Please try again!");
            }
        }

    }
}
