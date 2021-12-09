@extends('layout.main')

@section('content')
    <section>
        <div class="jumbotron"  style="display: flex; justify-content: center; align-items: center;margin-top: -80px ; margin-left: -60px ; max-width: 108%; height: 400px; background-repeat: no-repeat; background-size: cover;background-image: url({{asset('images/jumbotron.png')}});">
            {{-- <div style="vertical-align: middle"> --}}
            {{-- </div> --}}
            <h1 class="display-4" align="center" >Treatment</h1>

          </div>
    </section>
    <section>
        <h2 align="center">{{$category->category}}</h2>


        <div class="row d-flex justify-content-around">
        @foreach ($treatment as $t)

            <div class="col-md-3 ">
                <div class="row d-flex justify-content-center">
                    <div class="card" style="width: 18rem;background: rgb(255, 207, 117)">
                        <img class="card-img-top rounded" src="{{asset('storage/' . $t->photo)}}" alt="Card image cap">
                        <div class="card-body">
                          <h3 class="">{{$t->name}}</h3>
                          <hr>
                          <p class="card-text">{{Str::limit($t->description, 50, '...') }}</p>
                          <a href="{{ route('detail-treatment',$t->id)}}" class="btn btn-warning w-100" ><i class="fas fa-shopping-cart"></i>&nbsp; Detail</a>
                        </div>
                      </div>
                </div>
            </div>
            {{-- <div class="col-md-1">

            </div> --}}

        @endforeach

            {{-- <div class="col-md-2">
                <div class="card" style="width: 18rem;background: rgb(255, 207, 117)">
                    <img class="card-img-top rounded" src="https://placeimg.com/640/480/any"  alt="Card image cap">
                    <div class="card-body">
                      <h3 class="">Card title</h3>
                      <hr>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-warning w-100" ><i class="fas fa-shopping-cart"></i>&nbsp; Detail</a>
                    </div>
                  </div>
            </div>
            <div class="col-md-2">
                <div class="card" style="width: 18rem;background: rgb(255, 207, 117)">
                    <img class="card-img-top rounded" src="https://placeimg.com/640/480/any"  alt="Card image cap">
                    <div class="card-body">
                      <h3 class="">Card title</h3>
                      <hr>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-warning w-100" ><i class="fas fa-shopping-cart"></i>&nbsp; Detail</a>
                    </div>
                  </div>
            </div> --}}
        </div>
    </section>
@endsection
