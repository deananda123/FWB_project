<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'konsumen';
    }

    // public function tampilan(){
    //     return 'test';
    // }
    
    public function dashboardKonsumen()
    {
        return view('welcome');
    }
    public function showSeniman($id)
{
    $user = User::with('profil', 'karya')->findOrFail($id);

    return view('konsumen.profil', compact('user'));
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
        //
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
    public function destroy(string $id)
    {
        //
    }
}
