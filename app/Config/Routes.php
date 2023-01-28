<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['as' => 'home.dashboard']);
$routes->get('logout', 'Home::logout_user', ['as' => 'user.logout']);
$routes->get('login', 'Login::index', ['as' => 'admin.login']);
$routes->post('login', 'Login::index', ['as' => 'admin.login.post']);
$routes->get('dashboard', 'Home::index');
$routes->get('my', 'Home::my', ['as' => 'show.my']);
$routes->get('signup', 'Signup::index',['as' => 'signup.get']);
$routes->post('signup', 'Signup::index',['as' => 'signup.post']);
$routes->get('buy_list', 'Home::buy_list',['as' => 'account.buy.list']);
$routes->get('buy_accounts/(:any)', 'Home::buy_accounts/$1',['as' => 'user.buy.accounts']);
$routes->get('purchase/(:any)', 'Home::purchase/$1',['as' => 'user.purchase']);
$routes->get('add_fund', 'Home::add_fund',['as' => 'user.add_fund']);
$routes->get('demo', 'Home::demo');
$routes->get('paypal','Paypal::index', ['as' => 'paypal']);
$routes->post('paypaltask/response', 'Paypal::response', ['as' => 'paypal.response']);
$routes->get('paypaltask/cancel', 'Paypal::cancel', ['as' => 'paypal.cancel']);

//ajax coupon validator
$routes->post('coupon/validator', 'Home::CouponValidate', ['as' => 'coupon.validate']);

//admin routes
$routes->group('/admin', ['namespace' => 'App\Controllers\Admin'], function($routes)
    { 
        $routes->get('/', 'Auth::index',['as' => 'admin.log.get']);
        $routes->post('/', 'Auth::index',['as' => 'admin.log.post']);
        $routes->get('dashboard', 'Home::index',['as' => 'admin.dashboard']);
        $routes->get('logoutxx', 'Home::admin_logout', ['as' => 'admin.logout']);
//site setting
       $routes->get('setting', 'Home::setting',['as' => 'admin.site.setting']); 
       $routes->post('setting', 'Home::setting',['as' => 'admin.site.setting.post']); 


// product list routes
$routes->get('product_list', 'AddProduct::product_list',['as' => 'admin.product_list']);
$routes->get('account_list/(:any)', 'AddProduct::account_list/$1',['as' => 'admin.account_list']);
$routes->get('account_delete/(:any)', 'AddProduct::account_delete/$1',['as' => 'admin.account_delete']);
$routes->get('product_delete', 'AddProduct::product_delete',['as' => 'admin.product_delete']);
$routes->get('add_product', 'AddProduct::add_product',['as' => 'admin.add_product']);
$routes->post('add_product', 'AddProduct::add_product',['as' => 'admin.add_product.post']);
$routes->get('add_plan', 'AddProduct::add_plan',['as' => 'admin.add_plan']);
$routes->post('add_plan', 'AddProduct::add_plan',['as' => 'admin.add_plan.post']);
$routes->get('add_account', 'AddProduct::add_account',['as' => 'admin.add_account']);
$routes->post('add_account', 'AddProduct::add_account',['as' => 'admin.add_account.post']);


        //user list routes
        $routes->get('user/list', 'User::index', ['as' => 'user.list']);
        $routes->get('user/list/add', 'User::add', ['as' => 'user.list.add']);
        $routes->post('user/list/add', 'User::add', ['as' => 'user.list.add.post']);
        $routes->get('user/list/edit/(:any)', 'User::edit/$1', ['as' => 'user.list.edit']);
        $routes->post('user/list/edit/(:any)', 'User::edit/$1', ['as' => 'user.list.edit.post']);

        //Balance Route
        $routes->get('add-balance', 'Balance::index', ['as' => 'add.balance']);
        $routes->post('add-balance', 'Balance::index', ['as' => 'add.balance.post']);

        //Coupon Routes
        $routes->get('coupon/list','Coupon::index', ['as' => 'coupon.list']);
        $routes->get('coupon/add', 'Coupon::add', ['as' => 'coupon.add']);
        $routes->post('coupon/add', 'Coupon::add', ['as' => 'coupon.add.store']);
        $routes->get('coupon/edit/(:any)', 'Coupon::edit/$1', ['as' => 'coupon.edit']);
        $routes->post('coupon/edit/(:any)', 'Coupon::edit/$1', ['as' => 'coupon.edit.update']);
        $routes->get('coupon/list/delete/(:any)', 'Coupon::delete/$1', ['as' => 'coupon.delete']);

        //transction list
        $routes->get('transaction/list', 'Transaction::index',['as' => 'transaction.list']);




    }
);







/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
