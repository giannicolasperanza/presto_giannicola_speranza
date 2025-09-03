<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'description', 'price', 'user_id', 'category_id'];
    
    /**
     * Relazione con l'utente: un articolo appartiene a un utente
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Relazione con la categoria: un articolo appartiene a una categoria
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}


