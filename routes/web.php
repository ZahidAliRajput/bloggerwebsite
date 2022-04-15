<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
Route::group(['prefix' => 'frontend'], function(){
    Route::get('home', [HomeController::class, 'Home'])->name('home');
    Route::get('singlepost/{slug}', [HomeController::class, 'SinglePost'])->name('singlepost');
    Route::get('contact', [HomeController::class, 'Contact'])->name('contact');
    Route::get('aboutus', [HomeController::class, 'AboutUs'])->name('aboutus');
    Route::get('categories', [HomeController::class, 'Categories'])->name('frontcategories');
    Route::get('categoryposts/{id}', [HomeController::class, 'CategoryPosts'])->name('categoryposts');
});

Route::get('signup', [AuthController::class, 'signup'])->name('signup');
Route::post('postsignup', [AuthController::class, 'postsignup'])->name('postsignup');
Route::get('/account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');
Route::get('signin', [AuthController::class, 'signin'])->name('signin');
Route::post('postsignin', [AuthController::class, 'postsignin'])->name('postsignin');
Route::get('forgetpassword', [ForgetPasswordController::class, 'forgetpassword'])->name('forgetpassword');
Route::post('postforgetpassword', [ForgetPasswordController::class, 'postforgetpassword'])->name('postforgetpassword');
Route::get('/resetpassword/{token}', [ForgetPasswordController::class, 'showresetpasswordform'])->name('showresetpasswordform');
Route::post('postresetpassword', [ForgetPasswordController::class, 'postresetpassword'])->name('postresetpassword');
Route::get('signoff', [AuthController::class, 'signoff'])->name('signoff');

Route::middleware(['auth', 'is_verify_email'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    //Users Routes
    Route::get('users', [UserController::class, 'index'])->name('users')->middleware('can:user_view');
    Route::get('adduser', [UserController::class, 'create'])->name('adduser')->middleware('can:user_add');
    Route::post('postuser', [UserController::class, 'store'])->name('postuser')->middleware('can:user_add');
    Route::get('edituser/{id}', [UserController::class, 'edit'])->name('edituser')->middleware('can:user_edit');
    Route::post('updateuser', [UserController::class, 'update'])->name('updateuser')->middleware('can:user_edit');
    Route::get('deleteuser/{id}', [UserController::class, 'destroy'])->name('deleteuser')->middleware('can:user_delete');
    
    //Users Permissions Routes
    Route::get('userpermissions/{id}', [UserController::class, 'haspermissions'])->name('userpermissions')->middleware('can:user_has_permission');
    Route::post('userhaspermissionupdate', [UserController::class, 'haspermissionsupdate'])->name('userhaspermissionupdate')->middleware('can:user_has_permission');
    //Users Permissions Routes

    //User Profile
    Route::get('userprofile', [UserController::class, 'UserProfile'])->name('userprofile');
    Route::post('updateprofile', [UserController::class, 'UpdateProfile'])->name('updateprofile');
    Route::get('editpassword', [UserController::class, 'editpassword'])->name('editpassword');
    Route::post('updatepassword', [UserController::class, 'updatepassword'])->name('updatepassword');
    //User Profile
    //Users Routes Ends

    // Categories Routes
    Route::get('categories', [CategoryController::class, 'index'])->name('categories')->middleware('can:category_view');
    Route::post('storecategory', [CategoryController::class, 'store'])->name('storecategory')->middleware('can:category_add');
    Route::get('editcategory/{id}', [CategoryController::class, 'edit'])->name('editcategory')->middleware('can:category_edit');
    Route::post('updatecategory', [CategoryController::class, 'update'])->name('updatecategory')->middleware('can:category_edit');

    //Permission Routes
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions')->middleware('can:permission_view');
    Route::post('storepermission', [PermissionController::class, 'store'])->name('storepermission')->middleware('can:permission_add');
    Route::get('editpermission/{id}', [PermissionController::class, 'edit'])->name('editpermission')->middleware('can:permission_edit');
    Route::post('updatepermission', [PermissionController::class, 'update'])->name('updatepermission')->middleware('can:permission_edit');
    Route::get('deletepermission/{id}', [PermissionController::class, 'destroy'])->name('deletepermission')->middleware('can:permission_delete');

    //Roles Crud
    Route::get('roles', [RoleController::class, 'index'])->name('roles')->middleware('can:role_view');
    Route::post('storerole', [RoleController::class, 'store'])->name('storerole')->middleware('can:role_add');
    Route::get('editrole/{id}', [RoleController::class, 'edit'])->name('editrole')->middleware('can:role_edit');
    Route::post('updaterole', [RoleController::class, 'update'])->name('updaterole')->middleware('can:role_edit');
    Route::get('deleterole/{id}', [RoleController::class, 'destroy'])->name('deleterole')->middleware('can:role_delete');
    //Role has Permissions
    Route::get('rolepermissions/{id}', [RoleController::class, 'haspermissions'])->name('rolepermissions')->middleware('can:role_has_permission');
    Route::post('rolehaspermissionsupdate', [RoleController::class, 'haspermissionsupdate'])->name('rolehaspermissionupdate')->middleware('can:permission_edit');

    //Products Routes
    Route::get('products', [ProductController::class, 'index'])->name('products')->middleware('can:post_view');
    Route::get('addproduct', [ProductController::class, 'create'])->name('addproduct')->middleware('can:post_add');
    Route::post('postproduct', [ProductController::class, 'store'])->name('postproduct')->middleware('can:post_add');
    Route::get('editproduct/{id}', [ProductController::class, 'edit'])->name('editproduct')->middleware('can:post_edit');
    Route::post('updateproduct', [ProductController::class, 'update'])->name('updateproduct')->middleware('can:post_edit');
    Route::get('deleteproduct/{id}', [ProductController::class, 'destroy'])->name('deleteproduct')->middleware('can:post_delete');

    //Posts Routes Starts
    Route::get('posts', [PostController::class, 'index'])->name('posts')->middleware('can:post_view');
    Route::get('addpost', [PostController::class, 'create'])->name('addpost')->middleware('can:post_add');
    Route::post('postpost', [PostController::class, 'store'])->name('postpost')->middleware('can:post_add');
    Route::get('editpost/{id}', [PostController::class, 'edit'])->name('editpost')->middleware('can:post_edit');
    Route::post('updatepost', [PostController::class, 'update'])->name('updatepost')->middleware('can:post_edit');
    Route::get('deletepost/{id}', [PostController::class, 'destroy'])->name('deletepost')->middleware('can:post_delete');
    //Posts Routes Ends
});
