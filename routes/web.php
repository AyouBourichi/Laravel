<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact/new', function () {
    return view('contacts.add_contact');
})->name('new_contact');;

Route::get('/contact/list', 'ContactController@showContacts')->name('show_contact');
Route::post('/contact/store', 'ContactController@storeContact');
Route::get('/contact/update/{id}', 'ContactController@updateContactForm')->name('update_contact_form');
Route::post('/contact/update', 'ContactController@updateContact');
Route::post('/contact/delete/{id}', 'ContactController@deleteContact')->name('delete_contact');
