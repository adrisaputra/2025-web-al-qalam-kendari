@php
$setting = \App\Helpers\Helpers::setting();
$work_unit = \App\Helpers\Helpers::work_unit();
@endphp
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Outfit:wght@100..900&family=Sen:wght@400..800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/style.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/swiper.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/dark.css') }}" type="text/css" />

	<!-- Real Estate Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{{ asset('frontend/demos/real-estate/real-estate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/demos/real-estate/css/font-icons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/demos/news/news.css') }}" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="{{ asset('frontend/css/font-icons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}" type="text/css" />

	<!-- Bootstrap Select CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/css/components/bs-select.css') }}" type="text/css" />

	<!-- Bootstrap Switch CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/css/components/bs-switches.css') }}" type="text/css" />

	<!-- Range Slider CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/css/components/ion.rangeslider.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="{{ asset('frontend/css/colors.php?color=2C3E50') }}" type="text/css" />

	<!-- Document Title
	============================================= -->
	<title>{{ $setting->application_name }}</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('storage/upload/setting/'.$setting->small_icon) }}" />

</head>
<style>
	/* <!-- hover sub menu di style css baris 3998 --> */
	@media (min-width: 999px) {
		.menu-item>.menu-link {
			color: aliceblue !important;
		}

		.sub-menu-container .menu-link {
			color: aliceblue !important;
		}
	}

	.feature-box {
		background-color: #b61c1c;
		padding: 15px;
		border-radius: 10px;
		margin-left: -0.5rem;
		margin-right: -0.5rem;
		margin-bottom: 0.3rem;
		display: block;
		text-align: center;
	}

	.fbox-icon {
		width: 100%;
		height: 4rem;
		padding: 0 0.75rem;
	}

	.pagination {
		display: flex;
		gap: 4px;
	}

	.pagination .page-item .page-link {
		border: 1px solid #dcdcdc;
		padding: 4px 8px;
		/* ← diperkecil */
		font-size: 12px;
		/* ← diperkecil */
		border-radius: 4px;
		/* ← diperkecil */
		background: white;
		color: #333;
		font-weight: 500;
		transition: 0.2s;
	}

	/* Hover */
	.pagination .page-item .page-link:hover {
		background: #f5f5f5;
		color: #000;
	}

	/* Active merah */
	.pagination .page-item.active .page-link {
		background: #e53935;
		color: white;
		border-color: #e53935;
		font-weight: bold;
	}

	/* Disabled */
	.pagination .page-item.disabled .page-link {
		background: #f2f2f2;
		color: #999 !important;
		border-color: #e0e0e0;
	}

	/* Hilangkan shadow */
	.pagination .page-link {
		box-shadow: none !important;
	}
</style>

<body class="stretched side-push-panel">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="header-size-sm" data-sticky-shrink="false">

			<div id="header-wrap">
				<div class="container" style="max-width: 1300px;">
					<div class="header-row justify-content-between flex-row-reverse flex-lg-row justify-content-lg-center">

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100">
								<path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
								<path d="m 30,50 h 40"></path>
								<path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
							</svg>
						</div>

						<div id="logo" class="ms-auto ms-lg-0 me-lg-auto">
							<a href="{{ url('/') }}" class="standard-logo"><img src="{{ asset('storage/upload/setting/'.$setting->large_icon) }}" alt="Canvas Logo" style="height:50px"></a>
							<a href="{{ url('/') }}" class="retina-logo"><img src="{{ asset('storage/upload/setting/'.$setting->large_icon) }}" alt="Canvas Logo" style="height:50px"></a>
						</div><!-- #logo end -->
						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu with-arrows">

							<ul class="menu-container">
								<li class="menu-item current"><a class="menu-link" href="{{ url('/') }}">
										<div>Beranda</div>
									</a></li>
								{{--<li class="menu-item"><a class="menu-link" href="#">
										<div>Profil</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="{{ url('/page-history') }}">
												<div>Visi</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('/page-vision-mission') }}">
												<div>Misi</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('/page-structure') }}">
												<div>Stuktur Organisasi</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('/page-area') }}">
												<div>Dewan Pembina</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('/page-demographics') }}">
												<div>Dewan Pengawas</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('/page-facility') }}">
												<div>Pengurus Yayasan</div>
											</a></li>
									</ul>
								</li>--}}
								<li class="menu-item"><a class="menu-link" href="#">
										<div>Unit kerja</div>
									</a>
									<ul class="sub-menu-container">
										@foreach($work_unit as $v)
										<li class="menu-item">
											<a class="menu-link" href="{{ $v->url }}">
												<div>{{ $v->name }}</div>
											</a>
										</li>
										@endforeach
									</ul>
								</li>
								<li class="menu-item"><a class="menu-link" href="#">
										<div>Informasi</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="{{ url('/page-news') }}">
												<div>Berita</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('/page-announcement') }}">
												<div>Artikel</div>
											</a></li>
									</ul>
								</li>
								<li class="menu-item"><a class="menu-link" href="#">
										<div>Galeri</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="{{ url('/page-album') }}">
												<div>Foto</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('/page-video') }}">
												<div>Video</div>
											</a></li>
									</ul>
								</li>
							</ul>

						</nav><!-- #primary-menu end -->

					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->

		@yield('content')

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">
			<div class="container">
				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap">

					<div class="row col-mb-50">
						<div class="col-lg-8 order-last order-lg-first">

							<div class="widget clearfix">

								<img src="{{ asset('storage/upload/setting/'.$setting->small_icon) }}" style="position: relative; opacity: 0.85; left: -10px; max-height: 80px; margin-bottom: 20px;" alt="Footer Logo">

								<p>Yayasan Pendidikan Al-Qalam Kendari<br>
									{{ $setting->address }}
								</p>

								<div class="line" style="margin: 30px 0;"></div>

								<p class="ls1 fw-light" style="opacity: 0.6; font-size: 13px;">&copy; 2025 Powered by CV. Anaqia Project</p>

							</div>

						</div>

						<div class="col-lg-4">

							<h4 class="ls1 fw-normal text-uppercase">Hubungi Kami</h4>

							<p>
								<i class="icon-phone"></i>&nbsp;&nbsp;&nbsp;{{ $setting->phone }}<br>
								<i class="icon-email"></i>&nbsp;&nbsp;&nbsp;{{ $setting->email }}
							</p>

							<div class="bottommargin-sm clearfix">
								<a href="{{ $setting->facebook }}" target="_blank" class="social-icon si-colored si-small si-rounded si-facebook" title="Facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								<a href="{{ $setting->twitter }}" target="_blank" class="social-icon si-colored si-small si-rounded si-twitter" title="Twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>

								<a href="{{ $setting->instagram }}" target="_blank" class="social-icon si-colored si-small si-rounded si-instagram" title="Instagram">
									<i class="icon-instagram"></i>
									<i class="icon-instagram"></i>
								</a>

								<a href="{{ $setting->youtube }}" target="_blank" class="social-icon si-colored si-small si-rounded si-youtube" title="Youtube">
									<i class="icon-youtube"></i>
									<i class="icon-youtube"></i>
								</a>

							</div>


						</div>
					</div>

				</div><!-- .footer-widgets-wrap end -->
			</div>
		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<!-- 	
	<script src="{{ asset('frontend/js/jquery.js') }}"></script> -->
	<script src="{{ asset('frontend/js/plugins.min.js') }}"></script>
	<script src="https://maps.google.com/maps/api/js?key=YOUR-API-KEY"></script>

	<!-- Bootstrap Select Plugin -->
	<script src="{{ asset('frontend/js/components/bs-select.js') }}"></script>

	<!-- Bootstrap Switch Plugin -->
	<script src="{{ asset('frontend/js/components/bs-switches.js') }}"></script>

	<!-- Range Slider Plugin -->
	<script src="{{ asset('frontend/js/components/rangeslider.min.js') }}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{ asset('frontend/js/functions.js') }}"></script>

	<script>
		jQuery(document).ready(function() {

			$(".price-range-slider").ionRangeSlider({
				type: "double",
				prefix: "$",
				min: 200,
				max: 10000,
				max_postfix: "+"
			});

			$(".area-range-slider").ionRangeSlider({
				type: "double",
				min: 50,
				max: 20000,
				from: 50,
				to: 20000,
				postfix: " sqm.",
				max_postfix: "+"
			});

			jQuery(".bt-switch").bootstrapSwitch();

		});
	</script>

</body>

</html>