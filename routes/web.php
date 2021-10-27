<?php

use App\Http\Controllers\actionController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/' , [homeController::class, 'home'])->name('index');
Route::get('/home' , [homeController::class, 'home'])->name('home');
Route::get('/about' , [homeController::class, 'about'])->name('about');

Route::get('/create', [actionController::class , 'create'])->name('create');
Route::post('/create/post', [actionController::class , 'createPost'])->name('create.post');
Route::get('/update/{id}' , [actionController::class, 'update'])->name('update');
Route::post('/update/post', [actionController::class, 'updatepost']);
Route::get('/detail/{id}' , [actionController::class, 'detail'])->name('detail');


Route::get('/auth/login', [loginController::class, 'login'])->name('auth.login');
Route::post('/auth/login/post', [loginController::class, 'loginPost'])->name('auth.login.post');
Route::get('/auth/logout', [loginController::class, 'logout'])->name('auth.logout');

Route::get('/register/admin', [registerController::class, 'registerAdmin'])->name('register.admin');
Route::post('/register/admin/post', [registerController::class, 'registerAdminPost'])->name('register.admin.post');


Route::get('/register/user', [registerController::class, 'registerUser'])->name('register.user');
Route::post('/register/user/post', [registerController::class, 'registerUserPost'])->name('register.user.post');
