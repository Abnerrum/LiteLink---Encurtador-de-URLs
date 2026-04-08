<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlShortenerController extends Controller
{
    /**
     * Exibe a página inicial com o formulário e o histórico recente.
     */
    public function index()
    {
        $recentLinks = ShortUrl::latest()->take(5)->get();

        return view('home', compact('recentLinks'));
    }

    /**
     * Recebe a URL longa, valida, gera o código e salva no banco.
     */
    public function shorten(Request $request)
    {
        $request->validate([
            'original_url' => ['required', 'url', 'max:2048'],
        ], [
            'original_url.required' => 'Por favor, insira uma URL.',
            'original_url.url'      => 'A URL informada não é válida. Inclua http:// ou https://',
            'original_url.max'      => 'A URL é longa demais.',
        ]);

        // Gera um código único de 7 caracteres
        do {
            $code = Str::random(7);
        } while (ShortUrl::where('code', $code)->exists());

        $shortUrl = ShortUrl::create([
            'original_url' => $request->original_url,
            'code'         => $code,
            'clicks'       => 0,
        ]);

        return redirect()->route('home')->with('success', $shortUrl->code);
    }

    /**
     * Redireciona o usuário para a URL original e incrementa o contador.
     */
    public function redirect(string $code)
    {
        $shortUrl = ShortUrl::where('code', $code)->firstOrFail();

        $shortUrl->increment('clicks');

        return redirect()->away($shortUrl->original_url);
    }
}
