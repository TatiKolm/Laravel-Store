<?php

namespace App\Http\Controllers;

use App\Models\Trademark;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function mainPage()
    {
        return view("main", [
            'trademarks' => Trademark::all()->sortBy('name')
        ]);
    }

    public function changeLocale(Request $request, $lang)
    {
        $request->session()->put('lang', $request->lang);
        return back();
    }
}
