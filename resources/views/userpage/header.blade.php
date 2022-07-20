<header>
    <nav>
        <div class="nav-logo">
            <a href="{{ url('/') }}">B-World</a>
        </div>
        <div class="nav-content">
            <ul class="nav-ul">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link active">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/user-about') }}" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/library_page') }}" class="nav-link">Library</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/user-contact') }}" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/user-blog') }}" class="nav-link">Blog</a>
                </li>

            </ul>
        </div>

        <div class="cartandbars">
            <button><i class="fas fa-bars"></i></button>
            <li class="nav-item" style="list-style:none; padding:1.5rem;">
                @if (Route::has('login'))
                    @auth
                <li class="nav-item dropdown mb-1" style="list-style: none;">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a href="{{ url('logout') }}" class="nav-link bg-light text-dark text-center fs-5"onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf

                        </form>
                    </div>
                </li>
            @else
                <a href="{{ url('/login') }}" class="nav-link btn btn-dark">Login/Register</a>
            @endauth
            @endif
            </li>
            {{-- <a href="{{url('/user-card-view')}}">Cart<i class="fa-solid fa-cart-shopping"></i></a> --}}
        </div>
    </nav>
</header>
