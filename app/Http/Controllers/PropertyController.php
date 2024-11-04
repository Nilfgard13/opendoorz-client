<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
    public function index()
    {
        $property = new Client();
        $url = "http://opendoorz-product.test/api/products";
        $response = $property->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        $products = $contentArray['data'];

        foreach ($products as &$product) {
            $product['title'] = is_array($product['title']) ? implode(', ', $product['title']) : ($product['title'] ?? 'No Title');
            $product['description'] = is_array($product['description']) ? implode(', ', $product['description']) : ($product['description'] ?? '');
            $product['price'] = is_numeric($product['price']) ? $product['price'] : 0;
            $product['location'] = is_array($product['location']) ? implode(', ', $product['location']) : ($product['location'] ?? 'Unknown');
            $product['type'] = is_array($product['type']) ? implode(', ', $product['type']) : ($product['type'] ?? 'Unknown');
            $product['status'] = is_array($product['status']) ? implode(', ', $product['status']) : ($product['status'] ?? 'Unknown');
            // $product['category_id'] = is_array($product['category_id']) ? implode(', ', $product['category_id']) : ($product['category_id'] ?? 0);
        }

        return view('admin.product', [
            'title' => 'Management Property',
            'products' => $products
        ]);
    }

    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data dari request
        // $validatedData = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'price' => 'required|numeric',
        //     'location' => 'required|string|max:255',
        //     'type' => 'required|string|max:50',
        //     'status' => 'required|in:available,sold',
        //     'category_id' => 'required|exists:categories,id',
        //     'image_path' => 'required',
        //     'image_path.*' => 'file|mimes:jpeg,png,jpg,gif|max:4096'
        // ]);
    
        // Inisialisasi client Guzzle
        $client = new Client();
        $url = "http://opendoorz-product.test/api/products";
    
        // Inisialisasi array $multipart untuk menyimpan data teks terlebih dahulu
        $multipart = [
            [
                'name' => 'title',
                'contents' => $request->title,
            ],
            [
                'name' => 'description',
                'contents' => $request->description,
            ],
            [
                'name' => 'price',
                'contents' => $request->price,
            ],
            [
                'name' => 'location',
                'contents' => $request->location,
            ],
            [
                'name' => 'type',
                'contents' => $request->type,
            ],
            [
                'name' => 'status',
                'contents' => $request->status,
            ],
            [
                'name' => 'category_id',
                'contents' => $request->category_id,
            ],
            [
                'name' => 'image_path',
                'contents' => $request->image_path,
            ]
        ];
        
     

        // dd($multipart);
    
        // Mengirim request dengan Guzzle menggunakan multipart
        $response = $client->request('POST', $url, [
            'multipart' => $multipart,
        ]);
    
        // Ambil respon dari server
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
    
        // Cek apakah produk berhasil dibuat
        if (isset($contentArray['data'])) {
            return redirect()->back()->with('success', 'Item berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan item.');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // Ambil input title dari request
        $title = $request->input('title');

        // Buat client HTTP
        $client = new Client();

        // URL endpoint API untuk search berdasarkan title
        $url = "http://opendoorz-product.test/api/products/search/{$title}";

        // Kirim request GET ke API
        $response = $client->request('GET', $url, [
            'headers' => ['Content-type' => 'application/json'],
        ]);

        // Ambil konten dari response
        $content = $response->getBody()->getContents();

        // Decode hasil JSON menjadi array
        $products = json_decode($content, true);

        // Return data produk hasil pencarian ke view atau sebagai JSON
        return view('products.search-results', [
            'title' => 'Search Results',
            'products' => $products
        ]);
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
