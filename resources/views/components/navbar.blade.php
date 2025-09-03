<nav class="navbar navbar-expand-lg navbar_custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">SECONDAMANO  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse  navbar_custom" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link" href="{{route('article.index')}}">Tutti gli Articoli</a>
        </li>
        
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{route('article.create')}}">Inserisci il tuo articolo<a>
        </li>

       @endauth


      </ul>
      
     
      @guest
           
          <a href="{{ route('login') }}" class="btn btn-custom">Log In</a>
          <a href="{{ route('register') }}" class="btn btn-customdue">Register</a>

      @endguest
      
      
      

      @auth
            <form class="d-flex" role="logout" action="{{route('logout')}}" method="POST">
        @csrf
       
        <button class="btn btn-custom" type="submit">Log Out</button>
      </form>
      @endauth
      
    </div>
  </div>
</nav>