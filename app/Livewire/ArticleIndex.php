<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;

class ArticleIndex extends Component
{
    // Proprietà per la ricerca testuale
    public $search = '';
    
    // Proprietà per il filtro categoria (stringa vuota = tutte le categorie)
    public $categoryFilter = '';
    
    /**
     * Metodo per resettare tutti i filtri di ricerca
     */
    public function resetFilters()
    {
        $this->search = '';
        $this->categoryFilter = '';
    }
    
    /**
     * Metodo per renderizzare il componente con i filtri applicati
     */
    public function render()
    {
        // Query base per gli articoli con relazioni (eager loading per evitare N+1 query problem)
        $query = Article::with(['user', 'category']);
        
        // Applica il filtro di ricerca testuale se presente
        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }
        
        // Applica il filtro per categoria se selezionata
        if (!empty($this->categoryFilter)) {
            $query->where('category_id', $this->categoryFilter);
        }
        
        // Ordina per data di creazione decrescente e recupera i risultati
        $articles = $query->orderBy('created_at', 'desc')->get();
        
        // Recupera tutte le categorie per il menu a tendina
        $categories = Category::all();
        
        return view('livewire.article-index', compact('articles', 'categories'));
    }
}