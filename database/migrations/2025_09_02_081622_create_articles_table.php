<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');           // Titolo dell'articolo
            $table->text('description');       // Descrizione dell'articolo
            $table->decimal('price', 8, 2);    // Prezzo con 2 decimali
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Riferimento all'utente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
