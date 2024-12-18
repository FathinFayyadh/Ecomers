<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Shoes Online</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('home-content/css/styles.css') }}" rel="stylesheet" />
    <style>
        header img {
            object-fit: cover;
            max-height: 480px;
        }

        .overlay-text {
            background: rgba(0, 0, 0, 0.5);
            /* Semi-transparent background */
            padding: 30px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
            transform: translate(-50%, -50%);
            /* Center the text */
            z-index: 10;
        }

        header .container {
            position: relative;
        }

        header img {
            object-fit: cover;
            width: 100%;
            height: auto;
        }

        h1,
        .btn-lg {
            font-size: 1.25rem;
            padding: 10px 30px;
        }
    </style>
</head>

<body>
   
    @include('navbar-user')

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('home-content/js/scripts.js')}}"></script>
    </body>

    </html>
