<div>
    <!-- header -->
<section class="section section-header">
    <div class="text-center header">
        <div class="container">
            <h1>Explore the Beautiful Style</h1>
            <p class="mt-3">
                You will see beautiful <br> moment you never see before
            </p>
            <a href="#" class="btn btn-get-started px-4 mt-4">Get Started</a>
        </div>
    </div>
</section>



<main>
     <!-- new Arrivals -->
    <section class="section section-new-arrivals">
        <div class="container">
            <div class="row justify-content-center">
                <h1>New Arrivals</h1>
            </div>
            <div class="row justify-content-center">
                @foreach ($products as $product)
                <div class="col-6 col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="{{Storage::url($product->gambar)}}" class="card-img-top" >
                            <div class="card-body">
                              <p class="card-text">{{$product->nama}}</p>
                              <p><strong>Rp. {{number_format($product->harga)}}</strong></p>
                            </div>
                          </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Category -->
    <section class="section section-category">
        <div class="container">
            <div class="row justify-content-center mb-2">
                <h1>Category</h1>
            </div>
            <div class="row justify-content-center">
                @foreach ($kategoris as $kategori)
                    <div class="col-sm-12 col-lg-4">
                    <div class="card-category text-center d-flex flex-column" style="background-image: url({{Storage::url($kategori->gambar)}});">
                        <div class="category-button mt-auto">
                            <a href="{{route('products.kategori', $kategori->id)}}" class="btn btn-category px-4 btn-block">{{$kategori->nama}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section-featured-brand">
        <div class="container">
            <div class="row justify-content-center mt-5 mb-5">
                <h1>Featured Brand</h1>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-3">
                    <img src="frontend/images/3second-logo.png" alt="" class="card-img-top">
                </div>
                <div class="col-sm-12 col-lg-3">
                    <img src="frontend/images/blnrs-logo.png" alt="" class="card-img-top">
                </div>
                <div class="col-sm-12 col-lg-3">
                    <img src="frontend/images/moutley_logo.jfif" alt="" class="card-img-top" >
                </div>
                <div class="col-sm-12 col-lg-3">
                    <img src="frontend/images/uniqlo_logo.png" alt="" class="card-img-top">
                </div>
            </div>
        </div>
    </section>

    <section class="section-service" style="padding-bottom: 80px;">
        <div class="container pt-5 pb-5">
            <div class="row justify-content-center mb-5">
                <h1>Service</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <h5>LOCATION</h5>
                            <ul class="list-unstyled">
                                <li><img src="frontend/images/icon-indonesia.png" class="icon" alt=""></li>
                            </ul>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <h5>PAYMENT</h5>
                            <ul class="list-unstyled">
                                <li>
                                    <img src="frontend/images/mastercard-icon.png" class="icon" alt="">
                                </li>
                                <li>
                                    <img src="frontend/images/logo-bank-bri.jpg" class="icon" alt="">
                                </li>
                                <li>
                                    <img src="frontend/images/logo-bni.png" class="icon" alt="">
                                </li>
                                <li>
                                    <img src="frontend/images/logo-mandiri.png" class="icon" alt="">
                                </li>
                                <li>
                                    <img src="frontend/images/logo-bca.jpg" class="icon" alt="">
                                </li>

                            </ul>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <h5>DELIVERY SERVICE</h5>
                            <ul class="list-unstyled delivery1">
                                <li>
                                    <img src="frontend/images/logo-jne.png" class="icon" alt="">
                                </li>
                                <li>
                                    <img src="frontend/images/logo-jnt.jpg" class="icon" alt="">
                                </li>
                                <li>
                                    <img src="frontend/images/logo-sicepat.jpg" class="icon" alt="">
                                </li>
                                <li>
                                    <img src="frontend/images/logo-pos.jpg" class="icon" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
</div>