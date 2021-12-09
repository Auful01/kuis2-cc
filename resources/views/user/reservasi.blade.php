@extends('layout.main')

@section('content')
<section>
    <div class="jumbotron">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>
      </div>
</section>
<section>
    <form action="" method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">No. KTP</label>
            <input type="text" class="form-control" name="KTP" id="inputEmail4" placeholder="Email">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Nama</label>
            <input type="text" class="form-control" id="inputPassword4" placeholder="Password">
          </div>
          <div class="form-group col-md-6">
              <label for="">Jenis Kelamin</label>
                <select class="custom-select mr-sm-2" name="gender" id="inlineFormCustomSelectPref">
                    <option selected>Choose...</option>
                    <option value="1">Laki-Laki</option>
                    <option value="2">Perempuan</option>
                </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Tanggal Lahir</label>
            <input type="date" class="form-control" name="" id="inputPassword4" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <textarea type="text" class="form-control" rows="10" name="" id="inputAddress" placeholder="1234 Main St"></textarea>
        </div>
        <div
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">No. Telp</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Email</label>
            <input type="email" class="form-control" name="" id="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Jenis Pembayaran</label>
            <select name="" id="" class="form-control">
                <option value=""> ... </option>
                <option value=""> ... </option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Jenis Reservasi</label>
            <select name="" id="" class="form-control">
                <option value=""> ... </option>
                <option value=""> ... </option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Waktu</label>
            <input type="time" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Tanggal</label>
            <input type="date" class="form-control" name="" id="">
          </div>
        </div>
        {{-- <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div> --}}
        <button type="submit" class="btn btn-danger">Reservasi Sekarang</button>
      </form>
</section>
@endsection
