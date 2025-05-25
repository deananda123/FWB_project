<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        'email' => [
            'required',
            'string',
            'lowercase',
            'email',
            'max:255',
            Rule::unique(User::class)->ignore($this->user()->id),
        ],
        'nama_lengkap' => ['required', 'string', 'max:255'],
        'no_telepon' => ['nullable', 'string', 'max:20'],
        'deskripsi_profil' => ['nullable', 'string'],
        'alamat' => ['nullable', 'string'],
        'jam_operasional' => ['nullable', 'string'],
    ];
}

}
