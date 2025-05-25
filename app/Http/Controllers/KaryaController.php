<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class KaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karya = Karya::with('user')->get(); // Biar bisa ambil info seniman juga
        return view('galeri', compact('karya'));
    }
    public function upload()
    {
        return view('seniman.post');
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
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambar = $request->file('gambar')->store('karya', 'public');

      $data =  Karya::create([
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => 1,
            'gambar' => $gambar,
            'status' => 'pending',
        ]);

        return redirect()->route('seniman.upload')->with('success', 'Karya berhasil diupload!');
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

    return redirect()->route('galeri')->with('success', 'Karya berhasil dihapus.');
}

}
