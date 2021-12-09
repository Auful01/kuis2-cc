@extends('layout.main')

@section('content')
<section>
    <div class="jumbotron"  style="display: flex; justify-content: center; align-items: center;margin-top: -80px ; margin-left: -60px ; max-width: 108%; height: 400px; background-repeat: no-repeat; background-size: cover;background-image: url({{asset('images/jumbotron.png')}});">
        {{-- <div style="vertical-align: middle"> --}}
        {{-- </div> --}}
        <h1 class="display-4" align="center" >Treatment</h1>

      </div>
</section>
<section class="mb-5 mt-5">
    <h1 align="center" class="pb-5">Detail Treatment</h1>
    <div class="row d-flex justify-content-around">
        <div class="col-md-5 " >
            <div class="text-center">
                <img src="{{asset('storage/'. $treatment->photo)}}" class="rounded" style="height: 400px" alt="">
            </div>
            <h3 align="center">Price</h3>
            <h1 align="center" style="font-weight: 600">Rp. {{$treatment->price}}</h1>
        </div>
        <div class="col-md-5">
            <h1>{{$treatment->name}}</h1>
            <br>
            <p>{{$treatment->description}}</p>
            <br>
            <p>Selain mencerahkan treatment ini berfungsi untuk:</p>
            <ul>
                <li>Mengurangi hiperpigmentasi kulit dilapisan dalam</li>
                <li>Mengurangi hiperpigmentasi kulit dilapisan dalam</li>
                <li>Mengurangi hiperpigmentasi kulit dilapisan dalam</li>
                <li>Mengurangi hiperpigmentasi kulit dilapisan dalam</li>
            </ul>

            <br>
            <br>
            <a href="" class="btn btn-warning btn-reservasi" data-toggle="modal" data-harga="{{$treatment->price}}" data-target="#reservasi">Reservasi</a>
        </div>
    </div>
</section>
@endsection


@section('modal')
<div class="modal fade" id="reservasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('reservasi.store')}}" method="POST">
                @csrf
                <input type="text" value="{{Request::segment(2)}}" name="treatment_id" hidden>
                <div class="form-group">
                    <label for="">Hari</label>
                    <input type="date" class="form-control" name="date" id="date1">
                </div>
                <div class="form-group">
                    <label for="">Jam</label>
                    <input type="time" class="form-control" name="time" id="">
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="text" name="price" class="price form-control" id="" disabled>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
        {{-- <div class="modal-footer">

        </div> --}}
      </div>
    </div>
  </div>
@endsection
