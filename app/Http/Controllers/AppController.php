<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\Trademark;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function mainPage()
    {
        $products = Product::all();

        if(isset($_GET['search'])){
            $products = Product::where("title", "like", "%".$_GET['search']."%")->get();
        }

        return view("main", [
            'products' => $products,
        ]);
    }

    public function changeLocale(Request $request, $lang)
    {
        $request->session()->put('lang', $request->lang);
        return back();
    }

    public function addPrice()
    {
        $products = Product::all();
        foreach($products as $product)
        {
            $product->price = fake()->numberBetween(5000, 100000);
            $product->save();
        }
    }

    public function showProduct($productSlug)
    {
        return view('product-page', [
            'product' => Product::where('slug', $productSlug)->first()
        ]);
    }

   
    public function newsPage()
    {
        return view('news', [
            'articles' => Article::all()
        ]);
    }

    public function getProductBYTrademark($trademarkSlug)
    {
        $trademark = Trademark::where("slug", $trademarkSlug)->first();
        return view('catalog', [
            'products' => $trademark->products, 
        ]);
    }
}
