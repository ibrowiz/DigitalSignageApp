<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//use App\Models\Tenant;

/*Route::get('/', function () {
 $tenant = Tenant::where('domain','telvida') -> first();

    return view('landingpage',compact('tenant'));
});*/



Route::get('/','LandingController@index');


Auth::routes();


Route::get('/users/login','Auth\UserLoginController@showLoginForm')->name('user.login');

Route::post('/users/login', 'Auth\UserLoginController@login')->name('user.login.submit');

Route::get('users/home', 'HomeController@index')->name('user.dashboard');

Route::get('/users/register', 'Auth\UserLoginController@showRegForm')->name('user.register');

Route::get('/users/logout','Auth\UserLoginController@logout')->name('user.logout');

//Route::post('/users/save', 'ContentOwner\ClientController@store')->name('user.save');

Route::post('/tenantusers/save', 'Auth\RegisterController@store')->name('tenantuser.save');

Route::get('/tenantlist', 'App\MediaPartner\TenantController@index');

Route::get('/user/device/index', 'ContentOwner\DeviceController@index')->name('registereddevice.index');

Route::get('/user/editdevice/{id}', 'ContentOwner\DeviceController@edit')->name('user.device.edit');

Route::post('user/updatedevice/{id}', 'Auth\DeviceController@update')->name('user.device.update');



