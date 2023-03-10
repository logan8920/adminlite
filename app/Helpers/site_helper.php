<?php  

use App\Models\AccountsModel;


//check login function
if (! function_exists('check_login')) {
	function check_login(){
		$session = \Config\Services::session();
		if (isset($session->user['login']) && $session->user['login'] == true) {
			page_redirect(route_to('home.dashboard'));
		}
	}
}

//check the no of account in db
 if(! function_exists('count_varient_id')) {
   function count_varient_id($varient_id=''){
   		$accObj = new AccountsModel();
   		$used = $accObj->where('plan_varient_id',$varient_id ?? '')->where('status',1)->countAllResults() ?? '0';
   		$total =  $accObj->where('plan_varient_id',$varient_id ?? '')->countAllResults() ?? '0';
   		return $used.'/'.$total;
   }

 }

 //retun how many acc is for sale in db
 if(! function_exists('count_account_for_sale')) {
   function count_account_for_sale($varient_id=''){
   		$accObj = new AccountsModel();
   		$available_acc =  $accObj->where('plan_varient_id',$varient_id ?? '')->where('status',0)->countAllResults() ?? '0';

   		return $available_acc;
   }

 }




//check logout function
if (! function_exists('check_logout')) {
	function check_logout(){
		$session = \Config\Services::session();
		if (!isset($session->user['login'])) {
			page_redirect(route_to('admin.login'));
		}
	}
}

//admin check login function
if (! function_exists('check_admin_login')) {
	function check_admin_login(){
		$session = \Config\Services::session();
		if (isset($session->admin['login_admin']) && $session->admin['is_admin'] == true) {
			page_redirect(route_to('admin.dashboard'));
		}
	}
}


//admin check logout function
if (! function_exists('check_admin_logout')) {
	function check_admin_logout(){
		$session = \Config\Services::session();
		if (!isset($session->admin['login_admin'])) {
			page_redirect(route_to('admin.log.get'));
		}
	}
}

//for page redirecting
if (! function_exists('page_redirect')) {
	function page_redirect($uri = '', $method = 'auto', $code = NULL){
		
		if ( ! preg_match('#^(\w+:)?//#i', $uri))
		{
			$uri = site_url($uri);
		}
		
		// IIS environment likely? Use 'refresh' for better compatibility
		if ($method === 'auto' && isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS') !== FALSE)
		{
			$method = 'refresh';
		}
		elseif ($method !== 'refresh' && (empty($code) OR ! is_numeric($code)))
		{
			if (isset($_SERVER['SERVER_PROTOCOL'], $_SERVER['REQUEST_METHOD']) && $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1')
			{
				$code = ($_SERVER['REQUEST_METHOD'] !== 'GET')
					? 303	// reference: https://en.wikipedia.org/wiki/Post/Redirect/Get
					: 307;
			}
			else
			{
				$code = 302;
			}
		}

		switch ($method)
		{
			case 'refresh':
				header('Refresh:0;url='.$uri);
				break;
			default:
				header('Location: '.$uri, TRUE, $code);
				break;
		}
		exit;
	}
}

?>