@extends('layout.main')

@section('content')
<div class="jumbotron elevation-3"  style="display: flex; justify-content: center; align-items: center;margin-top: -80px ; margin-left: -60px ; max-width: 108%; height: 400px; background-repeat: no-repeat; background-size: cover;background-image: url({{asset('images/jumbotron.png')}});">
    {{-- <div style="vertical-align: middle"> --}}
    {{-- </div> --}}
    <h1 class="display-4" align="center" >Treatment</h1>
</div>
<section class="mx-5">
    <div class="card">
        <div class="card-body">
            <h2>Layanan Treatments</h2>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Treatments</a>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#add-category">Tambah Kateogri</a>
            <table id="myTable" class="table">
                <thead>
                    <th>No</th>
                    <th>Nama Treatments</th>
                    <th>Kategori</th>
                    <th max-width="150px">Deskripsi</th>
                    <th>gambar</th>
                    <th>Harga</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    {{-- <tr class="p-2">
                        <td>1</td>
                        <td>Coba</td>
                        <td>Coba</td>
                        <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta corrupti minus doloribus, esse, nobis repellat aperiam quae repudiandae, enim eligendi distinctio facere! Id exercitationem, rerum corporis quam eveniet asperiores laborum!</td>
                        <td><img src="https://placeimg.com/640/480/any" class="rounded" style="height: 100px" alt=""></td>
                        <td>Rp. 1.000.000</td>
                        <td><span class="alert alert-success p-2">Sukses</span></td>
                    </tr> --}}
                    @foreach ($treatment as $t)


                    <tr class="p-2">
                        <td>{{$t->id}}</td>
                        <td>{{$t->name}}</td>
                        <td>{{$t->category->category}}</td>
                        <td>{{$t->description}}</td>
                        <td><img src="{{asset('storage/'.$t->photo)}}" class="rounded" style="height: 100px" alt=""></td>
                        <td>{{$t->price}}</td>
                        <td>
                            <form action="{{route('treatment.destroy', $t->id)}}" method="POST">
                            <a class="btn btn-warning btn-editTreatment" data-toggle="modal" data-target="#edit-treatment" data-url="{{route('treatment.update', $t->id)}}" data-name="{{$t->name}}" data-description="{{$t->description}}" data-photo="{{asset('storage/'.$t->photo)}}" data-kategori="{{$t->category}}" data-harga="{{$t->price}}"><i class="far fa-edit"></i></a>

                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></i></button>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Treatment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('treatment.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="">Nama Treatment</label>
                  <input type="text" name="name" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="">Kategori Treatment</label>
                <select name="category_id" class="form-control" id="" required>
                    @foreach ($category as $c )
                        <option value="{{$c->id}}">{{$c->category}} </option>
                    @endforeach
                </select>
                {{-- <input type="text" name="name" class="form-control"> --}}
            </div>
              <div class="form-group">
                  <label for="">Deskripsi</label>
                  <textarea name="description" class="form-control" id="" cols="30" rows="10" required></textarea>
              </div>
              <div class="form-group">
                  <label for="">Upload Foto</label>
                  <input type="file" name="photo" class="form-control" onchange="readURL(this)" required>
                  <img id="blah" src="#" alt="your image" />
              </div>
              <div class="form-group">
                  <label for="">Harga</label>
                  <input type="text" name="price" class="form-control" required>
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

{{-- EDIT TREATMENT --}}

<div class="modal fade" id="edit-treatment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Treatment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" class="url" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="">Nama Treatment</label>
                  <input type="text" name="name" class="form-control name" required>
              </div>
              <div class="form-group">
                <label for="">Kategori Treatment</label>
                <select name="category_id" class="form-control " id="treatment-select" required>

                    {{-- @foreach ($category as $c )
                        <option value="{{$c->id}}" class="cat">{{$c->category}}</option>
                    @endforeach --}}
                </select>
                {{-- <input type="text" name="name" class="form-control"> --}}
            </div>
              <div class="form-group">
                  <label for="">Deskripsi</label>
                  <textarea name="description" class="form-control description" id="" cols="30" rows="10" required></textarea>
              </div>
              <div class="form-group">
                  <label for="">Upload Foto</label>
                  <input type="file" name="photo" onchange=" readURL(this)" class="form-control" required>
                  <img id="blah" src="" class="photo" alt="your image" height="100px" />
              </div>
              <div class="form-group">
                  <label for="">Harga</label>
                  <input type="text" name="price" class="form-control price" required>
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

  {{-- TAMBAH KATEGORI --}}

  <div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('category.store')}}" method="POST" >
              @csrf
              <div class="form-group">
                  <label for="">Nama Treatment</label>
                  <input type="text" name="category" class="form-control">
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
