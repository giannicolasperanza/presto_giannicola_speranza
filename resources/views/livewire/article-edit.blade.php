<form class='mt-5' enctype="multipart/form-data" wire:submit.prevent="articleUpdate">
    @csrf
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="title" wire:model="title">
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" id="description" wire:model="description"></textarea>
    </div>
    
    <div class="mb-3">
        <label for="category_id" class="form-label">Categoria</label>
        <select class="form-control" id="category_id" wire:model="category_id">
            <option value="">Seleziona una categoria</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="number" class="form-control" id="price" wire:model="price" step="0.01">
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Modifica</button>
    </div>
</form>