<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\Route;



// FrontEnd
Route::controller(HomeController::class)->group(function(){
    Route::get('/' , 'index')->name('home');
    Route::get('/project/{slug}' ,  'project')->name('project.view');
    Route::POST('/contact-us' , 'submit')->name('contact.submit');

});














// Admin Side
Route::get('/login', [AdminController::class, 'loginPageView'])->name('login');

Route::post('/login' , [AdminController::class, 'login'])->name('login.post');
Route::get('/logout' , [AdminController::class, 'logout'])->name('logout');




Route::middleware('auth')->group(function(){

    Route::get('/dashboard' ,[AdminController::class,'index'])->name('dashboard');

    Route::get('/profile' , [ProfileController::class, 'index'])->name('profile');

    Route::post('/profile-update' , [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/add-project' , [ProjectController::class, 'index'])->name('add.project');

    Route::post('/store-project' , [ProjectController::class, 'store'])->name('store.project');

    Route::get('/project-list' , [ProjectController::class, 'list'])->name('list.project');
    Route::post('/project-delete/{slug}' , [ProjectController::class, 'destroy'])->name('projects.destroy');
    

    });
