<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticleIndex extends Component
{
    // Rimossa la funzionalità di selezione articoli per il layout a griglia
    
    public function render()
    {
        $articles = Article::all()->sortByDesc('created_at');
        return view('livewire.article-index', compact('articles'));
    }
}
