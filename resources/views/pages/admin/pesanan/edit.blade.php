@extends('layouts.admin')

@section('content')
     <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Pesanan {{$pesanan->user->name}}</h1>
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
       <form action="{{route('pesanan-update', $pesanan->id)}}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="" required class="form-control">
            <option value="{{$pesanan->status}}">
            Jangan Diubah (
               @if ($pesanan->status == 0)
                   Belum Melakukan Pembayaran
               @else
                   Sudah Melakukan Pembayaran
               @endif
                )
            </option>
            <option value="0">Belum Melakukan Pembayaran</option>
            <option value="1">Sudah Melakukan Pembayaran</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Ubah</button>
        </form>
       </div>
   </div>


   
  

  </div>
  <!-- /.container-fluid -->
@endsection