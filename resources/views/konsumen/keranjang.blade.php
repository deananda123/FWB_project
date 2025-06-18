@extends('konsumen.master')
@section('content')
    <section class="page-add cart-page-add">
       <div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Wrapper transparan menyambung -->
            <div class="p-4 mb-4" style="background-color: rgba(65, 165, 150, 0.3); border-radius: 10px;">
                <div class="row align-items-center">
                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="page-breadcrumb text-white">
                            <h2 class="mb-0">Cart</h2>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <img src="{{ asset('storage/karya/keempat.jpg') }}" alt="" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
    <!-- Page Add Section End -->

    <!-- Cart Page Section Begin -->
    <div class="cart-page">
        <div class="container">
            <div class="cart-table">
                <table>
                    <thead>
                        <tr>
                            <th class="product-h">Product</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="product-col">
                                    <img src="{{ asset('storage/' . $order->karya->gambar) }}"
                                        alt="{{ $order->karya->judul }}">

                                    <div class="p-title">
                                        <h5>{{ $order->karya->judul }}</h5>
                                        <small>
                                            by <a href="{{ route('seniman.show', $order->karya->user->id) }}">
                                                {{ $order->karya->user->name }}
                                            </a>
                                        </small>
                                    </div>
                                </td>
                                <td class="price-col">Rp{{ number_format($order->karya->harga, 0, ',', '.') }}</td>
                                <td>
                                    <span style="color: {{ $order->status == 'pending' ? 'orange' : 'green' }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>

                                <td class="product-close">
                                    @if ($order->status != 'canceled')
                                        <form action="{{ route('order.cancel', $order->id) }}" method="POST"
                                            onsubmit="return confirm('Batalkan pesanan ini?')">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                style="background: none; border: none; color: red; font-weight: bold;">x</button>
                                        </form>
                                    @else
                                        <span style="color: grey;">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>
            <div class="cart-btn">
                <div class="row">
                   
                     
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
