<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Trademark;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function index()
    {
        return view("products.index", [
            'products' => Product::all() ->sortBy('name')
        ]);
    }

    public function create()
    {
        return view("products.create", [
            'trademarks' => Trademark::all()->sortBy('name')
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $product = Product::create($request->all());
        $product->trademarks()->attach($request->input("trademarks"));
        $product->uploadImage($request->file('image'));

        return redirect()->route('products.index')->with('success', 'Товар добавлен');
    }

    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
            'trademarks' => Trademark::all()->sortBy('name')
        ]);
    }

    public function update(Request $request, Product $product)
    {
         $request->validate([
            'title' => 'required'
        ]);

        $product ->update($request->all());
        $product->trademarks()->sync($request->input("trademarks"));

        $product->uploadImage($request->file("image"));

        return redirect()->route('products.index');
    }
    public function destroy($productId)
    {
        Product::find($productId)->remove();
        return back();
    }

    public function show($productSlug)
    {
        return view("products.show", [
            'product' => Product::where("slug", $productSlug)->first()
        ]);
    }

}
