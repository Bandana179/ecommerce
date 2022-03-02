<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\PagesController;
use App\http\Controllers\CustomesUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ChildCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\DashboardContent;
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

Route::get('/', [PagesController::class,'index']);
Route::get('/about', [PagesController::class,'about']);
// custome user register
Route::post('/account/save', [CustomesUserController::class,'store']);
Route::post('/account/check', [CustomesUserController::class,'check']);
Route::get('/account/logout', [CustomesUserController::class,'logout']);
Route::get('/account/login', [CustomesUserController::class,'login']);
Route::get('/account/register', [CustomesUserController::class,'register']);
// custome user register end
Route::group(['middleware'=>['AuthCheck']],function(){
  Route::get('/user/dashboard', [PagesController::class,'userDashboard']);
});
Route::group(['middleware'=>['Admincheck']],function(){
    Route::get('/admin/dashboard', [PagesController::class,'adminDashboard']);
  });

  Route::get('admindashboard',DashboardContent::class);

  // Category
Route::post('addcategory', [CategoryController::class, 'addcategory']);
// SubCategory
Route::post('addsubcategory', [SubCategoryController::class, 'addsubcategory']);
// childcategory
Route::post('addchildcategory', [ChildCategoryController::class, 'addchildcategory']);
// product
Route::post('addproduct', [ProductController::class, 'addproduct']);
