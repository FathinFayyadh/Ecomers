<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('home-content/css/styles.css') }}" rel="stylesheet" />
    <style>
        header img {
            object-fit: cover;
            max-height: 450px;
        }

        .img-product {
            object-fit: cover;
            width: 100%;
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
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
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid px-3 px-lg-5">
            <a class="navbar-brand" href="#!">Start Bootstrap</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Authentication Section -->
                @auth
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link d-flex align-items-center p-1" id="userDropdown" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="text-gray-600 p-2">{{ Auth::user()->name }}</span>
                                <img class="rounded-circle me-2" src="{{ asset('assets/img/undraw_profile.svg') }}"
                                    alt="Profile Image" width="40" height="40">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#"><i
                                            class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i
                                            class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i> Settings</a></li>
                                <li><a class="dropdown-item" href="#"><i
                                            class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i> Activity Log</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <div class="d-flex ms-auto">
                        <a class="btn btn-outline-dark mx-2" href="{{ route('login.create') }}">Login</a>
                        <a class="btn btn-outline-dark" href="{{ route('register.create') }}">Register</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
    <!-- Header-->
    <!-- Gambar dengan overlay teks -->
    {{-- <div class="col-12 text-center position-relative">
        <img class="w-100 h-auto rounded shadow-lg" src="{{ asset('home-content/img/sepatu.jpg') }}"
            alt="Sepatu">
        <!-- Teks Overlay -->
        <div class="overlay-text position-absolute top-50 start-50 translate-middle text-white text-center">
            <h1 class="display-4 fw-bolder mb-3">Shop in Style</h1>
            <p class="lead text-white-50">With this shop homepage template</p>
            <a href="#shop-now" class="btn btn-light btn-lg">Shop Now</a>
        </div>
    </div> --}}
    <header class="bg-dark py-4">
        <div class="container py-1 px-4 px-lg-5 my-3 position-relative">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div id="headerCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Gambar pertama dengan overlay teks -->
                        <div class="carousel-item active">
                            <img src="{{ asset('home-content/img/sepatu.jpg') }}" class="w-100 h-auto rounded"
                                alt="Sepatu">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="display-4 fw-bolder text-shadow">Shop in Style</h1>
                                <p class="lead text-white-50">With this shop homepage template</p>
                            </div>
                        </div>

                        <!-- Gambar kedua dengan overlay teks -->
                        <div class="carousel-item">
                            <img src="{{ asset('home-content/img/sepatu.jpg') }}" class="d-block w-100 rounded"
                                alt="Sepatu 2">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="display-4 fw-bolder text-shadow">Discover New Styles</h1>
                                <p class="lead text-white-50">Find your perfect pair of shoes today</p>
                            </div>
                        </div>

                        <!-- Gambar ketiga dengan overlay teks -->
                        <div class="carousel-item">
                            <img src="{{ asset('home-content/img/sepatu.jpg') }}" class="d-block w-100 rounded"
                                alt="Sepatu 3">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="display-4 fw-bolder text-shadow">Step Into Comfort</h1>
                                <p class="lead text-white-50">Experience the best in shoe comfort and quality</p>
                            </div>
                        </div>
                    </div>

                    <!-- Kontrol Carousel -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Section-->
    <section class="py-5 ">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute"
                                style="top: 0.5rem; right: 0.5rem">
                                Stock {{ $stock = $product->stock }}
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ $product->image }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product->nameproduct }}</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small  mb-2">
                                        {{ $desciption = strlen($product->description) > 50 ? substr($product->description, 0, 50) . '...' : $product->description }}
                                    </div>
                                    <!-- Product price-->
                                    Rp. {{ $price = number_format($product->price, 2, ',', '.') }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add
                                        to
                                        cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="about" class="about-section py-5 bg-dark text-white">
        <div class="container">
            <div class="row align-items-center">
                <!-- Gambar -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('home-content/img/sepatu.jpg') }}" alt="Produk Sepatu"
                        class="img-fluid rounded shadow-sm">
                </div>
                <!-- Deskripsi -->
                <div class="col-md-6">
                    <h2 class="text-uppercase mb-3">Tentang Produk Kami</h2>
                    <p>
                        SepatuShop menyediakan berbagai macam sepatu berkualitas tinggi yang dirancang untuk
                        memberikan kenyamanan, gaya, dan performa terbaik. Produk kami dibuat dari bahan pilihan
                        dan dikerjakan oleh tenaga ahli untuk memastikan setiap sepatu memenuhi standar kualitas.
                    </p>
                    <h5>Jenis Produk Kami:</h5>
                    <ul>
                        <li><strong>Sepatu Olahraga:</strong> Ringan, fleksibel, dan mendukung aktivitas fisik Anda.
                        </li>
                        <li><strong>Sepatu Formal:</strong> Elegan untuk melengkapi penampilan profesional Anda.</li>
                        <li><strong>Sepatu Casual:</strong> Nyaman untuk aktivitas sehari-hari dengan berbagai gaya.
                        </li>
                        <li><strong>Desain Custom:</strong> Personalisasi sepatu sesuai keinginan Anda.</li>
                    </ul>
                    <p>
                        Komitmen kami adalah memberikan pengalaman berbelanja sepatu yang memuaskan. Dengan koleksi
                        yang selalu diperbarui sesuai tren terbaru, kami siap memenuhi kebutuhan Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom">Custom cards</h2>

            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col">
                    <div class="card h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg">
                        <!-- Gambar -->
                        <img src="{{ asset('home-content/img/sepatu2.jpg') }}" alt="Sepatu"
                            class="img-product w-100">

                        <!-- Konten -->
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Short title, long jacket</h3>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="https://github.com/twbs.png" alt="Bootstrap" width="32"
                                        height="32" class="rounded-circle border border-white">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <small>Earth</small>
                                </li>
                                <li class="d-flex align-items-center">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#calendar3" />
                                    </svg>
                                    <small>3d</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg"
                        style="background-image: url('unsplash-photo-2.jpg');">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Much longer title that wraps to multiple
                                lines</h3>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="https://github.com/twbs.png" alt="Bootstrap" width="32"
                                        height="32" class="rounded-circle border border-white">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <small>Pakistan</small>
                                </li>
                                <li class="d-flex align-items-center">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#calendar3" />
                                    </svg>
                                    <small>4d</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg"
                        style="background-image: url('unsplash-photo-3.jpg');">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h3>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="https://github.com/twbs.png" alt="Bootstrap" width="32"
                                        height="32" class="rounded-circle border border-white">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <small>California</small>
                                </li>
                                <li class="d-flex align-items-center">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#calendar3" />
                                    </svg>
                                    <small>5d</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <!-- Tentang Kami -->
                <div class="col-md-4 mb-3">
                    <h5 class="text-uppercase">Tentang Kami</h5>
                    <p class="small">
                        Kami adalah toko e-commerce yang menyediakan berbagai macam sepatu berkualitas
                        untuk segala aktivitas Anda. Kenyamanan dan gaya adalah prioritas kami.
                    </p>
                </div>
                <!-- Hubungi Kami -->
                <div class="col-md-4 mb-3">
                    <h5 class="text-uppercase">Hubungi Kami</h5>
                    <ul class="list-unstyled">
                        <li>Email: <a href="mailto:support@sepatushop.com"
                                class="text-decoration-none text-white">support@sepatushop.com</a></li>
                        <li>Telepon: +62 812-3456-7890</li>
                        <li>Alamat: Jl. Sepatu No. 10, Jakarta</li>
                    </ul>
                </div>
                <!-- Navigasi -->
                <div class="col-md-4 mb-3">
                    <h5 class="text-uppercase">Navigasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="/beranda" class="text-decoration-none text-white">Beranda</a></li>
                        <li><a href="/produk" class="text-decoration-none text-white">Produk</a></li>
                        <li><a href="/kontak" class="text-decoration-none text-white">Kontak Kami</a></li>
                        <li><a href="/faq" class="text-decoration-none text-white">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <hr class="border-light">
            <div class="text-center">
                <p class="mb-0 small">&copy; 2024 SepatuShop. Semua Hak Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
