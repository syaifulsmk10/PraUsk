<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat_topup = transaksi::where('type',1)
                                ->get();

        $riwayat_transaksi = transaksi::where('type', 2)
                                    ->get();

       $riwayat_withdaraw = transaksi::where('type',3)
                                    ->get();

        $riwayat_semua =        transaksi::all();
                      
        return view('riwayat_transaksi',[
            'riwayat_topup' => $riwayat_topup,
            'riwayat_transaksi' =>$riwayat_transaksi,
            'riwayat_withdaraw' => $riwayat_withdaraw,
            'riwayat_semua' => $riwayat_semua,
        ]);
    }
}