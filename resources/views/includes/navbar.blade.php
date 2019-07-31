<nav class="navbar navbar-expand-lg navbar-white navbar-stick-white" data-navbar="sticky" style="margin-top:-10px; background-color:#303030">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <img class="logo-dark my-3" src="{{ asset('img/LogoWhiteRock.png') }}" alt="logo">
              </a>
            {{-- <a class="navbar-brand text-muted" href="{{ route('welcome') }}" alt="RockBuzz" title="RockBuzz" style="font-size:2.3em;">RockBuzz</a>            --}}
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

            <ul class="nav nav-navbar ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Portifólio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('welcome') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contato</a>
                    </li>
                </ul>
        </section>

        <a class="btn btn-xs btn-round btn-success" href="{{ url('/login') }}">Login</a>

    </div>
</nav>