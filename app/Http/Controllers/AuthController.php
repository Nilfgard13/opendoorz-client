<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            $response = Http::post('http://opendoorz-product.test/api/login', [
                'email' => $request->email,
                'password' => $request->password
            ]);

            $responseData = $response->json();
    
            if ($response->successful()) {
                // Simpan token ke session
                Session::put('token', $responseData['token']);//  bermasalah
                Session::put('user', $responseData['user']);// bermasalah

                // Redirect ke dashboard atau halaman utama
                return redirect()->route('user.index');
            }

            // Jika gagal, kembali ke halaman login dengan pesan error
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['error' => $responseData['message'] ?? 'Login failed']);
        } catch (\Exception $e) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['error' => 'Server error. Please try again later.']);
        }
    }

    public function logout()
    {
        Session::forget(['token', 'user']);
        return redirect()->route('login');
    }
}