Route::prefix('admin')->group(function(){

	Route::get('/templates/', 'App\Admin\LayoutTemplateController@index')->name('layout.templates');
	//Route::get('/template/create', 'App\Admin\LayoutTemplateController@create')->name('template.create');


	
	Route::get('/login', 'App\Admin\Auth\AdminLoginController@showLoginForm')->name('admin.login');

	Route::post('/login', 'App\Admin\Auth\AdminLoginController@login')->name('admin.login.submit');

	Route::get('/', 'App\Admin\AdminController@index')->name('admin.index');

	Route::get('/tenants', 'App\Admin\AdminController@tenants')->name('admin.tenant.index');



	//plan
	Route::get('/plan/index', 'App\Admin\PlanController@index')->name('plan.index');
	Route::get('/plan/create', 'App\Admin\PlanController@create')->name('plan.create');
	Route::post('/plan/store', 'App\Admin\PlanController@store')->name('plan.store');
	Route::get('/plan/edit/{id}', 'App\Admin\PlanController@edit')->name('plan.edit');
	Route::post('/plan/update/{id}', 'App\Admin\PlanController@update')->name('plan.update');


	// Permission Route Definition
		Route::get('permission', ['as' => 'admin.permission.index', 'uses' => 'App\Admin\PermissionController@index']);

		Route::get('permission/create', ['as' => 'admin.permission.create', 'uses' => 'App\Admin\PermissionController@create']);

		Route::post('permission/store', ['as' => 'admin.permission.store', 'uses' => 'App\Admin\PermissionController@store']);

		Route::get('permission/edit/{id}', ['as' => 'admin.permission.edit', 'uses' => 'App\Admin\PermissionController@edit']);

		Route::get('permission/show/{id}', ['as' => 'admin.permission.show', 'uses' => 'App\Admin\PermissionController@show']);

		Route::post('permission/update/{id}', ['as' => 'admin.permission.update', 'uses' => 'App\Admin\PermissionController@update']);

		Route::post('permission/delete', ['as' => 'admin.permission.delete', 'uses' => 'App\Admin\PermissionController@delete']);

		// Role Route Definition
		Route::get('role', ['as' => 'admin.role.index', 'uses' => 'App\Admin\RoleController@index']);

		Route::get('role/create', ['as' => 'admin.role.create', 'uses' => 'App\Admin\RoleController@create']);

		Route::post('role', ['as' => 'admin.role.store', 'uses' => 'App\Admin\RoleController@store']);

		Route::get('role/edit/{id}', ['as' => 'admin.role.edit', 'uses' => 'App\Admin\RoleController@edit']);

		Route::get('role/show/{id}', ['as' => 'admin.role.show', 'uses' => 'App\Admin\RoleController@show']);

		Route::post('role/update/{id}', ['as' => 'admin.role.update', 'uses' => 'App\Admin\RoleController@update']);

		Route::post('role/delete', ['as' => 'admin.role.delete', 'uses' => 'App\Admin\RoleController@delete']);



		Route::post('save-canvas', ['as' =>'admin.saveCanvas', 'uses' => 'App\Admin\designlayout\LayoutsController@create']);

			Route::post('layout/edit/{id}', ['as'=>'admin.editlayout', 'uses'=>'App\Admin\designlayout\LayoutsController@edit']);

			Route::post('layout/upload', ['as'=>'admin.uploadlayout', 'uses'=>'App\Admin\designlayout\LayoutsController@upload']);


			Route::get('layout/welcome', ['as'=>'admin.showlayout','uses'=>'App\Admin\designlayout\LayoutsController@show']);

			Route::get('layout/view/{id}', ['as'=>'admin.showlayout', 'uses'=>'App\Admin\designlayout\LayoutsController@read']);

			Route::get('layout/home',  ['as'=>'admin.layoutindex','uses'=>'App\Admin\designlayout\LayoutsController@showResources']);

			Route::get('layout/webcontent', ['as'=>'admin.webcontent', 'uses'=>'App\Admin\designlayout\LayoutsController@webcontent']);

			Route::get('layout/screenshot', ['as'=>'admin.screenshot', 'uses'=>'App\Admin\designlayout\LayoutsController@screenshot']);

			Route::get('layout/destroy/{id}',  ['as'=>'admin.destroylayout', 'uses'=>'App\Admin\designlayout\LayoutsController@destroy']); //layout




			Route::post('create-canvas', 'App\Admin\designlayout\LayoutTemplateController@save');

			Route::get('/layouttemplates', 'App\Admin\designlayout\LayoutTemplateController@index');

			Route::get('layouttemplates/edit/{id}', 'App\Admin\designlayout\LayoutTemplateController@edit');

			Route::get('layouttemplates/create', 'App\Admin\designlayout\LayoutTemplateController@create');

			Route::get('layouttemplates/delete/{id}', 'App\Admin\designlayout\LayoutTemplateController@destroy');

			Route::get('/preview', ['middleware'=>'cors', 'uses'=>'App\Admin\designlayout\LayoutsController@preview']);



			Route::get('/resource', 'App\Admin\ResourceController@index');

			Route::post('resource/upload', 'App\Admin\ResourceController@upload');

			Route::get('resource/delete/{id}', 'App\Admin\ResourceController@delete');


			Route::get('content', 'ContentsController@index');

			Route::post('insert', 'App\ContentsController@add');





	/*Route::get('/confirmation/{token}',['as'=>'admin.confirmation', 'uses'=>'App\Admin\Auth\RegisterController@confirmation']);*/

	Route::get('/confirmation/{token}','App\Admin\Auth\ConfirmationController@confirmation')->name('admin.confirmation');


	Route::get('/delete/tenant/{id}', 'App\Admin\AdminController@destroyTenant')->name('admin.tenant.destroy');

	Route::get('/tenant/activate/{id}', 'App\Admin\AdminController@activateTenant')->name('admin.tenant.activate');

	Route::get('/tenant/deactivate/{id}', 'App\Admin\AdminController@deactivateTenant')->name('admin.tenant.deactivate');

	Route::get('/contentowners', 'App\Admin\AdminController@contentOwners')->name('admin.contentowner.index');

	Route::get('/delete/contentowner/{id}', 'App\Admin\AdminController@destroyContentOwner')->name('admin.contentowner.destroy');

	Route::get('/contentowner/activate/{id}', 'App\Admin\AdminController@activateContentOwner')->name('admin.contentowner.activate');

	Route::get('/contentowner/deactivate/{id}', 'App\Admin\AdminController@deactivateContentOwner')->name('admin.contentowner.deactivate');

	Route::get('/profile/edit/{id}', 'App\Admin\ProfileController@edit')->name('admin.profile.edit');

	Route::post('/profile/update/{id}','App\Admin\ProfileController@update')->name('admin.profile.update');

	Route::post('/profile/password/update/{id}','App\Admin\ProfileController@updatePassword')->name('admin.profile.password.update');

	Route::get('/dashboard', 'App\Admin\dashboardController@index')->name('admin.dashboard');

	Route::get('/logout', 'App\Admin\Auth\AdminLoginController@logout')->name('admin.logout');

	Route::get('/device/add','App\Admin\DeviceController@create')->name('device.add');

	Route::post('/device/save','App\Admin\DeviceController@store')->name('device.store');

	Route::get('/device/index', 'App\Admin\DeviceController@index')->name('device.index');

	Route::get('/businesscategory/index', 'App\Admin\BusinessCategoryController@index')->name('businesscategory.index');

	Route::get('/businesscategory/create', 'App\Admin\BusinessCategoryController@create')->name('businesscategory.create');

	Route::post('/businesscategory/store', 'App\Admin\BusinessCategoryController@store')->name('businesscategory.save');

	Route::get('/businesscategory/edit/{id}','App\Admin\BusinessCategoryController@edit')->name('businesscategory.edit');

	Route::post('/businesscategory/update/{id}','App\Admin\BusinessCategoryController@update')->name('businesscategory.update');

	Route::get('/businesstype/index', 'App\Admin\BusinessTypeController@index')->name('businesstype.index');

	Route::get('/businesstype/create', 'App\Admin\BusinessTypeController@create')->name('businesstype.create');

	Route::post('/businesstype/store', 'App\Admin\BusinessTypeController@store')->name('businesstype.store');

	Route::get('/businesstype/edit/{id}', 'App\Admin\BusinessTypeController@edit')->name('businesstype.edit');

	Route::post('/businesstype/update/{id}', 'App\Admin\BusinessTypeController@update')->name('businesstype.update');

	Route::get('/contentcategory/index', 'App\Admin\ContentCategoryController@index')->name('contentcategory.index');

	Route::get('/contentcategory/create', 'App\Admin\ContentCategoryController@create')->name('contentcategory.create');

	Route::post('/contentcategory/store', 'App\Admin\ContentCategoryController@store')->name('contentcategory.store');

	Route::get('/contentcategory/edit/{id}', 'App\Admin\ContentCategoryController@edit')->name('contentcategory.edit');

	Route::post('/contentcategory/update/{id}', 'App\Admin\ContentCategoryController@update')->name('contentcategory.update');

	Route::get('/allowedcontent/index', 'App\Admin\ContentController@index')->name('allowedcontent.index');

	Route::get('/allowedcontent/create', 'App\Admin\ContentController@create')->name('allowedcontent.create');

	Route::post('/allowedcontent/store', 'App\Admin\ContentController@store')->name('allowedcontent.store');

	Route::get('/allowedcontent/edit/{id}', 'App\Admin\ContentController@edit')->name('allowedcontent.edit');

	Route::post('/allowedcontent/update/{id}', 'App\Admin\ContentController@update')->name('allowedcontent.update');

	Route::get('/users/create', 'App\Admin\Auth\RegisterController@create')->name('admin-user.create');

	Route::get('/users/index', 'App\Admin\Auth\RegisterController@index')->name('admin-user.index');

	Route::post('/users/store', 'App\Admin\Auth\RegisterController@store')->name('admin-user.store');

	Route::get('/users/edit/{id}', 'App\Admin\Auth\RegisterController@edit')->name('admin-user.edit');

	Route::post('/users/update/{id}', 'App\Admin\Auth\RegisterController@update')->name('admin-user.update');

	Route::get('/template/create', 'App\Template\TemplateController@create')->name('standardtemplate.create'
       );
	Route::get('/template/index', 'App\Template\TemplateController@index')->name('template.index'
       );
	Route::post('/template/store', 'App\Template\TemplateController@store')->name('template.store');

	Route::get('/template/edit/{id}', 'App\Template\TemplateController@edit')->name('template.edit');

	Route::post('template/updatesettings/{id}','App\Template\TemplateController@updateSetting')->name('template.updatesettings');



	Route::post('/standardtemplate/update/{id}', 'App\Template\StandardDeviceTemplateController@update')->name('standardtemplate.update');

	Route::get('/credit/index', 'App\admin\credit\CreditController@index')->name('admin.credit.index'
       );

    Route::post('/credit/assign/{id}', 'App\admin\credit\CreditController@assign')->name('admin.credit.assign');

/*Route::get('/creditlog/index', 'App\Admin\logs\ContentOwnerCreditTransController@contOwnersCreditTransIndex')->name('admin.creditlog.index');

Route::get('/user/transactions/{id}', 'App\Admin\logs\ContentOwnerCreditTransController@getTransactionByContentOwnerId')->name('admin-user.transactions');
*/


/*Route::get('/media-partner/credit/index', 'App\admin\credit\MediaPartnerCreditController@index')->name('admin.mediapartnercredit.index'
);

Route::post('mediapartner/credit/assign/{id}', 'App\admin\credit\MediaPartnerCreditController@assign')->name('admin.mediapartnercredit.assign');

Route::get('mediapartner/creditlog/index', 'App\Admin\logs\MediaPartnerCreditTransController@mediaPartnerCreditTransIndex')->name('admin.creditlog.index');

Route::get('/mediapartner/transactions/{id}', 'App\Admin\logs\MediaPartnerCreditTransController@getTransactionByMediaPartnerId')->name('admin-user.transactions');*/



//telvida bank
Route::get('/bank/index', 'App\admin\BankController@index')->name('admin.bank.index');

Route::get('/bank/create', 'App\admin\BankController@create')->name('admin.bank.create');

Route::post('/bank/store', 'App\admin\BankController@store')->name('admin.bank.store');

Route::get('/bank/edit/{id}', 'App\admin\BankController@edit')->name('admin.bank.edit');

Route::post('/bank/update/{id}', 'App\admin\BankController@update')->name('admin.bank.update');


//payments pending approval
Route::get('/payments-pending-approval', 'App\Admin\credit\MediaPartnerPaymentsController@index')->name('mediapartner.pending.index');

Route::get('/payment/approve/{id}', 'App\Admin\credit\MediaPartnerPaymentsController@approve')->name('mediapartner.payment.approve');

Route::get('/payment/decline/{id}', 'App\Admin\credit\MediaPartnerPaymentsController@decline')->name('mediapartner.payment.decline');

Route::get('/payment/revert/{id}', 'App\Admin\credit\MediaPartnerPaymentsController@revert')->name('mediapartner.payment.revert');

Route::get('/payments/approved', 'App\Admin\credit\MediaPartnerPaymentsController@approved')->name('mediapartner.payment.approved');

Route::get('/payments/declined', 'App\Admin\credit\MediaPartnerPaymentsController@declined')->name('mediapartner.payment.approved');

Route::get('/contentowner/payment/approve/{id}', 'ContentOwner\payment\ContentOwnerPaymentsController@approve')->name('contentowner.payment.approve');
Route::get('/contentowner/payment/decline/{id}', 'ContentOwner\payment\ContentOwnerPaymentsController@decline')->name('contentowner.payment.decline');

});

