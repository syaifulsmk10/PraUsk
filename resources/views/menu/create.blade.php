@extends('layouts.app')

@section('content')
@if (Auth::user()->role == 'kantin')
    <div class="row justify-content-center mt-5">
        
<div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Tambah Produk
            </div>
            <div class="card-body">
                <form action="{{ Route('menu.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Harga</label>
                        <input type="text" name="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Stok</label>
                        <input type="text" name="stok" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <button class="btn btn-success mt-3">Tambah +</button>
                 </div>
                </form>
            </div>
        </div>
    </div>
 @endif

 @endsection