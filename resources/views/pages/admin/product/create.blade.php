@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">TambahProduct</h1>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ( $errors->all() as $error)
                    <li>{{$error}}</li>                
                @endforeach
            </ul>
        </div>   
        @endif    
        
        <div class="row">
          <div class="col-12">
            <div class="card card-shadow">
              <div class="card-body">
               <form action="{{route('product-store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-gorup mb-2">
                  <label for="kategori_id">Kategori</label>
                  <select style="width: 200px" name="kategori_id" required class="select2multiple " multiple>
                      @foreach ($kategoris as $kategori)
                          <option value="{{$kategori->id}}">
                              {{$kategori->nama}}
                          </option>
                      @endforeach
                  </select>
                 </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" name="gambar" placeholder="Gambar">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{old('nama')}}">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" placeholder="Harga" value="{{old('harga')}}">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" name="stok" placeholder="stok" value="{{old('stok')}}">
                </div>
                <div class="form-group">
                    <label for="size">Size</label>
                    <select name="size" id="" required class="form-control">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis_bahan">Jenis Bahan</label>
                    <input type="text" class="form-control" name="jenis_bahan" placeholder="Jenis Bahan" value="{{old('jenis_bahan')}}">
                </div>
                <div class="form-group">
                    <label for="berat">Berat</label>
                    <input type="text" class="form-control" name="berat" placeholder="Berat" value="{{old('berat')}}">
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

@push('prepend-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.3/select2.min.css">
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}
@endpush
@push('addon-script')
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}
<script  type="text/javascript"  src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.3/select2.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.select2multiple').select2({
        placeholder:"Pilih Kategori",
        allowClear:true,
       
    });
});
</script>
@endpush