<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