//mediapartner
//


Route::post('/mediapartner/submitconfigurecontent', 'App\MediaPartner\content\ContentController@submitconfig')->name('mediapartner.config.index');

Route::get('/mediapartner/payment/index', 'App\MediaPartner\payment\PaymentController@index')->name('mediapartner.payment.index');

Route::post('/mediapartner/payment/store', 'App\MediaPartner\payment\PaymentController@store')->name('mediapartner.payment.store');

Route::get('/mediapartner/processpayment/index', 'App\MediaPartner\payment\PaymentController@processPaymentIndex')->name('mediapartner.processpayment.index');

Route::get('/mediapartner/payment/delete/{id}', 'App\MediaPartner\payment\PaymentController@delete')->name('mediapartner.payment.delete');

Route::get('mediapartner/contentowner/credit/index', 'App\MediaPartner\credit\ContentOwnerCreditController@index')->name('contentowner.credit.index');

Route::get('/mediapartner/contentowner/transactions/{id}', 'App\Admin\logs\MediaPartnerCreditTransController@getTransactionByMediaPartnerId')->name('admin-user.transactions');

Route::post('mediapartner/contentowner/credit/assign/{id}', 'App\MediaPartner\credit\ContentOwnerCreditController@assign')->name('mediapartner.credit.assign');



