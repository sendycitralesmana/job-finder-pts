<div class="header-area header-transparrent">
    <div class="headder-top header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-2">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="/"><img src="{{ asset('images/logo.jpeg') }}" class="img-fluid" style="height: 120px"  alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="menu-wrapper">
                        <div class="d-none d-lg-inline-flex align-items-center justify-content-between" style="width: 100%">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/job">Find a Jobs </a></li>
                                        <li><a href="/about">About</a></li>
                                        {{-- <li><a href="/contact">Contact</a></li> --}}

                                        @if (Auth::check())
                                            <li><a href="/account">Account</a></li>
                                            <li><a href="/history">History</a></li>
                                        @endif

                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            @if (Auth::check())
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="/logout" class="btn head-btn1">Logout</a>
                                </div>
                            @else
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="/register" class="btn head-btn1">Register</a>
                                    <a href="/login" class="btn head-btn2">Login</a>
                                </div>
                            @endif
                        </div>
                        <div class="d-block d-lg-none">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/job">Find a Jobs </a></li>
                                        <li><a href="/about">About</a></li>
                                        {{-- <li><a href="/contact">Contact</a></li> --}}

                                        @if (Auth::check())
                                            <li><a href="/account">Account</a></li>
                                            <li><a href="/history">History</a></li>
                                        @endif

                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            @if (Auth::check())
                                <div class="header-btn d-block f-right d-lg-none">
                                    <a href="/logout" class="btn head-btn1">Logout</a>
                                </div>
                            @else
                                <div class="header-btn d-block f-right d-lg-none">
                                    <a href="/register" class="btn head-btn1">Register</a>
                                    <a href="/login" class="btn head-btn2">Login</a>
                                </div>
                            @endif
                        </div>
                        
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>