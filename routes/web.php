<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

// Route::get('tests', function () {
//     return view('welcome');
// });




Route::get('test', function () {
    event(new App\Events\myEvent(Auth::user()->name));
//    dd(Auth::user()->name);
return  redirect()->route('frontend.home')->with('alert','Congratulations on your successful order');
})->name('test');






Route::namespace('Frontend')->group(function() {
    Route::get('/', 'HomeController@index')->name('frontend.home');
    Route::get('/category/product/{slug}','CategoryController@showCategory')->name('frontend.category.show');
    Route::get('/subcategory/product/{slug}','CategoryController@showSubCategory')->name('frontend.subcategory.show');
    Route::get('/brand/product/{slug}','BrandController@showBrand')->name('frontend.brand.show');

    // comment
    Route::post('/user/comment','ProductController@userCommnet')->name('user.comment');


    // cart
    Route::get('cart/{productId}','CartController@store')->name('frontend.cart.store');
    Route::get('/all/cart','CartController@all')->name('frontend.cart.all');
    Route::get('/deleted/cart/{productId}','CartController@destroy')->name('frontend.cart.destroy');
    Route::get('/deleted_all/cart','CartController@deleted_all')->name('frontend.cart.deleted_all');
    Route::post('/update/cart/{productId}','CartController@update')->name('frontend.cart.update');

    // order
    Route::get('/all/order','OrderController@order')->name('fontend.cart.order');
    Route::post('customer/order/cart','OrderController@orderCheckout')->name('frontend.cart.post');
    Route::post('/order/cart/checkout','CartController@checkout')->name('checkout');
    Route::get('test/code','CartController@check');
    Route::get('test/codes','CartController@checks');

    // product
    Route::post('price/filtering','ProductController@priceFiltering')->name('product.price');
    Route::get('product_details/{id}','ProductController@productDetails')->name('product.details');

    // search
    Route::post('product/search','ProductController@search')->name('product.search');
    Route::get('product/search/{id}','ProductController@productSearch')->name('product.search.slug');


    //users
    Route::get('/user/login','AuthController@form')->name('login');
    Route::post('register/form/user','AuthController@register')->name('form.register.user');
    Route::post('login/form/user','AuthController@login')->name('login.form.user');
    Route::get('rand/form','AuthController@rand')->name('rand.form.user');
    Route::post('post/user/login','AuthController@login')->name('post.login');
    Route::post('/user/register','AuthController@register')->name('register');
    Route::get('/user/logout','AuthController@logout')->name('logout');
    Route::get('/user/Forgotpassword','AuthController@forgotFassword')->name('forgout.fasswords');
    Route::post('/user/forgotFassword','AuthController@postForgotFassword')->name('forgout.fassword');
    Route::get('user/updateFassword/{userId}','AuthController@updateFassword')->name('user.updatefassword') ;
    Route::post('user/updatefassword/{userId}','AuthController@postUpdateFassword')->name('user.postFassword');

    // login google
    Route::get('auth/{ocialite}', 'AuthController@redirectToGoogle')->name('login.ocialite');
    Route::get('auth/{ocialite}/callback', 'AuthController@handleGoogleCallback')->name('login.ocialite.callback');


});

