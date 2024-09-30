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
// $routes->get('/', 'Home::index');

$routes->get('/', 'Login::index');
$routes->post('/login', 'Login::login');
$routes->get('/logout', 'Login::logout');
$routes->get('/loginvalpss', 'Login::redirect');
// $routes->get('/dashboard', 'Home::home');

$routes->get('/dashboard', 'Home::homepage');


$routes->get('/requests/new', 'Firewallrequest::addnew');
$routes->get('/request/pwd', 'Firewallrequest::managepwd');
// $routes->get('/intrequests/new', 'Internetrequest::addnew');
$routes->post('/requests/getrequester', 'Firewallrequest::save');
$routes->post('/requests/save', 'Firewallrequest::save');
$routes->get('/requests/pendingrequest', 'Firewallrequest::pendingrequestlist');

$routes->get('/myreq/pendingfrequest', 'Firewallrequest::mypendingrequestlist');
$routes->get('/myreq/myinternetreq', 'InternetRequest::myinternetreqlist');
$routes->get('/myreq/myvareq', 'VaRequest::myinternetreqlist');

$routes->get('/request/internet', 'Firewallrequest::addinternet');
$routes->post('/requests/save_internet', 'InternetRequest::save_internet');
$routes->get('/requests/internetreq', 'Firewallrequest::pendinginternetlist');
$routes->get('/requests/getauthIntitem/(:any)', 'Firewallrequest::getselectedappintreq/$1');
$routes->post('/intrequests/approval', 'InternetRequest::intapprovebyman');
$routes->get('/authentication/intauthorise', 'InternetRequest::intauthenticationpanel');
$routes->get('/execution/intreqexecute', 'InternetRequest::intexecutionpanel');

$routes->get('/requests/getintauthitem/(:any)', 'InternetRequest::getselectedauthreq/$1');
$routes->post('/intrequests/authenticate', 'InternetRequest::authbysecteam');
$routes->get('/requests/pwdreset', 'Firewallrequest::pendingpwdlist');
$routes->get('/myrequest/intfwreq', 'Requestlogcontroller::getmyrequestlist');
$routes->get('/requests/approve', 'Firewallrequest::approval');
$routes->post('/requests/getusers', 'Firewallrequest::getrequestusers');
$routes->get('/execution/execute', 'Firewallauthentication::executionpanel');
$routes->get('/authentication/authorise', 'Firewallauthentication::authenticationpanel');
$routes->get('/authentication/approve', 'Firewallauthentication::authentication');
$routes->get('/requests/getpendingitem/(:any)', 'Firewallrequest::getselectedreq/$1');
$routes->post('/requests/approval', 'Firewallrequest::approvebyman');
$routes->post('/requests/authenticate', 'Firewallrequest::authbysecteam');
$routes->post('/requests/execute', 'Firewallrequest::executebynetwork');
$routes->get('/requests/getauthitem/(:any)', 'Firewallauthentication::getselectedauthreq/$1');
$routes->get('/requests/getexecuteitem/(:any)', 'Firewallauthentication::getselectedexereq/$1');
$routes->post('/authrequests/approval/(:num)', 'Firewallrequest::approvebyitsec/$1');
$routes->get('/role/new', 'Rolemanagement::getrolelist');
$routes->post('/role/save', 'Rolemanagement::save');
$routes->get('/role/edit', 'Rolemanagement::getrolelisttoedit');
$routes->post('/role/update', 'Rolemanagement::save');
$routes->get('/rolerequest/getroletoedit/(:any)', 'Rolemanagement::getselectedrole/$1');
$routes->get('/rolemodel/view', 'Rolemanagement::getrole');
$routes->get('/rolemodel/view/permissions/(:num)', 'Rolemanagement::getrolegroupaccesslist/$1');
$routes->post('/rolemodel/update/permissions', 'Rolemanagement::updatepermissions');
$routes->post('/role/update_rolegroup', 'Rolemanagement::updaterolegroup');
$routes->get('/user/new', 'Usermanagement::getrolelist');
$routes->get('/user/new', 'Usermanagement::getuserlist');
$routes->get('/user/addnew', 'Usermanagement::adduserload');
$routes->get('/user/save', 'Usermanagement::saveuser');
$routes->get('/user/getuser', 'Usermanagement::loadprofileforedit');
$routes->post('/user/changepwd', 'Usermanagement::verifychgpwd');
$routes->get('/user/reset', 'Usermanagement::getuserlist');
$routes->get('/user/getusertoreset/(:any)', 'Usermanagement::getselecteduser/$1');
$routes->get('/user/update', 'Usermanagement::updateuserprofile');
$routes->get('/user/pwchng', 'Usermanagement::pwdchange');
$routes->post('/user/resetpwd', 'Usermanagement::verifypwdreset');
$routes->get('/user/changestsus', 'Usermanagement::changestatus');
$routes->get('/frepo/fwaccessdreport', 'Reportmanager::fwaccessdreport');
$routes->post('/frepo/fwaccessdreport/search', 'Reportmanager::fwaccessdreportsearch');
$routes->get('/frepo/internetreqreport', 'Reportmanager::intaccessdreport');
$routes->get('/frepo/vareqreport', 'Reportmanager::vadetailreport');
$routes->post('/frepo/varequestreport/search', 'Reportmanager::vadetailreportsearch');

$routes->post('/frepo/intaccessdreport/search', 'Reportmanager::intaccessdreportsearch');
$routes->get('/frepo/pwdreqreport', 'Reportmanager::pwdreqreport');
$routes->get('/mrepo/userunitwisereport', 'Reportmanager::unitwiseuserreport');
$routes->post('/requests/saveva', 'VArequest::save_va');
$routes->get('/request/va', 'VArequest::addva');
$routes->post('/requests/save_passwordreset', 'PwdResetRequest::save_pwd_reset');
$routes->get('/requests/vareq', 'VArequest::pendingrequestlist');
$routes->get('/requests/getpendingva/(:any)', 'VArequest::getselectedvareq/$1');
$routes->post('/requests/approvalva', 'VArequest::approvebyman');
$routes->post('/varequests/approval', 'VArequest::vaapprovebyman');
$routes->get('/requests/penvareqauth', 'VArequest::pendingrequestlisttoauth');
$routes->get('/requests/getpendingvaauth/(:any)', 'VArequest::getselectedvareqauth/$1');
$routes->get('/requests/penvareqexe', 'VArequest::pendingrequestlisttodeploy');
$routes->get('/requests/getpendingvadep/(:any)', 'VArequest::getselectedvareqdep/$1');
$routes->post('/varequests/auth', 'VArequest::authbysec');
$routes->post('/varequests/execute', 'VArequest::executebynetwok');
$routes->post('/varequests/upload/file', 'VArequest::uploadfile');
$routes->get('/requests/pwdreset', 'PwdResetRequest::pendingrequestlist');
$routes->get('/requests/getpendingpwdreq/(:any)', 'PwdResetRequest::getselectedreq/$1');
$routes->post('/requests/approvalpwdreset', 'PwdResetRequest::approvebyman');




// $routes->get('/authentication/authorise', 'Firewallrequest::pendingrequestlist');

$routes->setAutoRoute(true);

// $routes->get('/requests/pendinglist', 'Firewallrequest::addnew')






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
