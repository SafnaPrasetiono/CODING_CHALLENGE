@extends('layout.panel')

@section('title')
<title>About</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('pages')
<div class="container py-4">
    <div class="row gy-3">
        <div class="col-12">
            <div class="rounded shadow p-3">
                <h1 class="bd-title mt-0 mb-3 text-capitalize">aplikasi pembagian bonus buruh </h1>
                <h5 class="bd-lead fw-normal">Aplikasi ini merupakan aplikasi pembagian atas hasil bonus buruh berdasarkan persentase sebanyak 3 buruh dari 100 presentase.</h5>
            </div>
        </div>
        <div class="col-12">
            <div class="rounded shadow overflow-hidden">
                <div class="alert alert-secondary p-3 mb-0 rounded-0">
                    <h4 class="bd-title mt-0 text-capitalize">!Account</h4>
                </div>
                <div class="d-block p-3">
                    <div class="d-block mb-3">
                        <h5 class="bd-lead fw-bold">Admins Account</h5>
                        <p>Dengan admin account ini anda dapat mengakses seluruh fitur dari aplikasi ini, diantaranya seperti :</p>
                        <ol>
                            <li>Menambahkan Bonus Buruh</li>
                            <li>Mengupdate Bonus Buruh</li>
                            <li>Melihat Detail Bonus Buruh</li>
                            <li>Menghapus Bonus Buruh</li>
                        </ol>
                    </div>
                    <div class="d-block mb-3">
                        <h5 class="bd-lead fw-bold">User Account</h5>
                        <p>Dengan user account ini anda hanya dapat mengakses sebagian fitur dari aplikasi ini, diantaranya seperti :</p>
                        <ol>
                            <li>Melihat Detail Bonus Buruh</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

@endsection