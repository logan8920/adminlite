<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaymentHistoryModel;
use App\Models\BalanceModel;

class Paypal extends BaseController
{
    public $_sessions;
    public $_paymentObj;
    public $_balanceObj;

    public function __construct()
    {
        //helper(['site','form','uri']);
        $this->_session = \Config\Services::session();
        $this->_paymentObj = new PaymentHistoryModel();
        $this->_balanceObj = new BalanceModel();
        //check_logout();
    }

    //load paypal page
    public function index()
    {
        global $_sessions;
        $_sessions = \Config\Services::session();
        $data['page_title'] = 'Paypal Gateway';
        return view('paypal_form',$data);
    }

    //paypal respose
    public function response()
    {
        if (isset($_GET['PayerID']) && $this->request->getMethod() == 'post') :
            global $_sessions;
            $_POST['user_id'] = $_sessions->user['user_id'];
            $res = $this->_paymentObj
                    ->insert($_POST);

            if(isset($_POST['payment_status']) && $_POST['payment_status'] == 'Completed') {
                $aa = $this->_balanceObj
                     ->where('user_id',$_sessions->user['user_id'])
                     ->increment('amount',$_POST['payment_gross']);
                echo $aa; die;
                 return redirect()->route('home.dashboard')
                                  ->with('success',"Payment Successfully!");
            }else{
                return redirect()->route('home.dashboard')
                                  ->with('error',"Something Went Worng! Please Contact to the admin.");
            }
        
        else:
            return redirect()->route('home.dashboard')
                                  ->with('error',"Payment Failed!!.");
        endif;
    }

    //payment cancel
    public function cancel()
    {
        return redirect()->route('paypal')
                         ->with('error',"Payment Cancel!!.");
    }
}
