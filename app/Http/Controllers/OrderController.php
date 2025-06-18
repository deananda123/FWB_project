<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Karya;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
public function store(Request $request, Karya $karya)
{
    DB::beginTransaction();

    try {
        // Cek apakah user sudah pernah order karya ini
        $existingOrder = Order::where('user_id', Auth::id())
            ->where('karya_id', $karya->id)
            ->whereIn('status', ['pending', 'diproses']) // status belum selesai
            ->first();

        if ($existingOrder) {
           return redirect()->route('konsumenProduk')->with('warning', 'Kamu sudah memesan karya ini sebelumnya.');

        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'karya_id' => $karya->id,
            'status' => 'pending',
        ]);

        DB::commit();

        return redirect()->route('keranjang')->with('success', 'Pesanan berhasil ditambahkan!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Gagal memproses pesanan: ' . $e->getMessage());
    }
}


 public function complete(Order $order)
    {
        // Pastikan karya milik seniman yang sedang login
        if ($order->karya->user_id !== Auth::id()) {
            abort(403); // Tidak diizinkan
        }

        DB::beginTransaction();

        try {
            $order->status = 'completed';
            $order->save();

            // (opsional) Tambah proses lain seperti log aktivitas, notifikasi, dll

            DB::commit();
            return back()->with('success', 'Pesanan telah ditandai sebagai selesai.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyelesaikan pesanan: ' . $e->getMessage());
        }
    }


    public function keranjang()
{
    $orders = Order::with('karya') // Biar bisa akses info karya
                ->where('user_id',  Auth::id())
                ->whereIn('status', ['pending', 'completed'])
                ->latest()
                ->get();

    return view('konsumen.keranjang', compact('orders'));
}
public function cancel(Order $order)
{
    // Pastikan hanya user pemilik order yang bisa cancel
    if ($order->user_id !== Auth::id()) {
        abort(403);
    }

    $order->status = 'canceled';
    $order->save();

    return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan.');
}

    public function destroy(Order $order)
{
    // Validasi: hanya seniman pemilik karya yang bisa hapus
    if ($order->karya->user_id !== Auth::id()) {
        abort(403);
    }

    try {
        $order->delete();
        return back()->with('success', 'Pesanan berhasil dihapus.');
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal menghapus pesanan: ' . $e->getMessage());
    }
}

}