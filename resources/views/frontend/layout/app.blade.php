<!DOCTYPE html>
<html lang="en">

<head>
	<title>Blogger</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend/styles/bootstrap4/bootstrap.min.css' )}}">
	<link href="{{ asset( 'frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend/styles/main_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend/styles/responsive.css') }}">
	
	<link rel="stylesheet" href="{{ asset( 'frontend/plugins/themify-icons/themify-icons.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend/styles/contact_styles.css ') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend/styles/contact_responsive.css') }}">


</head>

<body>
	<div class="super_container">
		<header class="header trans_300">
			@include('frontend.layout.mainnavigation')
		</header>

		@include('frontend.layout.mobmodenavigation')	

		@yield('content')
		@include('frontend.layout.footer')
	</div>

	<script src="{{ asset( 'frontend/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset( 'frontend/styles/bootstrap4/popper.js') }}"></script>
	<script src="{{ asset( 'frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
	<script src="{{ asset( 'frontend/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset( 'frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
	<script src="{{ asset( 'frontend/plugins/easing/easing.js') }}"></script>
	<script src="{{ asset( 'frontend/js/custom.js') }}"></script>
</body>

</html>