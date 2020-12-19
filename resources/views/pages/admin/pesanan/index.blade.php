@extends('layouts.admin')

@section('content')
     <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
    </a>
    </div>

        
    <form action="{{route('pesanan-search')}}" class="form-inline my-2 my-lg-0" method="POST">
        @csrf
        <input  class="form-control mr-sm-2" placeholder="Cari Kode Unik atau Kode Pemesanan" aria-label="Seacrh" name="search">
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
    </form>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Kode Pemesanan</th>
                            <th>Pembeli</th>
                            <th>Status</th>
                            <th>Total Harga</th>
                            <th>Kode Unik</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pesanans as $pesanan)
                       <tr align="center">
                         <td>{{ $pesanan->id}}</td>
                         <td>{{ $pesanan->kode_pemesanan}}</td>
                         <td>{{ $pesanan->user->name}}</td>
                         <td>
                             @if ($pesanan->status == 0)
                                 Belum Melakukan Pembayaran
                             @else
                                 Sudah Melakukan Pembayaran
                             @endif
                         </td>
                         <td>Rp.{{ number_format($pesanan->total_harga+$pesanan->kode_unik)}}</td>
                         <td>{{ $pesanan->kode_unik}}</td>
                         <td>
                            <a href="{{route('pesanan-show', $pesanan->id)}}" class="btn btn-primary d-block mb-2">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{route('pesanan-edit', $pesanan->id)}}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                        <form action="{{route('pesanan-destroy', $pesanan->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger ">
                                <i class="fa fa-trash"></i>
                            </button>       
                        </form>
                         </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection

@push('addon-script')
<script  type="text/javascript"  src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


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