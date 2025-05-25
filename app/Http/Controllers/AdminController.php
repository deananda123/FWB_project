<?php

namespace App\Http\Controllers;
use App\Models\Karya; 

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // Tampilkan semua user
    public function seniman()
{
    $users = User::where('role', '!=', 'admin')->get();
    return view('infoUser', compact('users'));
}


    // Tampilkan detail user
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('infoUser', compact('user'));
    }

    // Hapus user (hard delete)
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return back()->with('error', 'Tidak bisa menghapus sesama admin.');
        }

        $user->delete();

        return redirect()->route('infouser')->with('success', 'Pengguna berhasil dihapus.');
    }

    // Optional view lainnya
    public function index()
    {
        return view('dashboard'); // Ganti sesuai tampilan admin utama kamu
    }

   public function galeri()
{
    $karya = Karya::all();  // ambil semua karya
    return view('galeri', compact('karya'));  // kirim ke view dengan nama 'karya'
}

    public function validasi()
    {
        return view('validasi');
    }
}
