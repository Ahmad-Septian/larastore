<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('products')}}">Product</a></li>
          <li class="breadcrumb-item active" aria-current="page"></li> <strong>Product Details</strong></li>
        </ol>
      </nav>

      <section class="section section-product-details">
        <div class="container xzoom-container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card product-details">
                        <div class="card-body">
                            <img src="{{Storage::url($product->gambar)}}" alt="" class=" xzoom" id="xzoom-default" xoriginal="{{Storage::url($product->gambar)}}">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card product-details">
                        <br>
                        <h2>{{$product->nama}}</h2>
                        <h3><strong>Rp. {{number_format($product->harga)}}</strong></h3>
                        <hr>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                   
                        <div class="card">
                            <div class="card-body">
                             <h2>Informations</h2>
                             <hr>
                             @if ($product->stok > 1)
                                <span class="badge badge-success"><i class="fas fa-check"></i>Stok Ready</span>
                             @else
                                <span class="badge badge-danger"><i class="fas fa-times"></i>Stok Habis</span>
                             @endif
                             <form action="" wire:submit.prevent="masukanKeranjang">
                                 <table class="table-responsive mb-5">
                                 <tr>
                                     <th>
                                         <th width="50%" for="size">Size</th>
                                         <td class="text-right" width="50%" >
                                             <select id="size" name="size" wire:model="size">
                                                 <option value="{{$product->size}}">{{$product->size}}</option>
                                               </select>
                                               @error('size')
                                                 <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                         </td>
                                     </th>
                                 </tr>
                                 <tr>
                                    <th>
                                     <th width="50%">Jumlah</th>
                                     <td width="50%">
                                         <input id="jumlah_pesanan" type="number" class="form-control @error('jumlah_pesanan') is-invalid @enderror" wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required autocomplete="jumlah_pesanan" autofocus>
             
                                     @error('jumlah_pesanan')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                     </td>
                                    </th>
                                 </tr>
                                 <hr>
                                 <td colspan="3">
                                     <button type="submit" class="btn btn-pesan mt-4 btn-block text-white" @if ($product->stok == 0) disabled
                                     @endif><i class="fas fa-shopping-cart"></i>Masukan Keranjang</button>
                                 </td>
                                </table>
                            </form>
                            
                            </div>
                        </div>
                   
                   
                </div>
            </div>
       </div>
    </section>


</div>
