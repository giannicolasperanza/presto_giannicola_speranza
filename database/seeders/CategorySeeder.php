<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array delle 10 categorie pre-compilate
        $categories = [
            'Elettronica e Informatica',
            'Casa e Giardino',
            'Sport e Tempo Libero',
            'Moda e Accessori',
            'Auto e Moto',
            'Libri e Media',
            'Giochi e Hobby',
            'Salute e Bellezza',
            'Lavoro e Ufficio',
            'Altro'
        ];
        
        // Inserimento delle categorie nel database
        foreach ($categories as $categoryName) {
            Category::create([
                'name' => $categoryName
            ]);
        }
        
        $this->command->info('10 categorie sono state create con successo!');
    }
}
