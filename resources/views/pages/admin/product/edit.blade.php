@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Edit Product {{$item->nama}}</h1>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card card-shadow">
              <div class="card-body">
               <form action="{{route('product-update', $item->id)}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <img src="{{asset(Storage::url($item->gambar))}}" alt="" width="20%" class="mb-2">
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" name="gambar" placeholder="Gambar" value="{{$item->gambar}}">
                </div>
                <div class="form-gorup mb-2">
                  <label for="kategori_id">Kategori</label>
                  <select style="width: 200px" name="kategori_id"  class="select2multiple " multiple>
                      @foreach ($kategoris as $kategori)
                          <option value="{{$kategori->id}}">
                              {{$kategori->nama}}
                          </option>
                      @endforeach
                  </select>
                 </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{$item->nama}}">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" placeholder="Harga" value="{{$item->harga}}">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" name="stok" placeholder="stok" value="{{$item->stok}}">
                </div>
                <div class="form-group">
                    <label for="jenis_bahan">Jenis Bahan</label>
                    <input type="text" class="form-control" name="jenis_bahan" placeholder="Jenis Bahan" value="{{$item->jenis_bahan}}">
                </div>
                <div class="form-group">
                    <label for="berat">Berat</label>
                    <input type="text" class="form-control" name="berat" placeholder="Berat" value="{{$item->berat}}">
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