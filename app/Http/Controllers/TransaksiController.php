<?php
namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('user')->latest()->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:dibayar,belum_dibayar,selesai',
        ]);

        Transaksi::create([
            'user_id' => Auth::id(),
            'total' => $request->total,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil dibuat.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:dibayar,belum_dibayar,selesai',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status transaksi diperbarui.');
    }
}
