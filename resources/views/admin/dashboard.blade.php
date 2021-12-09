@extends('layout.main')

@section('content')
<div class="jumbotron elevation-3"  style="display: flex; justify-content: center; align-items: center;margin-top: -80px ; margin-left: -60px ; max-width: 108%; height: 400px; background-repeat: no-repeat; background-size: cover;background-image: url({{asset('images/jumbotron.png')}});">
    {{-- <div style="vertical-align: middle"> --}}
    {{-- </div> --}}
    <h1 class="display-4" align="center" >Dashboard</h1>

  </div>
<div class="container-fluid mx-3">
    <section>
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$treatment}}</h3>

                  <p>Treatment</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$dokter}}<sup style="font-size: 20px">%</sup></h3>

                  <p>Doctor</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$consult}}</h3>

                  <p>Consultation</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$reserv}}</h3>

                  <p>Reservation</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

    </section>
    <section>
        
        <div class="card">
            <div class="card-body">
                <h2>Transaksi</h2>
                {{-- <a href="" class="mb-2 btn btn-primary">Tambah Dokter</a> --}}
                <table id="myTable" class="table">
                    <thead>
                        <th>No.</th>
                        <th>Nama Treatment</th>
                        <th>Customer</th>
                        <th>Jenis Treatment</th>
                        <th>Tanggal Reservasi</th>
                        <th>Waktu Reservasi</th>
                        <th>Harga</th>
                        <th>Konfirmasi</th>
                        <th>Status</th>
                        <th>aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($reservasi as $r)
    
                        <tr class="p-2">
                            <td>1</td>
                            <td>{{$r->treatment->name}}</td>
                            <td>{{$r->user->name}}</td>
                            <td>{{$r->treatment->category->category}}</td>
                            <td>{{$r->date}}</td>
                            <td>{{$r->time}}</td>
                            <td>{{$r->treatment->price}}</td>
                            <td><select name="status" class="form-control status" data-id="{{$r->id}}" id="status">
                                {{-- <option value="0">Dibatalkan</option>
                                    <option value="1">Diproses</option>
                                    <option value="2">Selesai</option> --}}
                                @if ($r->status == 0)
                                    <option value="0" selected>Dibatalkan</option>
                                    <option value="1">Diproses</option>
                                    <option value="2">Selesai</option>
                                @elseif ($r->status == 1)
                                    <option value="0" >Dibatalkan</option>
                                    <option value="1" selected>Diproses</option>
                                    <option value="2">Selesai</option>
                                @else
                                    <option value="0" >Dibatalkan</option>
                                    <option value="1" >Diproses</option>
                                    <option value="2" selected>Selesai</option>
                                @endif
    
                            </select></td>
    
                            <td>
                                @if ($r->user_confirm == 0)
                                    <span class="alert alert-danger">Dibatalkan</span>
                                @elseif ($r->user_confirm == 1)
                                    <span class="alert alert-info">Menunggu Konfirmasi</span>
                                @else
                                <span class="alert alert-success">Dikonfirmasi</span>
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
    </section>
</div>


@endsection
