@php
$setting = \App\Helpers\Helpers::setting();
@endphp
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

	<title>SPMB AL QALAM KENDARI</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('storage/upload/setting/'.$setting->small_icon) }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta property="og:locale" content="id_ID" />
	<meta property="og:locale" content="in" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="SPMB AL QALAM KENDARI" />
	<meta property="og:url" content="{{ url('') }}" />
	<meta property="og:site_name" content="SPMB AL QALAM KENDARI" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/style.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/dark.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/font-icons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}" type="text/css" />

	<!-- Bootstrap Switch CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/css/components/bs-switches.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" type="text/css" />
	<meta name='viewport' content='initial-scale=1, viewport-fit=cover'>

	<!-- Seo Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{{ asset('frontend/css/colors.php?color=FE9603') }}" type="text/css" /> <!-- Theme Color -->
	<link rel="stylesheet" href="{{ asset('frontend/demos/seo/css/fonts.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/demos/seo/seo.css') }}" type="text/css" />


</head>

<style>
	@media (min-width: 992px) {
		.sticky-header #header-wrap {
			position: fixed;
			top: 0;
			left: 0;
			background-color: #ffffffff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
	}

	#logo img {
		display: block;
		max-width: 100%;
		max-height: 100%;
		height: 75px;
	}

	.card-gradient {
		background: linear-gradient(135deg, #FF5722, #FFEB3B);
		background-size: 200% 200%;
		transition:
			background-position 0.6s ease-out,
			transform 0.3s ease,
			box-shadow 0.3s ease;
	}

	/* Efek saat hover */
	.card-gradient:hover {
		background-position: right center;
		transform: translateY(-10px);
		/* Naik 10px */
		box-shadow: 0 20px 35px rgba(0, 0, 0, 0.15);
		/* Bayangan lebih tebal */
	}

	.btn-success:hover {
		background-color: #28a745 !important;
		/* Warna baru */
		color: #fff !important;
		/* Warna teks */
		transform: translateY(-3px);
		/* Jika ingin naik ke atas saat hover */
		transition: 0.3s;
	}

	.card-gradient {
		background: linear-gradient(120deg, #ff512f, #f09819, #f7e605ff, #f09819, #ff512f);
		background-size: 600% 600%;
		animation: gradientMove 5s ease-in-out infinite;
	}

	@keyframes gradientMove {
		0% {
			background-position: 0% 50%;
		}

		50% {
			background-position: 100% 50%;
		}

		100% {
			background-position: 0% 50%;
		}
	}
</style>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix" style="background: url(http://localhost/2025-web-al-qalam/frontend/demos/seo/images/hero/hero-1.jpg) center center / cover no-repeat rgb(255, 255, 255);">


		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap pt-0" style="padding: 0px 0;background: url('{{ asset('storage/upload/slider/1764493160.jpg') }}') no-repeat center center; background-size: cover;background-color: #0000006e;background-blend-mode: darken;">
				<!-- <div class="content-wrap pt-0"> -->

				<!-- Features
				============================================= -->
				<div class="section bg-transparent" style="padding: 0px;">
					<div class="container">
						<div class="header-row">

							<!-- Logo
						============================================= -->
							<div id="logo">
								<a href="index.html" class="standard-logo" data-dark-logo="{{ asset('storage/upload/setting/'.$setting->small_icon) }}"><img src="{{ asset('storage/upload/setting/'.$setting->small_icon) }}" alt="Canvas Logo" style="height: 75px;padding:10px"></a>
								<a href="index.html" class="retina-logo" data-dark-logo="{{ asset('storage/upload/setting/'.$setting->small_icon) }}"><img src="{{ asset('storage/upload/setting/'.$setting->small_icon) }}" alt="Canvas Logo" style="height: 75px;padding:10px"></a>
							</div><!-- #logo end -->

							<!-- Primary Navigation
						============================================= -->
							<nav class="primary-menu with-arrows">

								<p style="font-size:25px;margin-bottom: 25px;margin-top: 25px;font-weight:bold;color:white;">SPMB AL QALAM KENDARI</p>
							</nav><!-- #primary-menu end -->

							<form class="top-search-form" action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
							</form>

						</div>

						<div class="row justify-content-center">

							<div class="col-lg-12 mb-12 mb-lg-0">
								<div class="grid-inner shadow-sm h-shadow bg-white p-2 overflow-hidden rounded-5 text-center">
									<div style="position:relative; width:100%; height:450px;">
    <iframe 
        src="https://bombanakab.go.id/storage/upload/ipkd/1762514678.pdf"
        style="width:100%; height:100%; border:0; position:relative; z-index:10; background:transparent;"
    ></iframe>
</div>
								</div>
							</div>

						</div>


						<footer class=" text-white text-center p-4 mt-4">
							<div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
								<div class="social-icons mb-2 mb-md-0">
									<a href="{{ $setting->instagram }}" target="_blank" class="mx-2 tilt">
										<img src="{{ asset('storage/menu/icons8-instagram-100.png') }}" alt="Instagram" width="40" height="40">
									</a>
									<a href="{{ $setting->facebook }}" target="_blank" class="mx-2 tilt">
										<img src="{{ asset('storage/menu/icons8-facebook-100.png') }}" alt="Facebook" width="40" height="40">
									</a>
									<a href="{{ $setting->youtube }}" target="_blank" class="mx-2 tilt">
										<img src="{{ asset('storage/menu/icons8-youtube2-100.png') }}" alt="YouTube" width="40" height="40">
									</a>
								</div>
								<p class="mb-0 footer-copy">&copy; {{ date('Y') }}/{{ date('Y')+1 }} SPMB AL QALAM KENDARI</p>
							</div>
						</footer>
					</div>
				</div>

			</div>
		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="{{ asset('frontend/js/jquery.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins.min.js') }}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{ asset('frontend/js/functions.js') }}"></script>

</body>

</html>