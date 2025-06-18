@extends('layot.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Pesanan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route("seniman")}}">Home</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pesanan Masuk</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 30%">Judul Karya</th>
                                <th style="width: 25%">Nama Konsumen</th>
                                <th style="width: 10%" class="text-center">Status</th>
                                <th style="width: 30%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $order)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $order->karya->judul }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td class="project-state">
                                        @if ($order->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif ($order->status == 'completed')
                                            <span class="badge badge-success">Completed</span>
                                        @elseif ($order->status == 'canceled')
                                            <span class="badge badge-danger">Canceled</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                        <form action="{{ route('order.complete', $order->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm"
                                                onclick="return confirm('Tandai sebagai selesai?')">
                                                <i class="fas fa-check"></i> Completed
                                            </button>
                                        </form>
                                        <form action="{{ route('order.destroy', $order->id) }}" method="POST"
                                            style="display: inline-block;"
                                            onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>

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
