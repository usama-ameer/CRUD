<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CustomAuthController;


Route::view('/noaccess', 'noaccess');

Route::group(['middleware'=>['protectPage']], function(){
    Route::view('about', 'about');
    Route::view('/home', 'home');
    Route::view('/users', 'users')->middleware('protectPage');
    
});
Route::get('/index',[UsersController::class,'index']);

// ===================================================================


Route::get('/hello/{name}',[WelcomeController::class,'index']);

Route::get('/form',[FormController::class,'index']);

Route::post('/insert',[FormController::class,'insert'])->name('insert.data');

// Route::get('/dashboard',[FormController::class,'dashboard']);

Route::get('/edituser/{id}',[FormController::class,'edit']);

Route::get('delete/{id}',[FormController::class,'delete']);
// ==============================================================================


// ======================================================================


Route::group(['middleware'=>['isLoggedIn']], function(){

    Route::get('/login',[CustomAuthController::class,'login'])->name('auth.login');
    Route::get('/registration',[CustomAuthController::class,'registration'])->name('auth.registration');
      
        
    });
    Route::group(['middleware'=>['loginCheck']], function(){
        Route::get('/auth-dashboard',[CustomAuthController::class,'dashboard'])->name('auth.dashboard');
         //Member controller routes
         Route::get('/list',[MemberController::class,'list']);
         Route::post('/add-data',[MemberController::class,'adddata'])->name('add.data');
         Route::get('/delete/{id}',[MemberController::class,'delete']);
         Route::get('/forcedelete/{id}',[MemberController::class,'forcedelete']);
         Route::get('/editdata/{id}',[MemberController::class,'editdata']);
         Route::get('/restore/{id}',[MemberController::class,'restore']);
         Route::post('/update',[MemberController::class,'update'])->name('update.data');
         Route::get('/trash',[MemberController::class,'trash']);
         Route::view('/', 'registarion')->name('home');;
    });
    Route::get('/logout',[CustomAuthController::class,'logout'])->name('auth.logout');
    Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('auth.registerUser');
    Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('auth.loginUser');
    // ==========================================================================
    