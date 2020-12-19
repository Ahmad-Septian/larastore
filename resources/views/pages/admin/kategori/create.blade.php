@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
        </div>
        <div class="row">
          <div class="col-12">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ( $errors->all() as $error)
                        <li>{{$error}}</li>                
                    @endforeach
                </ul>
            </div>   
            @endif
            
            <div class="card card-shadow">
              <div class="card-body">
               <form action="{{route('kategori-store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" name="gambar" placeholder="Gambar">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{old('nama')}}">
                </div>
                <button class="btn btn-primary btn-block" type="submit">
                    Simpan
                </button>
                </form>
              </div>
            </div>
          </div>
        </div>

       
@endsection