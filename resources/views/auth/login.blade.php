<x-layout>
    <div class="container  align-items-center justify-content-center my-5">
        <div class="row align-items-center justify-content-center">
            
                
                <div class="col-12 col-md-4 cardCustom">
                <h1 class='display-5 text-center'>Login</h1>
                <form action="{{route('login')}}" method="POST">
                    @csrf
    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" aria-describedby="emailHelp" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div id="emailHelp" class="form-text">Inserisci la tua email</div>
                    </div>
    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row justify-content-center text-center align-items-center">
                        <div class="col-6">
                            <button type="submit" class="btn btn-custom">Accedi</button>
                        </div>
                        <div class="col-6">
                            <p>Non hai un account? <a href="{{route('register')}}" class="btn btn-customdue">Registrati</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>