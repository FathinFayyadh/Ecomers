@extends('template-user')
@section('content')
@section('title', 'Home')
<!-- Header-->
<header class="bg-dark py-5 mt-4">
    <div class="container  px-4 px-lg-5 my-2  position-relative">
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
    <div class="container py-5" id="custom-cards">
        <h2 class="pb-2 border-bottom">Custom cards</h2>
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            <div class="col">
                <div class="card h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg position-relative">
                    <!-- Gambar -->
                    <img src="{{ asset('home-content/img/sepatu2.jpg') }}" alt="Sepatu" class="img-product w-100">
            
                    <!-- Konten -->
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-end p-4 text-white text-shadow-1">
                        <h3 class="display-6 fw-bold">Short title, long jacket</h3>
                        
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg position-relative">
                    <!-- Gambar -->
                    <img src="{{ asset('home-content/img/sepatu2.jpg') }}" alt="Sepatu" class="img-product w-100">
            
                    <!-- Konten -->
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-end p-4 text-white text-shadow-1">
                        <h3 class="display-6 fw-bold">Short title, long jacket</h3>
                       
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg position-relative">
                    <!-- Gambar -->
                    <img src="{{ asset('home-content/img/sepatu2.jpg') }}" alt="Sepatu" class="img-product w-100">
            
                    <!-- Konten -->
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-end p-4 text-white text-shadow-1">
                        <h3 class="display-6 fw-bold">Short title, long jacket</h3>
                       
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

@endsection