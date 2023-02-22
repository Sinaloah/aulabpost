<nav class="container-fluid cstm-nav">
    <div id="navbar" class="d-flex cstm-nav-ext-container align-items-center fixed-top px-3 cstm-nav-bg-changing">
        <a class="text-decoration-none" href="{{ route('welcome') }}">
            <div class="d-flex align-items-center cstm-nav-title-box">
                <span class="cstm-nav-title fs-6 cstm-secondary-font cstm-title-color"></span>
                <div id="cstm-nav-title-line" class="cstm-nav-title-line mx-2 cstm-title-color"></div>
                <span class="cstm-primary-font cstm-font-bold cstm-letter-spacing text-uppercase cstm-nav-subtitle cstm-title-color">future</span><span class="cstm-quaternary-font mx-2 fs-4 cstm-nav-subtitle cstm-title-color">of</span><span class="cstm-primary-font cstm-font-bold cstm-letter-spacing text-uppercase cstm-nav-subtitle cstm-title-color">prosthetics</span>
                <img class="cstm-nav-logo" src="/img/postlogo.svg" alt="">
            </div>
        </a>
        <div class="d-flex ms-auto align-items-center cstm-ext-login-btn">
            @guest
            <a id="login-btn-js" class="text-decoration-none login-btn-display" href="{{ route('login') }}">
                <button class="cst-button-just-open-black text-uppercase cstm-white-font-clr cstm-bg-black">Login
                </button>
            </a>
            @endguest
            @auth
            <a id="logout-btn-js" class="ms-auto cstm-ext-logout-btn">
                <form method="post" action="{{ route('logout') }}" id="form-logout">
                    @csrf
                    <button type="submit" class="cst-button-just-open-black text-uppercase cstm-white-font-clr cstm-bg-black"><span>Logout</span></button>
                </form>
            </a>
            @endauth

            <form id="cstm-nav-searchbar" class="text-decoration-none cst-nav-button-box ms-1" role="search" method="get" action="{{ route('article.search') }}">
                <button class="cst-nav-button-close text-uppercase cstm-white-font-clr cstm-bg-black"><i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <div class="cst-nav-button-open text-uppercase cstm-white-font-clr cstm-bg-black d-flex">
                    <input class="form-control form-control-sm cstm-nav-input-btn shadow-none" type="search" name="query" placeholder="Cosa cerchi?" aria-label="Search">
                </div>
            </form>

            <div id="nav-button" class="text-decoration-none cst-nav-button-box ms-1" href="">
                <span>
                    <button class="cst-nav-hbg-button-close text-uppercase cstm-black-font-clr"><i class="fa-solid fa-ellipsis"></i>
                    </button>
                    <button class="cst-nav-hbg-button-open text-uppercase cstm-black-font-clr">Explore
                    </button>
                </span>
                <button class="cst-nav-hbg-button-close-js text-uppercase cstm-black-font-clr"><i class="fa-solid fa-ellipsis"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row cstm-nav-int-container">
        <div class="cstm-nav-bg"></div>
        <div class="cstm-nav-sun-box"><div class="cstm-nav-sun"></div></div>
        <div class="col-8 d-flex align-items-center cstm-nav-links-int-box p-0 cstm-int-left-container">
            <ul class="list-unstyled w-100 m-0 p-0">

                <li class="cstm-int-nav-link cstm-extra-link-border">
                    <a class="text-decoration-none" href="{{route('welcome')}}">
                        <span class="cstm-quaternary-font fs-3 cstm-white-font-clr">01</span><span class="cstm-int-nav-link-name cstm-white-font-clr fs-3 px-3">Home</span>
                    </a>
                </li>

                <li class="cstm-int-nav-link">
                    <a class="text-decoration-none" href="{{route('article.index')}}">
                        <span class="cstm-quaternary-font fs-3 cstm-white-font-clr">02</span><span class="cstm-int-nav-link-name cstm-white-font-clr fs-3 px-3">Tutti gli articoli</span>
                    </a>
                </li>

                @guest
                <li class="cstm-int-nav-link">
                    <a class="text-decoration-none" href="{{route('careers')}}">
                        <span class="cstm-quaternary-font fs-3 cstm-white-font-clr">03</span><span class="cstm-int-nav-link-name cstm-white-font-clr fs-3 px-3">Lavora con noi <span class="fs-5 ms-1 cstm-quaternary-font text-nowrap">Assicurati di essere registrato</span></span>
                    </a>
                </li>
                @endguest

                @auth
                <li class="cstm-int-nav-link">
                    <a class="text-decoration-none" href="{{route('careers')}}">
                        <span class="cstm-quaternary-font fs-3 cstm-white-font-clr">03</span><span class="cstm-int-nav-link-name cstm-white-font-clr fs-3 px-3">Lavora con noi</span>
                    </a>
                </li>
                @endauth

                @auth

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item cstm-nav-dropdown-menu">
                        <a class="cstm-white-font-clr fs-3 text-decoration-none" id="flush-headingOne">
                            <button id="cstm-accordion-button" class="cstm-int-nav-link accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <span class="cstm-quaternary-font fs-3 cstm-white-font-clr">04</span><span class="cstm-int-nav-link-name cstm-white-font-clr fs-3 ps-3 pe-1">Benvenuto <br><span>{{ Auth::user()->name }}</span></span>
                            </button>
                        </a>
                        <div id="flush-collapseOne" class="accordion-collapse collapse cstm-collapse-box m-0 p-0" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        @if(Auth::user()->is_admin)
                            <li class="cstm-int-nav-link dropdown-item cstm-less-link-border">
                                <a class="text-decoration-none" href="{{route('admin.dashboard')}}">
                                    <span class="cstm-white-font-clr me-2"><i class="fa-solid fa-chart-line cstm-dash-icon"></i></span><span class="cstm-int-nav-link-name cstm-white-font-clr fs-3">Dashboard Admin</span>
                                </a>
                            </li>
                            @endif
                            @if(Auth::user()->is_revisor)
                            <li class="cstm-int-nav-link dropdown-item cstm-less-link-border">
                                <a class="text-decoration-none" href="{{route('revisor.dashboard')}}">
                                <span class="cstm-white-font-clr me-2"><i class="fa-solid fa-address-card cstm-dash-icon"></i></span><span class="cstm-int-nav-link-name cstm-white-font-clr fs-3">Dashboard Revisor</span>
                                </a>
                            </li>
                            @endif
                            @if(Auth::user()->is_writer)
                            <li class="cstm-int-nav-link dropdown-item cstm-less-link-border">
                                <a class="text-decoration-none" href="{{route('writer.dashboard')}}">
                                <span class="cstm-white-font-clr me-2"><i class="fa-solid fa-feather cstm-dash-icon"></i></span><span class="cstm-int-nav-link-name cstm-white-font-clr fs-3">Dashboard Writer</span>
                                </a>
                            </li>
                            @endif
                        </div>
                    </div>
                </div>

                @if(Auth::user()->is_writer)
                <li class="cstm-int-nav-link">
                    <a class="text-decoration-none" href="{{route('article.create')}}">
                        <span class="cstm-quaternary-font fs-3 cstm-white-font-clr">05</span><span class="cstm-int-nav-link-name cstm-white-font-clr fs-3 px-3">Inserisci un articolo</span>
                    </a>
                </li>
                @endif

                <li class="cstm-int-nav-link">
                    <form method="post" action="{{ route('logout') }}" id="form-logout">
                        @csrf
                        <button type="submit" class="cstm-logout-btn"><span class=""><i class="fa-solid fs-3 fa-door-closed cstm-white-font-clr"></i></span><span class="cstm-int-nav-link-name cstm-white-font-clr fs-3 px-3 ">Logout</span></button>
                    </form>
                </li>

                @endauth

                @guest
                <li class="cstm-int-nav-link">
                    <a href="{{ route('login') }}">
                        @csrf
                        <button class="cstm-logout-btn"><span class=""><i class="fa-solid fs-3 fa-door-open cstm-white-font-clr"></i></span><span class="cstm-int-nav-link-name fs-3 px-3 cstm-white-font-clr">Login</span></button>
                    </a>
                </li>
                @endguest
            </ul>
        </div>
        <div class="cstm-int-right-container col-4 d-flex align-items-center custom-nav-social-container p-0">
            <ul class="list-unstyled w-100">
                <li class=""><a class="custom-nav-social cstm-facebook-bg d-flex justify-content-center align-items-center" href=""><i class="fa-brands fa-square-facebook"></i></a>
                </li>
                <li class=""><a class="custom-nav-social cstm-instagram-bg d-flex justify-content-center align-items-center" href=""><i class="fa-brands fa-instagram"></i></a>
                </li>
                <li class=""><a class="custom-nav-social cstm-twitter-bg d-flex justify-content-center align-items-center" href=""><i class="fa-brands fa-twitter"></i></a>
                </li>
                <li class=""><a class="custom-nav-social cstm-linkedin-bg d-flex justify-content-center align-items-center" href=""><i class="fa-brands fa-linkedin"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>