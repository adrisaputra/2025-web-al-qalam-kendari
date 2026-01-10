@php
$setting = \App\Helpers\Helpers::setting();
@endphp
@extends('web.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('frontend/web/news_detail.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('frontend/web/article_detail.css') }}" type="text/css" />

<!-- Page Title
============================================= -->
{{--<section id="page-title" class="page-title-parallax page-title-dark page-title-center include-header include-topbar" style="background: url('{{ asset('storage/upload/slider/'.$slider->image) }}') no-repeat center center / cover; padding: 140px 0; background-color: rgba(0, 0, 0, 0.4);background-blend-mode: darken;" data-center="background-position: 0px 50%;" data-top-bottom="background-position:0px 0px;">--}}
<section id="page-title" class="page-title-parallax page-title-dark page-title-center include-header include-topbar" style="background: url('{{ asset('storage/yellow_gradient_low_poly_background.jpg') }}') no-repeat center center / cover; padding: 100px 0; background-color: rgba(0, 0, 0, 0);background-blend-mode: darken;" data-center="background-position: 0px 50%;" data-top-bottom="background-position:0px 0px;">

	<div class="container clearfix">
		<h1 style="color: white;">{{ $title }}</h1>
		<ol class="breadcrumb" style="color: white;">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
			<li class="breadcrumb-item active">{{ $title }}</li>
		</ol>
	</div>

</section><!-- #page-title end -->
<!-- Content
		============================================= -->
<section id="content" style="background-image: linear-gradient(320deg, #ffffffff, #e6fcff);" >

	<div class="content-wrap mb-0 pb-0">

		<div class="container clearfix">

			<div class="heading-block border-0 mw-100">

				<div class="row clearfix">

					<div class="row" id="show_article">
						<div class="col-md-8 bottommargin">
							<div class="article-card" data-animate="fadeInUp" data-delay="100">
								<div class="article-body">
									<div class="breadcrumb">
										🏠 / <a href="#">Artikel </a>
									</div>

									<h3 class="article-heading" style="font-size: 22px;text-transform: none;margin-top:20px;margin-bottom:10px">{{ $article->title }}</h3>

									<div class="meta">
										<div class="meta-item">
											<span>⏱️ {{ \App\Helpers\Helpers::month_indo_full($article->created_at) }}</span>
										</div>
										<div class="meta-item">
											<span>👤 Ditulis oleh <strong>{{ $article->user->name }}</strong></span>
										</div>
										<div class="meta-item right">
											<span>👁️ Dilihat <strong>{{ $article->count_view }}</strong> kali</span>
										</div>
									</div>
									<div class="article-img">
										<img src="{{ asset('storage/upload/article/'.$article->cover) }}" alt="">
										<div class="entry-categories category-fixed"><a href="#" style="background: {{ $article->theme_color }}">{{ $article->work_unit?->name }}</a></div>
									</div>

									<p class="article-desc" style="color: #000000;">
										{!! $article->text !!}
									</p>

									{{--<div class="article-meta">
										<span>
											Bagikan: 
											<img src="{{ asset('storage/menu/icons8-facebook-100.png') }}" width="40px">
											<img src="{{ asset('storage/menu/icons8-instagram-100.png') }}" width="40px">
											<img src="{{ asset('storage/menu/icons8-twitter-squared-100.png') }}" width="40px">
											<img src="{{ asset('storage/menu/icons8-whatsapp-100.png') }}" width="40px">
										</span>
									</div>--}}
								</div>

							</div>
						</div>
						<div class="col-md-4 bottommargin">
							<div class="article-card" data-animate="fadeInUp" data-delay="200">
								<div class="article-body">
									<h4 class="mb-2 ls1 text-uppercase fw-bold" data-animate="fadeInUp" data-delay="100" style="color:#f44336">Berita Terbaru</h4>
									<div class="line line-xs line-home" data-animate="fadeInUp" data-delay="100"></div>

									@foreach($get_news as $i => $v)
									<div class="news-item">
										<img src="{{ asset('storage/upload/news/'.$v->cover) }}" alt="">
										<div class="news-info">
											<a href="{{ url('page-news-detail?q='.$v->slug) }}" class="judul">{{ $v->title}}</a>
											<div class="meta2">
												<!-- <span>📅 23 September 2025</span> -->
												<span>⏱️ {{ \App\Helpers\Helpers::month_indo_full($v->created_at) }}</span>
												<span>👁️ Dilihat {{ $v->count_view }} kali</span>
											</div>
										</div>
									</div>
									@endforeach
								</div>
								
								<div class="article-body">
									<h4 class="mb-2 ls1 text-uppercase fw-bold" data-animate="fadeInUp" data-delay="100" style="color:#f44336">Artikel Terbaru</h4>
									<div class="line line-xs line-home" data-animate="fadeInUp" data-delay="100"></div>

									@foreach($get_article as $i => $v)
									<div class="article-item">
										<img src="{{ asset('storage/upload/article/'.$v->cover) }}" alt="">
										<div class="article-info">
											<a href="{{ url('page-article-detail?q='.$v->slug) }}" class="judul">{{ $v->title}}</a>
											<div class="meta2">
												<!-- <span>📅 23 September 2025</span> -->
												<span>⏱️ {{ \App\Helpers\Helpers::month_indo_full($v->created_at) }}</span>
												<span>👁️ Dilihat {{ $v->count_view }} kali</span>
											</div>
										</div>
									</div>
									@endforeach
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
@endsection