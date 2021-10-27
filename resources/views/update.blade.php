@extends('layout.panel')

@section('title')
<title>update</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('pages')
<div class="container py-5">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="d-block rounded shadow">
                <div class="alert alert-secondary p-3">
                    <h2 class="">Update Data</h2>
                </div>
                <form method="post" id="form" class="p-3">
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Pembayaran</label>
                        <div class="col-sm-10">
                            <input type="text" name="pembayaran" class="form-control" id="pembayaran" value="{{ $data->pembayaran }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="buruha" class="col-sm-2 col-form-label">Buruh A</label>
                        <div class="col-sm-5 col-md-3">
                            <div class="input-group">
                                <input type="number" name="buruhA" class="form-control" id="buruha" value="{{ $data->buruh_a }}">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <label for="buruha" class="col-12 col-sm-5 col-md-7 col-form-label">
                            Total Bonus Rp. <span class="fw-bold" id="totalA">{{ number_format(( $data->buruh_a / 100) *  $data->pembayaran) }}</span>
                        </label>
                    </div>
                    <div class="mb-3 row">
                        <label for="buruhb" class="col-sm-2 col-form-label">Buruh B</label>
                        <div class="col-sm-5 col-md-3">
                            <div class="input-group">
                                <input type="number" name="buruhB" class="form-control" id="buruhb" value="{{ $data->buruh_b }}">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <label for="buruha" class="col-12 col-sm-5 col-md-7 col-form-label">
                            Total Bonus Rp. <span class="fw-bold" id="totalB">{{ number_format(( $data->buruh_b / 100) *  $data->pembayaran) }}</span>
                        </label>
                    </div>
                    <div class="mb-3 row">
                        <label for="buruhc" class="col-sm-2 col-form-label">Buruh C</label>
                        <div class="col-sm-5 col-md-3">
                            <div class="input-group">
                                <input type="number" name="buruhC" class="form-control" id="buruhc" value="{{ $data->buruh_c }}">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <label for="buruha" class="col-12 col-sm-5 col-md-7 col-form-label">
                            Total Bonus Rp. <span class="fw-bold" id="totalC">{{ number_format(( $data->buruh_c / 100) *  $data->pembayaran) }}</span>
                        </label>
                    </div>
                    <button id="create" type="submit" class="btn btn-primary px-5">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

<script>
    $('#buruha').change(function() {
        var harga = $('#pembayaran').val();
        var total = ($(this).val() / 100) * harga;
        var format = $.number(total);
        $('#totalA').html(format);
    });
    $('#buruhb').change(function() {
        var harga = $('#pembayaran').val();
        var total = ($(this).val() / 100) * harga;
        var format = $.number(total);
        $('#totalB').html(format);
    });
    $('#buruhc').change(function() {
        var harga = $('#pembayaran').val();
        var total = ($(this).val() / 100) * harga;
        var format = $.number(total);
        $('#totalC').html(format);
    });

    $('#form').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        console.log(formData);
        $.ajax({
            url: "/update/post",
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    Swal.fire(
                        'success!',
                        response.success,
                        'success'
                    );
                } else {
                    $('#form').trigger("reset");
                    var harga = $('#pembayaran').val();
                    var totala = $.number(($('#buruha').val() / 100) * harga);
                    var totalb = $.number(($('#buruhb').val() / 100) * harga);
                    var totalc = $.number(($('#buruhc').val() / 100) * harga);
                    $('#totalA').html(totala);
                    $('#totalB').html(totalb);
                    $('#totalC').html(totalc);
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
</script>

@endsection