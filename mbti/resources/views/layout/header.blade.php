<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{url('index')}}">
                <span>MBTI</h1><h6 style="line-height: 0px">foryourself @auth {{Auth()->User()->name}} @endauth</h6></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                    <ul class="navbar-nav  ">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('index')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('tipekepribadian')}}">Tipe Kepribadian</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('aboutmbti')}}">About</a>
                        </li>
                        @endguest
                        @auth
                        <?php 
                        if (Auth()->User()->role=='SuperAdmin') { ?>    
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('dataadmin')}}">Data Admin</a>
                            </li>
                        <?php }
                        if (Auth()->User()->role=='Admin') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('tesrekap')}}">Rekap Tes</a>
                            </li>
                        <?php }
                        if (Auth()->User()->role=='User') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('teskepribadian')}}">Ambil Tes</a>
                            </li>
                        <?php }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('profil')}}">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('logout')}}">Logout</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('daftar')}}">Daftar</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>