/*Route::post('/operator/login', 'App\MediaPartner\Auth\OperatorLoginController@login')->name('operator.login.submit');

Route::get('/operator/logout', 'App\MediaPartner\Auth\OperatorLoginController@logout')->name('operator.logout');*/



//Route::post('/operator/save', 'App\MediaPartner\MediaPartnerController@store')->name('operator.save');

/*Route::get('/operator/contentowner/logout', 'App\MediaPartner\Auth\OperatorLoginController@logoutcontentowner')->name('contentowner.logout');

Route::get('/operator/index', 'App\MediaPartner\OperatorAdminController@index')->name('operatoradmin.index');


Route::get('/operator/wallet/index', 'App\MediaPartner\WalletController@index')->name('operator.wallet.index.create');

Route::post('/operator/assignpoint/{id}', 'App\MediaPartner\WalletController@assignPoint')->name('operator.point.assign');

Route::post('/operator/convertbonus/{id}', 'App\MediaPartner\WalletController@convertBonusToPoint')->name('operator.point.convert');

Route::post('/operator/walletsetting/{id}', 'App\MediaPartner\WalletController@walletSetting')->name('operator.point.settings');



Route::get('/operator/device/settings/{id}','App\MediaPartner\DeviceController@settingsIndex')->name('operator.device.settings');

Route::post('/operator/device/updatesettings/{id}','App\MediaPartner\DeviceController@updateSetting')->name('operator.device.updatesettings');*/



//Route::post('/operator/devicegroup/save','App\MediaPartner\DeviceGroupController@store')->name('devicegroup.save');












/*Route::get('/user/devicegroup/add','ContentOwner\DeviceGroupController@create')->name('devicegroup.add');

Route::post('/user/devicegroup/save','ContentOwner\DeviceGroupController@store')->name('devicegroup.save');

Route::get('/user/devicegroup/index','ContentOwner\DeviceGroupController@index')->name('devicegroup.index');

Route::get('/user/devicegroup/edit/{id}','ContentOwner\DeviceGroupController@edit')->name('devicegroup.edit');*/

//Route::post('/user/devicegroup/update/{id}','ContentOwner\DeviceGroupController@update')->name('devicegroup.update');

/*Route::get('/device/add','App\Admin\DeviceController@create')->name('device.add');

Route::post('/device/save','App\Admin\DeviceController@store')->name('device.store');*/

//Route::get('user/device/register', 'ContentOwner\RegisterDeviceController@index');

//Route::post('user/device/register','ContentOwner\RegisterDeviceController@updateDevice')->name('device.register.submit');
/*Route::get('/user/device/settings/{id}','ContentOwner\DeviceController@settingsIndex')->name('user.device.settings');

Route::post('/user/device/updatesettings/{id}','ContentOwner\DeviceController@updateSetting')->name('user.device.updatesettings');

Route::post('/user/device/applysavedTemplate','ContentOwner\DeviceController@applySavedTemplate')->name('user.device.applysavedTemplate');

Route::post('/user/device/applystandardtemplate','ContentOwner\DeviceController@applyStantardTemplate')->name('user.device.applystandardtemplate');
*/
/*Route::get('/device/index', 'App\Admin\DeviceController@index')->name('device.index');*/

//Route::get('contentowner/dependent-dropdown','ContentOwner\DeviceController@index');
Route::get('/locations', 'App\location\LocationController@getLocation');

/*Route::get('/contentowner/location','ContentOwner\LocationController@getLocation');

Route::get('/contentowner/get-city-list','ContentOwner\LocationController@getCityList');

Route::get('/get-businesstype-list','ContentOwner\UserController@getBusinessTypeList');
*/
Route::get('/getContent','App\content\ContentController@getContent');

/*Route::get('/getoperator-businesstype-list','App\MediaPartner\DeviceController@getOperatorBusinessTypeList');

Route::get('/getoperator-content-list','App\MediaPartner\content\ContentController@getOperatorContentList');
*/


// Password reset routes for admins
  Route::post('/admin/password/email', 'App\Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/admin/password/reset', 'App\Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/admin/password/reset', 'App\Admin\Auth\ResetPasswordController@reset');
  Route::get('/admin/password/reset/{token}', 'App\Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');


  // Password reset routes for operators
  Route::post('/operator/password/email', 'App\MediaPartner\Auth\ForgotPasswordController@sendResetLinkEmail')->name('operator.password.email');
  Route::get('/operator/password/reset', 'App\MediaPartner\Auth\ForgotPasswordController@showLinkRequestForm')->name('operator.password.request');
  Route::post('/operator/password/reset', 'App\MediaPartner\Auth\ResetPasswordController@reset');
  Route::get('/operator/password/reset/{token}', 'App\MediaPartner\Auth\ResetPasswordController@showResetForm')->name('operator.password.reset');




