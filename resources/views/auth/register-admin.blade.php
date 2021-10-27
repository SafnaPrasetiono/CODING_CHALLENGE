<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Admin</title>
    <link rel="stylesheet" href="{{ url('/dist/app/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/style/css/auth.css') }}">
</head>

<body>
    <div class="box-center">
        <div class="row g-0">
            <div class="col-12 mb-2">
                <div class="alert alert-lght p-3 m-0">
                    <h3 class="m-0">Register Admin</h3>
                    <p class="m-0">Selemat datang di register Admin</p>
                </div>
            </div>
            <div class="col-12">
                <form method="post" action="/register/admin/post" class="p-3">
                    @csrf
                    <div class="mb-3">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror">
                    </div>
                    <div class="mb-3">
                        <label for="">Re-Password</label>
                        <input type="password" name="password_confirmation" class="form-control  @error('password') is-invalid @enderror">
                    </div>
                    <button type="submit" class="btn btn-primary form-control">SIGNUP</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ url('/dist/style/js/jquery.js') }}"></script>
    <script src="{{  url('/dist/app/js/bootstrap.min.js') }}"></script>
    <script src="{{  url('/dist/style/js/alert.js') }}"></script>

    @error('email')
    <script>
        Swal.fire({
            icon: 'error',
            title: 'error',
            text: 'Email ini sudah aktif, Ganti email lain!',
            showConfirmButton: true,
            timer: 2000
        });
    </script>
    @endif
</body>

</html>