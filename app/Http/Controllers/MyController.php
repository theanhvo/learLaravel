<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class MyController extends Controller
{
    public function XinChao()
    {
        echo "Chao Cac ban tre";
    }

    public function KhoaHoc($ten)
    {
        echo "Khoa hoc: $ten";
        return redirect()->route('route2');
    }

    public function GetUrl(Request $request)
    {
        if ($request->is('My*')) { // is la check partern
            echo "la mycontrol";
        } else {
            echo "not mycontrol";
        }
        
        // if ($request->isMethod('get')) {
        //     echo "method get";
        // } else {
        //     echo "not method get";
        // }
    }

    public function PostForm(Request $request)
    {
        echo "Ten cua ban là: ";
        echo $request->HoTen;
    }

    public function GetCookie(Request $request)
    {
        echo "Ho ten cua ban la: ";
        return $request->cookie('hoten');
    }

    public function SetCookie(Request $request)
    {
        $response = new Response();
        $response->withCookie(
            'hoten',
            'van binh',
            1
        );
        return $response;
    }

    public function postFile(Request $request)
    {
        if ($request->hasFile('myFile')){
            $file = $request->file('myFile');
            $file->move('img', 'myFile.jpg');
        } else {
            echo "ko co file";
        }
        
    }

    public function getJson(Request $request)
    {
        // $array  = ['Laravel', 'php', 'mysql'];
        $array  = ['Khoa hoc' => 'Laravel'];
        return response()->json($array);
    }

    public function myView(Request $request)
    {
        
        return view('myView');
    }

    public function viewTime($t)
    {
        
        return view('myView', ["time" => $t]);
    }

    public function blade($str)
    {
        $khoahoc1 = "Laravel - anhvt";
        if ($str == "laravel") {
            return view("pages.laravel", ['khoahoc1' => $khoahoc1]);
        } elseif($str == "php") {
            return view("pages.php", ['khoahoc1' => $khoahoc1]);
        }
    }
}
