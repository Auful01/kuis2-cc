@extends('layout.main')

@section('content')
<section>
    <div class="jumbotron"  style="display: flex; justify-content: center; align-items: center;margin-top: -80px ; margin-left: -60px ; max-width: 108%; height: 400px; background-repeat: no-repeat; background-size: cover;background-image: url({{asset('images/jumbotron.png')}});">
        {{-- <div style="vertical-align: middle"> --}}
        {{-- </div> --}}
        <h1 class="display-4" align="center" >Doctor</h1>

      </div>
</section>
<section class="mx-5 pb-5">
    <h1 align="center" class="mb-5">Meet Our Treatment Specialists</h1>
    <div class="row d-flex justify-content-around">
        @foreach ($doctor as $d)
        <div class="col-md-3">
            <div class="text-center"><img src="{{asset('storage/'. $d->photo)}}" class="img-fluid rounded" style="height: 300px" alt=""></div>
            <small class="text-muted">Dokter {{$d->specialist}}</small>
            <p>{{Str::limit('Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex est veritatis doloremque corrupti voluptatum a, cumque, perferendis tempore nihil amet vel. Modi, enim ipsam fugiat molestias deleniti vel sit quis?', 50 , ('....'))}}</p>
            <a href="{{route('doctor-consul.show', $d->id)}}" class="btn btn-warning" >Konsultasi</a>
        </div>
        @endforeach

    </div>

        {{-- <div class="col-md-3">
            <img src="https://placeimg.com/640/480/any" style="height: 300px" alt="">
            <small class="text-muted">Dokter Kulit</small>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex est veritatis doloremque corrupti voluptatum a, cumque, perferendis tempore nihil amet vel. Modi, enim ipsam fugiat molestias deleniti vel sit quis?</p>
            <a href="" class="btn btn-warning" >Konsultasi</a>
        </div>
        <div class="col-md-3">
            <img src="https://placeimg.com/640/480/any" style="height: 300px" alt="">
            <small class="text-muted">Dokter Kulit</small>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex est veritatis doloremque corrupti voluptatum a, cumque, perferendis tempore nihil amet vel. Modi, enim ipsam fugiat molestias deleniti vel sit quis?</p>
            <a href="" class="btn btn-warning" >Konsultasi</a>
        </div>
    </div> --}}
</section>
@endsection
