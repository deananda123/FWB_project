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

                            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                            <p class="text-muted text-center">{{ Auth::user()->role }}</p>

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

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">{{ Auth::user()->profil->alamat ?? '-' }}</p>

                            <hr>
                            <strong><i class="fas fa-phone-alt mr-1"></i>Number</strong>

                            <p class="text-muted">{{ Auth::user()->profil->no_telepon ?? '-' }}</p>

                            <hr>


                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">{{ Auth::user()->profil->deskripsi_profil ?? '-' }}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    @if (auth()->id() == $user->id)
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#settings"
                                            data-toggle="tab">Profile</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#delete" data-toggle="tab">Delete</a>
                                    </li>
                                    <li class="nav-item">
                                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                            @csrf
                                            <button type="submit" class="nav-link btn btn-link">
                                                Log Out
                                            </button>
                                        </form>
                                    </li>

                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="active tab-pane" id="settings">

                                        <form method="post" action="{{ route('profil.update') }}" class="mt-6 space-y-6">
                                            @csrf
                                            @method('patch')

                                            <div class="form-group row">
                                                <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama
                                                    Lengkap</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nama_lengkap" class="form-control"
                                                        id="nama_lengkap"
                                                        value="{{ old('nama_lengkap', auth()->user()->profil->nama_lengkap ?? '') }}"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" id="email"
                                                        value="{{ auth()->user()->email }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPhone" class="col-sm-2 col-form-label">No.
                                                    Telepon</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="no_telepon" class="form-control"
                                                        id="no_telepon"
                                                        value="{{ old('no_telepon', auth()->user()->profil->no_telepon ?? '') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="alamat" class="form-control" id="alamat"
                                                        value="{{ old('alamat', auth()->user()->profil->alamat ?? '') }}">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputDescription" class="col-sm-2 col-form-label">Deskripsi
                                                    Profil</label>
                                                <div class="col-sm-10">
                                                    <textarea name="deskripsi_profil" class="form-control" id="deskripsi_profil" rows="4">{{ old('deskripsi_profil', auth()->user()->profil->deskripsi_profil ?? '') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Update
                                                        Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="post">

                                            <!-- /.user-block -->


                                            <!-- /.row -->
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="delete">
                                        <form method="POST" action="{{ route('profil.destroy') }}" class="mt-4">
                                            @csrf
                                            @method('DELETE')

                                            <div class="alert alert-danger">
                                                <strong>Peringatan:</strong> Menghapus akun bersifat permanen. Semua
                                                data
                                                akan hilang dan tidak bisa dikembalikan.
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-sm-2 col-form-label">Konfirmasi
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password" class="form-control"
                                                        id="password" placeholder="Masukkan password kamu" required>
                                                    @error('password', 'userDeletion')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Hapus Akun
                                                        Saya</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane" id="logout">
                                        <form method="POST" action="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                this.closest('form').submit();"
                                            class="btn btn-default btn-flat float-end">
                                            @csrf
                                            {{ __('Log Out') }}
                                        </form>
                                    </div>

                                    <!-- /.tab-pane -->
                                </div>

                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    @endif
                    <div class="card">
                        <div class="row">
                            @foreach ($user->karya as $item)
                                <div class="col-sm-4 mb-3">
                                    <img class="img-fluid" src="{{ asset('storage/' . $item->gambar) }}" alt="Karya">

                                    @auth
                                        @if (auth()->id() === $user->id)
                                            <form action="{{ route('karya.destroy', $item->id) }}" method="POST"
                                                class="mt-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus karya ini?')">Hapus</button>
                                            </form>
                                        @endif
                                    @endauth
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
