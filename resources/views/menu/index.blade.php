@extends('layouts.app')

@section('content')
@if (Auth::user()->role == 'kantin')
    <div class="row justify-content-center mt-5">
        
<div class="col-md-6">
    <div class="card">
     <div class="card-header">
        <a href="{{ Route('menu.create') }}" class="btn btn-success">Tambah +</a>
     </div>
     <div class="card-body">
         <table class="table">
             <thead>
                 <tr>
                     <th>No</th>
                     <th>Produk</th>
                     <th>Harga</th>
                     <th>Jumlah</th>
                     <th>Foto</th>
                     <th>Aksi</th>    
                    
                 </tr>
             </thead>
             @php
                 $no =1;
             @endphp
            @foreach ($produk as $produks)
            <tbody>
             <tr>
                 <th>{{ $no++ }}</th>
                 <th>{{ $produks->name}}</th>
                 <th>{{ $produks->price }}</th>
                 <th>{{ $produks->stok }}</th>
                 <th>
                    <img src="{{ asset('image/'. $produks->foto) }}" alt="" style="width: 100px">
                 </th>
                 <th>
                    <a href="{{ Route('menu.edit', $produks->id) }}" class="btn btn-warning">Edit</a>
                   <form action="{{ Route('menu.delete', $produks->id) }}" method="post">
                    @csrf
                    @method('delete')

                    <button type="submit" onclick="return('yakin?')" class="btn btn-danger">delete</button>
                </form>
                 </th>
                
             </tr>
         </tbody>
            @endforeach
         </table>
      
        
     </div>
    </div>
 </div>
    </div>
 @endif

 @endsection