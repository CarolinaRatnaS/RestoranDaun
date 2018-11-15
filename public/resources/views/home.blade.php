@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-0" style="text-align: center;">
            <img src="{{ asset('images/logo.png') }}" style="height: 240px; width: auto;" alt="Restoran Daun">
            <br/>
            <a href="{{ route('makanan.index') }}" style="font-size: 20px;" class="btn btn-success">Pesan Sekarang</a>
        </div>
    </div>
</div>
@endsection
