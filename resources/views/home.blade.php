@extends('layout.panel')

@section('title')
<title>home</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('pages')
@if(auth('admin')->user())
<div class="container pt-4 mb-3">
    <div class="rounded shadow p-3">
        <h1 class="bd-title mt-0">Hello, {{ auth('admin')->user()->username }}</h1>
        <h5 class="bd-lead fw-normal">Selamat datang di aplikasi pembagian bonus buruh</h5>
        <h5 class="fw-normal">Type account admin</h5>
    </div>
</div>
@elseif(auth('user')->user())
<div class="container pt-4 mb-3">
    <div class="rounded shadow p-3">
        <h1 class="bd-title mt-0">Hello, {{ auth('user')->user()->username }}</h1>
        <h5 class="bd-lead fw-normal">Selamat datang di aplikasi pembagian bonus buruh</h5>
        <h5 class="fw-normal">Type account user</h5>
    </div>
</div>
@endif

<div class="container py-4">
    <div class="row gy-3">
        <livewire:table-bonus />
    </div>
</div>
@endsection


@section('script')

<script>
    $('#buruha').change(function() {
        var harga = $('#pembayaran').val();
        var total = ($(this).val() / 100) * harga;
        var format = $.number(total);
        console.log(format);
        $('#totalA').html(format);
    });
    $('#buruhb').change(function() {
        var harga = $('#pembayaran').val();
        var total = ($(this).val() / 100) * harga;
        var format = $.number(total);
        console.log(format);
        $('#totalB').html(format);
    });
    $('#buruhc').change(function() {
        var harga = $('#pembayaran').val();
        var total = ($(this).val() / 100) * harga;
        var format = $.number(total);
        console.log(format);
        $('#totalC').html(format);
    });

    $('#form').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        console.log(formData);
        $.ajax({
            url: "/create",
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#form').trigger("reset");
                if (response.success) {
                    Swal.fire(
                        'success!',
                        response.success,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Opps!',
                        response.error,
                        'error'
                    );
                }

            },
            error: function(response) {
                console.log(response);
                console.log('error data');
            },

        });
    });

    function fetch_data() {
        $.ajax({
            url: "/data/fetch_data",
            dataType: "json",
            success: function(data) {
                for (var count = 0; count < data.length; count++) {
                    html += '<tr>';
                    html += '<td>' + data[count].first_name + '</td>';
                    html += '<td>' + data[count].last_name + '</td>';
                    html += '<td><button type="button" class="btn btn-danger" id="' + data[count].id + '">Delete</button></td>';
                    html += '</tr>';
                }
                $('.t-row').html(html);
            }
        });
    }
</script>

@endsection