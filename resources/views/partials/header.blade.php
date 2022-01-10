<header>
    <nav class="navbar navbar-expand-lg px-3 navbar-light" style="background-color: #ced4da; background-image: url('/images/back1.png'); justify-content: center">
        <a class="navbar-brand" href="/">
            <img src="/pokemon.svg" alt="" width="50" height="50" class="d-inline-block align-text-center mx-2">
            Pokemon Database
        </a>
        <ul class="navbar-nav" style="font-size: 16px;">
            <li class="nav-item">
                <a class="nav-link" href="/welcome">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">All Pokémon</a>
            </li>
        </ul>
        <form class="mx-3" style="width: 550px" action="/pokemons/get-by-url">
            <div style="display: grid; grid-template-columns: 1fr 2fr">
                <div style="max-width: 200px">
                    <input name="number" class="form-control me-2" type="number" placeholder="Search by Number" aria-label="Search">
                </div>
                <div>
                    <button class="btn btn-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                Profile
                <a><i class="far fa-user"></i></a>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item border-bottom border-dark border-3 pb-2">
                        <nav style="text-align: center">
                            <div>{{ Auth::user()->name }} <span class="caret"></span></div>
                            @switch(Auth::user()->role_id)
                                @case(1) (Администратор) @break
                                @case(2) (Редактор) @break
                                @case(3) (Обычный пользователь) @break
                                @endswitch
                        </nav>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Your Profile</a>
                    </li>
                    @if(Auth::user() != null)
                        <li class="nav-item">
                            <a class="nav-link" href="/pokemons-of-day">Your Pokémon of the Day</a>
                        </li>
                    @endif
                    @if(Auth::user() != null)
                        @if(Auth::user()->role_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Admin Panel</a>
                        </li>
                        @endif
                    @endif
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
