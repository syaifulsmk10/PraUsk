@extends('layouts.app')
@section('content')

<div class="" id="home">
    <div class="container-fluid banner d-flex">
        <div class="container d-flex justify-content-center align-items-center">
           <div class="text-center">
            <h1 class="text-light mb-4 fw-bold" style="font-size: 60px">Selamat Datang</h1>
            <h3 class="text-light fw-bold" style="30px">Ingin Makan Apa Sekarang ?</h3>
           </div>
        </div>
    </div>
</div>

    
<div class="container">
    <div class="text mt-5">
        <h1 class="fw-bold text-center mb-5" id="produk">Produk Kami</h1>
    </div>
    <div class="row justify-content-center">
        @foreach ($produk as $produks)
        <div class="col-md-3">
            <div class="card mt-5">
                <img src="{{ asset('image/'. $produks->foto) }}" alt="" class="img-fluid    ">

                <div class="card-body">
                  <div class="card-title">
                    <h4 class="fw-bold text-center">{{ $produks->name }}</h4>
                  </div>
                  <div class="card-body">
                    <p>{{ $produks->desc }}</p>
                    <h5 class="fw-bold text-warning">Rp. {{ $produks->price }}</h5>

                    <form action="{{ Route('addtocart', $produks->id) }}" method="post">
                        @csrf
                        <input type="number" name="quantity" class="form-control" min="1" value="1">
                        <input type="hidden" name="produk_id" value="{{ $produks->id }}">

                        <button class="rounded-pill bg-warning mt-4" style="border: 2px solid red">Tambah Cart</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container">
    <div class="text mt-5">
        <h1 class="fw-bold text-center mb-5" id="cart">Cart</h1>
    </div>
    <div class="row">
        {{-- @foreach ($produk as $produks) --}}
        <div class="col-md-6">
           <div class="card">
            <div class="card-header">
                <h5 class="fw-bold">#Cart</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    @php
                        $no =1;
                    @endphp
                   @foreach ($cart as $carts)
                   <tbody>
                    <tr>
                        <th>{{ $no++ }}</th>
                        <th>{{ $carts->produk->name }}</th>
                        <th>{{ $carts->produk->price }}</th>
                        <th>{{ $carts->quantity }}</th>
                        <th>{{ $carts->quantity * $carts->produk->price }}</th>
                    </tr>
                </tbody>
                   @endforeach
                </table>
                <div><h5 class="fw-bold my-4">Total : {{ $total_cart }}</h5></div>
                <div class="card-footer">
                    <a href="{{ Route('chekout') }}" class="btn btn-success">Check Out</a>
                </div>
            </div>
           </div>
        </div>
        {{-- @endforeach --}}
        <div class="col-md-6">
            <div class="card">
             <div class="card-header">
                 <h5 class="fw-bold">#Check Out</h5>
             </div>
             <div class="card-body">
                 <table class="table">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Produk</th>
                             <th>Harga</th>
                             <th>Jumlah</th>
                             <th>Total Harga</th>
                         </tr>
                     </thead>
                     @php
                         $no =1;
                     @endphp
                    @foreach ($chekout as $chekouts)
                    <tbody>
                     <tr>
                         <th>{{ $no++ }}</th>
                         <th>{{ $chekouts->produk->name }}</th>
                         <th>{{ $chekouts->produk->price }}</th>
                         <th>{{ $chekouts->quantity }}</th>
                         <th>{{ $chekouts->quantity * $chekouts->produk->price }}</th>
                     </tr>
                 </tbody>
                    @endforeach
                 </table>
                 <div><h5 class="fw-bold my-4">Total : {{ $total_chekout }}</h5></div>
                 <div class="card-footer">
                     <a href="{{ Route('bayar') }}" class="btn btn-success">Bayar</a>
                 </div>
             </div>
            </div>
         </div>
    </div>
</div>

@endsection