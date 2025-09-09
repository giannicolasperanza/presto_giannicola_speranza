<div class="row justify-content-center">
@foreach($articles as $article)
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
    <div class="card mx-auto cardCustom" 
         style="width:20rem;">
  
  <div class="card-body">
 
  <div class="d-flex justify-content-between align-items-center">
  <div class="col-6">
    <p class="card-title h6 mb-5 text-center">Creato da: {{$article->user->name}}</p>
  </div>

  <div class="col-6">
    <p class="card-title  mb-5 text-center">{{$article->category->name}}</p>
  </div>
</div>


  <div class="d-flex justify-content-between align-items-center">
  <div class="col-6">
    <h5 class="card-title h3 mb-5 text-center">{{$article->title}}</h5>
  </div>

  <div class="col-6">
    <h5 class="card-title h5 mb-5 text-center">{{$article->price}} €</h5>
  </div>
</div>
  
  


<div class="d-flex justify-content-between align-items-center">
  <div class="col-6">
   <a href="{{route('article.show', compact('article'))}}" class="btn btn-custom">Leggi di piu</a>
</div>

<div class="col-6 d-flex justify-content-end">
   @auth   
     @if(Auth::user()->id ==$article->user_id)
    <a href="{{route('article.edit', compact('article'))}}" class="btn btn-customdue">Modifica</a>
@endif
@endauth

</div>
  </div>
</div>
    </div>
@endforeach
</div>