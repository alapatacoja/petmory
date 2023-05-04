<header>
    <div class="logo">
        <a href="{{ route('home') }}">{{-- <span class="fa-brands fa-pinterest"></span> --}}
            <h1> <img src="/imgs/or.png" alt=""> Petmory</h1>
        </a>

    </div>
    <div class="resto">
        <div class="buscar">
            <span class="fa fa-search"></span>
            <input type="text" placeholder="{{ __('general.buscar') }}">

        </div>
        <div class="nav">
            <ul>
                <li><i class="fa-solid fa-language"></i></li>
                @if (Auth::check())
                    <li class="icon-hover"><a href=""><i class="fa-solid fa-circle-plus"></i>
                            {{ __('general.post') }}</a></li>
                    <div class="drop-acc">
                        <li class="icon-hover"><a href="{{ route('users.show', Auth::user()) }}"><i
                                    class="fa-solid fa-circle-user" id="drop"></i>{{ __('general.account') }}</a>
                        </li>
                        <li><i class="fa-solid fa-chevron-down hover"></i>
                            <ul class="dropdown">
                                <li style="border-radius: 20px 20px 0 0"><a
                                        href="{{ route('users.show', Auth::user()) }}"><i class="fa-solid fa-user"></i>
                                        {{ __('general.account') }}</a></li>

                                <li><a href=""><i class="fa-solid fa-gear"></i> {{ __('general.settings') }}</a>
                                </li>

                                <li style="border-radius:  0 0 20px 20px"><a href="{{ route('logout') }}"><i
                                            class="fa-solid fa-right-from-bracket"></i>
                                        {{ __('general.logout') }}</a></li>
                            </ul>
                    </div>

                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="boton">{{ __('general.login') }}</a></li>
                    <li><a href="{{ route('register') }}" class="boton"
                            id="register">{{ __('general.register') }}</a></li>
                @endif

            </ul>
        </div>
    </div>
</header>
