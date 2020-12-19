@extends('layouts.admin')

@section('content')
     <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Pesanan {{$pesanan->user->name}}</h1>
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

   <div class="card shadow">
       <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{$pesanan->id}}</td>
            </tr>
            <tr>
                <th>Kode Pemesanan</th>
                <td>{{$pesanan->kode_pemesanan}}</td>
            </tr>
            <tr>
                <th>Pembeli</th>
                <td>{{$pesanan->user->name}}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{$pesanan->user->alamat}}</td>
            </tr>
            <tr>
                <th>No.Hp</th>
                <td>{{$pesanan->user->nohp}}</td>
            </tr>
            <tr>
                <th>Status</th>
                 <td> 
                        @if ($pesanan->status == 0)
                            Belum Melakukan Pembayaran
                        @else
                            Sudah Melakukan Pembayaran
                        @endif
                </td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td>Rp. {{number_format($pesanan->total_harga+$pesanan->kode_unik)}}</td>
            </tr>
            <tr>
                <th>Pembelian</th>
                <td>
                    <table class="table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Jumlah Pesanan</th>
                        <th>Harga</th>
                        <th>Product ID</th>
                        <th>Pesanan ID</th>
                    </tr>
                    @foreach ($pesanan->pesanan_details as $pesanan_detail)
                        <tr>
                        <td>{{$pesanan_detail->id}}</td>
                        <td> <img src="{{Storage::url($pesanan_detail->product->gambar)}}" class="img-fluid" width="200px"></td>
                        <td>{{$pesanan_detail->product->nama}}</td>
                        <td>{{$pesanan_detail->jumlah_pesanan}}</td>
                        <td>Rp. {{number_format($pesanan_detail->total_harga)}}</td>
                        <td>{{$pesanan_detail->product_id}}</td>
                        <td>{{$pesanan_detail->pesanan_id}}</td>
                        </tr>
                    @endforeach
                </table>
                </td>
            </tr>
        </table>
   </div>
  </div>
  <!-- /.container-fluid -->
@endsection