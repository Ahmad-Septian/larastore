<div class="container">
    <div class="mb-4 row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active text-dark" aria-current="page"><strong>Product</strong></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row" style="margin-bottom: 100px">
        <div class="col-md-9">
            <h2>{{ $title }}</h2>
        </div>
        <div class="col-md-3">
            <div class="mb-3 input-group">
                <input wire:model="search" type="text" class="form-control" placeholder="Search" aria-label="Search"
                    aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>

    <section class="mb-5 section-all-product">
        <div class="mt-4 row">
            @foreach ($products as $product)
            <div class="col-sm-12 col-md-3 mb-3">
                <a href="{{route('products.detail', $product->id)}}">
                    <div class="card text-dark">
                        <img src="{{Storage::url($product->gambar)}}" class="card-img-top" >
                        <div class="card-body">
                          <p class="card-text">{{$product->nama}}</p>
                          <p><strong>RP.{{number_format($product->harga)}}</strong></p>
                        </div>
                      </div>
                </a>
            </div>
            @endforeach
        </div>   
        <div class="row">
            <div class="col-12">
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
