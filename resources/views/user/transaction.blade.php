@extends('layout.main')

@section('content')
<div class="jumbotron"  style="display: flex; justify-content: center; align-items: center;margin-top: -80px ; margin-left: -60px ; max-width: 108%; height: 400px; background-repeat: no-repeat; background-size: cover;background-image: url({{asset('images/jumbotron.png')}});">
    {{-- <div style="vertical-align: middle"> --}}
    {{-- </div> --}}
    <h1 class="display-4" align="center" >Treatment</h1>

  </div>
<section>
    <div class="card">
        <div class="card-body">
            <h2>Transaksi</h2>
            {{-- <a href="" class="mb-2 btn btn-primary">Tambah Dokter</a> --}}
            <table id="myTable" class="table">
                <thead>
                    <th>No.</th>
                    <th>Nama Treatment</th>
                    <th>Jenis Treatment</th>
                    <th>Tanggal Reservasi</th>
                    <th>Waktu Reservasi</th>
                    <th>Harga</th>
                    <th>Konfirmasi</th>
                    <th>Status</th>
                    <th>aksi</th>
                </thead>
                <tbody>
                    @foreach ($reservation as $r)

                    <tr class="p-2">
                        <td>1</td>
                        <td>{{$r->treatment->name}}</td>
                        <td>{{$r->treatment->category->category}}</td>
                        <td>{{$r->date}} &nbsp; <a class="btn btn-primary btn-reschedule" data-toggle="modal" data-id="{{$r->id}}" data-time="{{$r->time}}" data-date="{{$r->date}}" data-url="{{route('reschedule-reserv',$r->id)}}" data-target="#reschedule" title="reschedule"><i class="fas fa-history"></i></a></td>
                        <td>{{$r->time}} &nbsp; <a class="btn btn-primary btn-reschedule" data-toggle="modal" data-id="{{$r->id}}" data-time="{{$r->time}}" data-date="{{$r->date}}" data-url="{{route('reschedule-reserv',$r->id)}}" data-target="#reschedule" title="reschedule"><i class="fas fa-history"></i></a></td>
                        <td>{{$r->treatment->price}}</td>
                        <td><select name="confirm" class="form-control confirm" data-id="{{$r->id}}" id="confirm">
                            @if ($r->user_confirm == 0)
                                <option value="0" selected>Batalkan</option>
                                <option value="1">Menunggu Konfirmasi</option>
                                <option value="2">Konfirmasi</option>
                            @elseif ($r->user_confirm == 1)
                            <option value="0" >Batalkan</option>
                            <option value="1" selected>Menunggu Konfirmasi</option>
                            <option value="2">Konfirmasi</option>
                            @else
                            <option value="0" >Batalkan</option>
                            <option value="1" >Menunggu Konfirmasi</option>
                            <option value="2" selected>Konfirmasi</option>
                            @endif

                        </select></td>
                        <td>
                            @if ($r->status == 0)
                                <span class="alert alert-danger">Dibatalkan</span>
                            @elseif ($r->status == 1)
                                <span class="alert alert-info">Diproses</span>
                            @else
                            <span class="alert alert-success">Selesai</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{route('print-reserv',$r->id)}}">print</a>
                        </td>
                    </tr>

                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        // $('.confirm').on('click', function () {

        // })

        $('.confirm').on('change', function(){
            var id = $(this).data('id')
            var data = $(this).val();
            console.log('coba', id, data);
            $.ajax({
                url : '/confirm',
                type : 'GET',
                dataType : 'JSON',
                data : {
                    "id" : id,
                    "data" : data
                },success:function data(data){
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
</section>
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
