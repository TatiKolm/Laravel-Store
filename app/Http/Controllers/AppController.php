<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Trademark;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function mainPage()
    {
        return view("main", [
            'products' => Product::paginate(8)
        ]);
    }

    public function changeLocale(Request $request, $lang)
    {
        $request->session()->put('lang', $request->lang);
        return back();
    }
}
