@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Dashboard</h1>

<div class="grid grid-cols-4 gap-4">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg">Total Obat</h2>
        <p class="text-2xl font-bold">{{ $totalObat }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg">Transaksi Hari Ini</h2>
        <p class="text-2xl font-bold">{{ $transaksiHariIni }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg">Total Pengguna</h2>
        <p class="text-2xl font-bold">{{ $totalPengguna }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg">Pendapatan Hari Ini</h2>
        <p class="text-2xl font-bold">Rp{{ number_format($pendapatanHariIni, 0, ',', '.') }}</p>
    </div>
</div>
@endsection