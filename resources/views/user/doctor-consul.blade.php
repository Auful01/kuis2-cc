@extends('layout.main')

@section('content')
<section>
    <div class="jumbotron"  style="display: flex; justify-content: center; align-items: center;margin-top: -80px ; margin-left: -60px ; max-width: 108%; height: 400px; background-repeat: no-repeat; background-size: cover;background-image: url({{asset('images/jumbotron.png')}});">
        {{-- <div style="vertical-align: middle"> --}}
        {{-- </div> --}}
        <h1 class="display-4" align="center" >Doctor Consult</h1>

      </div>
</section>
<section class="pb-5">
    <div class="row">
        <div class="col-md-6">
            <div class="text-center">
                <img src="{{asset('storage/' . $schedule->doctor->photo)}}" class="rounded img-fluid" style="height: 500px" alt="">
            </div>
        </div>
        <div class="col-md-5">
            <h1>{{$schedule->doctor->name}}</h1>
            <small><span class="alert alert-warning p-1 text-muted" >Specialist Dokter {{$schedule->doctor->specialist}}</span></small>
            <br>
            <br>
            <h3>Jadwal yang tersedia</h3>
            <div class="row d-flex justify-content-start" >
                <div class="col-md-3">
                    <h3>Senin</h3>
                </div>
                <div class="col-md-9">
                    <h3>: {{$schedule->monday_start}} - {{$schedule->monday_end}}</h3>
                </div>
                <div class="col-md-3">
                    <h3>Selasa</h3>
                </div>
                <div class="col-md-9">
                    <h3>: {{$schedule->tuesday_start}} - {{$schedule->tuesday_end}}</h3>
                </div>
                <div class="col-md-3">
                    <h3>Rabu</h3>
                </div>
                <div class="col-md-9">
                    <h3>: {{$schedule->wednesday_start}} - {{$schedule->wednesday_end}}</h3>
                </div>
                <div class="col-md-3">
                    <h3>Kamis</h3>
                </div>
                <div class="col-md-9">
                    <h3>: {{$schedule->thursday_start}} - {{$schedule->thursday_end}}</h3>
                </div>
                <div class="col-md-3">
                    <h3>Jumat</h3>
                </div>
                <div class="col-md-9">
                    <h3>: {{$schedule->friday_start}} - {{$schedule->friday_end}}</h3>
                </div>
                <br>
                <a href="" data-toggle="modal" data-target="#order-jadwal" data-harga="{{$schedule->doctor->price}}" class="btn btn-warning btn-order">Konsultasi</a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('modal')
<div class="modal fade" id="order-jadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('doctor-consul.store')}}" method="POST">
                @csrf
                <input type="text" value="{{Request::segment(2)}}" name="doctor_id" hidden>
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
