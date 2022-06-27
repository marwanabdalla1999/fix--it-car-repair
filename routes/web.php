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



//=================frontend================

Route::any('users-activates/{token?}', 'Auth\RegisterController@userActivates')->name('users-activates');
Route::any('register', 'Auth\RegisterController@register')->name('register');



Route::group(['namespace' => 'frontend'], function () {
    Route::any('login', 'UserLoginController@showLoginForm')->name('login');




    //----------------------homepage-------------------------------
    Route::any('/', 'ApplicationController@index')->name('index');
    Route::any('about-us', 'AboutUsController@aboutUs')->name('about-us');
    Route::any('contact', 'ContactController@contact')->name('contact');
    Route::any('contact-post', 'ContactController@contactPost')->name('contact-post');
    Route::any('banner-details/{criteria?}', 'ApplicationController@bannerDetails')->name('banner-details');

    Route::any('subscribe-post', 'ApplicationController@subscribepost')->name('subscribe-post');
    Route::any('search-medicine/{criteria?}', 'AjaxController@index')->name('search-medicine');
    Route::any('index/category/{criteria?}', 'AllProductController@getByCriteria')->name('index-category');
    Route::any('notice/{criteria?}', 'ApplicationController@notice')->name('notice');
    Route::any('news', 'ApplicationController@news')->name('news');
    Route::any('news-details/{criteria?}', 'ApplicationController@newsDetails')->name('news-details');


    Route::group(['prefix' => 'Prescription', 'middleware' => 'auth:web'], function () {
        Route::any('prescription-upload', 'PrescriptionUploadController@showPescription')->name('prescription-upload');
        Route::any('prescription-post', 'PrescriptionUploadController@prescriptionUpload')->name('prescription-post');
    });


    Route::group(['prefix' => 'product-details'], function () {
        Route::any('product-details/{criteria?}', 'ProductDetailController@index')->name('product-details');
        Route::any('search-medicine-details/{criteria?}', 'ProductDetailController@searchDetails')->name('search-medicine-details');

    });


    Route::group(['prefix' => 'cart', 'middleware' => 'auth:web'], function () {
        Route::any('cart', 'CartController@showCart')->name('cart');
        Route::any('add-cart', 'CartController@addCart')->name('add-cart');
        Route::any('delete-orders/{criteria?}', 'CartController@removeProduct')->name('delete-orders');
    });

    Route::group(['prefix' => 'wish-list'], function () {
        Route::any('wish-list', 'WishListController@showWishlist')->name('wish-list');

    });

    Route::group(['prefix' => 'live-chat'], function () {
        Route::any('live-chat', 'LiveChatController@chatShow')->name('live-chat');
        Route::any('fetch-all-message', 'LiveChatController@fetchAllMessage')->name('fetch-all-message');
        Route::any('send-message', 'LiveChatController@messageSend')->name('send-message');
        Route::any('chat-retrieve', 'LiveChatController@retrieveChatMessages')->name('chat-retrieve');


    });

    Route::group(['prefix' => 'check-out'], function () {
        Route::any('check-out', 'CheckOutController@showCheckout')->name('check-out');
        //============test strip=============


    });


    Route::group(['prefix' => 'all-product'], function () {
        Route::any('all-product', 'AllProductController@showAllprouduct')->name('all-product');
        Route::any('all-product/category/{criteria?}', 'AllProductController@getByCriteria')->name('all-product-category');

    });


    Route::group(['prefix' => 'users', 'middleware' => 'auth:web'], function () {
        Route::any('profile', 'ApplicationController@userProfile')->name('profile');
        Route::any('user-change', 'ApplicationController@index')->name('user-change');

    });


    //==============user info manage =============
    Route::any('user-setting', 'UserLoginController@userSetting')->name('user-setting');
    Route::any('user-password-change', 'UserLoginController@userPasswordChange')->name('user-password-change');
    Route::any('logout', 'UserLoginController@logout')->name('logout');


});

