<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    
    public function create()
    {
        // Recupera tutte le categorie per il form di creazione
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    public function edit(Article $article)  
    {
        // Recupera tutte le categorie per il form di modifica
        $categories = Category::all();
        return view('article.edit', compact('article', 'categories'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');
        return view('article.index', compact('articles'));
    }
}
