<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "login";
$route['404_override'] = 'error';


/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['logout'] = 'user/logout';
$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";

$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";


/*frondend urls*/
$route['home'] = "frontend";

/* End of file routes.php */
/* Location: ./application/config/routes.php */


$route['sample-sets-list'] = 'samplesets/index';
$route['addnewsampleset'] = 'samplesets/addNewSampleSet';
$route['editsamplesets/(:num)'] = 'samplesets/editSampleSets/$1';
$route['editsampleset/(:num)'] = 'samplesets/editSampleSet/$1';
$route['editmusicfile'] = 'samplesets/editMusicFile';
$route['deletemusicfile'] = 'samplesets/deleteMusicFile';
$route['deletesampleset'] = 'samplesets/deleteSampleSet';
$route['searchsample'] = 'samplesets/searchSample';

$route['addnewsampleset_b'] = 'samplesets/addNewSampleSet_B';
$route['updatesampleset_b'] = 'samplesets/updateSampleSet_B';
$route['update_order'] = 'samplesets/updateOrder';
$route['deletemusiconefile'] = 'samplesets/deletMusicOneFile';


//sync4
$route['sync4-lists'] = 'sync4/index';
$route['addnewsync4'] = 'sync4/addNewSync4';
$route['addnewsync4_b'] = 'sync4/addNewSync4_B';
$route['editsync4/(:num)'] = 'sync4/editSync4/$1';
$route['updatesync4_b'] = 'sync4/updateSync4_B';
$route['sync4-upload-music'] = 'sync4/musicUpload';

//sync8
$route['sync8-lists'] = 'sync8/index';
$route['addnewsync8'] = 'sync8/addNewSync8';
$route['addnewsync8_b'] = 'sync8/addNewSync8_B';
$route['editsync8/(:num)'] = 'sync8/editSync8s/$1';
$route['editsync8-id/(:num)'] = 'sync8/editSync8/$1';
$route['sync8-upload-music'] = 'sync8/musicUpload';
$route['updatesync8_b'] = 'sync8/updateSync8_B';
/**
*Backend
*/

$route['getsetlist'] = 'samplesets/getSetList';
$route['getset/(:num)/(:any)'] = 'samplesets/getSet/$1/$2';
$route['getmusicfile/(:num)/(:any)/(:num)'] = 'samplesets/getMusicFile/$1/$2/$3';
$route['getorder/(:num)/(:any)'] = 'samplesets/getOrder/$1/$2';
$route['getmusicfiles/(:num)'] = 'samplesets/getMusicFiles/$1';
$route['sendnotification'] = 'samplesets/sendNotification';
$route['registerdevicetoken/(:any)'] = 'samplesets/registerDeviceToken/$1';

$route['updatepaidstatus/(:any)/(:num)/(:any)/(:any)'] = 'samplesets/updatePaidState/$1/$2/$3/$4';
$route['getpaidstatus/(:any)/(:num)/(:any)'] = 'samplesets/getPaidState/$1/$2/$3';

//sync4
$route['getsync4list'] = 'sync4/getSync4List';
$route['getsync4/(:num)'] = 'sync4/getSync4Item/$1';

//sync8
$route['getsync8list'] = 'sync8/getSync8List';
$route['getsync8/(:num)'] = 'sync8/getSync8/$1';
