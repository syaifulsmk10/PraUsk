<?php

namespace App\Http\Controllers;

use App\Models\saldo;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saldo = saldo::where('user_id', Auth::user()->id)->first();
        
        return view('topup', compact('saldo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->type == 1) {
            $order_id = "SAL." . Auth::user()->id . now()->timestamp;


          transaksi::create([
            
        'user_id' => Auth::user()->id,
        'quantity' => $request->quantity,
        'type' => $request->type,
        'status' => 1,
        'order_id'=> $order_id, 
 
          ]);

          return redirect()->back()->with('status', 'Top Up sedang di proses',);
            
        }

       
    }

    /**
     * Display the specified resource.
     */
    public function show(saldo $saldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(saldo $saldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $transaksi_id)
    {
        $transaksi = transaksi::find($transaksi_id);
        
        $saldo = saldo::where('user_id', $transaksi->user->id)->first();

        saldo::where('user_id', $transaksi->user->id)->update([
            'saldo' => $transaksi->quantity + $saldo->saldo 
        ]);


        $transaksi->update([
           'status' => 2, 
        ]);


        return redirect()->back()->with('status', "Top Up di setujui");
        

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $transaksi_id)
    {
        $transaksi = transaksi::find($transaksi_id);

        $transaksi->delete([]);

        return redirect()->back()->with('status', "Top Up ditolak");
    }
}