/*Route::get('/contentowner/wallet/index', 'ContentOwner\WalletController@index')->name('ContentOwner.wallet.index.create');

Route::post('/contentowner/assignpoint/{id}', 'ContentOwner\WalletController@assignPoint')->name('ContentOwner.point.assign');

Route::post('/contentowner/convertbonus/{id}', 'ContentOwner\WalletController@convertBonusToPoint')->name('ContentOwner.point.convert');

Route::post('/contentowner/walletsetting/{id}', 'ContentOwner\WalletController@walletSetting')->name('ContentOwner.point.settings');



Route::get('contentowner/device/add','ContentOwner\DeviceController@create')->name('contentowner.device.add');

Route::post('contentowner/device/register', 'ContentOwner\DeviceController@register')->name('contentowner.device.register.submit');

Route::get('contentowner/device/index', 'ContentOwner\DeviceController@index')->name('contentowner.device.index');

Route::post('/contentowner/store', 'ContentOwner\UserController@store')->name('contentowner.store');

Route::get('/contentowner/index', 'ContentOwner\UserController@index')->name('contentowner.index');

Route::get('/contentowner/create', 'ContentOwner\UserController@create')->name('contentowner.create');


//content owner payments
Route::get('/contentowner/payment/index', 'ContentOwner\payment\PaymentController@index')->name('contentowner.payment.index');

Route::post('/contentowner/payment/store', 'ContentOwner\payment\PaymentController@store')->name('contentowner.payment.store');

Route::get('/contentowner/processpayment/index', 'ContentOwner\payment\PaymentController@processPaymentIndex')->name('contentowner.processpayment.index');

Route::get('/contentowner/payment/delete/{id}', 'ContentOwner\payment\PaymentController@delete')->name('mediapartner.payment.delete');
*/


/*Route::get('/{name}/operator/login', 'App\MediaPartner\Auth\OperatorLoginController@showLoginForm')->name('operator.login');
*/
//Route::get('/users/confirmation/{token}','Auth\RegisterController@confirmation')->name('confirmation');



//Route::get('/mediapartner/confirmation/{token}','App\MediaPartner\RegisterController@confirmation')->name('mediapartner.confirmation');

Route::get('client/payment/callback', ['as' => 'clientpayment.callback', 'uses'=>'App\Client\payment\PaymentController@getCallback']);

Route::post('client/payment/callback', ['as' => 'clientpayment.callback', 'uses'=>'App\Client\payment\PaymentController@getCallback']);

Route::get('userUnAuth/login', ['as' => 'user.login', 'uses' => 'App\Client\Auth\LoginControllerUnAuth@showLoginForm']);

Route::post('userUnAuth/login', ['as' => 'user.login.submit', 'uses' => 'App\Client\Auth\LoginControllerUnAuth@login']);

Route::post('client/register', ['as' => 'client.register.store', 'uses' => 'App\client\Auth\RegisterController@register']);

Route::get('client/confirmation/{token}',['as'=>'clientconfirmation', 'uses' =>'App\Client\Auth\RegisterController@confirmation']);

Route::get('client-user/confirmation/{token}',['as'=>'userconfirmation', 'uses' =>'App\Client\Auth\ConfirmationController@confirmation']);

Route::get('mediapartner/home', 'MediaPartnerHomeController@index');

