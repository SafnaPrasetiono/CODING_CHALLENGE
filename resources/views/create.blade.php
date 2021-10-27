@extends('layout.panel')

@section('title')
<title>home</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('pages')
<div class="container py-4">
    <div class="row">
        @if(auth('admin')->user())
        <div class="col-12 mb-3">
            <div class="d-block rounded shadow overflow-hidden">
                <div class="alert alert-secondary rounded-0 p-3">
                    <h2 class="m-0">Form Input Data</h2>
                </div>
                <div class="p-3">
                    <form method="post" id="form" action="{{ route('create.post') }}">
                        @csrf
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pembayaran</label>
                            <div class="col-sm-10">
                                <input type="text" name="pembayaran" class="form-control" id="pembayaran">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="buruha" class="col-sm-2 col-form-label">Buruh A</label>
                            <div class="col-sm-5 col-md-3">
                                <div class="input-group">
                                    <input type="number" name="buruhA" class="form-control" id="buruha">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <label for="buruha" class="col-12 col-sm-5 col-md-7 col-form-label">
                                Total Bonus Rp. <span class="fw-bold" id="totalA"></span>
                            </label>
                        </div>
                        <div class="mb-3 row">
                            <label for="buruhb" class="col-sm-2 col-form-label">Buruh B</label>
                            <div class="col-sm-5 col-md-3">
                                <div class="input-group">
                                    <input type="number" name="buruhB" class="form-control" id="buruhb">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <label for="buruha" class="col-12 col-sm-5 col-md-7 col-form-label">
                                Total Bonus Rp. <span class="fw-bold" id="totalB"></span>
                            </label>
                        </div>
                        <div class="mb-3 row">
                            <label for="buruhc" class="col-sm-2 col-form-label">Buruh C</label>
                            <div class="col-sm-5 col-md-3">
                                <div class="input-group">
                                    <input type="number" name="buruhC" class="form-control" id="buruhc">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <label for="buruha" class="col-12 col-sm-5 col-md-7 col-form-label">
                                Total Bonus Rp. <span class="fw-bold" id="totalC"></span>
                            </label>
                        </div>
                        <button id="create" type="submit" class="btn btn-primary px-5">Save</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
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

    // // Jika ingin upload data dengan Ajax dari Jquery
    // // Hapus action dibagian form
    // $('#form').submit(function(e) {
    //     e.preventDefault();
    //     var formData = new FormData(this);
    //     console.log(formData);
    //     $.ajax({
    //         url: "/create/post",
    //         type: "post",
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    //         },
    //         data: formData,
    //         contentType: false,
    //         processData: false,
    //         success: function(response) {
    //             $('#form').trigger("reset");
    //             if (response.success) {
    //                 Swal.fire(
    //                     'success!',
    //                     response.success,
    //                     'success'
    //                 );
    //             } else {
    //                 Swal.fire(
    //                     'Opps!',
    //                     response.error,
    //                     'error'
    //                 );
    //             }

    //         },
    //         error: function(response) {
    //             console.log(response);
    //             console.log('error data');
    //         },

    //     });
    // });
</script>

@endsection