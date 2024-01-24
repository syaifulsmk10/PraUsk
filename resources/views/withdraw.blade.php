@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5" >
                <div class="card-header" style="background-color: yellow">Tarik Tunai</div>
                <div class="card-body">
                    <h1>Rp {{ $saldo->saldo }}</h1>

                    <form action="{{ Route('tariktunai.saldo') }}" method="POST">
                        @csrf
                        <input type="number" class="form-control" name="quantity">
                        <input type="hidden" name="type" value="3">

                        <button class="btn btn-primary mt-3" type="submit">Top up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
