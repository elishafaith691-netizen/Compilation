<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class ExternalApiController extends Controller
{
    public function index()
    {
        try {
            $response = Http::withoutVerifying()->get('https://jsonplaceholder.typicode.com/posts');
            
            if ($response->successful()) {
                $rawPosts = collect($response->json())->take(10);
                // Transform to English Academic content for a professional system look
                $posts = $rawPosts->map(function ($post, $index) {
                    $topics = [
                        'Research', 'Admissions', 'Technology', 'Campus Life', 'Alumni', 
                        'Grants', 'Faculty', 'Sports', 'Events', 'Safety'
                    ];
                    $topic = $topics[$index % 10];
                    return [
                        'id' => $post['id'],
                        'title' => "[{$topic}] " . "Institutional Update Series " . ($index + 1),
                        'body' => "Official documentation and briefing regarding the latest {$topic} developments within the university ecosystem. This report summarizes the strategic objectives for the 2026 academic cycle."
                    ];
                });
            } else {
                $posts = collect([]);
            }
        } catch (\Exception $e) {
            $posts = collect([]);
        }
        
        return view('external-data', compact('posts'));
    }
}
