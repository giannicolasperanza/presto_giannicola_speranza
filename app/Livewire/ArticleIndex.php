<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticleIndex extends Component
{

    public $selectedArticleId = null; 
    
    public function selectArticle($articleId) 
    {
        $this->selectedArticleId = $articleId;
        $this->dispatch('article-selected', articleId: $articleId);
    }
    
    public function render()
    {
        $articles = Article::all()->sortByDesc('created_at');
        return view('livewire.article-index', compact('articles'));
    }
}
