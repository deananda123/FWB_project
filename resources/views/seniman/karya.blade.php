@extends('layot.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Artworks</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('seniman') }}">Home</a></li>
                            <li class="breadcrumb-item active">Gallery</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @forelse ($karya as $item)
                        <div class="col-md-4">
                            <div class="card card-widget shadow">
                                <div class="card-header bg-light">
                                    <h3 class="card-title">{{ $item->judul }}</h3>
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Karya" class="img-fluid mb-2"
                                        style="max-height: 200px; object-fit: cover; width: 100%;">
                                    <p><strong>Description:</strong> {{ Str::limit($item->deskripsi, 100) }}</p>
                                    <p><strong>Price:</strong> Rp{{ number_format($item->harga, 2, ',', '.') }}</p>
                                </div>
                                <div class="card-footer d-flex justify-content-end align-items-center">
                                    <span
                                        class="badge 
        @if ($item->status == 'approved') badge-success 
        @elseif ($item->status == 'rejected') badge-danger 
        @else badge-warning @endif me-3">
                                        {{ ucfirst($item->status) }}
                                    </span>

                                    <form action="{{ route('karya.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus karya ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>




                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                Belum ada karya yang diupload.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
