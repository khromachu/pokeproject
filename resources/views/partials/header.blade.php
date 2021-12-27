<header>
    <nav class="navbar navbar-expand-lg px-3 navbar-light" style="background-color: #ced4da; background-image: url('/images/back1.png'); justify-content: center">
        <a class="navbar-brand" href="/">
            <img src="/pokemon.svg" alt="" width="50" height="50" class="d-inline-block align-text-center mx-2">
            Pokemon Database
        </a>
        <form class="mx-3" style="width: 600px">
            <h6>Search by PokemonID</h6>
            <div style="display: grid; grid-template-columns: 1fr 2fr">
                <div style="max-width: 200px">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </div>
                <div>
                    <button class="btn btn-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
{{--        <div style="display: flex; align-items: center">--}}
{{--            <div class="col">--}}
{{--                <h5>Name</h5>--}}
{{--                <h6>Role</h6>--}}
{{--            </div>--}}
{{--            <button class="btn btn-light" type="submit">--}}
{{--                <i class="fas fa-user"></i>--}}
{{--            </button>--}}
{{--        </div>--}}
            <ul class="navbar-nav" style="display: flex; align-items: center; text-align: end; font-size: 15px">
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div>{{ Auth::user()->name }} <span class="caret"></span></div>
                                    @switch(Auth::user()->role_id)
                                        @case(1) Администратор @break
                                        @case(2) Редактор @break
                                        @case(3) Обычный пользователь @break
                                    @endswitch
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        <a href="/home" class="btn btn-outline-primary"><i class="fas fa-home"></i></a>
                @endguest
            </ul>
    </nav>
</header>
