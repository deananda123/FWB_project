 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('Admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">AdminLTE 3</span>
     </a>

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
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                                   <li class="nav-item menu-open">
                     <a href="{{ route('dashboard') }}" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
               @auth
                 @if (auth()->user()->role == 'admin')

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
                  
                 @endif
               @endauth
                <li class="nav-item">
                     <a href="{{ route('galeri') }}" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Gallery
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">other</li>
                
                 @auth
                     @if (auth()->user()->role == 'seniman')
                         <!-- Konten yang cuma bisa dilihat seniman -->
                         <section>
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
