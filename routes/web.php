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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





//show catagories for Users after login

Route::get('/catagoryshow','UserController@catagoriesshow');
Route::get('/showcatagoryresult/{id}','UserController@showcatagoryresult');

//Cart system for all user
Route::get('/single/cart/{id}/{pagename}/{discount_in_percentage}/{discount_in_tk}','cartController@singlecart');
Route::get('/viewcart/','cartController@viewcart');
Route::get('/viewcart/{id}','cartController@viewcart');
Route::get('/delete/cart/{id}','cartController@deletecart');
Route::get("/confirm/product-order/{id}","cartController@UpdateProductOrderStatus");

//cart system for all user end


// Route::get('/viewcartforadmin','cartController@viewcartforadmin');
// Route::post('/viewcartforadmin','cartController@viewcartforadmin2');


// Route::get('/requestNotificationForAdmin',);

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');





Route::get('/mydashboard',"CustomerController@dashboard");



// Route::get('/single/cart/{id}',)



//for all users

//Home page
Route::get('/','HomepageController@index');
Route::get('/catagorywiseproduct/{id}','HomepageController@catagorywiseproduct');
//Homepage

//Order History by a user
Route::get('orderhistory',"OrderController@orderhistory");
//Order History by a user

//from user dashboard panel when user update their cart or request for order
Route::post('/updatecart','cartController@updatecart')->name('updatecart');
Route::get('/request','cartController@request');
//end confirm orders

//discount table to add cart
Route::get('/showdiscountedproduct',"DiscountController@discountedProduct");

//for all users End







//Group of admin
Route::group(['middleware' => 'App\Http\Middleware\admin'],function(){

//Admin Dashboard
Route::get('/dashboard','AdminController@Dashboard');
//Admin Dashboard end

//catagory Operations Start
Route::get('/addcatagory', 'catagoryController@create');
Route::post('/addcatagory','catagoryController@store');
Route::get('/managecatagory', 'catagoryController@show');
Route::get('catagory/edit/{id}','catagoryController@edit');
Route::post('/updateCatagory','catagoryController@edit1');
Route::get('catagory/delete/{id}','catagoryController@delete');
//catagory Operations End



//product Operation Start
Route::get('/addproduct', 'productController@create');
Route::post('/addproduct','productController@store');
Route::get('/manageproductadmin', 'productController@show');
Route::get('/manageproductuser', 'productController@user');
Route::get('product/edit/{id}','productController@edit');
Route::post('/updateproduct','productController@edit1');
Route::get('product/delete/{id}','productController@delete');
Route::get('/user','UserController@index');
//Admin panal


//admin cart
Route::get('/viewcartforadminnew/','cartController@viewcartforadminnew');
Route::get('/viewcartforadminnew/{id}','cartController@viewcartforadminnew');
Route::get('/viewcartforadminnew/{id}/{dis}','cartController@viewcartforadminnew');
//from admin panel when admin give the final order
Route::get('/AdminGiveOrder','cartController@payment');

//End admin cart

//show order details for admin

Route::get('/ShowUserOrderDetails','OrderController@ShowUserOrderDetails');

//End show order details




//User Management start

Route::get('/userlist','AdminController@Usermanagement');
Route::get('/users/edit/{id}','AdminController@useredit');
Route::post('/updateUser','AdminController@useredit1');
Route::get('/users/delete/{id}','AdminController@userdelete');

//User Management End



//search order (only for Admin)
Route::get('/searchOrderWithPrintingforAdmin',"OrderController@searchOrder");
Route::post('/searchOrderWithPrintingforAdmin',"OrderController@searchOrderResult");

//order History for customers




//Manage order list
Route::get('/manageOrder',"OrderController@manageOrder");
Route::get('/allorder/delete/{id}',"OrderController@deleteOrder");
Route::get('/allorder/edit/{id}',"OrderController@updateOrder");
Route::post('/updateOrder',"OrderController@updateYourOrder");


//Manage order list End



//Discount page for admin
Route::get('/adddiscount',"DiscountController@discount");
Route::post('/adddiscount','DiscountController@discountstore');

//Discount page for admin end


//Product Refil 
Route::get('/refilproduct',"ProductRefilController@index");
Route::post('/refilproduct',"ProductRefilController@store");
//product Refil End




//Manager Commision

Route::get('/managercommisionserarch',"commisionController@index");
Route::get('/managercommision/{id}',"commisionController@showdetails");
Route::post('/addcommision',"commisionController@commisionadd");

//Manager Commision End




//Porductwise profit and loss

Route::get('/productwiseprofit','AdminController@profit');

//Product wise profit


//Registation for Admin and Manager

Route::get('/adduser',"CustomerController@index");
Route::post('/adduser',"CustomerController@create");

//Registation for Admin and Manager end

});

//End group of admin




Route::group(['middleware' => 'App\Http\Middleware\manager'],function(){



//Registation for Admin and Manager

Route::get('/adduser',"CustomerController@index");
Route::post('/adduser',"CustomerController@create");

//Registation for Admin and Manager end



//user Details

Route::get('/userDetails',"UserController@userdetails");
Route::get('profile/edit/{id}',"UserController@profilechange");
Route::post('/updateprofile','UserController@profileedit');

//user Details End


});



//PDF and Excel

Route::get('/pdf/download','PdfController@index');
Route::get('/productinformationpdf/download','PdfController@productinformationpdf');
Route::get('/cartInformation/download','PdfController@cartInformation');
Route::get('/orderexcel/download','PdfController@exceldownload');



//End of PDF EXCEL


//Add combo discount

Route::get('/addcombo','ComboController@index');
Route::post('/addcombo','ComboController@store');
Route::get('/managecombo','ComboController@managecombo');
Route::get('combo/delete/{id}','ComboController@delete');


//Combo discount EDIT baki




//for all users

Route::get('posts','HomepageController@posts');


Route::get('/searchconfirmorder','AdminController@searchconfirmingorder');
Route::post('/searchresultoforderbydate','AdminController@searchconfirmingorderresult');
// Route::get('/orderresultshowdetails')


