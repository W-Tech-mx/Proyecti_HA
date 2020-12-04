<?php
Route::get('/', function () {
    return view('books');
});
Route::resource('books','BookController');
