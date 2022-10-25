<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//user
Route::get('index','BOOKGARDENController@index');
Route::get('user/indexUser','BOOKGARDENController@indexUser');
Route::get('signUp','BOOKGARDENController@sign_up');
Route::get('admin/create-product','BOOKGARDENController@create_product');
Route::post('admin/post_create_product','BOOKGARDENController@post_create_product');
Route::get('login','BOOKGARDENController@login');
Route::get('logout','BOOKGARDENController@logout');
Route::post('checkLogin','BOOKGARDENController@checkLogin');
Route::get('productdetails/{id}','BOOKGARDENController@productdetails');
Route::get('user/productdetailsUser/{id}','BOOKGARDENController@productdetailsUser');
Route::post('comment/{id}','BOOKGARDENController@comment');
Route::get('user_delete_comment/{commentId}{productId}','BOOKGARDENController@user_delete_comment');
Route::post('afterSignup','BOOKGARDENController@afterSignup');
Route::get('user/information','BOOKGARDENController@infor');
Route::post('change/{id}','BOOKGARDENController@change');
Route::get('reset/{id}','BOOKGARDENController@reset');
Route::post('afterReset/{id}','BOOKGARDENController@afterReset');
Route::post('updateImage/{id}','BOOKGARDENcontroller@updateImage');

//search , ORDER , CART
Route::post('search','BOOKGARDENcontroller@search');
Route::get('searchCate/{id}','BOOKGARDENcontroller@searchCate');
Route::get('checkCate/{id}','BOOKGARDENcontroller@checkCate');
Route::post('user/searchUser','BOOKGARDENcontroller@searchUser');
Route::get('user/searchCates/{id}','BOOKGARDENcontroller@searchCates');
Route::get('user/checkCates/{id}','BOOKGARDENcontroller@checkCates');
Route::post('saveCart','BOOKGARDENController@saveCart');
Route::post('updateSaveCart','BOOKGARDENController@updateSaveCart');
Route::get('viewCart','BOOKGARDENController@viewCart');
Route::get('deleteCart/{id}','BOOKGARDENController@deleteCart');
Route::post('orders','BOOKGARDENController@orders');
Route::post('afterOrder','BOOKGARDENController@afterOrder');
Route::get('viewOrder','BOOKGARDENController@viewOrder');
Route::get('ViewOrderDetail/{id}','BOOKGARDENController@ViewOrderDetail');
Route::get('updateProcess/{id}','BOOKGARDENController@updateProcess');
Route::get('dropOrder/{id}','BOOKGARDENController@dropOrder');
//footer
Route::get('footer/chinhsach','BOOKGARDENcontroller@chinhsach');
Route::get('footer/dieukhoan','BOOKGARDENcontroller@dieukhoan');
Route::get('footer/gioithieu','BOOKGARDENcontroller@gioithieu');
Route::get('footer/feedback','BOOKGARDENController@feedback');
Route::get('user/viewFeedback','BOOKGARDENController@viewFeedback');
Route::post('afterFeedback/{id}','BOOKGARDENController@afterFeedback');
// admin

