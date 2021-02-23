<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AllUseresController;
use App\Http\Controllers\WteListController;
use App\Http\Controllers\CmprListController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ReportsController;


use App\Http\Controllers\SslCommerzPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can productister web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//epiz_27853573 free hosting username
//Username: epiz_27853573
//Database name: epiz_27853573_eshoper
// DB_CONNECTION=mysql
// DB_HOST=127.0.0.1
// DB_PORT=3306
// DB_DATABASE=eshoper
// DB_USERNAME=root
// DB_PASSWORD=

//000
//pass: #)ENKjSWhHaS^Kte2w@h


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/checkUser', function () {
    return view('checkUser');
})->name('checkUser');

Route::get('/userList', function () {
    return view('userlist');
})->name('userlist');
//frontend start

Route::get('/edituserType/{id}/{userType}', [AllUseresController::class, 'edituserType'])->name('edituserType');
Route::get('/flogin', [AllUseresController::class, 'flogin'])->name('flogin');

// Route::get('/checkUser', [AllUseresController::class, 'checkUser'])->name('checkUser');
// Route::post('/userList', function (Request $request) {

// 	if ($request->userType == "Normal") {
// 		User::where('id', $request->id)->update(['userType'=>$request->id]);
// 	}

//     return view('userlist');
// })->name('edituserType');

// Route::get('/flogin', function () {
//     return view('frontend/flogin');
// })->name('flogin');

Route::get('/reportPage', [ReportsController::class, 'goToReportPage'])->name('reportPage');
Route::post('/reportSubmit', [ReportsController::class, 'reportSubmit'])->name('reportSubmit');
Route::delete('selectReportDeleteAjax', [ReportsController::class, 'deleteChackedRip'])->name('deleteChackedRip');


Route::get('/cusregister', [CustomersController::class, 'cusregister'])->name('cusregister');

Route::get('/', [ProductController::class, 'welcomeProduct'])->name('welcomeProduct');
Route::get('/frontProducts', [ProductController::class, 'frontProducts'])->name('frontProducts');
Route::post('/frontProductsBySearch', [ProductController::class, 'frontProductsBySearch'])->name('frontProductsBySearch');
Route::get('/proDetails/{id}', [ProductController::class, 'proDetails'])->name('proDetails');
Route::get('/frontProducts/{catId}/{brId}', [ProductController::class, 'viewByCatBr'])->name('viewByCatBr');

Route::get('/whitelist/{cusId}/{prId}', [WteListController::class, 'addWtLst'])->name('addWtLst');
Route::get('/whitelist', [WteListController::class, 'whitelist'])->name('whitelist');
Route::get('cmprlist', [CmprListController::class, 'cmprlist'])->name('cmprlist');
Route::get('/cmprlist/{prId}/{cusId}', [CmprListController::class, 'addCmprLst'])->name('addCmprLst');
Route::get('/cmprlist/{cmprId}', [CmprListController::class, 'removeComp'])->name('removeComp');
Route::get('/whitelist/{cmprId}', [WteListController::class, 'removeWhite'])->name('removeWhite');

Route::get('/cartView', [CartController::class, 'cartView'])->name('cartView');
Route::get('/addtoCart/{prId}', [CartController::class, 'addtoCart'])->name('addtoCart');
Route::get('/cartDelete/{rowId}', [CartController::class, 'cartDelete'])->name('cartDelete');
Route::post('/addtoCartQan', [CartController::class, 'addtoCartQan'])->name('addtoCartQan');
//https://packagist.org/packages/bumbummen99/shoppingcart
Route::post('/upQuantity', [CartController::class, 'upQuantity'])->name('upQuantity');
Route::get('/orderView', [OrdersController::class, 'orderPage'])->name('orderPage');
Route::post('/order', [OrdersController::class, 'order'])->name('order');
Route::get('/orderDelete/{ordId}', [OrdersController::class, 'orderDelete'])->name('orderDelete');

Route::post('/addComment', [CommentsController::class, 'addComment'])->name('addComment');
//frontend end

