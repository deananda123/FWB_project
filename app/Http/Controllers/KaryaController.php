<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Karya;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class KaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function indexSeniman()
{
    $senimanId = Auth::id(); // ambil ID user yang login
    $karya = Karya::where('user_id', $senimanId)->get(); // ambil karya milik user itu

    return view('seniman.karya', compact('karya')); // arahkan ke view milik kamu
}
    public function index()
    {
        $karya = Karya::with('user')->get(); // Biar bisa ambil info seniman juga
        return view('galeri', compact('karya'));
    }

    public function lihatProduk()
    {
        $karya = Karya::with(['user', 'kategoris'])
         ->where('status', 'approved')
        ->get();
        return view('konsumen.produk', compact('karya'));
    }



    public function upload()
    {
        $kategoris = Kategori::all(); // ambil semua kategori dari tabel
        return view('seniman.post', compact('kategoris'));
    }







    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function approve($id)
    {
        $karya = Karya::findOrFail($id);
        $karya->status = 'approved';
        $karya->save();

        return back()->with('success', 'Karya disetujui.');
    }

    public function reject($id)
    {
        $karya = Karya::findOrFail($id);
        $karya->status = 'rejected';
        $karya->save();

        return back()->with('success', 'Karya ditolak.');
    }


public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required',
        'harga' => 'required|numeric|min:0',
        'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'kategori' => 'required|array',
    ]);

    DB::beginTransaction();

    try {
        $gambar = $request->file('gambar')->store('karya', 'public');

        $karya = Karya::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => 1,
            'gambar' => $gambar,
            'status' => 'pending',
        ]);

        $karya->kategoris()->attach($request->kategori);

        DB::commit();

        return redirect()->route('seniman.upload')->with('success', 'Karya berhasil diupload!');
    } catch (\Exception $e) {
        DB::rollback();
        return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan karya.']);
    }
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
    public function destroy($id)
    {
        $karya = Karya::findOrFail($id);

        // Hapus gambar dari storage
        if ($karya->gambar && Storage::disk('public')->exists($karya->gambar)) {
            Storage::disk('public')->delete($karya->gambar);
        }

        // Hapus data dari database
        $karya->delete();

        return redirect()->back()->with('success', 'Karya berhasil dihapus.');
    }
}
