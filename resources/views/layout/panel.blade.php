<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/dist/app/css/bootstrap.min.css') }}">
    @livewireStyles
    @yield('title')
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/home">Bunus<span class="text-warning">Buruh</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About Me</a>
                    </li>
                    @if(auth('admin')->user() or auth('user')->user() )
                    <li class="nav-item">
                        <a href="/auth/logout" class="nav-link">LogOut</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Register
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/register/admin">For admin</a></li>
                            <li><a class="dropdown-item" href="/register/user">For user</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/auth/login" class="nav-link">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-pages">
        @yield('pages')
    </div>

    <script src="{{ url('/dist/style/js/jquery.js') }}"></script>
    <script src="{{  url('/dist/app/js/bootstrap.min.js') }}"></script>
    <script src="{{  url('/dist/style/js/alert.js') }}"></script>
    <script src="{{  url('/dist/style/js/autoNumeric.js') }}"></script>
    @livewireScripts
    @if(Session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'success',
            text: '{{ Session::get("success") }}',
            showConfirmButton: true,
            timer: 2000
        });
    </script>
    @elseif(Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'error',
            text: '{{ Session::get("error") }}',
            showConfirmButton: true,
            timer: 2000
        });
    </script>
    @endif
    @yield('script')
</body>

</html>