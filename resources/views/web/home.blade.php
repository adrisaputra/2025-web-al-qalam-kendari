@php
$setting = \App\Helpers\Helpers::setting();
@endphp
@extends('web.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('frontend/web/home.css') }}" type="text/css" />

<section id="slider" class="slider-element slider-parallax swiper_wrapper min-vh-60 min-vh-md-100 include-header include-topbar" data-autoplay="7000" data-speed="500" data-loop="true">

	<div class="swiper-container swiper-parent">
		<div class="swiper-wrapper">
			@foreach($slider as $i => $v)
			<div class="swiper-slide">
				<div class="swiper-slide-bg" style="background-image: url({{ asset('storage/upload/slider/'.$v->image) }}); background-size: cover; background-color: rgba(0, 0, 0, 0.4);background-blend-mode: darken;"></div>
				<div class="carousel-caption d-block">
					@if($v->url)
					<p style="text-align:start;">
						<center><a href="{{ $v->url }}" target="_blank" class="slider-url">{{ $v->url_name }}</a></center>
					</p>
					@endif
				</div>
			</div>
			@endforeach
		</div>
		<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
		<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
	</div>

</section>

<section id="content">
	<div class="content-wrap">
		<div class="container">

			<div class="row col-mb-50">

				<div class="col-sm-8 col-lg-8">
					<div class="row col-mb-50">
						<div class="col-sm-12 col-lg-12">
							<div class="fbox-plain">
								<div class="fbox-content" data-animate="backInLeft" data-delay="100">
									<h3 style="font-size:30px;">Profil</h3>
									<p>{!! $profile->text !!}</p>
									<a href="{{ url('page-profile') }}"class="read-more">Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-lg-4">
					<div class="row" style="--bs-gutter-x: 1.5rem;">
						<div class="col-sm-12 col-lg-12" data-animate="backInLeft" data-delay="100">
							<a href="{{ url('page-vision') }}">
								<div class="feature-box fbox-plain">
									{{--<div class="fbox-icon">
									<center><img src="{{ asset('storage/menu/icons8-graph-100.png') }}" style="width:60px;height:60px"></center>
								</div>--}}
								<div class="fbox-content">
									<h3 class="fw-normal" style="color: #ffffff;">Visi</h3>
								</div>
						</div>
						</a>
					</div>

					<div class="col-sm-12 col-lg-12" data-animate="backInRight" data-delay="200">
						<a href="{{ url('page-mission') }}">
							<div class="feature-box fbox-plain">
								<div class="fbox-content">
									<h3 class="fw-normal" style="color: #ffffff;">Misi</h3>
								</div>
							</div>
						</a>
					</div>

					<div class="col-sm-12 col-lg-12" data-animate="backInLeft" data-delay="300">
						<a href="{{ url('page-structure') }}">
							<div class="feature-box fbox-plain">
								<div class="fbox-content">
									<h3 class="fw-normal" style="color: #ffffff;">Struktur Organisasi</h3>
								</div>
							</div>
						</a>
					</div>

					<div class="col-sm-12 col-lg-12" data-animate="backInRight" data-delay="100">
						<a href="{{ url('page-structure1') }}">
							<div class="feature-box fbox-plain">
								<div class="fbox-content">
									<h3 class="fw-normal" style="color: #ffffff;">Dewan Pembina</h3>
								</div>
							</div>
						</a>
					</div>

					<div class="col-sm-12 col-lg-12" data-animate="backInLeft" data-delay="200">
						<a href="{{ url('page-structure2') }}">
							<div class="feature-box fbox-plain">
								<div class="fbox-content">
									<h3 class="fw-normal" style="color: #ffffff;">Dewan Pengawas</h3>
								</div>
							</div>
						</a>
					</div>

					<div class="col-sm-12 col-lg-12" data-animate="backInRight" data-delay="300">
						<a href="{{ url('page-structure3') }}">
							<div class="feature-box fbox-plain">
								<div class="fbox-content">
									<h3 class="fw-normal" style="color: #ffffff;">Pengurus Yayasan</h3>
								</div>
							</div>
						</a>
					</div>

				</div>
			</div>

		</div>

	</div>

</section><!-- #content end -->

<section id="content">

	<div class="content-wrap" style="padding: 0px 0;margin-bottom:20px;background-color: aliceblue;">
		<div class="container">

			<div class="row">

				<div class="col-lg-12" data-aos="fade-up" style="margin-bottom:60px">
					<h2 style="margin-top:30px;" data-animate="fadeInUp" data-delay="100">
						<center>Unit Kerja</center>
					</h2>

					<div class="owl-carousel image-carousel carousel-widget flip-card-wrapper clearfix"  data-animate="fadeInUp" data-delay="100" data-margin="20" data-nav="true" data-pagi="false" data-items-xs="2" data-items-sm="2" data-items-md="2" data-items-lg="4" data-items-xl="4" data-autoplay="5000" data-speed="1000" data-loop="true" style="overflow: visible;">

						@foreach($work_unit as $i => $v)
						<div class="flip-card text-center">
							<div class="flip-card-front" style="border: 1px solid #ffffff;">
								<div class="flip-card-inner">
									<div class="card bg-transparent border-0 text-center">
										<div class="card-body">
											<img src="{{ asset('storage/upload/work_unit/'.$v->image) }}" alt="Logo {{ $i }}">
										</div>
									</div>
								</div>
							</div>
							<a href="{{ $v->url }}" target="_blank">
								<div class="flip-card-back bg-info no-after" style="background-color: #fc6600 !important;">
									<div class="flip-card-inner">
										<p class="text-white" style="font-size:18px">{{ $v->name }}</p>
										<a href="{{ $v->url }}" target="_blank" class="btn btn-success pulse-button" style="background-color: #4caf50;border-color: #4caf50;">Kunjungi</a>
									</div>
								</div>
							</a>
						</div>
						@endforeach

					</div>

				</div>

			</div>

		</div>
	</div>

	<div class="content-wrap" style="padding: 0px 0;">
		<div class="container">

			<div class="row">

				<div class="col-lg-8">

					<div class="posts-md">
						<div class="entry" style="margin-bottom: 20px;">
							<div class="clearfix">
								<div class="heading-block border-bottom-0" style="margin-bottom: 0px;">
									<h3 style="color:#f44336" data-animate="fadeInUp" data-delay="100">Sosial dan Dakwah</h3>
								</div>
								<div class="line line-xs line-home" data-animate="fadeInUp" data-delay="100"></div>


								<div class="row clearfix">

									@foreach($social as $i => $v)
									<div class="col-md-6 bottommargin">
										<!-- CARD 1 -->
										<div class="news-card" data-animate="fadeInUp" data-delay="{{$i+1}}00">
											<div class="news-img">
												<img src="{{ asset('storage/upload/social/'.$v->cover) }}" alt="">
											</div>

											<div class="news-body">
												<h3 class="news-heading"><a href="{{ url('page-social-detail?q='.$v->slug) }}" target="_blank" style="color:#333">{{ $v->title }}</a></h3>
												<p class="news-desc">
													{!! Str::limit(strip_tags($v->text), 200, ' ...') !!}
													<a href="{{ url('page-social-detail?q='.$v->slug) }}" target="_blank" data-aos="fade-right" data-aos-delay=300>Selengkapnya</a>
												</p>

												<div class="news-meta">
													<span>👤 {{ $v->user->name }}<br>
														👁️ Dilihat {{ $v->count_view }} kali
												</div>
											</div>

											<div class="news-date">{{ \App\Helpers\Helpers::month_indo_full($v->created_at) }}</div>
										</div>
									</div>
									@endforeach

									<div class="col-12 form-group mb-0" data-animate="heartBeat" data-delay="100">
										<center><a href="{{ url('page-social') }}" class="button button-rounded w-1 nott ls0 m-0" style="padding: 3px 22px;">Lihat Selengkapnya</a></center>
									</div>
								</div>
							</div>
						</div>
					</div>

					
					<div class="posts-md">
						<div class="entry" style="margin-bottom: 0px;">
							<div class="clearfix">
								<div class="heading-block border-bottom-0" style="margin-bottom: 0px;">
									<h3 style="color:#f44336" data-animate="fadeInUp" data-delay="100">Berita</h3>
								</div>
								<div class="line line-xs line-home" data-animate="fadeInUp" data-delay="100"></div>

								<div class="row clearfix">

									@foreach($news as $i => $v)
									<div class="col-md-6 bottommargin">
										<!-- CARD 1 -->
										<div class="news-card" data-animate="fadeInUp" data-delay="{{$i+1}}00">
											<div class="news-img">
												<img src="{{ asset('storage/upload/news/'.$v->cover) }}" alt="">
												<div class="entry-categories category-fixed"><a href="#" style="background: {{ $v->theme_color }}">{{ $v->work_unit?->name }}</a></div>
											</div>

											<div class="news-body">
												<h3 class="news-heading"><a href="{{ url('page-news-detail?q='.$v->slug) }}" target="_blank" style="color:#333">{{ $v->title }}</a></h3>
												<p class="news-desc">
													{!! Str::limit(strip_tags($v->text), 200, ' ...') !!}
													<a href="{{ url('page-news-detail?q='.$v->slug) }}" target="_blank" data-aos="fade-right" data-aos-delay=300>Selengkapnya</a>
												</p>

												<div class="news-meta">
													<span>👤 {{ $v->user->name }}<br>
														👁️ Dilihat {{ $v->count_view }} kali
												</div>
											</div>

											<div class="news-date">{{ \App\Helpers\Helpers::month_indo_full($v->created_at) }}</div>
										</div>
									</div>
									@endforeach

									<div class="col-12 form-group mb-0" data-animate="heartBeat" data-delay="100">
										<center><a href="{{ url('page-news') }}" class="button button-rounded w-1 nott ls0 m-0" style="padding: 3px 22px;">Lihat Selengkapnya</a></center>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4" data-aos="fade-up">
					<div class="widget clearfix">

						<div class="entry col-12" style="margin-bottom: 30px;">
							<h4 class="mb-2 ls1 text-uppercase fw-bold" data-animate="fadeInUp" data-delay="100" style="color:#f44336">ARTIKEL</h4>
							<div class="line line-xs line-home" data-animate="fadeInUp" data-delay="100"></div>

							<div class="posts-sm">
								@foreach($article as $i => $v)
								<div class="grid-inner row g-0" style="align-items: normal;" data-animate="fadeInUp" data-delay="{{$i+1}}00">
									<div class="col-auto">
										<div class="entry-image">
											<a href="{{ url('page-article-detail?q='.$v->slug) }}"><img src="{{ asset('storage/upload/article/'.$v->cover) }}" alt="Image"></a>
										</div>
									</div>
									<div class="col ps-3">
										<div class="entry-title">
											<h4 class="fw-semibold"><a href="{{ url('page-article-detail?q='.$v->slug) }}">{{ $v->title }}</a></h4>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>

						{{--<div class="widget clearfix">
							<h4 class="mb-2 ls1 text-uppercase fw-bold" data-animate="fadeInUp" data-delay="100">Informasi</h4>
							<div class="line line-xs line-market" data-animate="fadeInUp" data-delay="100"></div>
							<div class="oc-item" data-animate="fadeInUp" data-delay="400">
								<div class="entry">
									<div class="entry-image">
										<div class="fslider" data-arrows="true" data-lightbox="gallery" data-lightbox="gallery" data-speed="400" data-arrows="true" data-thumbs="true" data-easing="easeOutQuad">
											<div class="flexslider">
												<div class="slider-wrap">
																										<div class="slide" data-thumb="https://www.ppid.bombanakab.go.id/upload/information/1763100053.jpg">
														<a href="https://www.ppid.bombanakab.go.id/upload/information/1763100053.jpg" data-lightbox="gallery-item"><img src="https://www.ppid.bombanakab.go.id/upload/information/1763100053.jpg" alt="Standard Post with Gallery"></a>
													</div>
																										<div class="slide" data-thumb="https://www.ppid.bombanakab.go.id/upload/information/1763099956.jpg">
														<a href="https://www.ppid.bombanakab.go.id/upload/information/1763099956.jpg" data-lightbox="gallery-item"><img src="https://www.ppid.bombanakab.go.id/upload/information/1763099956.jpg" alt="Standard Post with Gallery"></a>
													</div>
																										<div class="slide" data-thumb="https://www.ppid.bombanakab.go.id/upload/information/1763099864.jpg">
														<a href="https://www.ppid.bombanakab.go.id/upload/information/1763099864.jpg" data-lightbox="gallery-item"><img src="https://www.ppid.bombanakab.go.id/upload/information/1763099864.jpg" alt="Standard Post with Gallery"></a>
													</div>
																										<div class="slide" data-thumb="https://www.ppid.bombanakab.go.id/upload/information/1763099408.jpg">
														<a href="https://www.ppid.bombanakab.go.id/upload/information/1763099408.jpg" data-lightbox="gallery-item"><img src="https://www.ppid.bombanakab.go.id/upload/information/1763099408.jpg" alt="Standard Post with Gallery"></a>
													</div>
																										<div class="slide" data-thumb="https://www.ppid.bombanakab.go.id/upload/information/1763098650.jpg">
														<a href="https://www.ppid.bombanakab.go.id/upload/information/1763098650.jpg" data-lightbox="gallery-item"><img src="https://www.ppid.bombanakab.go.id/upload/information/1763098650.jpg" alt="Standard Post with Gallery"></a>
													</div>
																										<div class="slide" data-thumb="https://www.ppid.bombanakab.go.id/upload/information/1761723054.jpg">
														<a href="https://www.ppid.bombanakab.go.id/upload/information/1761723054.jpg" data-lightbox="gallery-item"><img src="https://www.ppid.bombanakab.go.id/upload/information/1761723054.jpg" alt="Standard Post with Gallery"></a>
													</div>
																										<div class="slide" data-thumb="https://www.ppid.bombanakab.go.id/upload/information/1761722973.jpg">
														<a href="https://www.ppid.bombanakab.go.id/upload/information/1761722973.jpg" data-lightbox="gallery-item"><img src="https://www.ppid.bombanakab.go.id/upload/information/1761722973.jpg" alt="Standard Post with Gallery"></a>
													</div>
																										<div class="slide" data-thumb="https://www.ppid.bombanakab.go.id/upload/information/1761722922.jpg">
														<a href="https://www.ppid.bombanakab.go.id/upload/information/1761722922.jpg" data-lightbox="gallery-item"><img src="https://www.ppid.bombanakab.go.id/upload/information/1761722922.jpg" alt="Standard Post with Gallery"></a>
													</div>
																										<div class="slide" data-thumb="https://www.ppid.bombanakab.go.id/upload/information/1761722780.jpg">
														<a href="https://www.ppid.bombanakab.go.id/upload/information/1761722780.jpg" data-lightbox="gallery-item"><img src="https://www.ppid.bombanakab.go.id/upload/information/1761722780.jpg" alt="Standard Post with Gallery"></a>
													</div>
																										<div class="slide" data-thumb="https://www.ppid.bombanakab.go.id/upload/information/1760679573.jpg">
														<a href="https://www.ppid.bombanakab.go.id/upload/information/1760679573.jpg" data-lightbox="gallery-item"><img src="https://www.ppid.bombanakab.go.id/upload/information/1760679573.jpg" alt="Standard Post with Gallery"></a>
													</div>
																									</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>--}}

						<div class="widget clearfix">
							<h4 class="mb-2 ls1 text-uppercase fw-bold" data-animate="fadeInUp" data-delay="100" style="color:#f44336">Youtube</h4>
							<div class="line line-xs line-food" data-animate="fadeInUp" data-delay="100"></div>
							<div class="row">
								@foreach($video as $x)
								@php $a = str_replace("watch?v=","embed/",$x->url); @endphp
								<div class="col-sm-12 col-lg-12" data-animate="fadeInUp" data-delay="300" style="border-radius: 15px;">
									<iframe width="200px" height="150px" align="center" src="{{ $a }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								</div>
								@endforeach
							</div>
						</div>

					</div>

				</div>

			</div>

		</div>
	</div>
</section>

{{--<section id="content">
	<div class="content-wrap" style="padding: 30px 0;margin-top:20px;background-color: aliceblue;">
		<div class="container">

			<div class="row col-mb-50">

				<div class="col-sm-12 col-lg-12" style="padding-bottom: 10px">

					<div style="position: relative;">
						<div class="heading-block border-bottom-0" style="margin-bottom: 0px;">
							<h3 style="color:#f44336" data-animate="fadeInUp" data-delay="100">Galeri Foto</h3>
						</div>

						<div id="related-portfolio" class="owl-carousel owl-carousel-full portfolio-carousel carousel-widget" data-margin="0" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4" data-animate="fadeInUp" data-delay="300">

							@foreach($album as $i => $v)
							<div class="portfolio-item" style="padding-right: 10px;" data-animate="fadeInUp" data-delay="{{ $i+2 }}00">
								<div class="portfolio-image" style="border-radius: 10px;">
									<a href="{{ url('pages/detail_album/'.$v->id) }}">
										<img src="{{ asset('storage/upload/album/'.$v->cover) }}" style="height:200px">
									</a>
									<div class="bg-overlay" data-lightbox="gallery">
										<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
											<a href="{{ asset('storage/upload/album/'.$v->cover) }}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
											@foreach($v->all_photo as $x)
											<a href="{{ asset('storage/upload/photo/'.$x->image) }}" class="d-none" data-lightbox="gallery-item"></a>
											@endforeach
										</div>
										<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3 style="color:#3B3F5C"><a href="#" style="color:#3B3F5C">{{ $v->title }}</a></h3>
								</div>
							</div>
							@endforeach

						</div><!-- .portfolio-carousel end -->

					</div>

				</div>

				<div class="col-12 form-group mb-0" data-animate="heartBeat" data-delay="100">
					<center><a href="{{ url('page-album') }}" class="button button-rounded w-1 nott ls0 m-0">Lihat Galeri Lainnya</a></center>
				</div>
			</div>

		</div>

</section>--}}

<section id="content" style="margin-top:30px;background-color: aliceblue;">

		{{--<h2 data-animate="fadeInUp" data-delay="100">
			<center>Lokasi</center>
		</h2>--}}
		<div class="embed-map-fixed">
			<div class="embed-map-container"><iframe class="embed-map-frame" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&height=400&hl=en&q=yayasan%20al%20qalam%20kendari&t=&z=14&ie=UTF8&iwloc=B&output=embed"></iframe><a href="https://classicjoy.games" style="font-size:2px!important;color:gray!important;position:absolute;bottom:0;left:0;z-index:1;max-height:1px;overflow:hidden">Retro Games Online</a></div>
			<style>
				.embed-map-fixed {
					position: relative;
					text-align: right;
					width: 100%;
					height: 400px;
				}

				.embed-map-container {
					overflow: hidden;
					background: none !important;
					width: 100%;
					height: 400px;
				}

				.embed-map-frame {
					width: 100% !important;
					height: 400px !important;
				}
			</style>
		</div>
</section><!-- #content end -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection