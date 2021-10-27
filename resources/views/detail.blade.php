@extends('layout.panel')

@section('title')
<title>detail</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('pages')
<div class="container py-5">
    <div class="d-block rounded shadow">
        <div class="alert alert-secondary p-3">
            <h2 class="m-0">Halaman Detail Data</h2>
        </div>
        <div class="p-3">
            <div class="alert alert-info" role="alert">
                <p class="m-1">Total Pembayaran Bonus</p>
                <h4>Rp. {{ number_format($data->pembayaran,'0',',','.') }}</h4>
            </div>
        </div>
        <div class="p-3">
            <div class="d-flex mb-3">
                <h2 class="mb-0 fw-bold me-3 rounded bg-secondary py-2 px-3 text-white">A</h2>
                <div class="d-block">
                    <p class="d-block mb-1 fw-bold">Buruh A mendapatkan <span>{{ $data->buruh_a }}%</span> bonus </p>
                    Pendapatan sebesar <span class="fw-bold">Rp. {{ number_format((($data->buruh_a / 100 ) * $data->pembayaran ),'0',',','.') }}</span>
                </div>
            </div>
            <div class="d-flex mb-3">
                <h2 class="mb-0 fw-bold me-3 rounded bg-secondary py-2 px-3 text-white">B</h2>
                <div class="d-block">
                    <p class="d-block mb-1 fw-bold">Buruh B mendapatkan <span>{{ $data->buruh_b }}%</span> bonus </p>
                    Pendapatan sebesar <span class="fw-bold">Rp. {{ number_format((($data->buruh_b / 100 ) * $data->pembayaran ),'0',',','.') }}</span>
                </div>
            </div>
            <div class="d-flex mb-3">
                <h2 class="mb-0 fw-bold me-3 rounded bg-secondary py-2 px-3 text-white">C</h2>
                <div class="d-block">
                    <p class="d-block mb-1 fw-bold">Buruh C mendapatkan <span>{{ $data->buruh_c }}%</span> bonus </p>
                    Pendapatan sebesar <span class="fw-bold">Rp. {{ number_format((($data->buruh_c / 100 ) * $data->pembayaran ),'0',',','.') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

@endsection