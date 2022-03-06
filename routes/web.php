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

Route::get('admin', 'loginController@adminIndex')->name('admin.login');
Route::post('admin', 'loginController@adminPosted');


Route::group(['middleware' => 'admin'], function () {


    Route::get("/admin_panel", 'admin_panel\dashboardController@index')->name('admin.dashboard');

    Route::get('admin/logout', 'loginController@adminLogout')->name('admin.logout');
    //categories
    Route::get('/admin_panel/categories', 'admin_panel\categoriesController@index')->name('admin.categories');
    Route::post('/admin_panel/categories', 'admin_panel\categoriesController@posted');

    Route::get('/admin_panel/categories/edit/{id}', 'admin_panel\categoriesController@edit')->name('admin.categories.edit');
    Route::post('/admin_panel/categories/edit/{id}', 'admin_panel\categoriesController@update');

    Route::get('/admin_panel/categories/delete/{id}', 'admin_panel\categoriesController@delete')->name('admin.categories.delete');
    Route::post('/admin_panel/categories/delete/{id}', 'admin_panel\categoriesController@destroy');


    //products
    Route::get('/admin_panel/products', 'admin_panel\productsController@index')->name('admin.products');

    Route::get('/admin_panel/products/create', 'admin_panel\productsController@create')->name('admin.products.create');
    Route::post('/admin_panel/products/create', 'admin_panel\productsController@store')->name('admin.products.post');

    Route::get('/admin_panel/products/createspa', 'admin_panel\productsController@createspa')->name('admin.products.createspa');

    Route::get('/admin_panel/products/edit/{id}', 'admin_panel\productsController@edit')->name('admin.products.edit');
    Route::post('/admin_panel/products/edit/{id}', 'admin_panel\productsController@update');
    Route::get('/admin_panel/products/editspa/{id}', 'admin_panel\productsController@editspa')->name('admin.products.editspa');
    Route::post('/admin_panel/products/editspa/{id}', 'admin_panel\productsController@update');

    Route::get('/admin_panel/products/delete/{id}', 'admin_panel\productsController@delete')->name('admin.products.delete');
    Route::post('/admin_panel/products/delete/{id}', 'admin_panel\productsController@destroy');

    //order management 
    Route::get('/admin_panel/management', 'admin_panel\managementController@manage')->name('admin.orderManagement');
    Route::post('/admin_panel/management', 'admin_panel\managementController@update')->name('admin.orderUpdate');
});

Route::redirect('/', '/en');

Route::group(['prefix' => '{language}'], function () {
    Auth::routes();


    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/face', 'HomeController@face')->name('face');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('brand/history', 'HomeController@history')->name('history');
    Route::get('brand/our-values', 'HomeController@ourValues')->name('our-values');
    Route::get('/about-us', 'HomeController@getAboutUsPage')->name('about-us');
    Route::get('/delivery-and-returns', 'HomeController@getDeliveryPage')->name('delivery-and-returns');
    Route::get('/distance-sales-agreement', 'HomeController@getDistancePage')->name('distance-sales-agreement');

    Route::get('salon-treatments/soin-bio-visage', 'HomeController@soinBioVisage')->name('soin-bio-visage');
    Route::get('salon-treatments/spa-ritual/discovery-rythmes-of-brazil', 'HomeController@discoveryRythmesOfBrazil')->name('discovery-rythmes-of-brazil');
    Route::get('salon-treatments/spa-ritual/escape-in-the-moroccan-garden', 'HomeController@escapeInTheMoroccanGarden')->name('escape-in-the-moroccan-garden');
    Route::get('salon-treatments/spa-ritual/exploration-of-the-siberian-taiga', 'HomeController@explorationOfTheSiberianTaiga')->name('exploration-of-the-siberian-taiga');
    Route::get('salon-treatments/spa-ritual/french-riviera', 'HomeController@frenchRiviera')->name('french-riviera');
    Route::get('salon-treatments/spa-ritual/stopover-at-taraho-i-garden', 'HomeController@stopoverAtTarahoIGarden')->name('stopover-at-taraho-i-garden');
    Route::get('salon-treatments/spa-ritual/walk-in-the-kyoto-imperial-garden', 'HomeController@walkInTheKyotoImperialGarden')->name('walk-in-the-kyoto-imperial-garden');
    Route::get('salon-treatments/skincare-rituals/rituel-apaisant-desensibilisant', 'HomeController@rituelApaisantDesensibilisant')->name('rituel-apaisant-desensibilisant');
    Route::get('salon-treatments/skincare-rituals/rituel-correcteur-rides-ciblees', 'HomeController@rituelCorrecteurRidesCiblees')->name('rituel-correcteur-rides-ciblees');
    Route::get('salon-treatments/skincare-rituals/rituel-fermete-anti-age', 'HomeController@rituelFermeteAntiAge')->name('rituel-fermete-anti-age');
    Route::get('salon-treatments/skincare-rituals/rituel-hydratant-repulpant', 'HomeController@rituelHydratantRepulpant')->name('rituel-hydratant-repulpant');
    Route::get('salon-treatments/skincare-rituals/rituel-purifiant-equilibrant', 'HomeController@rituelPurifiantEquilibrant')->name('rituel-purifiant-equilibrant');
    Route::get('salon-treatments/skincare-rituals/rituel-revitalisant-eclat-intense', 'HomeController@rituelRevitalisantEclatIntense')->name('rituel-revitalisant-eclat-intense');

    Route::get('/product/{id}', 'user\userController@view')->name('product');


    Route::group(['middleware' => 'auth'], function () {

        Route::get('profile/showprofile/{id}', 'user\userController@showprofile')->name('show.profile');
        Route::get('profile/edit_profile/{id}', 'user\userController@editprofile')->name('edit.profile');
        Route::post('profile/edit_profile/{id}', 'user\userController@storprofile');

        Route::get('profile/address/{id}', 'user\userController@showaddress')->name('addres');
        Route::get('profile/add_address',  'user\userController@addaddress')->name('add.address');
        Route::post('profile/add_address/{id}', 'user\userController@storaddress')->name('store.address');
        Route::get('profile/edit_address/{id}', 'user\userController@editaddress')->name('edit.address');
        Route::post('profile/edit_address/{id}', 'user\userController@updateaddress');
        Route::post('profile/delete_address/{id}', 'user\userController@destroyaddress')->name('delete.address');

        Route::get('profile/change-password', 'Auth\ChangePasswordController@index')->name('change.pass');
        Route::post('change-password', 'Auth\ChangePasswordController@store')->name('change.password');


        Route::post('product/{id}', 'user\userController@post');
        Route::get('cart', 'user\userController@cart')->name('cart');
        Route::get('cart/confirm', 'user\userController@confirmcart')->name('cart.confirm');
        Route::post('cart/checkout', 'user\userController@confirm');
        Route::post('edit_cart', 'user\userController@editCart')->name('user.editCart');
        Route::post('delete_item_from_cart', 'user\userController@deleteCartItem')->name('user.deleteCartItem');

        Route::get('profile/myorder', 'user\userController@history')->name('myorder');
    });
});
Route::post('/email', 'HomeController@sendEmail')->name('send.email');

Route::get('/home', 'HomeController@index')->name('home');
