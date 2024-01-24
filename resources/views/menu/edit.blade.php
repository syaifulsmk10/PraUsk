@extends('layouts.app')

@section('content')
@if (Auth::user()->role == 'kantin')
    <div class="row justify-content-center mt-5">
        
<div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Edit Produk
            </div>
            <div class="card-body">
                <form action="{{ Route('menu.update', $produk->id )}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('Put')
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $produk->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Harga</label>
                        <input type="text" name="price" class="form-control" value="{{ $produk->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Stok</label>
                        <input type="text" name="stok" class="form-control" value="{{ $produk->stok }}">
                    </div>
                    <button class="btn btn-success mt-3">Edit</button>
                 </div>
                </form>
            </div>
        </div>
    </div>
 @endif

 @endsection