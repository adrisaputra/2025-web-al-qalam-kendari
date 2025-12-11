@php
$setting = \App\Helpers\Helpers::setting();
@endphp
@extends('web.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('frontend/web/album.css') }}" type="text/css" />
<!-- Page Title
============================================= -->
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
					
					<div class="row" id="show_video">
					</div>
					
				</div>

			</div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
		display(); // load pertama kali
	});

	function display(page = 1) {
		let url = `{{ url('/page-video-list') }}?page=${page}`;

		$.ajax({
			url: url,
			type: "GET",
			success: function(res) {
				$("#show_video").html(res);
			}
		});
	}

	// Pagination AJAX
	$(document).on('click', '.pagination a', function(e) {
		e.preventDefault();

		let page = $(this).attr('href').split('page=')[1];
		display(page); // reload list sesuai page
	});

	$('#search').on('keydown', function(e) {
		if (e.key === "Enter") {
			e.preventDefault();
			display();
		}
	});

</script>
@endsection