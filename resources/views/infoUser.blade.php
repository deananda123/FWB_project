@extends('layot.master')
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-12">
                            <!-- Kontainer untuk judul dan tombol sejajar -->
                            <div class="d-flex justify-content-between align-items-center">
                                <h1 class="mb-0">User Information</h1>

                            </div>

                            <!-- Breadcrumb di bawah -->

                        </div>
                    </div>
                </div>
            </section>


            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row">

                            @foreach ($users as $user)
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill">
                                        <div class="card-header text-muted border-bottom-0">
                                            {{ $user->role ?? 'Seniman' }} <!-- atau profesinya -->
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b>{{ $user->name }}</b></h2>
                                                    <p class="text-muted text-sm"><b>About: </b> {{ $user->profil->deskripsi_profil ?? '-' }}</p>
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-lg fa-building"></i></span> Address:
                                                            {{ $user->profil->alamat ?? 'Belum diisi' }}</li>
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-lg fa-phone"></i></span> Phone #:
                                                            {{ $user->profil->no_telepon??'-' }}</li>
                                                    </ul>
                                                </div>
                                                <div class="col-5 text-center">
                                                    <img src="{{ $user->profile_picture ?? 'default.jpg' }}"
                                                        alt="user-avatar" class="img-circle img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        @auth
                                        @if (auth()->user()->role == 'admin')
                                             <div class="card-footer">
                                            <div class="text-right">
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">hohi</button>
                                                </form> 
                                            </div>
                                        </div>
                                        @endif
                                        @endauth
                                       
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <nav aria-label="Contacts Page Navigation">
                            <ul class="pagination justify-content-center m-0">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#">7</a></li>
                                <li class="page-item"><a class="page-link" href="#">8</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>

    </section>
@endsection
