@extends('layouts.app')

@section('content')

@if (Auth::user()->role == 'bank')
 <div class="container pt-5">
    <div class="row">
        
    
        <div class="col-md-6">
           <div class="card">
            <div class="card-header fw-bold fs-4 text-center bg-warning">TOP UP</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Top Up</th>
                            <th>Invoice</th>
                            <th>Aksi</th>
    
                        </tr>
                    </thead>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pengajuans as $pengajuan)
                    <tbody>
                       <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pengajuan->user->name }}</td>
                        <td>{{ $pengajuan->quantity }}</td>
                        <td>{{ $pengajuan->order_id }}</td>
                        <td>
                            <a href="{{ Route('topup.setuju', $pengajuan->id) }}" class="btn btn-success">Terima</a>
                            <a href="{{ Route('topup.tolak', $pengajuan->id) }}" class="btn btn-danger">Tolak</a>
                        </td>
                       </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
           </div>
        </div>
   


        <div class="col-md-6">
           <div class="card">
            <div class="card-header fw-bold fs-4 text-center bg-primary">Tarik Tunai</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Top Up</th>
                            <th>Invoice</th>
                            <th>Aksi</th>
    
                        </tr>
                    </thead>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pengajuans_tunai as $pengajuan_tunai)
                    <tbody>
                       <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pengajuan_tunai->user->name }}</td>
                        <td>{{ $pengajuan_tunai->quantity }}</td>
                        <td>{{ $pengajuan_tunai->order_id }}</td>
                        <td>
                            <a href="{{ Route('tariktunai.setuju', $pengajuan_tunai->id) }}" class="btn btn-success">Terima</a>
                            <a href="{{ Route('tariktunai.tolak', $pengajuan_tunai->id) }}" class="btn btn-danger">Tolak</a>
                        </td>
                       </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
           </div>
        </div>

    </div>
</div>

@endif

@if (Auth::user()->role == 'kantin')


<div class="col-md-12">
    <div class="card">
     <div class="card-header">
         <h5 class="fw-bold">Acc Produk</h5>
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
                     <th>Aksi</th>
                 </tr>
             </thead>
             @php
                 $no =1;
             @endphp
           @foreach ($pengajuans_jajan as $pengajuan_jajan)
               
      
            <tbody>
             <tr>
                 <td>{{ $no++ }}</td>
                 <td>{{ $pengajuan_jajan->user->name }}</td>
                 <td>{{ $pengajuan_jajan->produk->name }}</td>
                 <td>{{ $pengajuan_jajan->produk->price * $pengajuan_jajan->quantity }}</td>
                 <td>{{ $pengajuan_jajan->order_id }}</td>
                 <td>
                    <a href="{{ Route('bayar.setuju', $pengajuan_jajan->id) }}" class="btn btn-success">Setuju</a>
                    <a href="{{ Route('bayar.tolak', $pengajuan_jajan->id) }}" class="btn btn-danger">Tolak</a>
                 </td>
             </tr>
         </tbody>
         @endforeach
        
         </table>
     
         <div class="card-footer">
           
         </div>
     </div>
    </div>
 </div>
</div>
</div>




  
@endif
@endsection
