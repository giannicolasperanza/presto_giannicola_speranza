<x-layout>
    <div class="container-fluid vh-100">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                {{-- Passiamo solo l'ID dell'articolo invece dell'oggetto completo --}}
                <livewire:article-detail :articleId="$article->id" />




            </div>
        </div>
    </div>
</x-layout>
