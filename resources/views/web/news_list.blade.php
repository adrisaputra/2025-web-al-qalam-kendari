@foreach($news as $i => $v)
<div class="col-md-4 bottommargin">
	<!-- CARD 1 -->
	<div class="news-card" data-animate="fadeInUp" data-delay="{{$i+1}}00">
		<div class="news-img">
			<img src="{{ asset('storage/upload/news/'.$v->cover) }}" alt="">
			<div class="entry-categories category-fixed"><a href="#" style="background: {{ $v->theme_color }}">{{ $v->work_unit?->name }}</a></div>
		</div>

		<div class="news-body">
			<h3 class="news-heading" style="font-size: 18px;text-transform: none;"><a href="{{ url('page-news-detail?q='.$v->slug) }}" target="_blank" style="color:#333">{{ $v->title }}</a></h3>
			<p class="news-desc">
				{!! Str::limit(strip_tags($v->text), 200, ' ...') !!}
				<a href="{{ url('page-news-detail?q='.$v->slug) }}" target="_blank" data-aos="fade-right" data-aos-delay=300>Selengkapnya</a>
			</p>

			<div class="news-meta">
				<span>
					👤 {{ $v->user->name }}<br>
					👁️ Dilihat {{ $v->count_view }} kali
				</span>
			</div>
		</div>

		<div class="news-date">{{ \App\Helpers\Helpers::month_indo_full($v->created_at) }}</div>
	</div>
</div>
@endforeach
<div class="paginating-container">{{ $news->appends(Request::only('search'))->links() }}</div>
<script src="{{ asset('frontend/js/functions.js') }}"></script>