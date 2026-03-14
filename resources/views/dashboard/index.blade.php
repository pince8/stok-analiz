@extends('layouts.admin')

@section('content')

    <h2 class="mb-4">Dashboard</h2>

    <div class="row">

        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">

                    <h5>Toplam Ürün</h5>
                    <h3>{{ $totalProducts }}</h3>

                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">

                    <h5>Kritik Stok</h5>
                    <h3>{{ $criticalStock }}</h3>

                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">

                    <h5>Toplam Stok</h5>
                    <h3>{{ $totalStock }}</h3>

                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">

                    <h5>Toplam Stok Değeri</h5>
                    <h3>{{ number_format($totalValue,2) }} ₺</h3>

                </div>
            </div>
        </div>

    </div>

@endsection
