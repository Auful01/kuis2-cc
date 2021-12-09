@extends('layout.main')

@section('content')
<div class="jumbotron elevation-3"  style="display: flex; justify-content: center; align-items: center;margin-top: -80px ; margin-left: -60px ; max-width: 108%; height: 400px; background-repeat: no-repeat; background-size: cover;background-image: url({{asset('images/jumbotron.png')}});">
    {{-- <div style="vertical-align: middle"> --}}
    {{-- </div> --}}
    <h1 class="display-4" align="center" >User</h1>
    </div>

<section class="mx-5">
    <div class="card">
        <div class="card-body">
            <h2>Customer</h2>
            <a href="" class="btn btn-primary mb-3">Tambah Customer</a>
            <table id="myTable" class="table">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($user as $u)
                    <tr class="p-2">
                        <td>1</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>Sidoarjo</td>
                        <td>08221723721</td>
                        <td>@if ($u->role == 1)
                            <span class="alert alert-success">Admin</span>
                            @else
                            <span class="alert alert-info">User</span>
                        @endif</td>
                        <td>
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>


@endsection
