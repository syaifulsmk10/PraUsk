<?php

namespace App\Http\Controllers;

use App\Models\saldo;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TariktunaiController extends Controller
{
    public function index()
    {
        
        $saldo = saldo::where('user_id', Auth::user()->id)->first();
        return view('withdraw', compact('saldo'));
    }

    public function store(Request $request)
    {
        if ($request->type == 3) {
            $order_id = "WTH." . Auth::user()->id . now()->timestamp;


          transaksi::create([
            
        'user_id' => Auth::user()->id,
        'quantity' => $request->quantity,
        'type' => $request->type,
        'status' => 1,
        'order_id'=> $order_id, 
 
          ]);

          return redirect()->back()->with('status', 'Tarik Tunai sedang di proses',);
            
        }

       
    }


    public function update(Request $request, $transaksi_id)
    {
        $transaksi = transaksi::find($transaksi_id);
        
        $saldo = saldo::where('user_id', $transaksi->user->id)->first();

        saldo::where('user_id', $transaksi->user->id)->update([
            'saldo' => $saldo->saldo -  $transaksi->quantity 
        ]);


        $transaksi->update([
           'status' => 2, 
        ]);


        return redirect()->back()->with('status', "Tarik Tunai di setujui");
        

        
    }

    public function destroy($transaksi_id)
    {
        $transaksi = transaksi::find($transaksi_id);

        $transaksi->delete([]);

        return redirect()->back()->with('status', "Tarik Tunai ditolak");
    }
}