<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * I campi che possono essere assegnati in massa
     */
    protected $fillable = ['name'];
    
    /**
     * Relazione con gli articoli: una categoria può avere molti articoli
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