Route::namespace('Backend')->middleware(['disablepreventback'])->group(function(){
    // login admin
    Route::get('login/admin','AuthController@getLogin')->name('get.login.admin');
    Route::post('post/login/admin','AuthController@postLogin')->name('post.login.admin');
    Route::get('logout/admin','AuthController@logout')->name('logout.admin');
    Route::get('dashboard/admin','HomeController@index')->name('admin.dasboard')->middleware('can:dashborad');
   // slider
   Route::get('create/slider','SliderController@createSlider')->name('create.slider');
   Route::post('post/create/slider','SliderController@postCreateSilder')->name('post.create.slider');
   Route::get('show/slider','SliderController@showSlider')->name('show.slider');
   Route::get('update/status/{id}','SliderController@postUpdateStatus')->name('post.update.status');
   Route::get('edit/slider/{id}','SliderController@editSlider')->name('edit.slider');
   Route::post('post/edit/slider/{id}/{image}','SliderController@postEditSlider')->name('post.edit.slider');
   Route::get('deleted/slider/{id}','SliderController@deletedSlider')->name('deleted.slider');
   // sub categorys
   Route::get('create/subcategory','CategoryController@createCategory')->name('create.category')->middleware('can:subcategory-create');
   Route::post('post/create/subcategory','CategoryController@postCreateCategory')->name('post.create.category');
   Route::get('show/subcategory','CategoryController@showCategory')->name('show.category')->middleware('can:subcategory-list');
   Route::get('edit/subcategory/{id}','CategoryController@editsubCategory')->name('edit.subcategory')->middleware('can:subcategory-edit');
   Route::post('post/edit/subcategory/{id}','CategoryController@postEditSubCategory')->name('post.edit.subcategory');
   Route::get('deleted/subcategory/{id}','CategoryController@deletedSubcategory')->name('deleted.subcategory')->middleware('can:subcategory-deleted');

   // category
   Route::get('create/category','CategoryController@createCategorys')->name('create.categorys')->middleware('can:category-create');
   Route::post('post/create/category','CategoryController@postCreateCategorys')->name('create.post.categorys');
   Route::get('show/category','CategoryController@showCategorys')->name('show.categorys')->middleware('can:category-list');
   Route::get('edit/categorys/{id}','CategoryController@editCategory')->name('edit.category')->middleware('can:category-edit');
   Route::post('post/edit/category/{id}','CategoryController@postEditCategorys')->name('post.edit.categorys');
   Route::get('deleted/categorys/{id}','CategoryController@deletedCategorys')->name('deleted.categorys')->middleware('can:category-deleted');
   // product

   Route::get('create/product','ProductController@createProduct')->name('create.product')->middleware('can:product-create');
   Route::post('post/create/product','ProductController@postCreateProduct')->name('post.create.product');
   Route::get('show/product','ProductController@showProduct')->name('show.product')->middleware('can:product-list');
   Route::get('edit/product/{id}','ProductController@editProduct')->name('edit.product')->middleware('can:category-edit');
   Route::post('post/edit/product/{id}/{check}/{image}','ProductController@postEditProduct')->name('post.edit.product');
   Route::get('deleted/product/{id}/{check}/{image}','ProductController@deletedProduct')->name('deleted.product')->middleware('can:category-deleted');

   // user
  Route::get('create/user','UserController@createUser')->name('create.user')->middleware('can:user-create');
  Route::post('post/create/user','UserController@postCreateUser')->name('post.create.user');
  Route::get('show/user','UserController@showUser')->name('show.user')->middleware('can:user-list');
  Route::get('edit/user/{id}','UserController@editUser')->name('edit.user')->middleware('can:user-edit');
  Route::post('post/edit/user/{id}','UserController@postEditUser')->name('post.edit.user');
  Route::get('deleted/user/{id}','UserController@deletedUser')->name('deleted.user')->middleware('can:user-deleted');

  //roles
  Route::get('create/roles','RolesController@createRoles')->name('create.roles')->middleware('can:roles-create');
  Route::post('post/create/roles','RolesController@postCreateRoles')->name('post.create.roles');
  Route::get('show/roles','RolesController@showRoles')->name('show.roles')->middleware('can:roles-list');
  Route::get('edit/roles/{id}','RolesController@editRoles')->name('edit.roles')->middleware('can:roles-edit');
  Route::post('post/edit/roles/{id}','RolesController@postEditRoles')->name('post.edit.roles');
  Route::get('deleted/roles/{id}','RolesController@deletedRoles')->name('deleted.roles')->middleware('can:roles-deleted');
});
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

