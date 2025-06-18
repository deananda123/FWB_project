@extends('konsumen.master')
@section('content')
    <!-- Hero Slider Begin -->
    <section class="hero-slider">
        <div class="hero-items owl-carousel">
            <div class="single-slider-item set-bg" data-setbg="{{ asset('gambar1.jpg') }} ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Top Pick 2025</h1>
                            <h2>Fresh & Inspiring</h2>
                            <a href="{{ route('konsumenProduk') }}" class="primary-btn">See More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider-item set-bg" data-setbg="{{ asset('gambar4.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Exclusive Artwork</h1>
                            <h2>Lookbook</h2>
                            @guest
                                <a href="{{ route('login') }}" class="primary-btn">See More</a>
                            @else
                                <a href="{{ route('konsumenProduk') }}" class="primary-btn">See More</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider-item set-bg" data-setbg="{{ asset('gambar5.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Painting of the Week</h1>
                            <h2>Curated for You </h2>
                            @guest
                                <a href="{{ route('login') }}" class="primary-btn">See More</a>
                            @else
                                <a href="{{ route('konsumenProduk') }}" class="primary-btn">See More</a>
                            @endguest

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Slider End -->

    <!-- Features Section Begin -->
    <section class="features-section spad">
        <div class="features-ads">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-features-ads first">
                            <img src="{{ asset('konsumen') }}/img/icons/f-delivery.png" alt="">
                            <h4>A Platform to Buy and Sell Art</h4>
                            <p>Arteka is a website that facilitates the online buying and selling of two-dimensional artworks like paintings and illustrations. </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-features-ads second">
                            <img src="{{ asset('konsumen') }}/img/icons/coin.png" alt="">
                            <h4>Supporting Local Artists </h4>
                            <p>Through Arteka, artists can showcase and sell their own creations, while consumers can easily discover original pieces. </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-features-ads">
                            <img src="{{ asset('konsumen') }}/img/icons/chat.png" alt="">
                            <h4>Curated Artwork Display</h4>
                            <p>Each uploaded artwork goes through an admin validation process to ensure that only qualified pieces are displayed to the public.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features Box -->
       <div class="features-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-box-item first-box">
                            <img src="{{ asset('storage/karya/ketiga.jpg') }}" alt="">
                            <div class="box-text text-white">
                                <span class="trend-year">Arteka Exclusive</span>
                                <h2>Paintings</h2>
                                <span class="trend-alert">Curated Collection</span>
                                <a href="{{ route('konsumenProduk') }}" class="primary-btn">See More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-box-item second-box">
                            <img src="{{ asset('storage/karya/pertama.jpg') }}" alt="">
                            <div class="box-text text-white">
                                <span class="trend-year">Top Selections</span>
                                <h2>Best Seller</h2>
                                <span class="trend-alert">Bold & Black</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-box-item large-box">
                    <img src="{{ asset('storage/karya/kedua.jpg') }}" alt="">
                    <div class="box-text text-white">
                        <span class="trend-year">Latest Release</span>
                        <h2>Illustrations</h2>
                        <div class="trend-alert">Bold & Unique</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </section>
    <!-- Features Section End -->

    <!-- Latest Product Begin -->
    <section class="latest-products spad">
        <div class="container">
          
        </div>
    </section>
    <!-- Latest Product End -->
@endsection
