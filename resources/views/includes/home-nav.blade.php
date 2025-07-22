<div class="z-index700" style="background-color:rgb(235, 235, 235);">
    <div class="padding-global is-large">
        <div class="container-xlarge">
            {{-- <div class="spacer-top"></div> --}}
            {{-- <div class="spacer-top-mob"></div> --}}
            <div class="nav-component" style="padding: 0px;">
                <div class="_25" style="display: flex; align-items: center;">
                    <a href="{{ route('home')}}" aria-current="page" class="logo_wrap w-nav-brand w--current "
                        style=" width: 100px; height: 100px;">
                        <img src="{{ asset('home-assets/assets/img/forex-logo.png') }}"
                            alt="{{ env('APP_NAME') }}  Logo" class="logo-desctop">
                        <img src="{{ asset('home-assets/assets/img/forex-logo.png') }}" alt="Logo Mobile"
                            class="logo-mobile">
                    </a>
                    {{-- <span style="color: rgb(94, 94, 94)">Royal Forex Pro</span> --}}
                </div>
                <div class="nav-menu_wrap">
                    <nav role="navigation" class="nav-menu w-nav-menu">
                        <div class="nav-m">
                            <div class="middle-part">
                                <a title="Learn more about Prop Funding" href="{{ route('funding')}}"
                                    class="link-with-line w-inline-block" style="color: rgb(66, 66, 66); ">
                                    <div class="link-text is-header">Funding</div>
                                    <div class="horizontal-link-line"></div>
                                </a>
                                <a href="{{ route('faq')}}" title="FAQ" class="link-with-line w-inline-block" style="color: rgb(66, 66, 66)">
                                    <div class="link-text is-header">FAQ</div>
                                    <div class="horizontal-link-line"></div>
                                </a>
                                <a href="{{ route('contact')}}" title="Contact us and get support"
                                    class="link-with-line w-inline-block" style="color: rgb(66, 66, 66)">
                                    <div class="link-text is-header">Contact</div>
                                    <div class="horizontal-link-line"></div>
                                </a>
                                <a href="{{ route('login')}}" title="Contact us and get support"
                                    class="link-with-line w-inline-block" style="color: rgb(66, 66, 66)">
                                    <div class="link-text is-header">Login</div>
                                    <div class="horizontal-link-line"></div>
                                </a>
                                <a href="{{ route('register')}}" title="Contact us and get support"
                                    class="link-with-line w-inline-block" style="color: rgb(66, 66, 66)">
                                    <div class="link-text is-header">Register</div>
                                    <div class="horizontal-link-line"></div>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="nuv-btn_wrap">
                    <a href="{{ route('login')}}" class="button is-header w-button" style="color: rgb(66, 66, 66); border-color: rgb(31, 31, 31);">
                        Login</a>
                    <div class="menu-button w-nav-button">
                        <div class="burger-1">
                            <div class="b2-bar1"></div>
                            <div class="b2-middle-wrap">
                                <div class="b2-middle-bar-left"></div>
                                <div class="b2-middle-bar-right"></div>
                            </div>
                            <div class="b2-bar3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>