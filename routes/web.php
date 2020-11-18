<?php

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

// Route Test #############
Route::get('teste','TestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->namespace('Admin')->group(function(){

   Route::resources([
      'sections' => 'SectionController',
      'contents' => 'ContentController',
      'users' => 'UserController',
   ]);
 
});

// Route public 
Route::get('/','Accessible\ArticleController@index')->name('article.index');
Route::get('/article/{id}','Accessible\ArticleController@show');  
