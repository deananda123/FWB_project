<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

use App\Models\Profil;

class KonsumenProfileController extends Controller
{
    
    public function edit(Request $request): View
    {
        $user = $request->user()->load('karya'); // ini penting
        
        return view('konsumen.profilUser', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $user->profil()->updateOrCreate(
            [
                'user_id' => $user->id
            ],
            [
                'nama_lengkap' => $request->input('nama_lengkap'),
                'no_telepon' => $request->input('no_telepon'),
                'alamat' => $request->input('alamat'),
                'deskripsi_profil' => $request->input('deskripsi_profil'),
            ]
        );

        return Redirect::route('profil.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
