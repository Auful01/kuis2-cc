@extends('layout.main')

@section('content')
<div class="jumbotron elevation-3"  style="display: flex; justify-content: center; align-items: center;margin-top: -80px ; margin-left: -60px ; max-width: 108%; height: 400px; background-repeat: no-repeat; background-size: cover;background-image: url({{asset('images/jumbotron.png')}});">
    {{-- <div style="vertical-align: middle"> --}}
    {{-- </div> --}}
    <h1 class="display-4" align="center" >Dokter</h1>
</div>
<section class="mx-3">
    <div class="card">
        <div class="card-body">
            <h2>Dokter</h2>
            <a data-toggle="modal" data-target="#tambah-dokter"  class="mb-2 btn btn-primary">Tambah Dokter</a>
            <table id="myTable" class="table">
                <thead>
                    <th>No.</th>
                    <th>Nama Dokter</th>
                    <th>Job</th>
                    <th>Foto</th>
                    <th>Harga</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach ($doctor as $d)
                    <tr class="p-2 align-middle">
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->specialist}}</td>
                        <td><img src="{{asset('storage/'.$d->photo)}}"  class="rounded" style="height: 100px" alt=""></td>
                        <td>{{$d->price}}</td>
                        <td>
                            {{-- <button class="btn btn-warning btn-editDokter" data-toggle="modal" data-target="#edit-dokter" data-id="{{$d->id}}" ></i></button> --}}
                            <form action="{{route('doctor-list.destroy', $d->id)}}" method="POST">
                            <a href="" class="btn btn-primary add-schedule"  data-toggle="modal" data-target="#tambah-jadwal" data-id="{{$d->id}}"><i class="fas fa-clock"></i></a>
                            <a class="btn btn-warning btn-editDokter" data-toggle="modal" data-target="#edit-dokter" data-id="{{$d->id}}" data-name="{{$d->name}}" data-specialist="{{$d->specialist}}" data-price="{{$d->price}}" data-photo="{{asset('storage/'. $d->photo)}}" data-url="{{route('doctor-list.update', $d->id)}}"><i class="fas fa-edit"></i></a>

                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda ingin menghapus data ini?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>



@endsection

@section('modal')
<div class="modal fade" id="tambah-dokter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Dokter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('doctor-list.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" name="name" class="form-control">
              </div>
              <div class="form-group">
                  <label for="">Photo</label>
                  <input type="file" name="photo" class="form-control">
              </div>

              <div class="form-group">
                  <label for="">Specialist</label>
                  <input type="text" name="specialist" class="form-control" id="specialist">
                  {{-- <textarea name="specialist" class="form-control" id="" cols="30" rows="10"></textarea> --}}
              </div>
              <div class="form-group">
                  <label for="">Harga</label>
                  <input type="text" name="price" class="form-control">
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

  {{-- EDIT MODAL --}}
<div class="modal fade" id="edit-dokter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Dokter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" class="url" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" name="name" class="form-control name">
              </div>
              <div class="form-group">
                  <label for="">Photo</label>
                  <input type="file" name="photo" class="form-control photo">
              </div>

              <div class="form-group">
                  <label for="">Specialist</label>
                  <input type="text" name="specialist" class="form-control specialist" id="specialist">
                  {{-- <textarea name="specialist" class="form-control" id="" cols="30" rows="10"></textarea> --}}
              </div>
              <div class="form-group">
                  <label for="">Harga</label>
                  <input type="text" name="price" class="form-control price">
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


  {{-- SCHEDULE CREATE --}}
  <div class="modal fade" id="tambah-jadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Atur Schedule</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('schedule.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="text" class="id" name="doctor_id" hidden>
              <div class="form-group">
                  <label for="">Senin</label>
                  <div class="row d-flex justify-content-around">
                      <input type="time" name="monday_start" class="form-control col-md-5">
                      <p class="col-md-1" align="center">-</p>
                      <input type="time" name="monday_end" class="form-control col-md-5">
                  </div>
              </div>
              <div class="form-group">
                  <label for="">Selasa</label>
                  <div class="row d-flex justify-content-around">
                      <input type="time" name="tuesday_start" class="form-control col-md-5">
                      <p class="col-md-1" align="center">-</p>
                      <input type="time" name="tuesday_end" class="form-control col-md-5">
                  </div>
              </div>
              <div class="form-group">
                  <label for="">Rabu</label>
                  <div class="row d-flex justify-content-around">
                      <input type="time" name="wednesday_start" class="form-control col-md-5">
                      <p class="col-md-1" align="center">-</p>
                      <input type="time" name="wednesday_end" class="form-control col-md-5">
                  </div>
              </div>
              <div class="form-group">
                  <label for="">Kamis</label>
                  <div class="row d-flex justify-content-around">
                      <input type="time" name="thursday_start" class="form-control col-md-5">
                      <p class="col-md-1" align="center">-</p>
                      <input type="time" name="thursday_end" class="form-control col-md-5">
                  </div>
              </div>
              <div class="form-group">
                  <label for="">Jumat</label>
                  <div class="row d-flex justify-content-around">
                      <input type="time" name="friday_start" class="form-control col-md-5">
                      <p class="col-md-1" align="center">-</p>
                      <input type="time" name="friday_end" class="form-control col-md-5">
                  </div>
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