/* Hospital Route */
Route::group(['namespace' => 'dashboard'], function () {
    Route::any('hospital-login', 'HospitalLoginController@showLoginForm')->name('hospital-login');
});
Route::group(['namespace' => 'dashboard', 'prefix' => 'hospitals', 'middleware' => 'auth:hospital'], function () {
    Route::any('/', 'HospitalHomeController@index')->name('doctor-dashboard');

    Route::any('hospital-logout', 'HospitalLoginController@logout')->name('doctor-logout');


    // Route::group(['prefix' => 'doctors'], function () {
    //     Route::any('/', 'PrescriptionController@showPrescription')->name('show-prescription');
    //     Route::any('prescription-delete/{id?}', 'PrescriptionController@prescriptionDelete')->name('prescription-delete');
    // });

    // Route::group(['prefix' => 'doctor-chat'], function () {
    //     Route::any('doctor-live-chat', 'LiveChatController@chatShow')->name('doctor-live-chat');
    //     Route::any('doctor-fetch-all-message', 'LiveChatController@fetchAllMessage')->name('doctor-fetch-all-message');
    //     Route::any('doctor-send-message', 'LiveChatController@messageSend')->name('doctor-send-message');
    //     Route::any('doctor-chat-retrieve', 'LiveChatController@retrieveChatMessages')->name('doctor-chat-retrieve');


    // });

    // Route::any('setting-doctor', 'DoctorLoginController@setting')->name('setting-doctor');

});

/*

 * =============================================================
 * ===================DOCTOR ROUTE===============================
 */

Route::group(['namespace' => 'dashboard'], function () {
    Route::any('doctor-login', 'DoctorLoginController@showLoginForm')->name('doctor-login');

});
Route::group(['namespace' => 'dashboard', 'prefix' => 'doctors', 'middleware' => 'auth:doctor'], function () {
    Route::any('/', 'DoctorHomeController@index')->name('doctor-dashboard');

    Route::any('doctor-logout', 'DoctorLoginController@logout')->name('doctor-logout');


    Route::group(['prefix' => 'doctors'], function () {
        Route::any('/', 'PrescriptionController@showPrescription')->name('show-prescription');
        Route::any('prescription-delete/{id?}', 'PrescriptionController@prescriptionDelete')->name('prescription-delete');
    });

    Route::group(['prefix' => 'doctor-chat'], function () {
        Route::any('doctor-live-chat', 'LiveChatController@chatShow')->name('doctor-live-chat');
        Route::any('doctor-fetch-all-message', 'LiveChatController@fetchAllMessage')->name('doctor-fetch-all-message');
        Route::any('doctor-send-message', 'LiveChatController@messageSend')->name('doctor-send-message');
        Route::any('doctor-chat-retrieve', 'LiveChatController@retrieveChatMessages')->name('doctor-chat-retrieve');


    });

    Route::any('setting-doctor', 'DoctorLoginController@setting')->name('setting-doctor');

});


/*
 * =============================================================
 * ===================DOCTOR ROUTE END===============================
 */


//==============route for admin========


Route::group(['namespace' => 'backend'], function () {
    Route::any('admin-login', 'AdminLoginController@showLoginForm')->name('admin-login');
    Route::any('admin-logout', 'AdminLoginController@logout')->name('admin-logout');

});


