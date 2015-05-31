<div class="well">
	<a href="{{ $widget->link }}">
		<h1>{!! $widget->data['title'] !!}</h1>
	</a>

	<p class="lead">
		{{ trans('testtheme::content.by') }} 
		<a href="{{ url('user', [$widget->user->id]) }}">
			{{ $widget->user->name }}
		</a>
	</p>

	<hr>

	<p>
		<span class="glyphicon glyphicon-time"></span> 
		{{ trans('testtheme::content.on') }} {{ $widget->created_at->toDayDateTimeString() }}
	</p>

	<hr>

	@if($widget->widgetImage)
		<img class="img-responsive" src="{{ $widget->widgetImage->path }}" width="900" height="300">
	@else
		<img class="img-responsive" src="http://placehold.it/900x300" alt="">
	@endif

	<hr>

	<!-- Post Content -->
	<p class="lead">
		{!! $widget->data['description'] !!}
	</p>
</div>