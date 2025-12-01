<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Roboto:300,400,500,700|Rubik:400,600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/style.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/dark.css') }}" type="text/css" />

	<!-- Real Estate Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{{ asset('frontend/demos/real-estate/real-estate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/demos/real-estate/css/font-icons.css') }}" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="{{ asset('frontend/css/font-icons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('frontend/demos/real-estate/fonts.css') }}" type="text/css" />

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
	<title>Real Estate Demo | Canvas</title>

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
</style>

<body class="stretched side-push-panel">

	<div id="side-panel">
		<div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon-line-cross"></i></a></div>

		<div class="side-panel-wrap">
			<div class="widget clearfix">

				<h4 class="fw-normal">Login with Social Profiles</h4>

				<a href="#" class="button button-rounded fw-normal w-100 center si-colored ms-0 si-facebook">Facebook</a>
				<a href="#" class="button button-rounded fw-normal w-100 center si-colored ms-0 si-gplus">Google</a>

				<div class="line"></div>

				<h4 class="fw-normal">Existing Account?</h4>

				<form id="login-form" name="row mb-0" class="mb-0" action="#" method="post">

					<div class="col-12 form-group">
						<label for="login-form-username" class="fw-normal">Username:</label>
						<input type="text" id="login-form-username" name="login-form-username" value="" class="form-control" />
					</div>

					<div class="col-12 form-group">
						<label for="login-form-password" class="fw-normal">Password:</label>
						<input type="password" id="login-form-password" name="login-form-password" value="" class="form-control" />
					</div>

					<div class="col-12 form-group">
						<button class="button button-rounded fw-normal m-0" id="login-form-submit" name="login-form-submit" value="login">Login</button>
						<a href="#" class="float-end">Forgot Password?</a>
					</div>

				</form>

			</div>
		</div>
	</div>

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="header-size-sm" data-sticky-shrink="false">

			<div id="header-wrap">
				<div class="container">
					<div class="header-row justify-content-between flex-row-reverse flex-lg-row justify-content-lg-center">

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100">
								<path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
								<path d="m 30,50 h 40"></path>
								<path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
							</svg>
						</div>

						<div id="logo" class="ms-auto ms-lg-0 me-lg-auto">
							<a href="{{ url('/') }}" class="standard-logo"><img src="{{ asset('frontend/demos/real-estate/images/logo.png') }}" alt="Canvas Logo"></a>
							<a href="{{ url('/') }}" class="retina-logo"><img src="{{ asset('frontend/demos/real-estate/images/logo.png') }}" alt="Canvas Logo"></a>
						</div><!-- #logo end -->
						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu with-arrows">

							<ul class="menu-container">
								<li class="menu-item current"><a class="menu-link" href="demo-real-estate.html">
										<div>Beranda</div>
									</a></li>
								<li class="menu-item"><a class="menu-link" href="#">
										<div>Profil</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="demo-real-estate-single-property.html">
												<div>Sejarah</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="demo-real-estate-single-property.html">
												<div>Visi Misi</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="demo-real-estate-single-property.html">
												<div>Stuktur Organisasi</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="demo-real-estate-single-property.html">
												<div>Wilayah Desa</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="demo-real-estate-single-property.html">
												<div>Demografis Penduduk</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="demo-real-estate-single-property.html">
												<div>Fasilitas Desa</div>
											</a></li>
									</ul>
								</li>
								<li class="menu-item"><a class="menu-link" href="#">
										<div>Pemerintahan</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="demo-real-estate-single-property.html">
												<div>Perangkat Desa</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="demo-real-estate-single-property.html">
												<div>Lembaga Desa</div>
											</a></li>
									</ul>
								</li>
								<li class="menu-item"><a class="menu-link" href="#">
										<div>Informasi Publik</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="demo-real-estate-single-property.html">
												<div>Berita</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="demo-real-estate-single-property.html">
												<div>Pengumuman</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="demo-real-estate-single-property.html">
												<div>Agenda</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="demo-real-estate-single-property.html">
												<div>Produk Hukum</div>
											</a></li>
									</ul>
								</li>
								<li class="menu-item"><a class="menu-link" href="demo-real-estate-builders.html">
										<div>Potensi Desa</div>
									</a></li>
								<li class="menu-item"><a class="menu-link" href="demo-real-estate-builders.html">
										<div>Transparansi Desa</div>
									</a></li>
								<li class="menu-item"><a class="menu-link" href="#">
										<div>Galeri</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="demo-real-estate-single-property.html">
												<div>Foto</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="demo-real-estate-single-property.html">
												<div>Video</div>
											</a></li>
									</ul>
								</li>
								<li class="menu-item"><a class="menu-link" href="demo-real-estate-services.html">
										<div>F.A.Q</div>
									</a></li>
								<li class="menu-item"><a class="menu-link" href="demo-real-estate-services.html">
										<div>Kontak</div>
									</a></li>
							</ul>

						</nav><!-- #primary-menu end -->

					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->

		<!-- Slider
		============================================= -->
		<section id="slider" class="slider-element min-vh-60 min-vh-md-100 include-header include-topbar" style="background: url({{ asset('frontend/demos/real-estate/images/hero/1.jpg') }}) center center no-repeat; background-size: cover; background-color: rgba(0, 0, 0, 0.4);background-blend-mode: darken;">
			<div class="slider-inner">

				<div class="vertical-middle">
					<div class="container pt-5 pb-5 pb-lg-0">
						<div class="tabs advanced-real-estate-tabs">

						</div>
					</div>
				</div>

			</div>
		</section><!-- #slider end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container">

					<div class="row col-mb-50">

						<div class="col-sm-6 col-lg-6">
							<div class="row col-mb-50">
								<div class="col-sm-12 col-lg-12">
									<div class="fbox-plain">
										<div class="fbox-content">
											<h3 class="fw-normal">JELAJAHI Desa</h3>
											<p>Melalui website ini Anda dapat menjelajahi segala hal yang terkait dengan Desa. Aspek pemerintahan, penduduk, demografi, potensi Desa, dan juga berita tentang Desa.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6">
							<div class="row" style="--bs-gutter-x: 1.5rem;">
								<div class="col-sm-6 col-lg-6">
									<div class="feature-box fbox-plain">
										<div class="fbox-icon">
											<center><a href="#"><img src="{{ asset('storage/menu/icons8-graph-100.png') }}" style="width:60px;height:60px"></a></center>
										</div>
										<div class="fbox-content">
											<h3 class="fw-normal" style="color: #ffffff;">Demografis</h3>
										</div>
									</div>
								</div>

								<div class="col-sm-6 col-lg-6">
									<div class="feature-box fbox-plain">
										<div class="fbox-icon">
											<center><a href="#"><img src="{{ asset('storage/menu/icons8-company-100.png') }}" style="width:60px;height:60px"></a></center>
										</div>
										<div class="fbox-content">
											<h3 class="fw-normal" style="color: #ffffff;">Fasilitas</h3>
										</div>
									</div>
								</div>

								<div class="col-sm-6 col-lg-6">
									<div class="feature-box fbox-plain">
										<div class="fbox-icon">
											<center><a href="#"><img src="{{ asset('storage/menu/icons8-farm-2-100.png') }}" style="width:60px;height:60px"></a></center>
										</div>
										<div class="fbox-content">
											<h3 class="fw-normal" style="color: #ffffff;">Potensi</h3>
										</div>
									</div>
								</div>

								<div class="col-sm-6 col-lg-6">
									<div class="feature-box fbox-plain">
										<div class="fbox-icon">
											<center><a href="#"><img src="{{ asset('storage/menu/icons8-cash-100.png') }}" style="width:60px;height:60px"></a></center>
										</div>
										<div class="fbox-content">
											<h3 class="fw-normal" style="color: #ffffff;">Transparansi</h3>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="line"></div>

					<div style="position: relative;">
						<div class="heading-block border-bottom-0">
							<h3>Berita Desa</h3>
						</div>

						<a href="#" class="button button-small button-rounded button-border button-border-thin fw-medium m-0" style="position: absolute; top: 7px; right: 0;">Lihat Selengkapnya</a>

						<div class="real-estate owl-carousel image-carousel carousel-widget bottommargin-lg" data-margin="10" data-nav="true" data-loop="true" data-pagi="false" data-items-xs="1" data-items-sm="1" data-items-md="2" data-items-lg="3" data-items-xl="3">

							<div class="oc-item">
								<div class="real-estate-item">
									<div class="real-estate-item-image">
										<div class="badge bg-danger bg-color2">For Sale</div>
										<a href="#">
											<img src="{{ asset('frontend/demos/real-estate/images/items/1.jpg') }}" alt="Image 1">
										</a>
										<div class="real-estate-item-price">
											$1.2m<span>Leasehold</span>
										</div>
										<div class="real-estate-item-info clearfix">
											<a href="#"><i class="icon-line-stack-2"></i></a>
											<a href="#"><i class="icon-line-heart"></i></a>
										</div>
									</div>

									<div class="real-estate-item-desc">
										<h3><a href="#">3 Bedroom Villa</a></h3>
										<span>Seminyak Area</span>

										<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

										<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

										<div class="real-estate-item-features fw-medium font-primary clearfix">
											<div class="row g-0">
												<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
												<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
												<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
												<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-danger"><i class="icon-minus-sign-alt"></i></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="oc-item">
								<div class="real-estate-item">
									<div class="real-estate-item-image">
										<div class="badge bg-success">Hot Deal</div>
										<a href="#">
											<img src="{{ asset('frontend/demos/real-estate/images/items/2.jpg') }}" alt="Image 2">
										</a>
										<div class="real-estate-item-price">
											$200,000<span>bi-annually</span>
										</div>
										<div class="real-estate-item-info clearfix">
											<a href="#"><i class="icon-line-stack-2"></i></a>
											<a href="#"><i class="icon-line-heart"></i></a>
										</div>
									</div>

									<div class="real-estate-item-desc">
										<h3><a href="#">3 Bedroom Villa</a></h3>
										<span>Seminyak Area</span>

										<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

										<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

										<div class="real-estate-item-features fw-medium clearfix">
											<div class="row g-0">
												<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
												<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
												<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
												<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="oc-item">
								<div class="real-estate-item">
									<div class="real-estate-item-image">
										<div class="badge bg-danger">Long Term Rental</div>
										<a href="#">
											<img src="{{ asset('frontend/demos/real-estate/images/items/4.jpg') }}" alt="Image 3">
										</a>
										<div class="real-estate-item-price">
											$1600<span>per month</span>
										</div>
										<div class="real-estate-item-info clearfix">
											<a href="#"><i class="icon-line-stack-2"></i></a>
											<a href="#"><i class="icon-line-heart"></i></a>
										</div>
									</div>

									<div class="real-estate-item-desc">
										<h3><a href="#">3 Bedroom Villa</a></h3>
										<span>Seminyak Area</span>

										<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

										<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

										<div class="real-estate-item-features fw-medium clearfix">
											<div class="row g-0">
												<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
												<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
												<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
												<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div style="position: relative;">
						<div class="heading-block border-bottom-0">
							<h3>Pengumuman Desa</h3>
						</div>

						<a href="#" class="button button-small button-rounded button-border button-border-thin fw-medium m-0" style="position: absolute; top: 7px; right: 0;">Lihat Selengkapnya</a>

						<div class="real-estate owl-carousel image-carousel carousel-widget bottommargin-lg" data-margin="10" data-nav="true" data-loop="true" data-pagi="false" data-items-xs="1" data-items-sm="1" data-items-md="2" data-items-lg="3" data-items-xl="3">

							<div class="oc-item">
								<div class="real-estate-item">
									<div class="real-estate-item-image">
										<div class="badge bg-danger bg-color2">For Sale</div>
										<a href="#">
											<img src="{{ asset('frontend/demos/real-estate/images/items/1.jpg') }}" alt="Image 1">
										</a>
										<div class="real-estate-item-price">
											$1.2m<span>Leasehold</span>
										</div>
										<div class="real-estate-item-info clearfix">
											<a href="#"><i class="icon-line-stack-2"></i></a>
											<a href="#"><i class="icon-line-heart"></i></a>
										</div>
									</div>

									<div class="real-estate-item-desc">
										<h3><a href="#">3 Bedroom Villa</a></h3>
										<span>Seminyak Area</span>

										<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

										<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

										<div class="real-estate-item-features fw-medium font-primary clearfix">
											<div class="row g-0">
												<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
												<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
												<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
												<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-danger"><i class="icon-minus-sign-alt"></i></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="oc-item">
								<div class="real-estate-item">
									<div class="real-estate-item-image">
										<div class="badge bg-success">Hot Deal</div>
										<a href="#">
											<img src="{{ asset('frontend/demos/real-estate/images/items/2.jpg') }}" alt="Image 2">
										</a>
										<div class="real-estate-item-price">
											$200,000<span>bi-annually</span>
										</div>
										<div class="real-estate-item-info clearfix">
											<a href="#"><i class="icon-line-stack-2"></i></a>
											<a href="#"><i class="icon-line-heart"></i></a>
										</div>
									</div>

									<div class="real-estate-item-desc">
										<h3><a href="#">3 Bedroom Villa</a></h3>
										<span>Seminyak Area</span>

										<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

										<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

										<div class="real-estate-item-features fw-medium clearfix">
											<div class="row g-0">
												<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
												<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
												<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
												<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="oc-item">
								<div class="real-estate-item">
									<div class="real-estate-item-image">
										<div class="badge bg-danger">Long Term Rental</div>
										<a href="#">
											<img src="{{ asset('frontend/demos/real-estate/images/items/4.jpg') }}" alt="Image 3">
										</a>
										<div class="real-estate-item-price">
											$1600<span>per month</span>
										</div>
										<div class="real-estate-item-info clearfix">
											<a href="#"><i class="icon-line-stack-2"></i></a>
											<a href="#"><i class="icon-line-heart"></i></a>
										</div>
									</div>

									<div class="real-estate-item-desc">
										<h3><a href="#">3 Bedroom Villa</a></h3>
										<span>Seminyak Area</span>

										<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

										<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

										<div class="real-estate-item-features fw-medium clearfix">
											<div class="row g-0">
												<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
												<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
												<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
												<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>

				<div class="section my-0">
					<div class="container">

						<div class="row mt-4 col-mb-50">

							<div class="col-lg-4">
								<i class="i-plain color i-large icon-line2-screen-desktop inline-block" style="margin-bottom: 15px;"></i>
								<div class="heading-block border-bottom-0" style="margin-bottom: 15px;">
									<span class="before-heading">Scalable on Devices.</span>
									<h4>Responsive &amp; Retina</h4>
								</div>
								<p>Employment respond committed meaningful fight against oppression social challenges rural legal aid governance. Meaningful work, implementation, process cooperation, campaign inspire.</p>
							</div>

							<div class="col-lg-4">
								<i class="i-plain color i-large icon-line2-energy inline-block" style="margin-bottom: 15px;"></i>
								<div class="heading-block border-bottom-0" style="margin-bottom: 15px;">
									<span class="before-heading">Smartly Coded &amp; Maintained.</span>
									<h4>Powerful Performance</h4>
								</div>
								<p>Medecins du Monde Jane Addams reduce child mortality challenges Ford Foundation. Diversification shifting landscape advocate pathway to a better life rights international. Assessment.</p>
							</div>

							<div class="col-lg-4">
								<i class="i-plain color i-large icon-line2-equalizer inline-block" style="margin-bottom: 15px;"></i>
								<div class="heading-block border-bottom-0" style="margin-bottom: 15px;">
									<span class="before-heading">Flexible &amp; Customizable.</span>
									<h4>Truly Multi-Purpose</h4>
								</div>
								<p>Democracy inspire breakthroughs, Rosa Parks; inspiration raise awareness natural resources. Governance impact; transformative donation philanthropy, respect reproductive.</p>
							</div>

						</div>

					</div>
				</div>

				<div class="section my-0">
					<div class="container">

						
					<div class="row real-estate-properties clearfix">

						<div class="col-lg-7">
							<a href="#" style="background: url('demos/real-estate/images/cities/4.jpg') no-repeat bottom center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block m-0 border-0">
										<h3 class="text-capitalize fw-medium">California</h3>
										<span style="margin-top: 5px; font-size: 17px;">23 Properties</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-5">
							<a href="#" style="background: url('demos/real-estate/images/cities/2.jpg') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block m-0 border-0">
										<h3 class="text-capitalize fw-medium">New York</h3>
										<span style="margin-top: 5px; font-size: 17px;">12 Properties</span>
									</div>
								</div>
							</a>
						</div>

						<div class="col-lg-4">
							<a href="#" style="background: url('demos/real-estate/images/cities/3.jpg') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block m-0 border-0">
										<h3 class="text-capitalize fw-medium">San Francisco</h3>
										<span style="margin-top: 5px; font-size: 17px;">8 Properties</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="#" style="background: url('demos/real-estate/images/cities/1.jpg') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block m-0 border-0">
										<h3 class="text-capitalize fw-medium">Texas</h3>
										<span style="margin-top: 5px; font-size: 17px;">31 Properties</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="#" style="background: url('demos/real-estate/images/cities/5.jpg') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block m-0 border-0">
										<h3 class="text-capitalize fw-medium">New Orleans</h3>
										<span style="margin-top: 5px; font-size: 17px;">19 Properties</span>
									</div>
								</div>
							</a>
						</div>

					</div>


					</div>
				</div>

				<div class="row align-items-stretch mx-0 topmargin bottommargin-lg">
					<div class="col-lg-5 px-0 d-none d-md-block">
						<div class="gmap h-100" data-address="New York, USA" data-maptype="ROADMAP" data-zoom="11" data-markers='[{ address: "New York, USA", html: "New York, USA", icon:{ image: "images/icons/map-icon-red.png", iconsize: [32, 36], iconanchor: [14,44] } }]' data-styles='[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"color":"#F0AD4E"},{"lightness":60}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#2C3E50"},{"visibility":"on"}]}]'></div>
					</div>
					<div class="col-lg-3" style="background-color: #E5E5E5;">
						<div style="padding: 40px;">
							<h4 class="font-body fw-semibold ls1">Our Headquarters</h4>

							<div style="font-size: 15px; line-height: 1.7;">
								<address style="line-height: 1.7;">
									<strong>North America:</strong><br>
									795 Folsom Ave, Suite 600<br>
									San Francisco, CA 94107.<br><br>
									<abbr title="Phone Number"><strong>Phone:</strong></abbr> (1) 8547 632521<br>
									<abbr title="Email Address"><strong>Email:</strong></abbr> real-estate@canvas.com
								</address>

								<div class="clear topmargin-sm"></div>

								<h4 class="font-body fw-medium" style="font-size: 17px; margin-bottom: 10px;">Working Hours:</h4>

								<abbr title="Mondays to Fridays"><strong>Mon-Fri:</strong></abbr> 10AM to 6PM<br>
								<abbr title="Saturday"><strong>Saturday:</strong></abbr> 11AM to 3PM<br>
								<abbr title="Sunday"><strong>Sunday:</strong></abbr> Closed
							</div>
						</div>
					</div>
					<div class="col-lg-4 bg-color">
						<div class="col-padding">
							<div class="quick-contact-widget form-widget dark clearfix">

								<h3 class="text-capitalize ls1 fw-normal">Get a Quick Quote</h3>

								<div class="form-result"></div>

								<form id="quick-contact-form" name="quick-contact-form" action="include/form.php" method="post" class="quick-contact-form mb-0">

									<div class="form-process">
										<div class="css3-spinner">
											<div class="css3-spinner-scaler"></div>
										</div>
									</div>

									<input type="text" class="required sm-form-control input-block-level not-dark" id="quick-contact-form-name" name="quick-contact-form-name" value="" placeholder="Full Name" />

									<input type="email" class="required sm-form-control email input-block-level not-dark" id="quick-contact-form-email" name="quick-contact-form-email" value="" placeholder="Email Address" />

									<input type="text" class="required sm-form-control input-block-level not-dark" id="quick-contact-form-phone" name="quick-contact-form-phone" value="" placeholder="Phone Number (+1-555-2221)" />

									<textarea class="required sm-form-control input-block-level not-dark short-textarea" id="quick-contact-form-message" name="quick-contact-form-message" rows="5" cols="30" placeholder="What are you Looking for? (Ex: Villa on the Beach)"></textarea>

									<input type="text" class="d-none" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />
									<input type="hidden" name="prefix" value="quick-contact-form-">

									<button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit" class="button button-small button-rounded button-light button-white m-0" value="submit">Send Email</button>

								</form>

							</div>
						</div>
					</div>
				</div>

				<div class="container">

					<div class="row col-mb-50">
						<div class="col-md-8">

							<div class="tabs tabs-justify tabs-tb tabs-alt mb-0 clearfix" id="realestate-tabs" data-active="2">

								<ul class="tab-nav clearfix">
									<li><a href="#realestate-tab-1">Why Us?</a></li>
									<li><a href="#realestate-tab-2">Properties</a></li>
									<li><a href="#realestate-tab-3">Legal</a></li>
								</ul>

								<div class="tab-container">

									<div class="tab-content clearfix" id="realestate-tab-1">
										<p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
										<div class="row col-mb-30">
											<div class="col-sm-6 col-lg-3 text-center">
												<div class="counter ls1 fw-semibold" style="color: #D2D2D2;"><span data-from="100" data-to="964" data-refresh-interval="50" data-speed="2000"></span></div>
												<h5>Floors Built</h5>
											</div>

											<div class="col-sm-6 col-lg-3 text-center">
												<div class="counter ls1 fw-semibold" style="color: #D2D2D2;"><span data-from="100" data-to="8514" data-refresh-interval="50" data-speed="2500"></span></div>
												<h5>Employees</h5>
											</div>

											<div class="col-sm-6 col-lg-3 text-center">
												<div class="counter ls1 fw-semibold" style="color: #D2D2D2;"><span data-from="100" data-to="458" data-refresh-interval="50" data-speed="3500"></span></div>
												<h5>Happy Clients</h5>
											</div>

											<div class="col-sm-6 col-lg-3 text-center">
												<div class="counter ls1 fw-semibold" style="color: #D2D2D2;"><span data-from="14" data-to="159" data-refresh-interval="15" data-speed="2700"></span></div>
												<h5>Cities Served</h5>
											</div>
										</div>
									</div>
									<div class="tab-content clearfix" id="realestate-tab-2">
										<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
										<div class="row col-mb-30">
											<div class="col-sm-6 col-lg-4">
												<ul class="iconlist mb-0">
													<li><i class="icon-ok"></i> 100% Assurance</li>
													<li><i class="icon-ok"></i> Hard Working</li>
													<li><i class="icon-ok"></i> Trustworthy</li>
												</ul>
											</div>
											<div class="col-sm-6 col-lg-4">
												<ul class="iconlist mb-0">
													<li><i class="icon-ok"></i> Intelligent</li>
													<li><i class="icon-ok"></i> Always Curious</li>
													<li><i class="icon-ok"></i> Perfectionists</li>
												</ul>
											</div>
											<div class="col-sm-6 col-lg-4">
												<ul class="iconlist mb-0">
													<li><i class="icon-ok"></i> Friendly &amp; Helpful</li>
													<li><i class="icon-ok"></i> Accomodating Nature</li>
													<li><i class="icon-ok"></i> Available 24x7</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="tab-content clearfix" id="realestate-tab-3">

										<div class="row col-mb-30">
											<div class="col-md-7">
												<p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor.</p>
												<div class="row col-mb-30">
													<div class="col-md-6">
														<address>
															<strong>Headquarters:</strong><br>
															795 Folsom Ave, Suite 600<br>
															San Francisco, CA 94107<br>
														</address>
													</div>
													<div class="col-md-6">
														<abbr title="Phone Number"><strong>Phone:</strong></abbr> (1) 8547 632521<br>
														<abbr title="Fax"><strong>Fax:</strong></abbr> (1) 11 4752 1433<br>
														<abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
													</div>
												</div>
											</div>
											<div class="col-md-5">
												<img src="https://maps.googleapis.com/maps/api/staticmap?center=-37.814107,144.963280&zoom=12&markers=-37.814107,144.963280&size=300x180" alt="Google Map" class="img-thumbnail">
											</div>
										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="col-md-4">

							<h4 class="center">Top Builders</h4>

							<ul class="clients-grid grid-2 mb-0">
								<li class="grid-item" style="padding: 20px;"><a href="#" class="op-09"><img src="demos/real-estate/images/builders/1.png" alt="Clients"></a></li>
								<li class="grid-item" style="padding: 20px;"><a href="#" class="op-09"><img src="demos/real-estate/images/builders/2.png" alt="Clients"></a></li>
								<li class="grid-item" style="padding: 20px;"><a href="#" class="op-09"><img src="demos/real-estate/images/builders/3.png" alt="Clients"></a></li>
								<li class="grid-item" style="padding: 20px;"><a href="#" class="op-09"><img src="demos/real-estate/images/builders/4.png" alt="Clients"></a></li>
							</ul>

						</div>
					</div>

				</div>
			</div>
		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">
			<div class="container">
				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap">

					<div class="row col-mb-50">
						<div class="col-lg-5 order-last order-lg-first">

							<div class="widget clearfix">

								<img src="demos/real-estate/images/logo@2x.png" style="position: relative; opacity: 0.85; left: -10px; max-height: 80px; margin-bottom: 20px;" alt="Footer Logo">

								<p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards with a Retina &amp; Responsive Approach. Browse the amazing Features this template offers.</p>

								<div class="line" style="margin: 30px 0;"></div>

								<p class="ls1 fw-light" style="opacity: 0.6; font-size: 13px;">Copyrights &copy; 2020 Canvas: Real Estate</p>

							</div>

						</div>

						<div class="col-lg-7">

							<div class="row col-mb-50">
								<div class="col-md-6">
									<h4 class="ls1 fw-normal text-uppercase">Popular Locations</h4>

									<div class="row">
										<div class="col-6 bottommargin-sm widget_links widget_real_estate_popular">
											<ul>
												<li><a href="#">California</a></li>
												<li><a href="#">Nevada</a></li>
												<li><a href="#">Hawaii</a></li>
												<li><a href="#">Washington</a></li>
												<li><a href="#">Ottawa</a></li>
												<li><a href="#">Virginia</a></li>
												<li><a href="#">Ohio</a></li>
											</ul>
										</div>

										<div class="col-6 bottommargin-sm widget_links widget_real_estate_popular">
											<ul>
												<li><a href="#">Oregon</a></li>
												<li><a href="#">Colorado</a></li>
												<li><a href="#">Kentucky</a></li>
												<li><a href="#">Texas</a></li>
												<li><a href="#">Miami</a></li>
												<li><a href="#">New York</a></li>
												<li><a href="#">New Jersey</a></li>
											</ul>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<h4 class="ls1 fw-normal text-uppercase">Connect Socially</h4>

									<div class="bottommargin-sm clearfix">
										<a href="#" class="social-icon si-colored si-small si-rounded si-facebook" title="Facebook">
											<i class="icon-facebook"></i>
											<i class="icon-facebook"></i>
										</a>

										<a href="#" class="social-icon si-colored si-small si-rounded si-twitter" title="Twitter">
											<i class="icon-twitter"></i>
											<i class="icon-twitter"></i>
										</a>

										<a href="#" class="social-icon si-colored si-small si-rounded si-instagram" title="Instagram">
											<i class="icon-instagram"></i>
											<i class="icon-instagram"></i>
										</a>

										<a href="#" class="social-icon si-colored si-small si-rounded si-apple" title="App Store">
											<i class="icon-apple"></i>
											<i class="icon-apple"></i>
										</a>

										<a href="#" class="social-icon si-colored si-small si-rounded si-android" title="Play Store">
											<i class="icon-android"></i>
											<i class="icon-android"></i>
										</a>

										<a href="#" class="social-icon si-colored si-small si-rounded si-skype" title="Skype">
											<i class="icon-skype"></i>
											<i class="icon-skype"></i>
										</a>
									</div>

									<div class="widget subscribe-widget subscribe-form clearfix" data-loader="button">
										<div class="widget-subscribe-form-result"></div>
										<form action="include/subscribe.php" method="post" class="mb-0">
											<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="sm-form-control not-dark required email" placeholder="Enter your Email">
											<button class="button button-3d button-black mx-0" style="margin-top: 15px;" type="submit">Subscribe</button>
										</form>
									</div>
								</div>
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
	<script src="{{ asset('frontend/js/jquery.js') }}"></script>
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