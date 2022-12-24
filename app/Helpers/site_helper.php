<?php  


//check login function
if (! function_exists('check_login')) {
	function check_login(){
		$session = \Config\Services::session();
		if (isset($session->user['login']) && $session->user['login'] == true) {
			page_redirect(route_to('home.dashboard'));
		}
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