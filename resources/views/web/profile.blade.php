@php
$setting = \App\Helpers\Helpers::setting();
@endphp
@extends('web.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('frontend/web/profile.css') }}" type="text/css" />

<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center include-header include-topbar" style="background: url('{{ asset('storage/yellow_gradient_low_poly_background.jpg') }}') no-repeat center center / cover; padding: 100px 0; background-color: rgba(0, 0, 0, 0);background-blend-mode: darken;" data-center="background-position: 0px 50%;" data-top-bottom="background-position:0px 0px;">

	<div class="container clearfix">
		<h1 style="color: white;" id="title1">{{ $title }}</h1>
		<ol class="breadcrumb" style="color: white;">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
			<li class="breadcrumb-item active" id="title2">{{ $title }}</li>
		</ol>
	</div>

</section><!-- #page-title end -->
<!-- Content
		============================================= -->
<section id="content" style="background-image: linear-gradient(320deg, #ffffffff, #e6fcff);">

	<div class="content-wrap mb-0 pb-0">

		<div class="container clearfix">

			<div class="heading-block border-0 mw-100">
				<div class="row col-mb-50">
					<div class="col-4">
						<div class="feature-box2 fbox-plain">
							<div class="fbox-content">

								<div class="row">
									<div class="col-sm-12 col-lg-12" data-animate="backInLeft" data-delay="100">
										<a href="javascript:void(0)" onclick="showData('profile')">
											<div class="feature-box @if(Request::segment(1)=='page-profile') feature-box-active @endif fbox-plain">
												<div class="fbox-content">
													<h3 class="fw-normal" style="color: #ffffff;font-size: 16px;">Profil</h3>
												</div>
											</div>
										</a>
									</div>
									
									<div class="col-sm-12 col-lg-12" data-animate="backInLeft" data-delay="100">
										<a href="javascript:void(0)" onclick="showData('vision')">
											<div class="feature-box @if(Request::segment(1)=='page-vision') feature-box-active @endif fbox-plain">
												<div class="fbox-content">
													<h3 class="fw-normal" style="color: #ffffff;font-size: 16px;">Visi</h3>
												</div>
											</div>
										</a>
									</div>

									<div class="col-sm-12 col-lg-12" data-animate="backInRight" data-delay="200">
										<a href="javascript:void(0)" onclick="showData('mission')">
											<div class="feature-box @if(Request::segment(1)=='page-mission') feature-box-active @endif fbox-plain">
												<div class="fbox-content">
													<h3 class="fw-normal" style="color: #ffffff;font-size: 16px;">Misi</h3>
												</div>
											</div>
										</a>
									</div>

									<div class="col-sm-12 col-lg-12" data-animate="backInLeft" data-delay="300">
										<a href="javascript:void(0)" onclick="showData('structure')">
											<div class="feature-box @if(Request::segment(1)=='page-structure') feature-box-active @endif fbox-plain">
												<div class="fbox-content">
													<h3 class="fw-normal" style="color: #ffffff;font-size: 16px;">Struktur Organisasi</h3>
												</div>
											</div>
										</a>
									</div>

									<div class="col-sm-12 col-lg-12" data-animate="backInRight" data-delay="100">
										<a href="javascript:void(0)" onclick="showData('structure1')">
											<div class="feature-box fbox-plain">
												<div class="fbox-content">
													<h3 class="fw-normal" style="color: #ffffff;font-size: 16px;">Dewan Pembina</h3>
												</div>
											</div>
										</a>
									</div>

									<div class="col-sm-12 col-lg-12" data-animate="backInLeft" data-delay="200">
										<a href="javascript:void(0)" onclick="showData('structure2')">
											<div class="feature-box fbox-plain">
												<div class="fbox-content">
													<h3 class="fw-normal" style="color: #ffffff;font-size: 16px;">Dewan Pengawas</h3>
												</div>
											</div>
										</a>
									</div>

									<div class="col-sm-12 col-lg-12" data-animate="backInRight" data-delay="300">
										<a href="javascript:void(0)" onclick="showData('structure3')">
											<div class="feature-box fbox-plain">
												<div class="fbox-content">
													<h3 class="fw-normal" style="color: #ffffff;font-size: 16px;">Pengurus Yayasan</h3>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-8">
						<div class="feature-box2 fbox-plain">
							<div class="fbox-content">

								<div class="row col-mb-50">
									<div class="col-12" id="show_profile">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

	
	$(document).ready(function() {
		segment = "{{ Request::segment(1) }}";
		if(segment=='page-profile'){
			showData('profile'); 
		} else if (segment=='page-vision'){
			showData('vision'); 
		} else if (segment=='page-mission'){
			showData('mission'); 
		} else if(segment=='page-structure'){
			showData('structure'); 
		} else if(segment=='page-structure1'){
			showData('structure1'); 
		} else if(segment=='page-structure2'){
			showData('structure2'); 
		} else if(segment=='page-structure3'){
			showData('structure3'); 
		}
	});

	function showData(name){
		
		$.ajax({
			url: "{{ url('page-profile-list')}}/"+name,
			method: 'GET',
			success: function response(res){
				$("#show_profile").html(res);
							
				if(name=='profile'){
					document.getElementById('title1').textContent = "Profil";
					document.getElementById('title2').textContent = "Profil";
				} else if (name=='vision'){
					document.getElementById('title1').textContent = "Visi";
					document.getElementById('title2').textContent = "Visi";
				} else if (name=='mission'){
					document.getElementById('title1').textContent = "Misi";
					document.getElementById('title2').textContent = "Misi";
				} else if(name=='structure'){
					document.getElementById('title1').textContent = "Struktur Organisasi";
					document.getElementById('title2').textContent = "Struktur Organisasi";
				} else if(name=='structure1'){
					document.getElementById('title1').textContent = "Dewan Pembina";
					document.getElementById('title2').textContent = "Dewan Pembina";
				} else if(name=='structure2'){
					document.getElementById('title1').textContent = "Dewan Pengawas";
					document.getElementById('title2').textContent = "Dewan Pengawas";
				} else if(name=='structure3'){
					document.getElementById('title1').textContent = "Pengurus Yayasan";
					document.getElementById('title2').textContent = "Pengurus Yayasan";
				}

			}
		});
	}
</script>
@endsection