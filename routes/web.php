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
Route::get('getCookie', 'MyController@GetCookie');
Route::get('setCookie', 'MyController@SetCookie');

Route::get('uploadFile', function () {
    return view('profile');
});
Route::post('postFile', 'MyController@PostFile')->name('postFile');

// JSON
Route::get('getJson', 'MyController@getJson');
Route::get('time/{t}', 'MyController@viewTime');
// blade
Route::get('khoa-hoc/{str}', 'MyController@blade');

Route::get('qr/db', function () {
    $data = DB::table('users')->get();
    foreach($data as $row)
    {
        foreach ($row as $key => $value) {
            echo $key.":".$value."<br>";
            
        }
        echo "<hr>";
    }
});

Route::get('qr/update', function () {
    $data = DB::table('users')->where('id', 5)->update(['name'=>'website']);
    echo "da update";
});


Route::get('qr/where', function () {
    $data = DB::table('users')->where('id', '=', 6)->get();
    foreach($data as $row)
    {
        foreach ($row as $key => $value) {
            echo $key.":".$value."<br>";
            
        }
        echo "<hr>";
    }
});

Route::get('qr/select', function () {
    $data = DB::table('users')->select(['id', 'name', 'email'])->where('id', 5)->get();
    foreach($data as $row)
    {
        foreach ($row as $key => $value) {
            echo $key.":".$value."<br>";
            
        }
        echo "<hr>";
    }
});

Route::get('qr/raw', function () {
    $data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id', 5)->get();
    foreach($data as $row)
    {
        foreach ($row as $key => $value) {
            echo $key.":".$value."<br>";
            
        }
        echo "<hr>";
    }
});


// Route::get('database', function () {
//     Schema::create('theloai', function($table){
//         $table->increments('id');
//         $table->string('ten', 200)->nullable();
//         $table->string('nsx')->default('Nha san xuat');
//     });
//     echo "da tao bang";
// });

// Route::get('theloai', function () {
//     Schema::create('theloai', function($table){
//         $table->increments('id');
//         $table->string('ten', 200);
//     });
//     echo "da tao bang";
// });
// Route::get('lieketbang', function () {
//     Schema::create('sanpham', function($table){
//         $table->increments('id');
//         $table->string('ten', 200);
//         $table->float('gia');
//         $table->integer('soluong')->default(0);
//         $table->integer('id_loaisanpham')->unsigned();
//         $table->foreign('id_loaisanpham')->reference('id')->on('loaisanpham');
//     });
//     echo "da tao";
// });