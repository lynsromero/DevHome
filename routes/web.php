<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DevController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TodoController;
use App\Http\Controllers\Admin\WebsiteSettingsController;
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
    
    Route::get('/website-settings' , [WebsiteSettingsController::class, 'index'])->name('website.settings');
    Route::post('/website/update' , [WebsiteSettingsController::class, 'update'])->name('website.update');

    Route::get('/email-list' , [EmailController::class, 'index'])->name('email.list');

    Route::get('/website-contacts' , [AdminController::class, 'contacts'])->name('website.contacts');

    Route::get('/add-dev' , [DevController::class, 'addDevView'])->name('add.dev');
    Route::post('/add-dev' , [DevController::class, 'addDev'])->name('add.dev.post');

    Route::get('/dev-list' , [DevController::class, 'index'])->name('dev.list');
    Route::get('/remove-dev/{id}' , [DevController::class, 'remove'])->name('remove.dev');
    Route::post('/remove-dev-ajax/{id}' , [DevController::class, 'removeAjax'])->name('remove.dev.ajax');

    Route::get('/todo' , [TodoController::class, 'index'])->name('todo');
    Route::post('/todo/store' , [TodoController::class, 'store'])->name('todo.store');
    Route::delete('/todo/delete/{id}', [TodoController::class, 'destroy'])->name('todo.delete');

    });
