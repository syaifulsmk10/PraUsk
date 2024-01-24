<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\produk;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = produk::all();
        return view('menu.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $produk = produk::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move("image/", $request->file('foto')->getClientOriginalName());
            $produk->foto = $request->file('foto')->getClientOriginalName();
            $produk->save();
        }   

        
        return redirect('menu')->with("status", "Berhasil tambah produk");
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = produk::find($id);
        return view('menu.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $produk = produk::find($id);
        $produk->update($request->all());
        return redirect('menu')->with("status", "Berhasil edit produk");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = produk::find($id);
        $produk->delete();
        return redirect('menu')->with("status", "Berhasil hapus produk");
        
    }
}