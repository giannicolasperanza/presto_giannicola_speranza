<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PublicController extends Controller
{
    /**
     * Mostra la homepage con gli ultimi 4 articoli pubblicati
     */
    public function home()
    {
        // Recupera gli ultimi 4 articoli ordinati per data di creazione (dal più recente)
        // Include anche le relazioni con user e category per visualizzare i dati completi
        $latestArticles = Article::with(['user', 'category'])
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
       
        return view('welcome', compact('latestArticles'));
    }

}
