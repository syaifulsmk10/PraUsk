<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengajuans = transaksi::where('type',1)
                                ->where('status',1)
                                ->get();

        $pengajuans_jajan = transaksi::where('type', 2)
                                    ->where('status',3)
                                    ->get();

       $pengajuans_tunai = transaksi::where('type',3)
                                    ->where('status',1)
                                    ->get();
                                

         
                                
        return view('home',[
            'pengajuans' => $pengajuans,
            'pengajuans_jajan' =>$pengajuans_jajan,
            'pengajuans_tunai' => $pengajuans_tunai,
        ]);
    }
}