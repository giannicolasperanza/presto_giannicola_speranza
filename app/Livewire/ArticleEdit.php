<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class ArticleEdit extends Component
{
    public $title;
    public $description;
    public $price;
    public $category_id;
    public $user_id;
    public $article;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
    ];
    
    protected $messages = [
        '*required' => 'Il campo :attribute è obbligatorio',
        'category_id.required' => 'La selezione della categoria è obbligatoria',
        'category_id.exists' => 'La categoria selezionata non è valida',
    ];

    public function articleUpdate(){
        $this->validate();
        
        $this->article->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
        ]);
        
        return redirect()->route('article.index')->with('success', 'Articolo modificato con successo');
    }

    public function mount($article){
        $this->article = $article;
        $this->title = $article->title;
        $this->description = $article->description;
        $this->price = $article->price;
        $this->category_id = $article->category_id;
    }

    public function render()
    {
        // Recupera tutte le categorie per il form di modifica
        $categories = Category::all();
        return view('livewire.article-edit', compact('categories'));
    }
}
