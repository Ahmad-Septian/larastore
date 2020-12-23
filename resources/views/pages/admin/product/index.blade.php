@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Product</h1>
            <a href="{{route('product-create')}}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus">Tambah Product</i>
            </a>
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
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" width:"100%" cellspacing="0">
                    <thead>
                      <tr align="center">
                        <th>NO</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Size</th>
                        <th>Jenis Bahan</th>
                        <th>Berat</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($items as $key => $item)
                          <tr align="center">
                            <td>{{$items->firstItem() + $key}}</td>
                            <td>
                              <img src="{{Storage::url($item->gambar)}}" alt="" width="150px" height="100px" class="img-fluid">
                            </td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->kategori->nama}}</td>
                            <td>Rp. {{number_format($item->harga)}}</td>
                            <td>{{$item->stok}}</td>
                            <td>{{$item->size}}</td>
                            <td>{{$item->jenis_bahan}}</td>
                            <td>{{$item->berat}}</td>
                            <td>
                              <a href="{{route('product-edit', $item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil-alt d-inline"></i></a>   

                              <form action="{{route('product-destroy', $item->id)}}" method="POST" class="d-block" onclick="return confirm('yakin?');">
                                @csrf
                                @method('delete')
                               <button class="btn btn-danger mt-2 btn-sm">
                               <i class="fa fa-trash d-inline"></i>
                               </button>
                           </form>
                            </td>
                          </tr>
                      @empty
                      <tr>
                        <td colspan="7" class="text-center">Data Kosong</td>
                    </tr>
                      @endforelse
                    </tbody>
                  </table>
                  {{$items->links()}}
                </div>
              </div>
            </div>
          </div>
        </div>

       
@endsection

@push('addon-script')
<script  type="text/javascript"  src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

@if (Session::has('record_add'))
<script>
  swal("Sukses", "{!!Session::get('record_add')!!}", "success",{
    button:"OK",
  });
</script>
@endif

@if (Session::has('record_update'))
<script>
  swal("Sukses", "{!!Session::get('record_update')!!}", "success",{
    button:"OK",
  });
</script>
@endif

@if (Session::has('record_delete'))
<script>
  swal("Sukses", "{!!Session::get('record_delete')!!}", "success",{
    button:"OK",
  });
</script>
@endif
@endpush