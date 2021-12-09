@extends('layout.main')

@section('content')
<section>
    <div class="jumbotron"  style="display: flex; justify-content: center; align-items: center;margin-top: -80px ; margin-left: -60px ; max-width: 108%; height: 400px; background-repeat: no-repeat; background-size: cover;background-image: url({{asset('images/jumbotron.png')}});">
        {{-- <div style="vertical-align: middle"> --}}
        {{-- </div> --}}
        <h1 class="display-4" align="center" >Consultation</h1>

      </div>
    <div class="card">
        <div class="card-body">
            <h2>Transaksi Konsultasi</h2>
            {{-- <a href="" class="mb-2 btn btn-primary">Tambah Dokter</a> --}}
            <table id="myTable" class="table">
                <thead>
                    <th>No.</th>
                    <th>Nama Dokter</th>
                    <th>Spesialis</th>
                    <th>Tanggal Konsul</th>
                    <th>Waktu Konsul</th>
                    <th>Harga</th>
                    <th>Konfirmasi</th>
                    <th>Status</th>
                    <th>aksi</th>
                </thead>
                <tbody>
                    @foreach ($consult as $c)

                    <tr class="p-2">
                        <td>1</td>
                        <td>{{$c->doctor->name}}</td>
                        <td>{{$c->doctor->specialist}}</td>
                        <td>{{$c->date}} &nbsp; <a class="btn btn-primary btn-reschedule" data-toggle="modal" data-id="{{$c->id}}" data-date="{{$c->date}}" data-time="{{$c->time}}" data-url="{{route('reschedule-consult',$c->id)}}" data-target="#reschedule" title="reschedule"><i class="fas fa-history"></i></a></td>
                        <td>{{$c->time}} &nbsp; <a class="btn btn-primary btn-reschedule" data-toggle="modal" data-id="{{$c->id}}" data-date="{{$c->date}}" data-time="{{$c->time}}" data-url="{{route('reschedule-consult',$c->id)}}" data-target="#reschedule" title="reschedule"><i class="fas fa-history"></i></a></td>
                        <td>{{$c->doctor->price}}</td>
                        <td><select name="confirm" class="form-control confirm" data-id="{{$c->id}}" id="">
                            <option value="0">Dibatalkan</option>
                            <option value="1">Unconfirmed</option>
                            <option value="2">Confirmed</option>
                        </select></td>
                        <td>
                            @if ($c->status == 0)
                                <span class="alert alert-danger">Dibatalkan</span>
                            @elseif ($c->status == 1)
                                <span class="alert alert-info">Diproses</span>
                            @else
                            <span class="alert alert-success">Selesai</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('print-consult',$c->id)}}" class="btn btn-danger">print</a>
                        </td>
                    </tr>

                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.confirm').on('change', function () {
        var id = $(this).data('id')
        var confirm = $(this).val();
        console.log(id,confirm);
        $.ajax({
            url : 'consult-confirm',
            type : 'GET',
            dataType : 'JSON',
            data : {
                "id" : id,
                "confirm" : confirm
            },
            success: function data(data){
                console.log(data.success);
            }
        })
    })


    $('.btn-reschedule').on('click', function () {
        var id = $(this).data('id')
        var url = $(this).data('url')
        var time = $(this).data('time')
        var date = $(this).data('date')
        $('.time').val(time)
        $('.date').val(date)
        $('.url').attr('action',url)
    })
</script>
@endsection

@section('modal')
<div class="modal fade" id="reschedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Reschedule</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" class="url" method="POST">
              @csrf
              {{-- @method('PUT') --}}
              <input type="text" name="id" class="id" id="id" hidden>
              <div class="form-group">
                  <label for="">Waktu Konsul</label>
                  <input type="time" name="time" class="time form-control" id="time">
              </div>
              <div class="form-group">
                  <label for="">Tanggal Konsul</label>
                  <input type="date" name="date" class="date form-control" id="date">
              </div>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>

      </div>
    </div>
  </div>
@endsection
