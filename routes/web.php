<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
        Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');

        Route::get('list-motels',[AdminController::class,'listMotels'])->name('admin.listmotels');

        Route::get('add-motels',[AdminController::class,'addMotels'])->name('admin.addmotels');
        Route::post('add-motels',[AdminController::class,'storeMotels'])->name('admin.storemotels');

        Route::get('edit-motels/{id}',[AdminController::class,'editMotels'])->name('admin.editmotels');
        Route::post('add-motels/{id}',[AdminController::class,'updateMotels'])->name('admin.updatemotels');

        Route::get('delete-motels/{id}',[AdminController::class,'destroyMotels'])->name('admin.deletemotels');

        // xu ly thay doi trang thai phong tro
        Route::get('changestatusmotels/{id}', [AdminController::class,'changeStatusMotels'])->name('admin.changestatusmotels');

        Route::get('list-users',[AdminController::class,'listUsers'])->name('admin.listusers');

        // xu ly hien thi danh sach ban ghi tu bang users
        Route::get('add-manager-user', [AdminController::class,'createUserManager'])->name('admin.addmanageruser'); //hien thi form them user
        Route::post('store-manager-user',[AdminController::class,'storeUserManager'])->name('admin.storemanageruser'); //xu ly them user tu form

        Route::get('edit-manager-user/{id}', [AdminController::class,'editUserManager'])->name('admin.editmanageruser'); //hien thi form sua user
        Route::post('update-manager-user/{id}', [AdminController::class,'updateUserManager'])->name('admin.updatemanageruser'); // xu ly sua user tu form

        Route::get('delete-manager-user/{id}', [AdminController::class,'destroyUserManager'])->name('admin.deletenageruser'); // xu ly xoa user
        
        // xu ly thay doi trang thai quyen user
        Route::get('changestatususer/{id}', [AdminController::class,'changeStatusUser'])->name('admin.changestatususer');

    

        Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
        Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
        Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
       
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    

    Route::get('home',[UserController::class,'userHome'])->name('user.home');// trang chu xem cua user thong tin chi tiet giao dien nguoi dung khi login ok

    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard'); // trang chu quan ly cua user

    
    Route::get('users-post',[UserController::class,'userPost'])->name('user.post');


    Route::get('profile',[UserController::class,'profile'])->name('user.profile');

    Route::get('motels/list/{id}', [UserController::class,'showview'])->name('motels/list/view'); //luot xem chi tiet bai viet

    
});
