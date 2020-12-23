<div>
    <nav class="bg-white navbar navbar-expand-md navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
             <strong>LaraStore</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="mr-auto navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($kategoris as $kategori)
                            <a class="dropdown-item" href="{{route('products.kategori',$kategori->id)}}">{{$kategori->nama}}</a>
                             @endforeach
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('products')}}">All Products</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">History</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="ml-auto navbar-nav">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="#">
                            @if ($jumlah_pesanan !== 0)
                                <span class="badge badge-danger">{{$jumlah_pesanan}}</span>
                            @endif
                            <i class="fas fa-shopping-bag"></i>Keranjang</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>