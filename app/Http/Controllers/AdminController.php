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
    $users = User::with('profil')->where('role', '!=', 'admin')->get();
    return view('infoUser', compact('users'));
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
   public function admin()
{
    $jumlahKaryaPending = Karya::where('status', 'pending')->count();
    $totalKarya = Karya::count();
    $jumlahUser = User::where('role', '!=', 'admin')->count();

    return view('dashboard', compact('jumlahKaryaPending', 'totalKarya', 'jumlahUser'));
}


   public function galeri()
{
    $karya = Karya::all();  // ambil semua karya
    return view('galeri', compact('karya'));  // kirim ke view dengan nama 'karya'
}

    public function validasi()
{
    $karya = Karya::with('user')->latest()->get();
    return view('validasi', compact('karya'));
}
}
