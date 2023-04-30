<?php

namespace App\Http\Controllers;

use App\Models\Trademark;
use Illuminate\Http\Request;

class TrademarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("trademarks.index", [
            'trademarks' => Trademark::all() ->sortBy('name')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trademarks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Trademark::create($request->all());

        return redirect()->route('trademarks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($trademarkId)
    {
        $trademark = Trademark::find($trademarkId);
        return view('trademarks.edit', [
            'trademark' => $trademark
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trademark $trademark)
    {
        
        $trademark->update($request->all()); 

        return redirect()->route("trademarks.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trademark $trademark)
    {
        $trademark -> delete();
        return back();
    }
}
