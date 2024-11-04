<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RotatorController extends Controller
{
    public function index()
    {
        $client = new Client();
        $url = "http://opendoorz-rotator.test/api/nomors";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        $nomors = $contentArray['nomors'];

        foreach ($nomors as &$nomor) {
            $nomor['name'] = is_array($nomor['name']) ? implode(', ', $nomor['name']) : ($nomor['name'] ?? 'No name');
            $nomor['nomor'] = is_array($nomor['nomor']) ? implode(', ', $nomor['nomor']) : ($nomor['nomor'] ?? '');
            $nomor['created_at'] = is_array($nomor['created_at']) ? implode(', ', $nomor['created_at']) : ($nomor['created_at'] ?? '');
            $nomor['updated_at'] = is_array($nomor['updated_at']) ? implode(', ', $nomor['updated_at']) : ($nomor['updated_at'] ?? '');
            // $user['remember_token'] = is_array($user['location']) ? implode(', ', $user['location']) : ($user['location'] ?? 'Unknown');
        }

        return view('admin.rotator', [
            'title' => 'Management Rotator',
            'nomors' => $nomors
        ]);
    }
}
