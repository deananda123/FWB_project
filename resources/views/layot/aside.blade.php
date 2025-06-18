 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->


     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('image.png') }}" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block"> {{ Auth::user()->name }} - {{ Auth::user()->jabatan }}</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->


         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                 @auth
                     @if (auth()->user()->role == 'admin')
                         <li class="nav-item menu-open">
                             <a href="{{ route('admin') }}" class="nav-link active">
                                 <i class="nav-icon fas fa-tachometer-alt"></i>
                                 <p>
                                     Dashboard
                                 </p>
                             </a>
                         </li>
                         <li class="nav-header">other</li>
                         <li class="nav-item">
                             <a href="{{ route('validasiKarya') }}" class="nav-link">
                                 <i class="nav-icon fas fa-edit"></i>
                                 <p>
                                     Validation
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('infouser') }}" class="nav-link">
                                 <i class="nav-icon fas fa-table"></i>
                                 <p>
                                     User
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('galeri') }}" class="nav-link">
                                 <i class="nav-icon far fa-image"></i>
                                 <p>
                                     Gallery
                                 </p>
                             </a>
                         </li>
                          
                     @endif
                 @endauth

                

                 @auth
                     @if (auth()->user()->role == 'seniman')
                         <li class="nav-item menu-open">
                             <a href="{{ route('seniman') }}" class="nav-link active">
                                 <i class="nav-icon fas fa-tachometer-alt"></i>
                                 <p>
                                     Dashboard
                                 </p>
                             </a>
                         </li>
                          <li class="nav-header">other</li>
                         <!-- Konten yang cuma bisa dilihat seniman -->
                         <section>
                            
                             <li class="nav-item">
                                 <a href="{{ route('orders.seniman') }}" class="nav-link">
                                     <i class="nav-icon fas fa-edit"></i>
                                     <p>
                                         Orders

                                     </p>
                                 </a>
                             </li>
                             <li class="nav-item">
                             <a href="{{ route('karya.seniman') }}" class="nav-link">
                                 <i class="nav-icon far fa-image"></i>
                                 <p>
                                     Gallery
                                 </p>
                             </a>
                         </li>
                             <li class="nav-item">
                                 <a href="{{ route('seniman.upload') }}" class="nav-link">
                                     <i class="nav-icon far fa-plus-square"></i>
                                     <p>
                                         upload
                                     </p>
                                 </a>
                             </li>
                         </section>
                     @endif
                 @endauth



             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