Route::group(['namespace' => 'App\Client', 'middleware' => 'tenant', 'as' => 'client.'], function($domain)
{

		//Route::post('client/login', ['as' => 'login.submit', 'uses' => 'Auth\LoginController@login']);

		

		Route::group(['prefix' => 'client/{domain}', 'middleware' => 'tenant', 'as' => 'user.'], function($domain)
			{
				Route::post('client/login', ['as' => 'login.submit', 'uses' => 'Auth\LoginController@login']);
				Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

				Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);

				Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

				Route::get('/', ['as' => 'index', 'uses' => 'WelcomeController@index']);

				Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegForm']);
				//Route::post('save', ['as'=>'save', 'uses' => 'ContentOwner\ClientController@store']);

				Route::post('register', ['as' => 'store', 'uses' => 'Auth\RegisterController@register']);

				Route::get('wallet/index', ['as' => 'clientwallet', 'uses' =>'WalletController@index']);

				Route::get('packages', ['as' => 'client.packages', 'uses' =>'Payment\PackageController@index']);

				Route::get('/packages/deviceQty/{id}', ['as' => 'package.deviceqty', 'uses' => 'Payment\PackageController@quantity']);

				Route::post('/packages/store', ['as' => 'package.store', 'uses' => 'Payment\PackageController@store']);

				Route::post('/wallet/assignpoint/{id}', ['as' => 'wallet.assignpoint', 'uses' => 'WalletController@assignPoint']);

			Route::post('/wallet/convertbonus/{id}', ['as' => 'wallet.convertbonus','uses' => 'WalletController@convertBonusToPoint']);

			Route::post('walletsetting', ['as' => 'client.wallet.setting', 'uses' => 'WalletController@walletSetting']);

				Route::get('payment/index', ['as' => 'clientpayment.index', 'uses'=>'payment\PaymentController@index']);

				Route::post('payment/confirmation', ['as' => 'clientpayment.confirmation', 'uses'=>'payment\PaymentController@paymentConfirmation']);




				Route::get('users', ['as' => 'users', 'uses' =>'UserController@index']);

				Route::get('registerdevice', ['as' =>'registerdevice','uses'=>'RegisterDeviceController@register']);

		
				Route::get('devices', ['as'=>'client.devices', 'uses'=>'DeviceController@index']);


				Route::get('devicegroups', ['as'=>'devicegroups', 'uses'=>'DeviceGroupController@index']);

				Route::get('devicegroup/create', ['as'=>'createdevicegroup', 'uses'=>'DeviceGroupController@create']);
				Route::post('devicegroup/save',['as'=>'devicegroup.save', 'uses' => 'DeviceGroupController@store']);

				//Route::post('device/update', ['as' =>'device.update', 'uses' => 'RegisterDeviceController@updateDevice']);


				Route::get('devicegroup/edit/{id}', ['as'=>'devicegroup.edit', 'uses'=>'DeviceGroupController@edit']);

				Route::post('devicegroup/update/{id}',['as'=>'devicegroup.update','uses'=>'DeviceGroupController@update']);

				Route::post('device/update', ['as' =>'device.update', 'uses' => 'RegisterDeviceController@updateDevice']);

				Route::post('device/updatesettings/{id}', ['as'=>'device.updatesettings', 'uses'=>'DeviceController@updateSetting']);

			

			Route::get('device/settings/{id}',['as'=>'device.settings', 'uses'=>'DeviceController@settingsIndex']);

			Route::post('device/applytemplate',['as'=>'device.applytemplate', 'uses'=>'DeviceController@applyTemplate']);


				Route::get('user/create', ['as' => 'createuser', 'uses' => 'UserController@create']);

				Route::post('user/store', ['as' => 'storeuser', 'uses' => 'UserController@storeUsers']);

				Route::get('/profile/edit/{id}', ['as' => 'edituser', 'uses' => 'ProfileController@edit']);

				Route::post('/profile/update/{id}', ['as' => 'updateuser', 'uses' =>'ProfileController@update']);

				Route::post('/profile/password/update/{id}', ['as' => 'password.update', 'uses' =>'ProfileController@updatePassword']);

				Route::post('/contact/update/{id}', ['as' => 'clientInfo.update', 'uses' =>'ProfileController@updateClientProfile']);

				//Route::get('confirmation/{token}',['as'=>'confirmation', 'uses' =>'App\Client\Auth\RegisterController@confirmation']);


				Route::post('save-canvas', ['as' =>'saveCanvas', 'uses' => 'LayoutsController@create']);

			Route::post('layout/edit/{id}', ['as'=>'editlayout', 'uses'=>'LayoutsController@edit']);

			Route::post('layout/upload', ['as'=>'uploadlayout', 'uses'=>'LayoutsController@upload']);


			Route::get('layout/welcome', ['as'=>'showlayout','uses'=>'LayoutsController@show']);

			Route::get('layout/view/{id}', ['as'=>'showlayout', 'uses'=>'LayoutsController@read']);

			Route::get('layout/home',  ['as'=>'layoutindex','uses'=>'LayoutsController@showResources']);

			Route::get('layout/webcontent', ['as'=>'webcontent', 'uses'=>'LayoutsController@webcontent']);

			Route::get('layout/screenshot', ['as'=>'screenshot', 'uses'=>'LayoutsController@screenshot']);

			Route::get('layout/destroy/{id}',  ['as'=>'destroylayout', 'uses'=>'LayoutsController@destroy']); //layout




			Route::post('create-canvas', 'LayoutTemplateController@save');

			Route::get('/layouttemplates', 'LayoutTemplateController@index');

			Route::get('layouttemplates/edit/{id}', 'LayoutTemplateController@edit');

			Route::get('layouttemplates/create', 'LayoutTemplateController@create');

			Route::get('/preview', ['middleware'=>'cors', 'uses'=>'LayoutsController@preview']);



			Route::get('/resource', 'ResourceController@index');

			Route::post('resource/upload', 'ResourceController@upload');

			Route::get('resource/delete/{id}', 'ResourceController@delete');


			Route::get('content', 'ContentsController@index');

			Route::post('insert', 'App\ContentsController@add');



			Route::get('schedule/create',['as'=>'schedule.create', 'uses'=>'ScheduleController@createSchedule']);

			Route::get('schedules/devices',['as'=>'device.schedules', 'uses'=>'ScheduleController@deviceSchedules']);

			Route::get('/schedules/created',['as'=>'schedules.created', 'uses'=>'ScheduleController@createdSchedules']);

			Route::post('/schedule/save',['as'=>'schedule.save', 'uses'=>'ScheduleController@save']);


						// Ajax
			Route::post('/search-layouts', [
				'uses' => 'LayoutsController@ajaxSearch',
				'as' => 'layouts.search'

			]);


			Route::post('/search-devices', [
				'uses' => 'ScheduleController@ajaxDeviceSearch',
				'as' => 'devices.search',

			]);


			});


});




//Route::get('/register', ['as' => 'register', 'uses' => 'App\MediaPartner\Auth\RegisterController@showRegForm']);
Route::get('mediapartner/payment/callback', ['as' => 'payment.callback', 'uses'=>'App\MediaPartner\payment\PaymentController@getCallback']);

Route::post('mediapartner/payment/callback', ['as' => 'payment.callback', 'uses'=>'App\MediaPartner\payment\PaymentController@getCallback']);

