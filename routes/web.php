<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', 'ViewController@index')->name('home');

// About
Route::get('/about', 'ViewController@aboutview')
    ->name('about');

// Skills
Route::get('/skills', 'ViewController@skillview')
    ->name('skills');

// Projects
Route::get('/projects', 'ViewController@projectview')
    ->name('projects');

// Experience
Route::get('/experience', 'ViewController@experienceview')
    ->name('experience');

// Blog
Route::get('/blog', 'ViewController@blogview')
    ->name('blog');

// Services

Route::get('/services', 'ViewController@serviceview')
    ->name('services');

// Contact
Route::get('/contact', 'ViewController@contactview')
    ->name('contact');


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Login form
Route::get('/login', 'Auth\LoginController@showLoginForm')
    ->name('login');

// Login
Route::post('/login', 'Auth\LoginController@login')
    ->name('admin.login');

// Logout
Route::post('/logout', 'Auth\LoginController@logout')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/

// Dashboard
Route::get('/admin', 'HomeController@index')
    ->name('admin');


/*
|--------------------------------------------------------------------------
| Admin About
|--------------------------------------------------------------------------
*/

Route::get('/admin/about', 'HomeController@aboutview')
    ->name('admin.about');

Route::post('/admin/about', 'HomeController@updateabout')
    ->name('admin.about.update');


/*
|--------------------------------------------------------------------------
| Admin Skills
|--------------------------------------------------------------------------
*/

Route::get('/admin/skills', 'HomeController@skillview')
    ->name('admin.skills');

Route::post('/admin/skills', 'HomeController@updateskill')
    ->name('admin.skills.update');



/*                                                                         |
| -------------------------------------------------------------------------- |
| Admin Projects                                                             |
| -------------------------------------------------------------------------- |
| */                                                                         

Route::get('/admin/project', 'HomeController@projectview')
->name('admin.project');

Route::get('/admin/project/create', 'HomeController@createproject')
->name('admin.project.create');

Route::post('/admin/project', 'HomeController@storeproject')
->name('admin.project.store');

Route::get('/admin/project/{id}/edit', 'HomeController@editproject')
->name('admin.project.edit');

Route::put('/admin/project/{id}', 'HomeController@updateproject')
->name('admin.project.update');

Route::delete('/admin/project/{id}', 'HomeController@deleteproject')
->name('admin.project.delete');


/*
|--------------------------------------------------------------------------
| Admin Experience
|--------------------------------------------------------------------------
*/

Route::get('/admin/experience', 'HomeController@experienceview')
    ->name('admin.experience');

Route::post('/admin/experience', 'HomeController@updatexperience')
    ->name('admin.experience.update');


/*
|--------------------------------------------------------------------------
| Admin Services
|--------------------------------------------------------------------------
*/

Route::get('/admin/services', 'HomeController@serviceview')
    ->name('admin.services');

Route::post('/admin/services', 'HomeController@updateservices')
    ->name('admin.services.update');


/*                                                                         |
| -------------------------------------------------------------------------- |
| Admin Blog                                                                 |
| -------------------------------------------------------------------------- |
| */                                                                         

Route::get('/admin/blog', 'HomeController@blogview')
->name('admin.blog');

Route::post('/admin/blog/store', 'HomeController@createblog')
->name('admin.blog.store');

Route::post('/admin/blog/{id}', 'HomeController@updateblog')
->name('admin.blog.update');

Route::delete('/admin/blog/{id}', 'HomeController@deleteblog')
->name('admin.blog.delete');



/*
|--------------------------------------------------------------------------
| Admin Contact
|--------------------------------------------------------------------------
*/

Route::get('/admin/contact', 'HomeController@contactview')
    ->name('admin.contact');

Route::post('/admin/contact', 'HomeController@updatecontact')
    ->name('admin.contact.update');
