@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">

        {{-- @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
      @endif --}}

      <div class="flash-data" data-flashdata="{{session('status')}}"></div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
            <a href="{{route('kategori-create')}}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus">Tambah Kategori</i>
            </a>
        </div>

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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($kategoris as $key => $kategori)
                          <tr align="center">
                            <input type="hidden" class="delete_id" value="{{$kategori->id}}">
                            <td>{{$kategoris->firstItem() + $key}}</td>
                            <td>
                              <img src="{{Storage::url($kategori->gambar)}}" alt="" width="150px" height="100px" class="img-fluid">
                            </td>
                            <td>{{$kategori->nama}}</td>
                            <td>
                              <a href="{{route('kategori-edit', $kategori->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil-alt d-inline"></i></a>   

                              <form action="{{route('kategori-destroy', $kategori->id)}}" method="POST" class="d-block" onclick="return confirm('yakin?');">
                                @csrf
                                @method('delete')
                               <button class="btn btn-danger mt-2 btn-sm delete">
                               <i class="fa fa-trash d-inline "></i>
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
                  {{$kategoris->links()}}
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@push('addon-script')
<script  type="text/javascript"  src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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

{{-- <script>
  const flashdata = $('.flash-data').data('flashdata');

  $('.hapus').on('click', function(e) {

        e.preventDefault();

        const action = $(this).attr('action');

        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
            document.location.action = action;
        }
      })


  });
</script> --}}



@endpush