<div class="cardCustom">
    {{-- Verifica se è stato selezionato un articolo --}}
    @if($selectedArticle)
        <div class="row">
            {{-- Colonna sinistra: Carosello immagini --}}
            <div class="col-lg-6 mb-4">
                <div id="articleCarousel" class="carousel slide" data-bs-ride="carousel">
                    {{-- Indicatori del carosello --}}
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    
                    {{-- Contenuto del carosello --}}
                    <div class="carousel-inner rounded">
                        {{-- Immagine 1 (principale) --}}
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/800/600?random={{ $selectedArticle->id }}" 
                                 class="d-block w-100 carousel-image" 
                                 alt="{{ $selectedArticle->title }} - Immagine 1">
                        </div>
                        {{-- Immagine 2 --}}
                        <div class="carousel-item">
                            <img src="https://picsum.photos/800/600?random={{ $selectedArticle->id + 1 }}" 
                                 class="d-block w-100 carousel-image" 
                                 alt="{{ $selectedArticle->title }} - Immagine 2">
                        </div>
                        {{-- Immagine 3 --}}
                        <div class="carousel-item">
                            <img src="https://picsum.photos/800/600?random={{ $selectedArticle->id + 2 }}" 
                                 class="d-block w-100 carousel-image" 
                                 alt="{{ $selectedArticle->title }} - Immagine 3">
                        </div>
                        {{-- Immagine 4 --}}
                        <div class="carousel-item">
                            <img src="https://picsum.photos/800/600?random={{ $selectedArticle->id + 3 }}" 
                                 class="d-block w-100 carousel-image" 
                                 alt="{{ $selectedArticle->title }} - Immagine 4">
                        </div>
                    </div>
                    
                    {{-- Pulsanti navigazione precedente/successivo --}}
                    <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Precedente</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Successivo</span>
                    </button>
                </div>
            </div>

            {{-- Colonna destra: Dettagli articolo --}}
            <div class="col-lg-6">
                {{-- Badge categoria --}}
                @if($selectedArticle->category)
                    <span class="badge bg-dark mb-3 fs-6">
                        <i class="bi bi-tag-fill me-1"></i>{{ $selectedArticle->category->name }}
                    </span>
                @endif

                {{-- Titolo articolo --}}
                <h1 class="mb-3 fw-bold">{{ $selectedArticle->title }}</h1>

                {{-- Prezzo in evidenza --}}
                <div class="price-box p-3 mb-4 rounded">
                    <p class="text-muted mb-1">Prezzo</p>
                    <h2 class="text-warning fw-bold mb-0">€ {{ number_format($selectedArticle->price, 2, ',', '.') }}</h2>
                </div>

                {{-- Descrizione completa --}}
                <div class="mb-4">
                    <h5 class="fw-bold mb-3">Descrizione</h5>
                    <p class="text-muted" style="white-space: pre-line;">{{ $selectedArticle->description }}</p>
                </div>

                {{-- Informazioni venditore --}}
                <div class="seller-info p-3 mb-4 rounded border">
                    <h5 class="fw-bold mb-3">Informazioni venditore</h5>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-person-circle me-2 text-primary fs-5"></i>
                        <span><strong>Nome:</strong> {{ $selectedArticle->user->name ?? 'Anonimo' }}</span>
                    </div>
                   
                    <div class="d-flex align-items-center">
                        <i class="bi bi-calendar-check me-2 text-primary fs-5"></i>
                        <span><strong>Pubblicato il:</strong> {{ $selectedArticle->created_at->format('d/m/Y') }}</span>
                    </div>
                </div>

                {{-- Pulsanti azione --}}
                <div class="d-flex flex-column gap-2">
                    {{-- Pulsante contatta venditore (placeholder per funzionalità futura) --}}
                    <button class="btn btn-customdue btn-lg">
                        <i class="bi bi-chat-dots me-2"></i>Contatta il venditore
                    </button>

                    {{-- Pulsante modifica (solo se l'utente è il proprietario) --}}
                    @auth
                        @if(Auth::user()->id == $selectedArticle->user_id)
                            <a href="{{ route('article.edit', $selectedArticle) }}" class="btn btn-custom btn-lg">
                                <i class="bi bi-pencil me-2"></i>Modifica articolo
                            </a>
                        @endif
                    @endauth

                    {{-- Pulsante torna indietro --}}
                    <a href="{{ route('article.index') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="bi bi-arrow-left me-2"></i>Torna alla lista
                    </a>
                </div>
            </div>
        </div>
    @else
        {{-- Messaggio se nessun articolo è stato selezionato --}}
        <div class="text-center py-5">
            <i class="bi bi-inbox display-1 text-muted"></i>
            <h4 class="mt-3 text-muted">Nessun articolo selezionato</h4>
            <p class="text-muted">Seleziona un articolo dalla lista per visualizzarne i dettagli</p>
            <a href="{{ route('article.index') }}" class="btn btn-custom mt-3">
                <i class="bi bi-arrow-left me-2"></i>Torna alla lista
            </a>
        </div>
    @endif
</div>

