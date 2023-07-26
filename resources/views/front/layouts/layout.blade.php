@php
    $basket_count = count(Session::get('basket',[]));
    $favorite_count = count(Session::get('favorite',[]));
@endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/responsive.css') }}">
    <style>
        .auth_info a {
            position: relative;
        }

        .auth_info sub {
            background-color: #F4732A;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            color: #fff;
            position: absolute;
            top: 15px;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    @stack('css')
    <title>Rahatgp</title>
</head>

<body>
    @include('front.includes.header')
    @yield('content')

    <footer class="">
        <div class="container">
            <div class="footer_between">
                <div class="footer_logo">
                    <svg width="72" height="56" viewBox="0 0 72 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0 56H28.9006V26.5834C28.9006 20.8776 31.0405 15.3873 34.8845 11.2418L38.0814 7.7883C39.9394 5.77757 42.5341 4.64164 45.2441 4.64164C49.0305 4.64164 50.8884 9.33551 48.1656 12.0187L39.4332 20.0289C36.3772 22.8296 38.3249 28 42.438 28H49.6711C53.1371 28 54.8093 32.3283 52.2722 34.7372L50.299 36.6109C43.0018 43.544 47.8132 56 57.7948 56L68.2121 45.855C74.952 39.294 70.3904 27.7128 61.0686 27.7128L68.904 19.2847C75.6759 12.0056 70.6082 0 60.7675 0H46.0513C34.8332 0 24.5633 6.43693 19.502 16.6407L0 56Z"
                            fill="#3B62C8" />
                    </svg>
                </div>
                <p>
                    ©2018 - Form  |   All right reserved – Bütün Hüquqlar Qorunur
                </p>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="{{ asset('front/assets/js/script.js') }}"></script>
    @stack('js')
</body>

</html>
