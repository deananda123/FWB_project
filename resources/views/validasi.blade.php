@extends('layot.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Karya</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                        
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Karya Seniman</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 25%">Gambar & Judul</th>
                                <th style="width: 15%">Harga</th>
                                <th style="width: 30%">Deskripsi</th>
                                <th style="width: 10%" class="text-center">Status</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($karya as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Karya"
                                                width="60" height="60" class="img-thumbnail mr-2"
                                                style="object-fit: cover;">
                                            <span>{{ $item->judul }}</span>
                                        </div>
                                    </td>
                                    <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                                    <td class="project-state text-center">
                                        @if ($item->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif ($item->status == 'approved')
                                            <span class="badge badge-success">Approved</span>
                                        @elseif ($item->status == 'rejected')
                                            <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                        @if ($item->status == 'pending' || $item->status == 'rejected')
                                            <form action="{{ route('karya.approve', $item->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-success btn-sm"
                                                    onclick="return confirm('Setujui karya ini?')">
                                                    <i class="fas fa-check"></i> Approve
                                                </button>
                                            </form>
                                        @endif
                                        @if ($item->status != 'rejected')
                                            <form action="{{ route('karya.reject', $item->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-warning btn-sm"
                                                    onclick="return confirm('Tolak karya ini?')">
                                                    <i class="fas fa-times"></i> Reject
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
