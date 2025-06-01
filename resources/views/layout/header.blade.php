   <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="./index.html"><img src="{{asset('konsumen')}}/img/logo.png" alt=""></a>
                </div>
                <div class="header-right">
                    <img src="{{asset('konsumen')}}/img/icons/search.png" alt="" class="search-trigger">
                    <img src="{{asset('konsumen')}}/img/icons/man.png" alt="">
                    <a href="#">
                        <img src="{{asset('konsumen')}}/img/icons/bag.png" alt="">
                        <span>2</span>
                    </a>
                </div>
                <div class="user-access">
                    <a href="{{ route('register') }}">Register</a>
                    <a href="{{ route('login') }}" class="in">Sign in</a>
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li><a class="active" href="./index.html">Home</a></li>
                        <li><a href="./categories.html">Shop</a>
                            <ul class="sub-menu">
                                <li><a href="product-page.html">Product Page</a></li>
                                <li><a href="shopping-cart.html">Shopping Card</a></li>
                                <li><a href="check-out.html">Check out</a></li>
                            </ul>
                        </li>
                        <li><a href="./product-page.html">About</a></li>
                        <li><a href="./check-out.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        
    </header>