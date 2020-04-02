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

Route::get('/', 'Frontend\FrontendController@index')->name('front');
Route::get('/about-us', 'Frontend\FrontendController@about_us')->name('aboutus');
Route::get('/plans', 'Frontend\FrontendController@plans')->name('plans');
Route::get('/faq', 'Frontend\FrontendController@faq')->name('faq');
Route::get('/contact', 'Frontend\FrontendController@contact')->name('contact');
Route::post('/contact-save', 'Frontend\FrontendController@contact_save')->name('user.send.contact');
Route::get('/privacy-policy', 'Frontend\FrontendController@privacy_policy')->name('privacy');

//reset pass
Route::get('/reset-password', 'Frontend\FrontendController@reset_pass')->name('reset.pass');
Route::post('/reset-password-send', 'Frontend\FrontendController@reset_pass_send')->name('reset.passsend.email');
Route::get('/enter-code', 'Frontend\FrontendController@reset_pass_enter_code')->name('enter.code');
Route::post('/enter-code-ver', 'Frontend\FrontendController@reset_pass_enter_code_ver')->name('reset.passsend.code.ver');
Route::post('/reset-pass-save', 'Frontend\FrontendController@reset_pass_save')->name('reset.passsend.save');


Auth::routes();


Route::post('/ipncoinpaybtc', 'User\UserDepositController@ipnCoinPayBtc')->name('ipn.coinPay.btc');



Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');



Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

        //profile
        Route::get('/profile', 'Admin\AdminController@profile')->name('admin.profile');
        Route::post('/profile-save', 'Admin\AdminController@profile_save')->name('admin.profile.save');

        //chnage password
        Route::get('/change-password', 'Admin\AdminController@chnag_password')->name('admin.change.pass');
        Route::post('/change-password-save', 'Admin\AdminController@change_pass_save')->name('admin.pass.save');

        //payment gateway
        Route::get('/payment-gateway', 'Admin\AdminController@payment_gateway')->name('admin.payment.gateway');
        Route::post('/payment-gateway-save', 'Admin\AdminController@payment_gateway_save')->name('admin.gateway.save');

        //plan
        Route::get('/plan', 'Admin\AdminPlanController@plan')->name('admin.plan');
        Route::post('/plan-save', 'Admin\AdminPlanController@plan_save')->name('plan.save');
        Route::post('/plan-update', 'Admin\AdminPlanController@plan_update')->name('plan.update');
        Route::post('/plan-delete', 'Admin\AdminPlanController@plan_delete')->name('plan.delete');

        //deposit history
        Route::get('/deposit-history', 'Admin\AdminPlanController@deposit_histiory')->name('admin.deposit.hostory');
        Route::get('/deposit-history-get', 'Admin\AdminPlanController@deposit_histiory_get')->name('get.deposit.hist');

        //users
        Route::get('/user', 'Admin\AdminUserController@users')->name('admin.users');
        Route::get('/user-get', 'Admin\AdminUserController@users_get')->name('get.users');
        Route::get('/edit-user/{id}', 'Admin\AdminUserController@edit_user')->name('edit.user');
        Route::post('/update-user', 'Admin\AdminUserController@edit_user_save')->name('admin.user.save');
        Route::post('/delete-user', 'Admin\AdminUserController@delete_user')->name('admin.user.delete');

        //percentage withdraw
        Route::get('/percentage-withdraw', 'Admin\AdminWithdrawController@percentage_withdraw')->name('admin.percentage.withdraw');
        Route::get('/percentage-withdraw-get', 'Admin\AdminWithdrawController@percentage_withdraw_get')->name('get.users.percenatge.withdraw');
        Route::post('/percentage-withdraw-single', 'Admin\AdminWithdrawController@percentage_withdraw_single')->name('get.single.perwith');
        Route::post('/percentage-withdraw-save', 'Admin\AdminWithdrawController@percentage_withdraw_save')->name('admin.user.per.with.save');
        Route::get('/percentage-withdraw-complete', 'Admin\AdminWithdrawController@percentage_withdraw_complete')->name('admin.percentage.withdraw.complete');
        Route::get('/percentage-withdraw-complete-get', 'Admin\AdminWithdrawController@percentage_withdraw_complete_get')->name('get.users.percenatge.withdraw.complete');
        Route::get('/percentage-withdraw-rejected', 'Admin\AdminWithdrawController@percentage_withdraw_rejected')->name('admin.percentage.withdraw.rejected');
        Route::get('/percentage-withdraw-rejected-get', 'Admin\AdminWithdrawController@percentage_withdraw_rejected_get')->name('get.users.percenatge.withdraw.rejected');

        //capital withdraw
        Route::get('/capital-withdraw', 'Admin\AdminWithdrawController@capital_withdraw')->name('admin.capital.withdraw');
        Route::get('/capital-withdraw-get', 'Admin\AdminWithdrawController@capital_withdraw_get')->name('get.users.capital.withdraw');
        Route::post('/capital-withdraw-single', 'Admin\AdminWithdrawController@capital_withdraw_single')->name('get.single.capwith');
        Route::post('/capital-withdraw-save', 'Admin\AdminWithdrawController@capital_withdraw_save')->name('admin.user.cap.with.save');
        Route::get('/capital-withdraw-complete', 'Admin\AdminWithdrawController@capital_withdraw_complete')->name('admin.capital.withdraw.complete');
        Route::get('/capital-withdraw-complete-get', 'Admin\AdminWithdrawController@capital_withdraw_complete_get')->name('get.users.capital.withdraw.com');
        Route::get('/capital-withdraw-rejected', 'Admin\AdminWithdrawController@capital_withdraw_rejected')->name('admin.capital.withdraw.rejected');
        Route::get('/capital-withdraw-rejected-get', 'Admin\AdminWithdrawController@capital_withdraw_rejected_get')->name('get.users.capital.withdraw.rej');

        //general settings
        Route::get('/general-settings', 'Admin\AdminController@general_settings')->name('admin.general.setting');
        Route::post('/general-settings-save', 'Admin\AdminController@general_settings_save')->name('admin.general.save');



       //frontend manage
        Route::get('/frontend-home', 'Admin\AdminFrontendController@home')->name('admin.front.home');
        Route::post('/frontend-home-save', 'Admin\AdminFrontendController@home_save')->name('admin.home.save');
        Route::get('/frontend-how-it-works', 'Admin\AdminFrontendController@home_how_it_works')->name('admin.home.how.it.works');
        Route::post('/frontend-how-it-works-save', 'Admin\AdminFrontendController@home_how_it_works_save')->name('admin.howit.save');
        Route::post('/frontend-how-it-works-data-save', 'Admin\AdminFrontendController@home_how_it_works_data_save')->name('admin.how.it.data.save');
        Route::get('/frontend-our-features', 'Admin\AdminFrontendController@home_our_features')->name('admin.home.our.features');
        Route::post('/frontend-our-features-header-save', 'Admin\AdminFrontendController@home_our_features_header_save')->name('admin.ourfeature.header.save');
        Route::post('/frontend-our-features-header-data-save', 'Admin\AdminFrontendController@home_our_features_header_data_save')->name('admin.ourfeature.data.save');
        Route::get('/testimonials', 'Admin\AdminFrontendController@testiminials')->name('admin.testimonials');
        Route::post('/testimonials-save', 'Admin\AdminFrontendController@testiminials_save')->name('test.save');
        Route::post('/testimonials-update', 'Admin\AdminFrontendController@testiminials_update')->name('test.update');
        Route::post('/testimonials-delete', 'Admin\AdminFrontendController@testiminials_delete')->name('test.delete');
        Route::get('/contact-us', 'Admin\AdminFrontendController@contact_us_data')->name('admin.contact');
        Route::get('/contact-us-get', 'Admin\AdminFrontendController@contact_us_get')->name('get.users.contact');
        Route::post('/contact-us-single', 'Admin\AdminFrontendController@contact_us_single')->name('get.single.contact');
        Route::post('/contact-us-reply', 'Admin\AdminFrontendController@contact_us_reply')->name('admin.con.send.reply');
        Route::get('/about-us-page', 'Admin\AdminFrontendController@about_us_page')->name('admin.aboutus.page');
        Route::post('/about-us-page-save', 'Admin\AdminFrontendController@about_us_page_save')->name('admin.aboutuspage.save');
    });
});

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'home'], function (){
        Route::get('/', 'HomeController@index')->name('home');


        Route::get('/plans', 'User\UserPlanController@all_plan')->name('all.plan');
        Route::post('/choose-plans-save', 'User\UserPlanController@choose_plan_save')->name('user.choose.plan.save');
        Route::get('/my-plan', 'User\UserPlanController@my_plan')->name('my.plan');

        //deposit
        Route::get('/deposit', 'User\UserDepositController@user_Deposit')->name('user.Deposit');
        Route::post('/deposit-save', 'User\UserDepositController@user_Deposit_save')->name('user.deposit.save');
        Route::get('/send-btc', 'User\UserDepositController@send_btc')->name('btc.send');


        Route::get('/withdraw-percentage', 'User\UserWithdrawController@withdraw_percentage')->name('withdraw.percentage');
        Route::post('/withdraw-percentage-save', 'User\UserWithdrawController@withdraw_percentage_save')->name('percentage.with.save');

        //profile
        Route::get('/profile', 'User\UserController@profile')->name('user.profile');
        Route::post('/profile', 'User\UserController@profile_save')->name('user.profile.save');
        Route::get('/change-password', 'User\UserController@change_pass')->name('user.change.pass');
        Route::post('/change-password-save', 'User\UserController@change_pass_save')->name('user.pass.save');

        //my referral
        Route::get('/my-referral-user', 'User\UserController@my_referral_user')->name('my.referral');

        //withdraw capital
        Route::post('/withdraw-capital', 'User\UserWithdrawController@withdraw_capital')->name('user.withdraw.capital');
    });
});
