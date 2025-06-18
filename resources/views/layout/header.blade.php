   <header class="header-section">
       <div class="container-fluid">
           <div class="inner-header">
               <div class="logo">
                   <a href="{{ url('/') }}">
                       <img src="{{ asset('storage/karya/logo4.png') }}" alt="Arteka Logo"
                           style="height: 60px; width: auto;">
                   </a>

               </div>
               <div class="header-right">
                   <a href="{{ route('profil.edit') }}" style="margin-right: 12px;"><img
                           src="{{ asset('konsumen') }}/img/icons/man.png" alt=""></a>

                   <a href="{{ route('keranjang') }}">
                       <img src="{{ asset('konsumen') }}/img/icons/bag.png" alt="">
                       <span>2</span>
                   </a>
               </div>
               @guest
                   <div class="user-access">
                       <a href="{{ route('register') }}">Register</a>
                       <a href="{{ route('login') }}" class="in">Sign in</a>
                   </div>
               @endguest

               <nav class="main-menu mobile-menu">
                   <ul>
                       <li><a class="active" href="{{ route('tampilan') }}">Home</a></li>
                       <li><a href="{{ route('konsumenProduk') }}">Shop</a></li>
                   </ul>
               </nav>
           </div>
       </div>

   </header>
