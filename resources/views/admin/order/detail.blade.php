@extends('admin.layouts.layout')

@section('content')
    <div class="pagetitle">
        <h1>Sifariş</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Sifariş</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="row">
            @foreach ($order->order_products as $item)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <p><b>İstifadəçi : </b> {{ $order->user?->name }}</p>
                        </div>
                        <div class="card-body">
                            <p><b>Məhsul : </b> {{ $item->product_name }}</p>
                            <p><b>Məhsulun qiyməti : </b> {{ $item->product_price }}</p>
                            <p><b>Sayı : </b> {{ $item->count }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <a href="{{ route('admin.orders') }}" class="btn btn-secondary">Geri</a>
@endsection
