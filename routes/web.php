<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;


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

Route::get('/khoahoc', function () {
    echo "test khoa hoc";
});

Route::get('/khoahoc/{id}', function ($id) {
    echo "<h1> test $id";
})->where(['id' => '[0-9]+']);


Route::get('page', function () {
    echo "ve page ne ma";
})->name('route2'); // name định danh

Route::get('pagecon', function () {
    return redirect()->route('route2'); // redirect về biến định danh
});

Route::group(['prefix' => 'MyGroup'], function () {
    Route::get('user1', function () {
        echo "user1";
    });
});

Route::get('GetMyController', 'MyController@XinChao');
Route::get('tham-so/{ten}', 'MyController@KhoaHoc');

Route::get('my-request', 'MyController@GetUrl');


Route::get('getForm', function () {
    return view('postForm');
});
Route::post('postForm', 'MyController@PostForm')->name('postForm');