<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SenimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function tampilOrderSeniman()
    {
        // Ambil semua order yang terkait dengan karya milik seniman yang sedang login
        $orders = Order::with(['karya', 'user'])
            ->whereHas('karya', function ($query) {
                $query->where('user_id', Auth::id()); // hanya karya milik seniman ini
            })
            ->latest()
            ->get();

        return view('seniman.order', compact('orders'));
    }

   
    public function dashboard()
{
    $user = Auth::user();

    // 1. Hitung total karya milik seniman
    $jumlahKarya = Karya::where('user_id', $user->id)->count();

    // 2. Hitung jumlah karya milik seniman yang pernah masuk ke orderan apapun
    $karyaInOrder = Order::with('karya') // relasi many-to-many
        ->get()
        ->pluck('karya') // ambil semua koleksi karya dari setiap order
        ->flatten() // gabungkan array multidimensi jadi satu dimensi
        ->filter(function ($karya) use ($user) {
            return $karya->user_id === $user->id;
        })
        ->count();

    return view('seniman.dashboard', compact('jumlahKarya', 'karyaInOrder'));
}
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
