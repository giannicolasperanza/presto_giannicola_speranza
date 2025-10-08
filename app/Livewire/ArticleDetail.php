<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticleDetail extends Component
{
    public $selectedArticle = null;
    
    protected $listeners = ['article-selected' => 'loadArticle'];
    
    /**
     * Mount: inizializza il componente caricando l'articolo tramite ID
     * Accetta l'ID dell'articolo invece dell'oggetto completo
     */
    public function mount($articleId = null)
    {
        if ($articleId) {
            // Carica l'articolo usando il metodo loadArticle
            $this->loadArticle($articleId);
        }
    }
    
    /**
     * Carica un articolo tramite ID
     * Include le relazioni con user e category per avere tutti i dati necessari
     */
    public function loadArticle($articleId)
    {
        $this->selectedArticle = Article::with(['user', 'category'])->find($articleId);
    }
    
    public function render()
    {
        return view('livewire.article-detail');
    }
}