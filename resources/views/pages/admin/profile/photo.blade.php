@extends('layouts.admin')
@section('title', 'Edit Data Anggota')

@section('content')
       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Edit Profile {{Auth::user()->id}}</h1>
          </div>

          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>   
        @endif

      
        <img src="{{asset(Auth::user()->photo)}}" alt="" width="20%" class="mb-2">
        <h2>{{$user->name}}</h2>
        <div class="card-shadow">
            <div class="card-body">
            <form action="{{route('update-photo', $user->id)}}" method="POST" enctype="multipart/form-data">
             @method('POST')
            @csrf
            <label for="">Update Foto</label>
            <input type="file" name="photo">
            <input type="submit" class="pull-right btn btn-sm btn-primary">

            {{-- <button class="btn btn-primary btn-block" type="submit">
                Simpan
            </button> --}}
            </form>
            </div>
        </div>
          
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


@endpush