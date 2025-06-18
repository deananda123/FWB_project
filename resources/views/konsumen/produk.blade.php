@extends('konsumen.master')

@section('content')
    <!-- Page Add Section Begin -->
    <section class="page-add">
        @if (session()->has('warning'))
            <div style="background:orange; color:white; padding:10px;">
                {{ session('warning') }}
            </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Wrapper transparan menyambung -->
                    <div class="p-4 mb-4" style="background-color: rgba(65, 165, 150, 0.3); border-radius: 10px;">
                        <div class="row align-items-center">
                            <div class="col-lg-4 mb-3 mb-lg-0">
                                <div class="page-breadcrumb text-white">
                                    <h2 class="mb-0">The Collection</h2>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <img src="{{ asset('storage/karya/keempat.jpg') }}" alt=""
                                    class="img-fluid rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Page Add Section End -->

    <!-- Categories Page Section Begin -->
    <section class="categories-page spad">
        <div class="container">
            @if (session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('warning') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                @foreach ($karya as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top img-fluid"
                                alt="Karya">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-2" style="font-weight: 900;">{{ $item->judul }}</h5>
                                <h6 class="text-dark mb-2">Rp{{ number_format($item->harga, 0, ',', '.') }}</h6>
                                <p class="mb-2  text-dark">
                                    <strong>Kategori:</strong>
                                    @foreach ($item->kategoris as $kategori)
                                        <span class="badge d-inline-block me-1">{{ $kategori->nama }}</span>
                                    @endforeach
                                </p>
                                <p class="card-text flex-grow-1 text-dark">{{ Str::limit($item->deskripsi, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <small>By: <a href="{{ route('seniman.show', $item->user->id) }}"
                                            class="text-decoration-none">{{ $item->user->name }}</a></small>
                                    <form action="{{ route('order.store', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-dark btn-sm">Order</button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Categories Page Section End -->
@endsection
