@extends("layouts.article")

@section("content")
<div class="container-fixed-width">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8">
			<article>
				<h1>{!! $articleDetails->post->title !!}</h1>
				{!! $articleDetails->post->content !!}
			</article>
		
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-4">
		
		</div>
	</div>
</div>
@stop

