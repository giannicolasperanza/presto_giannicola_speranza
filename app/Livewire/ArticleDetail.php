<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticleDetail extends Component
{
    public $selectedArticle = null;
    
    protected $listeners = ['article-selected' => 'loadArticle'];
    
    public function loadArticle($articleId)
    {
        $this->selectedArticle = Article::find($articleId);
    }
    
    public function render()
    {
        return view('livewire.article-detail');
    }
}