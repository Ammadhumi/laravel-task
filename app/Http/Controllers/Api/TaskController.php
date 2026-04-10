<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
    
    public function getExternalPosts(Request $request)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = $response->collect()->take(10)->map(function ($post) {
            return [
                'title' => $post['title'],
                'body' => $post['body'],
            ];
        });

        $search = $request->query('query');
        if ($search) {
            $posts = $posts->filter(function ($post) use ($search) {
                return stripos($post['title'], $search) !== false;
            })->values();
        }

        return response()->json($posts);
    }
    public function scrapeQuotes()
    {
        $url = 'http://quotes.toscrape.com/';
        $response = Http::get($url);
        $html = $response->body();

        $dom = new \DOMDocument();
        @$dom->loadHTML($html);
        $xpath = new \DOMXPath($dom);

        $quoteNodes = $xpath->query("//div[@class='quote']");
        $results = [];

        foreach ($quoteNodes as $node) {
            $text = $xpath->query(".//span[@class='text']", $node)->item(0)->nodeValue;
            $author = $xpath->query(".//small[@class='author']", $node)->item(0)->nodeValue;
            $results[] = [
                'text' => trim($text, " \t\n\r\0\x0B\""),
                'author' => $author,
            ];
        }

        return response()->json($results);
    }

    
    public function customRequest()
    {
        $url = 'https://httpbin.org/get'; 
        
        
        $response = Http::withHeaders([
            'User-Agent' => 'Antigravity/1.0',
            'Accept' => 'application/json',
        ])->retry(3, 100)->get($url);

        return response()->json([
            'http_status' => $response->status(),
            'response' => $response->json(),
        ]);
    }
}
