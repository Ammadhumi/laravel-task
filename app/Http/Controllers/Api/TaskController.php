<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
    /**
     * Task 2: Consume External API
     */
    public function getExternalPosts(Request $request)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = $response->collect()->take(10)->map(function ($post) {
            return [
                'title' => $post['title'],
                'body' => $post['body'],
            ];
        });

        // Bonus: Search filter
        $search = $request->query('query');
        if ($search) {
            $posts = $posts->filter(function ($post) use ($search) {
                return stripos($post['title'], $search) !== false;
            })->values();
        }

        return response()->json($posts);
    }

    /**
     * Task 3: Basic Web Scraping Task
     */
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

    /**
     * Task 4: HTTP Request with Custom Headers
     */
    public function customRequest()
    {
        $url = 'https://httpbin.org/get'; // A public API that echoes back headers
        
        // Bonus: Retry logic
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
