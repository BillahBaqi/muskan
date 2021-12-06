<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/admin', [HomeController::class, 'index']);
Route::get('/admin/users', [HomeController::class, 'users']);

//FrontendController
Route::get('/', [FrontendController::class, 'welcome']);
Route::get('/account/user', [FrontendController::class, 'myaccount']);
Route::get('/account/orders', [FrontendController::class, 'orders']);
Route::get('/products/details/{product_id}', [FrontendController::class, 'details']);
Route::get('/shop', [FrontendController::class, 'shop']);
Route::get('/category/{category_name}', [FrontendController::class, 'category']);
Route::get('/order/success', [FrontendController::class, 'success']);



// Category routing
Route::get('/admin/category', [CategoryController::class, 'index']);
Route::post('/admin/category/insert', [CategoryController::class, 'insert']);
Route::get('/admin/category/edit/{category_id}', [CategoryController::class, 'edit']);
Route::post('/admin/category/update/{category_id}', [CategoryController::class, 'update']);
Route::get('/admin/category/delete/{category_id}', [CategoryController::class, 'delete']);

// SubCategory routing
Route::get('/admin/subcategory', [SubcategoryController::class, 'index']);
Route::post('/admin/subcategory/insert', [SubcategoryController::class, 'insert']);
Route::get('/admin/subcategory/edit/{subcategory_id}', [SubcategoryController::class, 'edit']);
Route::post('/admin/subcategory/update/{subcategory_id}', [SubcategoryController::class, 'update']);
Route::get('/admin/subcategory/delete/{subcategory_id}', [SubcategoryController::class, 'delete']);
Route::get('/admin/subcategory/restore/{trash_subcategory_id}', [SubcategoryController::class, 'restore']);
Route::get('/admin/subcategory/permanentdelete/{trash_subcategory_id}', [SubcategoryController::class, 'permanentdelete']);
Route::post('/admin/subcategory/markdelete', [SubcategoryController::class, 'markdelete']);
Route::post('/admin/subcategory/marktrash', [SubcategoryController::class, 'marktrash']);

//EditProfile routing
Route::get('/admin/profile', [ProfileController::class, 'profile']);
Route::post('/admin/profile/update', [ProfileController::class, 'profileupdate']);
Route::post('/admin/profile/passchange', [ProfileController::class, 'passchange']);
Route::post('/admin/profile/imagechange', [ProfileController::class, 'imagechange']);

//Product Routing
Route::get('/admin/products', [ProductController::class, 'index']);
Route::get('/admin/products-add', [ProductController::class, 'addproduct']);
Route::post('/admin/products/insert', [ProductController::class, 'insert']);
Route::get('/admin/products/edit/{product_id}', [ProductController::class, 'edit']);
Route::post('/admin/products/update/{product_id}', [ProductController::class, 'update']);
Route::get('/admin/products/delete/{product_id}', [ProductController::class, 'delete']);
Route::get('/admin/products/thumbnail-delete/{thumbnail_id}', [ProductController::class, 'thumbnail_delete']);

//Cart Routing
Route::get('/cart', [CartController::class, 'cart']);
Route::get('/cart/{coupon_code}', [CartController::class, 'cart']);
Route::post('/cart/add', [CartController::class, 'add_to_cart']);
Route::post('/cart/markadd', [CartController::class, 'mark_add_to_cart']);
Route::post('/cart/update', [CartController::class, 'cart_update']);
Route::get('/cart/delete/{cart_id}', [CartController::class, 'delete_cart']);
Route::get('/cart/addtocart/{product_id}', [CartController::class, 'addtocart']);
Route::get('/cart/addtowish/{product_id}', [CartController::class, 'addtowish']);

//Checkout Routing
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/checkout/{coupon_code}', [CheckoutController::class, 'checkout']);
Route::post('/getcitylist', [CheckoutController::class, 'getcitylist']);
Route::post('/order', [CheckoutController::class, 'order']);

//Coupon Routing
Route::get('/admin/coupon', [CouponController::class, 'index']);
Route::post('/admin/coupon/insert', [CouponController::class, 'insert']);
Route::get('/admin/coupon/delete/{coupon_id}', [CouponController::class, 'delete']);

// SSLCOMMERZ Start
Route::get('/epayment', [SslCommerzPaymentController::class, 'epayment'])->name('epayment');

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


