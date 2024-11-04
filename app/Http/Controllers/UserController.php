<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $token = Session::get('token');
        $response = Http::withToken($token)->get('http://opendoorz-product.test/api/users');
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        $users = $contentArray['data'];

        foreach ($users as &$user) {
            $user['name'] = is_array($user['name']) ? implode(', ', $user['name']) : ($user['name'] ?? 'No name');
            $user['email'] = is_array($user['email']) ? implode(', ', $user['email']) : ($user['email'] ?? '');
            $user['role'] = is_array($user['role']) ? implode(', ', $user['role']) : ($user['role'] ?? '');
            $user['created_at'] = is_array($user['created_at']) ? implode(', ', $user['created_at']) : ($user['created_at'] ?? '');
            $user['updated_at'] = is_array($user['updated_at']) ? implode(', ', $user['updated_at']) : ($user['updated_at'] ?? '');
            // $user['remember_token'] = is_array($user['location']) ? implode(', ', $user['location']) : ($user['location'] ?? 'Unknown');
        }

        return view('admin.user', [
            'title' => 'Management User',
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        // Mengumpulkan parameter
        $parameter = [
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
            'role' => $request->role,
        ];

        // Jika Anda ingin menyimpan ke database langsung
        // $product = Product::create($parameter);

        $client = new Client();
        $token = Session::get('token');
        $url = "http://opendoorz-product.test/api/users/create";
        $response = $client->request('POST', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ],
            'body' => json_encode($parameter),
            // Tambahkan debug option
            // 'debug' => true,
        ]);

        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if (isset($contentArray['data'])) {
            $data = $contentArray['data'];

            return redirect()->back()->with('success', 'user berhasil ditambahkan.');
        } else {

            return redirect()->back()->with('error', 'Gagal menambahkan user.');
        }
    }

    public function update(Request $request, $id)
    {
        // Mengumpulkan parameter
        $parameter = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        // Jika password tidak diubah, tambahkan password lama ke parameter
        if ($request->filled('currentPassword')) {
            $parameter['password'] = $request->currentPassword; // gunakan password lama
        }

        // Ambil token dari session
        $token = Session::get('token');

        // Tentukan URL endpoint dengan ID pengguna yang akan diperbarui
        $url = "http://opendoorz-product.test/api/users/update/{$id}";

        // Lakukan permintaan HTTP PUT untuk memperbarui data
        $client = new Client();
        $response = $client->request('PUT', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ],
            'body' => json_encode($parameter),
        ]);

        // Mendapatkan isi respons dan mendekodenya
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if (isset($contentArray['data'])) {
            return redirect()->back()->with('success', 'User berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui user.');
        }
    }

    public function destroy(Request $request, $id)
    {
        // Ambil token dari session
        $token = Session::get('token');

        // Tentukan URL endpoint untuk menghapus pengguna
        $url = "http://opendoorz-product.test/api/users/delete/{$id}";

        // Lakukan permintaan HTTP DELETE untuk menghapus data
        $client = new Client();
        try {
            $response = $client->request('DELETE', $url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ],
            ]);

            // Mendapatkan isi respons dan mendekodenya
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);

            if (isset($contentArray['success']) && $contentArray['success'] === true) {
                return redirect()->back()->with('success', 'User berhasil dihapus.');
            } else {
                return redirect()->back()->with('error', 'Gagal menghapus user.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show(Request $request)
    {
        // Validate the request
        $request->validate([
            'query' => 'required|string|max:255'
        ]);

        $title = $request->input('query');
        $client = new Client();
        $url = "http://opendoorz-product.test/api/users/search/" . urlencode($title);

        // Ambil token dari session
        $token = Session::get('token');

        try {
            $response = $client->request('GET', $url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ],
            ]);

            $content = $response->getBody()->getContents();
            Log::info('API Response: ' . $content);

            $users = json_decode($content, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('Failed to decode JSON: ' . json_last_error_msg());
            }

            return view('admin.user', [
                'title' => 'Search Results',
                'users' => $users['data'] ?? [],
                'message' => empty($users['data']) ? 'No users found for your search.' : null
            ]);
        } catch (Exception $e) {
            Log::error('Error in user search: ' . $e->getMessage());

            return view('admin.user', [
                'title' => 'Search Error',
                'error' => $e->getMessage(),
                'users' => []
            ]);
        }
    }
}
