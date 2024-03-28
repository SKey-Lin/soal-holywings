<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/', function () {
        return redirect("/login");
    });

    Route::get('/login', function () {
      return view('index');
    })->name('login');

    Route::group(['middleware' => ['guest']], function() {
      Route::post('/login', 'AuthController@login')->name('login.action');

    });

    Route::group(['middleware' => ['auth']], function() {

      // Route::resource('books', BookController::class);
      // Route::resource('categories', BookCategoryController::class);

      Route::get('/books', 'BookController@index')->name("books.index");
      Route::get('/books/create', 'BookController@create')->name("books.create");
      Route::get('/books/edit/{book}', 'BookController@edit')->name("books.edit");

      Route::post('/books/store', 'BookController@store')->name("books.store");
      Route::put('/books/{book}', 'BookController@update')->name("books.update");
      Route::delete('/books/{book}', 'BookController@destroy')->name("books.destroy");
      Route::get('/books/{book}', 'BookController@show')->name("books.show");

      Route::get('/categories', 'BookCategoryController@index')->name("categories.index");
      Route::get('/categories/create', 'BookCategoryController@create')->name("categories.create");
      Route::get('/categories/edit/{category}', 'BookCategoryController@edit')->name("categories.edit");

      Route::post('/categories/store', 'BookCategoryController@store')->name("categories.store");
      Route::delete('/categories/{category}', 'BookCategoryController@destroy')->name("categories.destroy");
      Route::put('/categories/{category}', 'BookCategoryController@update')->name("categories.update");

      Route::get('/loans', 'BookLoanController@index')->name("loans.index");
      Route::get('/loans/borrow', 'BookLoanController@borrow')->name("loans.borrow");
      Route::post('/loans/store', 'BookLoanController@store')->name("loans.store");
      Route::put('/loans/return/{loan}', 'BookLoanController@return')->name("loans.return");
      Route::put('/loans/lost/{loan}', 'BookLoanController@lost')->name("loans.lost");


      Route::get('/logout', 'AuthController@logout')->name('logout.action');
    });
});