@extends('layouts.app') {{-- Asumsi layout-nya bernama app.blade.php --}}

@section('title', 'Manajemen Transaksi')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manajemen Transaksi</h2>
        <a href="{{ route('transaksi.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Transaksi
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Nama Pembeli</th>
                <th>Obat</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksis as $index => $transaksi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d M Y') }}</td>
                    <td>{{ $transaksi->nama_pembeli }}</td>
                    <td>{{ $transaksi->obat->nama_obat ?? '-' }}</td>
                    <td>{{ $transaksi->jumlah }}</td>
                    <td>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus transaksi ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