Route::get('admin/admin-index','BOOKGARDENController@admin_index');
Route::get('admin/admin-category','BOOKGARDENController@admin_category');
Route::get('admin/create-product','BOOKGARDENController@create_product');
Route::post('admin/post_create_product','BOOKGARDENController@post_create_product');
Route::get('admin/update-product/{productId}','BOOKGARDENController@update_product');
Route::post('admin/post_update_product/{productId}','BOOKGARDENController@post_update_product');
Route::get('admin/create-category','BOOKGARDENController@create_category');
Route::post('admin/post_create_category','BOOKGARDENController@post_create_category');
Route::get('admin/update-category/{cateId}','BOOKGARDENController@update_category');
Route::post('admin/post_update_category/{cateId}','BOOKGARDENController@post_update_category');
Route::get('logoutAdmin','BOOKGARDENController@logoutAdmin');
Route::get('admin/admin-information','BOOKGARDENController@admin_information');
Route::get('admin/admin-information-details/{id}','BOOKGARDENController@admin_information_details');
Route::get('admin/product_lock/{productId}','BOOKGARDENController@product_lock');
Route::get('admin/product_unlock/{productId}','BOOKGARDENController@product_unlock');
Route::get('admin/category_lock/{cateId}','BOOKGARDENController@category_lock');
Route::get('admin/category_unlock/{cateId}','BOOKGARDENController@category_unlock');
Route::get('admin/admin-feedback','BOOKGARDENController@admin_feedback');
Route::get('admin/admin-reply-feedback/{feedbackId}','BOOKGARDENController@reply_feedback');
Route::post('admin/post_reply_feedback/{feedbackId}','BOOKGARDENController@post_reply_feedback');
Route::get('admin/admin-comment','BOOKGARDENController@admin_comment');
Route::Get('admin/admin-sales-information','BOOKGARDENController@admin_sales_information');
Route::get('admin/create-sales','BOOKGARDENController@create_sales');
Route::get('admin/admin_delete_sales/{adminId}','BOOKGARDENController@admin_delete_sales');
Route::post('admin/post_create_sales','BOOKGARDENController@post_create_sales');
Route::get('admin/admin-order','BOOKGARDENController@admin_order');
Route::get('admin/admin-update-process/{orderId}','BOOKGARDENController@admin_update_process');
Route::post('admin/admin_post_update_process/{orderId}','BOOKGARDENController@admin_post_update_process');
Route::get('admin/order_cancel/{orderId}','BOOKGARDENController@order_cancel');
Route::get('admin/admin_delete_comment/{commentId}','BOOKGARDENController@admin_delete_comment');
Route::get('admin-order-details/{orderId}','BOOKGARDENController@admin_order_details');
//sale assistant

Route::get('sale-assistant/sale-assistant-Info','BOOKGARDENController@sale_assistant_Info');
Route::post('sale-assistant/sale_assistant_change_Info','BOOKGARDENController@sale_assistant_change_Info');
Route::get('sale-assistant/sale-assistant-index','BOOKGARDENController@sale_assistant_index');
Route::get('sale-assistant/sale-assistant-category','BOOKGARDENController@sale_assistant_category');
Route::get('sale-assistant/sale-assistant-information','BOOKGARDENController@sale_assistant_information');
Route::get('sale-assistant/sale-assistant-information-details/{id}','BOOKGARDENController@sale_assistant_information_details');
Route::get('sale-assistant/sale-assistant-feedback','BOOKGARDENController@sale_assistant_feedback');
Route::get('sale-assistant/sale-assistant-reply-feedback/{feedbackId}','BOOKGARDENController@sale_assistant_reply_feedback');
Route::post('sale-assistant/sale_assistant_post_reply_feedback/{feedbackId}','BOOKGARDENController@sale_assistant_post_reply_feedback');
Route::get('sale-assistant/sale-assistant-comment','BOOKGARDENController@sale_assistant_comment');
Route::get('sale-assistant/sale-assistant-order','BOOKGARDENController@sale_assistant_order');
Route::get('sale-assistant/order_cancel1/{orderId}','BOOKGARDENController@order_cancel1');
Route::get('sale-assistant/sale_assistant_delete_comment/{commentId}','BOOKGARDENController@sale_assistant_delete_comment');
Route::get('sale-assistant-order-details/{orderId}','BOOKGARDENController@sale_assistant_order_details');
Route::get('sale-assistant/sale-assistant-update-process/{orderId}','BOOKGARDENController@sale_assistant_update_process');
Route::post('sale-assistant/sale_assistant_post_update_process/{orderId}','BOOKGARDENController@sale_assistant_post_update_process');
//checklogin





Route::prefix('admin')->name('admin')->middleware('checkLogin')->group(function(){
Route::get('admin-index','BOOKGARDENController@admin_index');
});
Route::prefix('user')->name('user')->middleware('checkLogin')->group(function() {

    Route::get('indexUser','BOOKGARDENController@indexUser');
});


