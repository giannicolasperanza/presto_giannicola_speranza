<x-layout>
    <div class="container-fluid vh-100">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <h1 class='display-5 text-center'>Tutti gli articoli</h1>
            </div>
        </div>

        <div class="row ">
            <!-- Colonna sinistra - Lista articoli (fissa a sinistra) -->
            <div class="col-12 col-md-3">
                <livewire:article-index />
            </div>
            
            <!-- Colonna destra - Pannello dettagli -->
            <div class="col-12 col-md-9">
                <livewire:article-detail />
            </div>
        </div>
    </div>
</x-layout>