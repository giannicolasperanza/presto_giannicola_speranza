<x-layout>
    <div class="container align-items-center justify-content-center my-5">
        <div class="row align-items-center justify-content-center ">
           
                <div class="col-12 col-md-4 justify-content-center  cardCustom">
                <h1 class='display-5 text-center'>Registrati</h1>
            <form
            action="{{route('register')}}"
            method="POST"
            >
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome utente</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
                    <div id="name" class="form-text">Inserisci il tuo nome</div>
                </div>
    
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Inserisci la tua email</div>
                </div>
    
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Conferma password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
    <div class="row justify-content-center text-center align-items-center">
    <div class="col-6">
        <button type="submit" class="btn btn-custom">Registrati</button>
    
    </div>
    <div class="col-6">
    
    <p>Hai già un account? <a href="{{route('login')}}" class=" btn btn-customdue">Fai il login</a></p>
    </div>
    
        </div>
                </form>
    
            </div>
        </div>
        </div>

</x-layout>