<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'email' => 'nullable|email|max:255',
            'room_count' => 'required|string',
            'message' => 'nullable|string|max:1000',
        ]);

        try {
            ContactSubmission::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Terima kasih! Pendaftaran Anda telah diterima. Tim kami akan menghubungi Anda dalam 1×24 jam.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan. Silakan coba lagi.'
            ], 500);
        }
    }
}