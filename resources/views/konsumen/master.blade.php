<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Violet | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('konsumen')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('konsumen')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('konsumen')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('konsumen')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('konsumen')}}/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{asset('konsumen')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('konsumen')}}/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    
    <!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search model end -->

    <!-- Header Section Begin -->
    @include('layout.header')
    <!-- Header Info Begin -->
    @include('layout.headerInfo')
    <!-- Header Info End -->
    <!-- Header End -->

    @yield('content')

    <!-- Footer Section Begin -->
@include('layout.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('layout.script')
</body>

</html>