<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMataKuliahRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kode_mata_kuliah' => 'required|string|max:255|unique:mata_kuliahs,kode_mata_kuliah',
            'nama_mata_kuliah' => 'required|string|max:255',
            'sks' => 'required|integer|min:1',
            'semester' => 'required|integer|min:1|max:14',
            'deskripsi' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'kode_mata_kuliah.required' => 'Kode Mata Kuliah wajib diisi.',
            'kode_mata_kuliah.unique' => 'Kode Mata Kuliah sudah ada.',
            'nama_mata_kuliah.required' => 'Nama Mata Kuliah wajib diisi.',
            'sks.required' => 'SKS wajib diisi.',
            'sks.integer' => 'SKS harus berupa angka.',
            'sks.min' => 'SKS minimal 1.',
            'semester.required' => 'Semester wajib diisi.',
            'semester.integer' => 'Semester harus berupa angka.',
            'semester.min' => 'Semester minimal 1.',
            'semester.max' => 'Semester maksimal 14.',
        ];
    }
}
