<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CouponModel;
use App\Models\ProductaddModel;
use App\Models\PlanModel;

class Coupon extends BaseController
{

    public $_couponObj;

    public function __construct()
    {
        helper(['site','form','url']);
        $this->_couponObj = new CouponModel();
        $this->_productObj = new ProductaddModel();
        $this->_session = session();
        $this->_planObj = new PlanModel();
        check_admin_logout();
    }

    //load coupon list
    public function index()
    {
        $data['page_title'] = 'Coupon List';
        $data['couponList'] = $this->_couponObj
            ->orderBy('id','ASC')
            ->orderBy('created_at','ASC')
            ->findAll();
        return view('Admin/Coupon/list',$data);
    }

    //add coupon 
    public function add()
    {
        $data['page_title'] = 'Add Coupon';
        $data['product'] = $this->_planObj->findAll() ?? [];
        if($this->request->getMethod() != 'post')
            return view('Admin/Coupon/add',$data);

        $rules = [
                    'coupon_code' => 'required|alpha_numeric_space',
                    'discount' => 'required|numeric',
                    'used_limit' => 'required|numeric',
                    'product_code' => 'required|numeric'
                 ];

        $errors = [
                    'coupon_code' => ['required' => 'This Field is required.','alpha_numeric_space' => 'Special Charater is not allowed.'],
                    'discount' => ['required' => 'This Field is required.'],
                    'used_limit' => ['required' => 'This Field is required.','numeric' => 'Only Numeric value is allowed.'],
                    'product_code' => ['required' => 'This Field is required.','numeric' => 'Only Numeric value is allowed.']
                  ];

        if(!$this->validate($rules,$errors)):
            $data['validator'] = $this->validator;
            return view('Admin/Coupon/add',$data);

        else:
            $post_data = [
                            'coupon_code' => strip_tags($this->request->getVar('coupon_code')),
                            'discount' => strip_tags($this->request->getVar('discount')),
                            'status' => 1,
                            'used_limit' => strip_tags($this->request->getVar('used_limit')),
                            'created_at' => date('Y-m-d H:i:s'),
                            'product_code' => strip_tags($this->request->getVar('product_code')) 
                         ];

            $id = $this->_couponObj->insert($post_data);

            if ($id) {
                
                return redirect()->route('coupon.list')->with('success',"Coupon add successfully!");

            }else{

                return redirect()->route('coupon.list')->with('error',"Something Went Worng");
            }
        endif;
    }

    //edit coupon 
    public function edit($id='')
    {
        if (! is_numeric($id)) 
            return redirect()->route('coupon.list')->with('error',"Something Went Worng");

        $data['page_title'] = 'Edit Coupon';
        $data['all_data'] = $this->_couponObj
            ->where(['id' => $id])
            ->first() ?? [];
        $data['product'] = $this->_planObj->findAll() ?? [];
        if($this->request->getMethod() != 'post')
            return view('Admin/Coupon/edit',$data);

        $rules = [
                    'coupon_code' => 'required|alpha_numeric_space',
                    'discount' => 'required|numeric',
                    'used_limit' => 'required|numeric',
                    'product_code' => 'required|numeric'
                 ];

        $errors = [
                    'coupon_code' => ['required' => 'This Field is required.','alpha_numeric_space' => 'Special Charater is not allowed.'],
                    'discount' => ['required' => 'This Field is required.'],
                    'used_limit' => ['required' => 'This Field is required.','numeric' => 'Only Numeric value is allowed.'],
                    'product_code' => ['required' => 'This Field is required.','numeric' => 'Only Numeric value is allowed.']
                  ];

        if(!$this->validate($rules,$errors)):
            $data['validator'] = $this->validator;
            return view('Admin/Coupon/add',$data);

        else:
            $post_data = [
                            'coupon_code' => strip_tags($this->request->getVar('coupon_code')),
                            'discount' => strip_tags($this->request->getVar('discount')),
                            'status' => strip_tags($this->request->getVar('status')),
                            'used_limit' => strip_tags($this->request->getVar('used_limit')),
                            'update_at' => date('Y-m-d H:i:s'),
                            'product_code' => strip_tags($this->request->getVar('product_code')) 
                         ];

            $id = $this->_couponObj
                ->set($post_data)
                ->update();

            if ($id) {
                
                return redirect()->route('coupon.list')->with('success',"Coupon Updated successfully!");

            }else{

                return redirect()->route('coupon.list')->with('error',"Something Went Worng");
            }
        endif;
    } 

    //delete coupon
    public function delete($id='')
    {
        if (! is_numeric($id)) 
            return redirect()->route('coupon.list')->with('error',"Something Went Worng");

        $res = $this->_couponObj
            ->where('id',$id)
            ->delete();

        if ($res) {
            
            return redirect()->route('coupon.list')->with('success',"Coupon Deleted successfully!");

        }else{

            return redirect()->route('coupon.list')->with('error',"Something Went Worng");
        }
    }

   
}
