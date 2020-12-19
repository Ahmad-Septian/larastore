
@extends('layouts.admin')

@section('title', 'Profile Admin')
    
@section('content')
       <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="container">
             <div class="row">
              <div class="card-body">
              
                <div class="card mb-3 px-2 py-2" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="{{asset(Auth::user()->photo)}}" class="card-img" alt="">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                      <h5 class="card-title ">{{$user->name}}</h5>
                      <h5 class="card-title ">{{$user->email}}</h5>

                      <a href="{{route('profile-edit', $user->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>Edit Profile</a>

                      <a href="{{route('profile-photo', $user->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>Edit Foto</a>

                      <a href="{{route('password.request')}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>Edit Password</a>

                      </div>
                    </div>
                  </div>
                </div>
            </div>
        
               
          </div>

      </div>
      <!-- End of Main Content -->
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

