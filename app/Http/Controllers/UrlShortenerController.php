<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShortenerRequest;
use Illuminate\Support\Str;
use App\Models\ShortenedUrl;
use Illuminate\Validation\Rule;


class UrlShortenerController extends Controller
{
    public function index()
    {
        return view('shortener.index');
    }

    public function read()
    {
        $urls = ShortenedUrl::all();
        return view('shortener.read', compact('urls'));
    }

    public function store(UrlShortenerRequest $request)
    {
        $originalUrl = rtrim($request->input('original_url'), '/');
        $customSlug = $request->input('custom_slug');
        $randomSlug = $this->generateRandomSlug();

        $slug = $customSlug ? $customSlug : $randomSlug;
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
        $domain = 'e.intraer/';
        $fullUrl = $protocol . $domain . $slug;

        if (ShortenedUrl::where('full_url', $fullUrl)->exists()) {
            return redirect()->back()->withInput()->withErrors(['full_url' => 'Este fragmento já está em uso, tente outro.']);
        }

        ShortenedUrl::create([
            'original_url' => $originalUrl,
            $customSlug ? 'custom_slug' : 'random_slug' => $slug,
            'full_url' => $fullUrl,
            'user_ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);


        return view('shortener.result', ['customSlug' => $customSlug, 'randomSlug' => $randomSlug]);
    }


    public function redirect($code)
    {
        $url = ShortenedUrl::where('custom_slug', $code)->orWhere('random_slug', $code)->first();
        if (!$url) {
            return abort(404);
        }
        return redirect($url->original_url);
    }

    private function generateRandomSlug()
    {
        return Str::random(5);
    }
}
