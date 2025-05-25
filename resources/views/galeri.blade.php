@extends('layot.master')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gallery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gallery</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      @foreach ($karya as $item)
        <div class="col-md-4">
          <div class="card card-widget">
            <div class="card-header">
              <h3 class="card-title">{{ $item->judul }}</h3>
            </div>
            <div class="card-body">
              <img src="{{ asset('storage/' . $item->gambar) }}" alt="Karya" class="img-fluid">
            </div>
            <div class="card-footer text-right">
              <form action="{{ route('admin.karya.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus karya ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

    <!-- Main content -->
   
    <!-- /.content -->
  </div>
@endsection