<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Apotik Gampil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .nav-link:hover{
            border-bottom: 2px solid #28a745;
        }
    </style>
</head>
<body>

   <header class="bg-light text-white shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-light py-2">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="img/apotikgampil.png" alt="Logo" width="100" height="100" class="me-2">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-nav" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item">
                            <a class="nav-link text-black {{ request()->is('/') ? 'border-bottom border-2 border-success' : '' }}" href="{{ url('/') }}">
                                Beranda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2 text-black {{ request()->is('produk') ? 'border-bottom border-2 border-success' : '' }}" href="{{ url('/produk') }}">
                                Produk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black {{ request()->is('tentang') ? 'border-bottom border-2 border-success' : '' }}" href="{{ url('/tentang') }}">
                                Tentang Kami
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black {{ request()->is('kontak') ? 'border-bottom border-2 border-success' : '' }}" href="{{ url('/kontak') }}">
                                Kontak
                            </a>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center">
                        <button class="btn btn-link text-black me-2">
                            <i class="fas fa-search fs-5"></i>
                        </button>
                        <a class="btn btn-link text-black position-relative me-2" href="{{ url('/cart')}}"> 
                            <i class="fas fa-shopping-cart fs-5"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                            </span>
                        </a>

                        
                        @auth
                            <div class="dropdown">
                                <a class="btn btn-outline-black border-2 text-black fw-bold px-4 py-2 dropdown-toggle" href="#" role="button" id="dropdownUserMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user me-1"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUserMenu">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profil Saya</a></li>
                                    <li><a class="dropdown-item" href="{{ route('cart.index') }}">Keranjang</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Keluar</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a class="btn btn-outline-black border-2 text-black fw-bold px-4 py-2" href="{{ url('/login') }}">
                                <i class="fas fa-user me-1"></i> Masuk
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

    <div class="container py-5">
        <h1 class="text-center fw-bold mb-4">Hubungi Kami</h1>
        <div class="row g-4">
            <div class="col-md-6">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama Anda">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="email@domain.com">
                    </div>
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea class="form-control" id="pesan" rows="5" placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Kirim</button>
                </form>
            </div>
            <div class="col-md-6">
                <h5 class="fw-bold">Informasi Kontak</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt me-2 text-success"></i> Jl. Jalan</li>
                    <li><i class="fas fa-phone me-2 text-success"></i> (021) 1234567</li>
                    <li><i class="fas fa-envelope me-2 text-success"></i> info@apotikgampil.com</li>
                </ul>
                <h6 class="mt-4">Media Sosial</h6>
                <div class="d-flex gap-3">
                    <a href="#" class="text-success fs-5"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-success fs-5"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" class="text-success fs-5"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