Route::group(['namespace' => 'backend', 'prefix' => '@admin', 'middleware' => 'auth:admin'], function () {

    Route::any('/', 'AdminController@index')->name('@admin');

    Route::group(['prefix' => 'admin'], function () {
        Route::any('/', 'AdminController@showAdmin')->name('show-admin');
        Route::any('add-admin', 'AdminController@addAdmin')->name('add-admin');
        Route::any('admin-delete/{id?}', 'AdminController@adminDelete')->name('admin-delete');
        Route::any('admin-edit/{id?}', 'AdminController@adminEdit')->name('admin-edit');
        Route::any('admin-edit-action', 'AdminController@adminEditAction')->name('admin-edit-action');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::any('/', 'CategoryController@showCategory')->name('show-category');
        Route::any('add-category', 'CategoryController@addcategory')->name('add-category');
        Route::any('category-delete/{id?}', 'CategoryController@categoryDelete')->name('category-delete');
        Route::any('category-edit/{id?}', 'CategoryController@categoryEdit')->name('category-edit');
        Route::any('category-edit-action', 'CategoryController@categoryEditAction')->name('category-edit-action');

    });

    Route::group(['prefix' => 'admin-doctor'], function () {

        Route::any('/', 'DoctorController@showDoctor')->name('show-doctor');
        Route::any('add-doctor', 'DoctorController@adddoctor')->name('add-doctor');
        Route::any('doctor-delete/{id?}', 'DoctorController@doctorDelete')->name('doctor-delete');
        Route::any('doctor-edit/{id?}', 'DoctorController@doctorEdit')->name('doctor-edit');
        Route::any('doctor-edit-action', 'DoctorController@doctorEditAction')->name('doctor-edit-action');

    });
    Route::group(['prefix' => 'admin-hospital'], function () {

        Route::any('/', 'HospitalController@showHospital')->name('show-hospital');
        Route::any('add-hospital', 'HospitalController@addHospital')->name('add-hospital');
        // Route::any('doctor-delete/{id?}', 'HospitalController@doctorDelete')->name('doctor-delete');
        // Route::any('doctor-edit/{id?}', 'HospitalController@doctorEdit')->name('doctor-edit');
        // Route::any('doctor-edit-action', 'HospitalController@doctorEditAction')->name('doctor-edit-action');

    });

    Route::group(['prefix' => 'product'], function () {
        Route::any('/', 'ProductController@showProduct')->name('show-product');
        Route::any('add-product', 'ProductController@addProduct')->name('add-product');
        Route::any('product-delete/{id?}', 'ProductController@productDelete')->name('product-delete');
        Route::any('product-edit/{id?}', 'ProductController@productEdit')->name('product-edit');
        Route::any('product-edit-action', 'ProductController@productEditAction')->name('product-edit-action');

    });

    Route::group(['prefix' => 'contact'], function () {
        Route::any('/', 'ShowContactController@showContact')->name('show-contact');
        Route::any('contact-delete/{id?}', 'ShowContactController@contactDelete')->name('contact-delete');
    });

    Route::group(['prefix' => 'admin-user'], function () {
        Route::any('/', 'ShowUserController@showUser')->name('show-user');
        Route::any('user-delete/{id?}', 'ShowUserController@userDelete')->name('user-delete');
    });

    Route::group(['prefix' => 'banner'], function () {
        Route::any('/', 'BannerController@showBanner')->name('show-banner');
        Route::any('add-banner', 'BannerController@addBanner')->name('add-banner');
        Route::any('banner-delete/{id?}', 'BannerController@bannerDelete')->name('banner-delete');
    });

    Route::group(['prefix' => 'brand'], function () {
        Route::any('/', 'BrandController@showBrand')->name('show-brand');
        Route::any('add-brand', 'BrandController@addBrand')->name('add-brand');
        Route::any('brand-delete/{id?}', 'BrandController@brandDelete')->name('brand-delete');
    });

    Route::group(['prefix' => 'subscribe'], function () {
        Route::any('/', 'SubscribeController@showSubscribe')->name('show-subscribe');
        Route::any('subscribe-delete/{id?}', 'SubscribeController@subscribeDelete')->name('subscribe-delete');
    });

    //===================add new

    Route::group(['prefix' => 'admin-news'], function () {
        Route::any('show-news-category', 'NewCategoryController@index')->name('show-news-category');
        Route::any('delete-news-category/{criteria?}', 'NewCategoryController@delete')->name('delete-news-category');
        Route::any('edit-news-category/{criteria?}', 'NewCategoryController@edit')->name('edit-news-category');
        Route::any('edit-news-category-action', 'NewCategoryController@editAction')->name('edit-news-category-action');
        Route::any('update-news-category-status', 'NewCategoryController@updateStatus')->name('update-news-category-status');
        Route::any('/', 'NewsController@index')->name('admin-news');
        Route::any('add-news', 'NewsController@addNews')->name('add-news');
        Route::any('delete-news/{criteria?}', 'NewsController@deleteNews')->name('delete-news');
        Route::any('edit-news/{criteria?}', 'NewsController@editNews')->name('edit-news');
        Route::any('edit-news-action', 'NewsController@editNewsAction')->name('edit-news-action');
        Route::any('update-news-status', 'NewsController@updateNewsStatus')->name('update-news-status');


    });

    Route::group(['prefix' => 'admin-notice'], function () {
        Route::any('/', 'NoticeController@index')->name('show-notice');
        Route::any('add-notice', 'NoticeController@addNotice')->name('add-notice');
        Route::any('delete-notice/{criteria?}', 'NoticeController@deleteNotice')->name('delete-notice');
        Route::any('edit-notice/{criteria?}', 'NoticeController@editNotice')->name('edit-notice');
        Route::any('edit-notice-action', 'NoticeController@editNoticeAction')->name('edit-notice-action');
        Route::any('update-notice-status', 'NoticeController@updateNoticeStatus')->name('update-notice-status');

    });

});







Route::get('register_provider',function (){

    return view('register_provider');
});
Route::get('car_data',function (){

    return view('assign_cars_data');
});
