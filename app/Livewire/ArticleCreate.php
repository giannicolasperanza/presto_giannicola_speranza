<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Category;

class ArticleCreate extends Component
{


    public $title;
    public $description;
    public $price;
    public $user_id;
    public $category_id; // Nuovo campo per la categoria

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id', // Validazione per la categoria
    ];
    
    protected $messages = [
        '*required' => 'Il campo :attribute è obbligatorio',
        'category_id.required' => 'La selezione della categoria è obbligatoria',
        'category_id.exists' => 'La categoria selezionata non è valida',
    ];

    public function store(){
        $this->user_id = Auth::user()->id;

        Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id, 
        ]);

        return redirect()->route('article.index')->with('success', 'Articolo creato con successo');
    }

    public function render()
    {
        // Recupera tutte le categorie per il form
        $categories = Category::all();
        return view('livewire.article-create', compact('categories'));
    }
}
