

@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="mb-4 text-white p-3 rounded position-relative shadow-sm" style="background-color: #A0E9FF"> {{-- Menambahkan background color agar terlihat --}}
    <a href="{{ url('/produk') }}" class="btn btn-light btn-sm position-absolute start-0 top-50 translate-middle-y ms-3">
        <i class="fas fa-arrow-left"></i>
    </a>
    <h5 class="mb-0 text-center fw-bold text-black">Keranjang Belanja</h5>
</div>

<div class="container py-4">

    {{-- ✅ Alert sukses atau error --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(count($cartItems) === 0)
        <p class="text-center text-muted">Keranjang Anda kosong.</p>
    @else
        <div class="table-responsive mb-4">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cartItems as $item)
                        @php
                            // Pastikan $item->obat ada sebelum mengakses propertinya
                            if ($item->obat) {
                                $subtotal = $item->obat->harga * $item->jumlah; // Gunakan $item->jumlah sesuai kode Anda
                                $total += $subtotal;
                            } else {
                                $subtotal = 0; // Atau handle jika obat tidak ditemukan
                            }
                        @endphp
                        <tr>
                            <td class="d-flex align-items-center">
                                @if ($item->obat)
                                    <img src="{{ asset('storage/obat/' . $item->obat->gambar) }}" alt="{{ $item->obat->nama }}" width="60" class="me-3">
                                    <span>{{ $item->obat->nama }}</span>
                                @else
                                    <span>Produk Tidak Tersedia</span>
                                @endif
                            </td>
                            <td>Rp {{ $item->obat ? number_format($item->obat->harga, 0, ',', '.') : 'N/A' }}</td>
                            <td style="max-width: 120px;">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    {{-- Pastikan nama input sesuai dengan yang diharapkan controller ('jumlah' atau 'quantity') --}}
                                    <input type="number" name="jumlah" class="form-control form-control-sm" value="{{ $item->jumlah }}" min="1" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus item ini dari keranjang?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ========================================================== --}}
        {{-- ✅ BAGIAN CHECKOUT WHATSAPP DIMASUKKAN DI SINI --}}
        {{-- ========================================================== --}}
        <div class="d-flex justify-content-end">
            <div class="text-end">
                <h5 class="fw-bold">Total: Rp {{ number_format($total, 0, ',', '.') }}</h5>

                {{-- ✅ Persiapkan Pesan dan Link WhatsApp --}}
                @php
                    // GANTI DENGAN NOMOR WHATSAPP ANDA (gunakan format 628xxxx)
                    $whatsappNumber = '6282121141523'; // <--- GANTI NOMOR INI

                    // Mulai membuat pesan
                    $message = "Halo,\nSaya ingin memesan item berikut dari keranjang belanja:\n\n";

                    // Tambahkan setiap item ke pesan
                    foreach($cartItems as $item) {
                        if ($item->obat) {
                            // Pastikan $item->obat->nama dan $item->jumlah sudah benar
                            $message .= "- " . $item->obat->nama . " (Jumlah: " . $item->jumlah . ")\n";
                        }
                    }

                    // Tambahkan total pembayaran
                    $message .= "\nTotal Pembayaran: Rp " . number_format($total, 0, ',', '.');
                    $message .= "\n\nMohon konfirmasi pesanan saya. Terima kasih!";

                    // Buat URL WhatsApp (pesan akan di-encode secara otomatis)
                    $whatsappUrl = "https://wa.me/" . $whatsappNumber . "?text=" . urlencode($message);
                @endphp

                {{-- ✅ Tombol checkout via WhatsApp --}}
                <a href="{{ $whatsappUrl }}"
                   class="btn btn-success mt-3 px-4"
                   target="_blank"
                   onclick="return confirm('Anda akan diarahkan ke WhatsApp untuk menyelesaikan pesanan. Lanjutkan?');">
                    <i class="fas fa-credit-card me-1"></i> Checkout
                </a>

                {{-- Form lama sudah dihapus/dikomentari --}}

            </div>
        </div>
        {{-- ========================================================== --}}
        {{-- ✅ AKHIR BAGIAN CHECKOUT WHATSAPP --}}
        {{-- ========================================================== --}}

    @endif

</div>
@endsection


