<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\saldo;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = produk::all();
        $cart = transaksi::where('user_id', Auth::user()->id)->where('type',2)->where('status',1)->get();
        $chekout = transaksi::where('user_id', Auth::user()->id)->where('type',2)->where('status',2)->get();

        $total_cart= 0;
        $total_chekout= 0;

        foreach ($cart as $carts) {
            $total_cart += $carts->produk->price * $carts->quantity;
        }

        foreach ($chekout as $chekouts) {
            $total_chekout += $chekouts->produk->price * $chekouts->quantity;
        }

           
        return view('produk', 
        [
            'produk' => $produk,
            'cart' => $cart,
            'total_cart' => $total_cart,
            'chekout' => $chekout,
            'total_chekout' => $total_chekout,
        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        transaksi::create([
             'user_id' => Auth::user()->id,
             'produk_id' => $request->produk_id,
             'quantity' => $request->quantity,
             'type' => 2,
             'status' => 1,
             
             
        ]);

        return redirect()->back()->with('status', "Berhasil Tambah Ke Cart");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order_id = "INV." . Auth::user()->id . now()->timestamp;

         transaksi::where('user_id', Auth::user()->id)->where('type',2)->where('status',1)->update([
            'status' => 2,
            'order_id' => $order_id
        ]);

        return redirect()->back()->with("status", "Berhasil Tambah Cart");
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produk $produk)
    {
        $data = transaksi::where('user_id', Auth::user()->id)->where('type',2)->where('status', 2)->get();
        $total_data= 0;


        foreach ($data as $datas) {
            $total_data += $datas->produk->price * $datas->quantity;
        }

        $saldo = saldo::where('user_id', Auth::user()->id)->first();
        
        $saldo->update([
            'saldo' => $saldo->saldo - $total_data,
        ]);

        foreach ($data as $datas) {
            if ($datas->produk->stok >= $datas->quantity) {
                $datas->produk->update([
                    'stok' => $datas->produk->stok - $datas->quantity
                ]);
            }
        }

        

        foreach ($data as $datas) {
            $datas->update([
                'status' =>  3,  
            ]);
        }

        return redirect()->back()->with("status", "Bayar berhasil tunggu konfirmasi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        //
    }

    public function setuju($id)
    {
        $transaksi = transaksi::find($id);

        $transaksi->update([
            'status' => 4,
        ]);

        return redirect()->back()->with('status', "Jajan Disetujui");
    }

    public function tolak($id)
    {
        $transaksi = transaksi::find($id);
        
        $total_data = 0;

        if ($transaksi->data && $transaksi->data->isNotEmpty()) {
            foreach ($transaksi->data as $datas) {
                $total_data += $datas->produk->price * $datas->quantity;
            }
        }

        $saldo = saldo::where('user_id', $transaksi->user_id)->first();
        
        $saldo->update([
           'saldo' => $saldo->saldo + $total_data 
        ]);

        
        $transaksi->update([
            'status' => 5,
        ]);

        return redirect()->back()->with('status', "Jajan Ditolak");
    }

    
}