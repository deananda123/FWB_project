@extends('konsumen.master')
@section('content')
    <section class="content py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('image.png') }}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>

                            <p class="text-muted text-center">{{  $user->role }}</p>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-clock mr-1"></i> Education</strong>

                            <p class="text-muted">
                                {{ $user->profil->jam_operasional ?? '-' }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">{{ $user->profil->alamat ?? '-' }}</p>

                            <hr>
                            <strong><i class="fas fa-phone-alt mr-1"></i>Number</strong>

                            <p class="text-muted">{{ $user->profil->no_telepon ?? '-' }}</p>

                            <hr>


                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">{{ $user->profil->deskripsi_profil ?? '-' }}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="row">
                            @foreach ($user->karya as $item)
                                <div class="col-sm-4 mb-3">
                                    <img class="img-fluid" src="{{ asset('storage/' . $item->gambar) }}" alt="Karya">
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection
