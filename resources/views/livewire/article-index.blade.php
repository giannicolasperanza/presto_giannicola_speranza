
<div>
    {{-- Barra di ricerca e filtri - Full Width come Header --}}
    <div class="search-header-bar mb-4 py-4">
        <div class="container-fluid">
            <div class="row align-items-end g-3">
                
                {{-- Campo di ricerca testuale --}}
                <div class="col-12 col-md-5">
                    <label for="searchInput" class="form-label fw-bold">Ricerca articoli</label>
                    <input 
                        type="text" 
                        id="searchInput"
                        class="form-control" 
                        placeholder="Cerca per titolo o descrizione..." 
                        wire:model.live.debounce.300ms="search"
                    >
                </div>

                {{-- Filtro per categoria --}}
                <div class="col-12 col-md-4">
                    <label for="categorySelect" class="form-label fw-bold">Categoria</label>
                    <select id="categorySelect" class="form-select" wire:model.live="categoryFilter">
                        <option value="">Tutte le categorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Bottone per resettare i filtri --}}
                <div class="col-12 col-md-3 text-md-end">
                    <button wire:click="resetFilters" class="btn btn-customdue w-100 w-md-auto">
                        <i class="bi bi-arrow-clockwise"></i> Resetta filtri
                    </button>
                </div>
                
            </div>
        </div>
    </div>

    {{-- Griglia degli articoli --}}
    <div class="container">
        <div class="row g-4">
            @forelse($articles as $article)
                <!-- Article Card -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100 border-0 shadow-sm hover-lift">
                        <!-- Immagine dell'articolo (placeholder per ora) -->
                        <img src="https://picsum.photos/300/200?random={{ $article->id }}" 
                             class="card-img-top" 
                             alt="{{ $article->title }}">
                        
                        <div class="card-body d-flex flex-column">
                            <!-- Categoria badge -->
                            @if($article->category)
                                <span class="badge bg-dark mb-2 align-self-start">
                                    {{ $article->category->name }}
                                </span>
                            @endif
                            
                            <!-- Titolo dell'articolo -->
                            <h5 class="card-title fw-bold mb-2">
                                {{ Str::limit($article->title, 50) }}
                            </h5>
                            
                            <!-- Prezzo -->
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="h4 mb-0 text-primary fw-bold">
                                        € {{ number_format($article->price, 2, ',', '.') }}
                                    </span>
                                </div>
                                
                                <!-- Info venditore e data -->
                                <div class="text-muted small mb-3">
                                    <i class="bi bi-person"></i> {{ $article->user->name ?? 'Anonimo' }}
                                    <br>
                                    <i class="bi bi-calendar"></i> {{ $article->created_at->format('d/m/Y') }}
                                </div>
                                
                                <!-- Pulsanti azione -->
                                <div class="d-flex gap-2">
                                    <!-- Pulsante dettagli (sempre visibile) -->
                                    <a href="{{ route('article.show', $article) }}" 
                                       class="btn btn-outline-primary flex-grow-1">
                                        <i class="bi bi-eye"></i> Dettagli
                                    </a>
                                    
                                    <!-- Pulsante modifica (solo per il proprietario) -->
                                    @auth   
                                        @if(Auth::user()->id == $article->user_id)
                                            <a href="{{ route('article.edit', $article) }}" 
                                               class="btn btn-warning flex-grow-1">
                                                <i class="bi bi-pencil"></i> Modifica
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Messaggio se non ci sono articoli che corrispondono ai filtri -->
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-search display-1 text-muted"></i>
                        <h4 class="mt-3 text-muted">Nessun articolo trovato</h4>
                        <p class="text-muted">
                            @if(!empty($search) || !empty($categoryFilter))
                                Prova a modificare i filtri di ricerca
                            @else
                                Non ci sono ancora articoli pubblicati
                            @endif
                        </p>
                        @if(!empty($search) || !empty($categoryFilter))
                            <button wire:click="resetFilters" class="btn btn-primary mt-3">
                                <i class="bi bi-arrow-clockwise"></i> Resetta filtri
                            </button>
                        @endif
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>