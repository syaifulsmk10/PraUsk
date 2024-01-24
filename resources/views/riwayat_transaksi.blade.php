@extends('layouts.app')
@section('content')




@if (Auth::user()->role == 'kantin')


<div class="col-md-12">
    <div class="card">
     <div class="card-header">
         <h5 class="fw-bold">#Check Out</h5>
     </div>
     <div class="card-body">
         <table class="table">
             <thead>
                 <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>Produk</th>
                     <th>Total Harga</th>
                     <th>invoice</th>
                     <th>status</th>
                 </tr>
             </thead>
             @php
                 $no =1;
             @endphp
           @foreach ($riwayat_transaksi as $riwayat_transaksis)
               
      
            <tbody>
             <tr>
                 <td>{{ $no++ }}</td>
                 <td>{{ $riwayat_transaksis->user->name }}</td>
                 <td>{{ $riwayat_transaksis->produk->name }}</td>
                 <td>{{ $riwayat_transaksis->produk->price * $riwayat_transaksis->quantity }}</td>
                 <td>{{ $riwayat_transaksis->order_id }}</td>
                 <td>
                    @if ($riwayat_transaksis->status === 1)
                        Cart
                    @endif
                    @if ($riwayat_transaksis->status === 2)
                        Check Out
                    @endif
                    @if ($riwayat_transaksis->status === 3)
                        Pending
                    @endif
                    @if ($riwayat_transaksis->status === 4)
                        Di Setujui
                    @endif
                    @if ($riwayat_transaksis->status === 5)
                        Di Tolak
                    @endif
                 </td>
             </tr>
         </tbody>
         @endforeach
        
         </table>
     
         <div class="card-footer">
            <button onclick="window.print();" class="btn btn-primary">Print</button>
         </div>
     </div>
    </div>
 </div>
</div>
</div>




  
@endif


@if (Auth::user()->role == 'bank')

 <div class="container py-5">
<div class="row">
<div class="col-md-12">
    <div class="card">
     <div class="card-header fw-bold fs-4 text-center">TOP UP</div>
     <div class="card-body">
         <table class="table">
             <thead>
                 <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>Top Up</th>
                     <th>Invoice</th>
                     <th>Status</th>

                 </tr>
             </thead>
             @php
                 $no = 1;
             @endphp
             @foreach ($riwayat_topup as $riwayat_topups)
             <tbody>
                <tr>
                 <td>{{ $no++ }}</td>
                 <td>{{ $riwayat_topups->user->name }}</td>
                 <td>{{ $riwayat_topups->quantity }}</td>
                 <td>{{ $riwayat_topups->order_id }}</td>
                 <td>
                @if ($riwayat_topups->status === 1)
                    Pending
                @endif
                @if ($riwayat_topups->status === 2)
                Disetujui
                @endif
                @if ($riwayat_topups->status === 3)
                    Ditolak
                @endif
                 </td>
                </tr>
             </tbody>
             @endforeach
         </table>
     </div>
    </div>
 </div>     
 
 

 <div class="col-md-12">
    <div class="card mt-5">
     <div class="card-header fw-bold fs-4 text-center">Withdraw</div>
     <div class="card-body">
         <table class="table">
             <thead>
                 <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>Top Up</th>
                     <th>Invoice</th>
                     <th>Status</th>

                 </tr>
             </thead>
             @php
                 $no = 1;
             @endphp
             @foreach ($riwayat_withdaraw as $riwayat_withdaraws)
             <tbody>
                <tr>
                 <td>{{ $no++ }}</td>
                 <td>{{ $riwayat_withdaraws->user->name }}</td>
                 <td>{{ $riwayat_withdaraws->quantity }}</td>
                 <td>{{ $riwayat_withdaraws->order_id }}</td>
                 <td>
                @if ($riwayat_withdaraws->status === 1)
                    Pending
                @endif
                @if ($riwayat_withdaraws->status === 2)
                Disetujui
                @endif
                @if ($riwayat_withdaraws->status === 3)
                    Ditolak
                @endif
                 </td>
                </tr>
             </tbody>
             @endforeach
         </table>
     </div>
    </div>
    <button onclick="window.print();" class="btn btn-primary mt-5">Print</button>
 </div>      
</div>
</div>




  
@endif


@if (Auth::user()->role == 'siswa')
    
<div class="col-md-12">
    <div class="card">
     <div class="card-header">
         <h5 class="fw-bold">#Check Out</h5>
     </div>
     <div class="card-body">
         <table class="table">
             <thead>
                 <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>Produk</th>
                     <th>Jumlah</th>
                     <th>Jenis</th>
                     <th>invoice</th>
                     <th>status</th>
                 </tr>
             </thead>
             @php
                 $no =1;
             @endphp
           @foreach ($riwayat_semua as $riwayat_semuaa)
               
      
            <tbody>
             <tr>
                {{-- @if ( && $riwayat_semuaa->status==2) --}}

                 <td>{{ $no++ }}</td>
                 <td>{{ $riwayat_semuaa->user->name }}</td>
                @if ($riwayat_semuaa->type === 2)
                    <td>{{ $riwayat_semuaa->produk->name }}</td>
                @else
                    <td>null</td>
                @endif


                @if ($riwayat_semuaa->type === 1  )
                    <td>Rp. {{ $riwayat_semuaa->quantity }}</td>
                @elseif ($riwayat_semuaa->type === 3)
                    <td>Rp. {{ $riwayat_semuaa->quantity }}</td>
                    
                @else
                    <td>Rp. {{ $riwayat_semuaa->produk->price * $riwayat_semuaa->quantity }}</td>

                @endif

                   
                
                 <td>
                    @if ($riwayat_semuaa->type === 1)
                        Top Up
                    @endif
                    @if ($riwayat_semuaa->type === 2)
                        Jajan
                    @endif
                    @if ($riwayat_semuaa->type === 3)
                        Tarik Tunai
                    @endif
                 </td>
                 <td>{{ $riwayat_semuaa->order_id }}</td>
                 <td>
                    @if ($riwayat_semuaa->type === 1 && $riwayat_semuaa->status==1)
                        Pending
                    @endif
                    @if ($riwayat_semuaa->type === 1 && $riwayat_semuaa->status==2)
                        Top Sukses
                    @endif
                    @if ($riwayat_semuaa->type === 2 && $riwayat_semuaa->status==3)
                        Pending
                    @endif
                    @if ($riwayat_semuaa->type === 2 && $riwayat_semuaa->status==4)
                        Jajan Sukses
                    @endif
                    @if ($riwayat_semuaa->type === 3 && $riwayat_semuaa->status==1)
                        Pending
                    @endif
                    @if ($riwayat_semuaa->type === 3 && $riwayat_semuaa->status==2)
                        Penarikan Sukses
                    @endif
                 </td>
             </tr>
         </tbody>
         @endforeach
        
         </table>
     
         <div class="card-footer">
            <button onclick="window.print();" class="btn btn-primary">Print</button>
         </div>
     </div>
    </div>
 </div>
</div>
</div>


@endif
@endsection