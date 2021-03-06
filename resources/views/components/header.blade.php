<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="" class="logo">
                    <img src="{{url('/assets/images/icons/logo-01.png')}}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="menu-items">
                            <a href="{{route('home')}}">Home</a>
                        </li>

                        <li class="menu-items">
                            <a href={{route('shops')}}>Shop</a>
                        </li>

                        <li class="menu-items">
                            <a href="{{route('blog.index')}}">Blog</a>
                        </li>

                        <li class="menu-items">
                            <a href="{{route('about')}}">About</a>
                        </li>

                        <li class="menu-items">
                            <a href="{{route('contact')}}}">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div
                        class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                        data-notify="{{session()->get('cart') ? count(session()->get('cart')) : 0}}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    <div class="btn-group">
                        <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="zmdi zmdi-account-circle"></i>

                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Login</a>
                            <a class="dropdown-item" href="#">Register</a>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href=""><img src="{{url('/assets/images/icons/logo-01.png')}}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                 data-notify="{{session()->get('cart') ? count(session()->get('cart')) : 0}}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <div class="btn-group">
                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="zmdi zmdi-account-circle"></i>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Login</a>
                    <a class="dropdown-item" href="#">Register</a>
                </div>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li>
                <a href="{{route('home')}}">Home</a>
                <span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
            </li>

            <li>
                <a href="{{route('shops')}}">Shop</a>
            </li>

            <li>
                <a href="{{route('blog.index')}}">Blog</a>
            </li>

            <li>
                <a href="{{route('about')}}">About</a>
            </li>

            <li>
                <a href="{{route('contact')}}">Contact</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <x-modal-search/>
</header>
