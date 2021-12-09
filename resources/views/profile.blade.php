@extends('layout.main')

@section('content')
<section>
    <div class="jumbotron" style="margin-top: -80px ; margin-left: -60px ; max-width: 108%; height: 400px; background-repeat: no-repeat; background-size: cover;background-image: url({{asset('images/jumbotron.png')}});">
            <div class="text-center">
                <img src="{{asset('images/relax.png')}}" class="mt-5" height="100px" alt="">
                <span style="height: 2px; background-color: black"></span>
                <h2 style="font-weight: 700">PROFIL PAGE</h2>
            </div>
      </div>
</section>
    <div class="card" style="width: 100%">
        <div class="card-body pt-5">
            <div class="row d-flex justify-content-around">
                <div class="col-md-5">
                    <div class="text-center">
                        <img src="https://placeimg.com/640/480/any" class="img-fluid rounded" alt="" style="max-height: 400px">
                    </div>
               </div>
               <div class="col-md-5">
                   <div>
                      <h2 align="center" style="font-weight: 800">PROFILE</h2>
                      <h3 style="font-weight: 500"><i class="fas fa-user"></i>&nbsp;&nbsp;|Name</h3>
                      <h5>{{$user->name}}</h5>

                       <h3 style="font-weight: 500"><i class="far fa-envelope"></i>&nbsp;&nbsp;|Email</h3>
                       <h5>{{$user->email}}</h5>

                       <h3 style="font-weight: 500"><i class="fas fa-location-arrow"></i>&nbsp;&nbsp;|Address</h3>
                       <h5>{{$user->address}}</h5>

                       <h3 style="font-weight: 500"><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;|Phone</h3>
                       <h5>{{$user->phone}}</h5>
                   </div>

               </div>
            </div>
        </div>
    </div>
@endsection