// Dependent Brand selector by ajax
Route::get('GetBrandAgainstCatagoryEdit/{id}', [ProductController::class, 'GetBrandAgainstCatagoryEdit'])->name('GetBrandAgainstCatagoryEdit');
// Dependent Brand selector by ajax

Route::post('/addCatAjax', [CatagoryController::class, 'addCatAjax'])->name('addCatAjax');
Route::delete('catDeleteAjax/{id}', [CatagoryController::class, 'catDeleteAjax'])->name('catDeleteAjax');
Route::get('catfindByIdAjax/{id}', [CatagoryController::class, 'catfindByIdAjax'])->name('catfindByIdAjax');
Route::post('/uppCatAjax', [CatagoryController::class, 'uppCatAjax'])->name('uppCatAjax');

Route::post('/addBrandAjax', [BrandController::class, 'addBrandAjax'])->name('addBrandAjax');
Route::delete('brDeleteAjax/{id}', [BrandController::class, 'brDeleteAjax'])->name('brDeleteAjax');
Route::get('brfindByIdAjax/{id}', [BrandController::class, 'brfindByIdAjax'])->name('brfindByIdAjax');
Route::post('/uppbrAjax', [BrandController::class, 'uppbrAjax'])->name('uppbrAjax');

Route::get('brfindByCatagoryIdAjax/{id}', [BrandController::class, 'brfindByCatagoryIdAjax'])->name('brfindByCatagoryIdAjax');

Route::get('/allCatAjax', [CatagoryController::class, 'allCatAjax'])->name('allCatAjax');



Route::get('delproduct/{id}', [ProductController::class, 'delproduct'])->name('delproduct');
Route::get('editproduct/{id}', [ProductController::class, 'editproduct'])->name('editproduct');

Route::get('addProduct', [ProductController::class, 'addProduct'])->name('addProduct');
Route::get('viewProduct', [ProductController::class, 'viewProduct'])->name('viewProduct');
Route::get('/viewProDetails/{id}', [ProductController::class, 'viewProDetails'])->name('viewProDetails');
Route::post('/storePro', [ProductController::class, 'storePro'])->name('storePro');
Route::post('/storeEditPro', [ProductController::class, 'storeEditPro'])->name('storeEditPro');

Route::get('/viewCatPage', [CatagoryController::class, 'viewCatPage'])->name('viewCatPage');
Route::get('/addCatPage', [CatagoryController::class, 'addCatPage'])->name('addCatPage');
Route::get('/delCatagory/{id}', [CatagoryController::class, 'delCatagory'])->name('delCatagory');
Route::post('/addCat', [CatagoryController::class, 'addCat'])->name('addCat');

Route::post('/uppCat', [CatagoryController::class, 'uppCat'])->name('uppCat');
Route::get('/editCatagory/{id}', [CatagoryController::class, 'editCatagory'])->name('editCatagory');

Route::get('/viewBrPage', [BrandController::class, 'viewBrPage'])->name('viewBrPage');
Route::get('/addBrPage', [BrandController::class, 'addBrPage'])->name('addBrPage');
Route::get('/delBrand/{id}', [BrandController::class, 'delBrand'])->name('delBrand');
Route::get('/editBrand/{id}', [BrandController::class, 'editBrand'])->name('editBrand');
Route::post('/uppBr', [BrandController::class, 'uppBr'])->name('uppBr');
Route::post('/addBr', [BrandController::class, 'addBr'])->name('addBr');

Route::get('/viewOrderPage', [OrdersController::class, 'viewOrderPage'])->name('viewOrderPage');
Route::get('/cngOrdSts/{ordStatus}/{ordId}', [OrdersController::class, 'cngOrdSts'])->name('cngOrdSts');

// Route::get('/viewUserPrfl/{id}', [AllUseresController::class, 'viewUserPrfl'])->name('viewUserPrfl');
Route::get('/viewUserPrfl/{id}', [AllUseresController::class, 'viewUserPrfl'])->name('viewUserPrfl');

Route::middleware(['auth:sanctum', 'verified'])->get('admin', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/viewReports', [ReportsController::class, 'viewReports'])->name('viewReports');
Route::delete('repDeleteAjax/{id}', [ReportsController::class, 'repDeleteAjax'])->name('repDeleteAjax');




// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END