Route::get('mediapartner/register', ['as' => 'mediapartner.register', 'uses' => 'App\MediaPartner\Auth\RegisterController@showRegForm']);

Route::post('mediapartner/register', ['as' => 'mediapartner.register.store', 'uses' => 'App\MediaPartner\Auth\RegisterController@register']);

Route::get('confirmation/{token}',['as'=>'confirmation', 'uses' =>'App\MediaPartner\Auth\RegisterController@confirmation']);

Route::get('mediapartner-user/confirmation/{token}',['as'=>'mediapartner.user.confirmation', 'uses' =>'App\MediaPartner\UserController@confirmation']);

Route::get('mediapartnerUnAuth/login', ['as' => 'mediapartner.login', 'uses' => 'App\MediaPartner\Auth\LoginControllerUnAuth@showLoginForm']);

Route::post('mediapartnerUnAuth/login', ['as' => 'mediapartner.login.submit', 'uses' => 'App\MediaPartner\Auth\LoginControllerUnAuth@login']);

Route::group(['namespace' => 'App\MediaPartner', 'middleware' => ['tenant'], 'as' => 'mediapartner.'], function($domain)
{

	Route::post('mediapartner/login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);

	Route::post('mediapartner/{domain}/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

		
	Route::group(['prefix' => 'mediapartner/{domain}', 'middleware' => ['tenant'], 'as' => 'media.' ], function($domain) 
	{

			Route::get('/', ['as' => 'index', 'uses' => 'WelcomeController@index']);

			Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegForm']);
			
			Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);

			Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

		    Route::get('operators', ['as'=>'operators','uses' =>'UserController@index']);

			Route::get('operator/create', ['as' =>'createOperator','uses'=>'UserController@create']);



			Route::get('wallet/index', ['as' => 'wallet', 'uses' =>'WalletController@index']);

			Route::get('wallet/pay', ['as' => 'wallet', 'uses' =>'payment\PaymentController@index2']);

			Route::post('/wallet/assignpoint/{id}', ['as' => 'wallet.assignpoint', 'uses' => 'WalletController@assignPoint']);

			Route::post('/wallet/convertbonus/{id}', ['as' => 'wallet.convertbonus','uses' => 'WalletController@convertBonusToPoint']);

			Route::get('payment/index', ['as' => 'payment.index', 'uses'=>'payment\PaymentController@index']);

			Route::post('payment/confirmation', ['as' => 'payment.confirmation', 'uses'=>'payment\PaymentController@paymentConfirmation']);

			



			Route::get('payments/interswitch/response', ['as'=>'response', 'uses'=>'payment\PaymentController@interswitchPaymentResponse']);
			Route::post('payments/interswitch/response', ['as'=>'response', 'uses'=>'payment\PaymentController@interswitchPaymentResponse']);

			Route::post('walletsetting', ['as' => 'wallet.setting', 'uses' => 'WalletController@walletSetting']);

			Route::post('/operator/store',['as' =>'operator.store', 'uses'=>'UserController@storeOperator']);

			Route::get('/operator/edit/{id}',['as'=>'operator.edit','uses'=>'UserController@edit']);

			Route::post('/operator/update/{id}', ['as' => 'operator.update', 'uses' =>'UserController@update']);

			//Route::get('/operator/update/{id}',['as'=>'operator.edit','uses'=>'UserController@edit']);

			Route::get('/profile/edit/{id}', ['as' => 'operator.edit', 'uses' => 'ProfileController@edit']);

			Route::post('/profile/update/{id}', ['as' => 'operator.update', 'uses' =>'ProfileController@update']);

			Route::post('/profile/password/update/{id}', ['as' => 'operatorpassword.update', 'uses' =>'ProfileController@updatePassword']);

			Route::post('/contact/update/{id}', ['as' => 'tenantinfo.update', 'uses' =>'ProfileController@updateTenantProfile']);

			Route::get('configurecontent', [ 'as'=>'configurecontent','uses'=>'contentconfig\ContentConfigController@configureindex']);

			Route::get('registerdevice', ['as' =>'registerdevice','uses'=>'RegisterDeviceController@register']);

			



			Route::get('devices', ['as'=>'devices', 'uses'=>'DeviceController@index']);

			Route::get('devicegroups', ['as'=>'devicegroups', 'uses'=>'DeviceGroupController@index']);

			Route::get('devicegroup/create', ['as'=>'createdevicegroup', 'uses'=>'DeviceGroupController@create']);
			Route::post('devicegroup/save',['as'=>'devicegroup.save', 'uses' => 'DeviceGroupController@store']);

			Route::post('device/update', ['as' =>'device.update', 'uses' => 'RegisterDeviceController@updateDevice']);


			Route::get('devicegroup/edit/{id}', ['as'=>'devicegroup.edit', 'uses'=>'DeviceGroupController@edit']);

			Route::post('devicegroup/update/{id}',['as'=>'devicegroup.update','uses'=>'DeviceGroupController@update']);


			Route::post('device/updatesettings/{id}', ['as'=>'device.updatesettings', 'uses'=>'DeviceController@updateSetting']);

			

			Route::get('device/settings/{id}',['as'=>'device.settings', 'uses'=>'DeviceController@settingsIndex']);

			Route::post('device/applytemplate',['as'=>'device.applytemplate', 'uses'=>'DeviceController@applyTemplate']);

			//resources
			/*Route::get('resources',['as'=>'resources', 'uses'=>'ResourceController@index']);
			Route::get('resource/create',['as'=>'create_resource', 'uses'=>'ResourceController@index']);
			Route::post('resource/upload',['as'=>'upload_resource', 'uses'=>'ResourceController@upload']);
			Route::get('resource/delete/{id}',['as'=>'delete_resource', 'uses'=>'ResourceController@delete']);



			Route::get('layouts',['as'=>'layouts', 'uses'=>'LayoutController@index']);
			Route::get('layout/edit/{id}', ['as'=>'layout.edit', 'uses'=>'LayoutController@edit']);
			Route::post('layout/update/{id}', ['as'=>'layout.update', 'uses'=>'LayoutController@update']);
			



			Route::get('schedule/create',['as'=>'schedule.create', 'uses'=>'ScheduleController@createSchedule']);
			Route::get('schedules/devices',['as'=>'device.schedules', 'uses'=>'ScheduleController@deviceSchedules']);
			Route::get('/schedules/created',['as'=>'schedules.created', 'uses'=>'ScheduleController@createdSchedules']);

			Route::post('/schedule/save',['as'=>'schedule.save', 'uses'=>'ScheduleController@save']);
*/

			//Route::get('/', 'WelcomeController@index')->name('user-tenant.login');

			//Route::get('/login', 'App\MediaPartner\Auth\RegisterController@showLoginForm')->name('tenantuser.login'); 

			//Route::get('/{name}/register', 'App\MediaPartner\Auth\LoginController@showRegForm')->name('tenantuser.register');

			//Route::get('/dashboard', 'App\Operator\DashboardController@index')->name('operator.dashboard');

			/*Route::get('/register',function ($name) 
			{
		 		$tenant = Tenant::where('domain',$name) -> first();
		    	return view('auth.registeruser-via-tenant',compact('tenant'));
			});*/
			//layout
			Route::post('save-canvas', ['as' =>'saveCanvas', 'uses' => 'LayoutsController@create']);

			Route::post('layout/edit/{id}', ['as'=>'editlayout', 'uses'=>'LayoutsController@edit']);

			Route::post('layout/upload', ['as'=>'uploadlayout', 'uses'=>'LayoutsController@upload']);


			Route::get('layout/welcome', ['as'=>'showlayout','uses'=>'LayoutsController@show']);

			Route::get('layout/view/{id}', ['as'=>'showlayout', 'uses'=>'LayoutsController@read']);

			Route::get('layout/home',  ['as'=>'layoutindex','uses'=>'LayoutsController@showResources']);

			Route::get('layout/webcontent', ['as'=>'webcontent', 'uses'=>'LayoutsController@webcontent']);

			Route::get('layout/screenshot', ['as'=>'screenshot', 'uses'=>'LayoutsController@screenshot']);

			Route::get('layout/destroy/{id}',  ['as'=>'destroylayout', 'uses'=>'LayoutsController@destroy']); //layout



			Route::post('create-canvas', 'LayoutTemplateController@save');

			Route::get('/layouttemplates', 'LayoutTemplateController@index');

			Route::get('layouttemplates/edit/{id}', 'LayoutTemplateController@edit');

			Route::get('layouttemplates/create', 'LayoutTemplateController@create');

			Route::get('/preview', ['middleware'=>'cors', 'uses'=>'LayoutsController@preview']);



			Route::get('/resource', 'ResourceController@index');

			Route::post('resource/upload', 'ResourceController@upload');

			Route::get('resource/delete/{id}', 'ResourceController@delete');

			Route::get('content', 'ContentsController@index');

			Route::post('insert', 'App\ContentsController@add');


			Route::get('schedule/create',['as'=>'schedule.create', 'uses'=>'ScheduleController@createSchedule']);

			Route::get('schedules/devices',['as'=>'device.schedules', 'uses'=>'ScheduleController@deviceSchedules']);

			Route::get('/schedules/created',['as'=>'schedules.created', 'uses'=>'ScheduleController@createdSchedules']);

			Route::post('/schedule/save',['as'=>'schedule.save', 'uses'=>'ScheduleController@save']);


						// Ajax
			Route::post('/search-layouts', [
				'uses' => 'LayoutsController@ajaxSearch',
				'as' => 'layouts.search'

			]);


			Route::post('/search-devices', [
				'uses' => 'ScheduleController@ajaxDeviceSearch',
				'as' => 'devices.search',

			]);




	});
}); 
 
 /*Route::get('/operator/device/index', 'DeviceController@index')->name('operatoradmin.device.index');

		Route::get('/{name}', 'App\Operator\WelcomeController@index')->name('user-tenant.login');

Route::get('/{name}/login', 'App\Operator\Auth\RegisterController@showLoginForm')->name('tenantuser.login'); 

Route::get('/{name}/register', 'App\Operator\Auth\LoginController@showRegForm')->name('tenantuser.register');*/

/*Route::get('/{name}/operator/dashboard', 'App\Operator\DashboardController@index')->name('operator.dashboard');*/

/*Route::get('/{name}/operator/register',function ($name) {
 $tenant = Tenant::where('domain',$name) -> first();
    	return view('auth.registeruser-via-tenant',compact('tenant'));
});*/

/*Route::get('/{name}/operator/login', 'App\Operator\Auth\OperatorLoginController@showLoginForm')->name('operator.login');*/