@extends('test-theme::master')

@section('content')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{!! $content->data['title'] !!}</h1>

    <!-- Author -->
    <p class="lead">
     {{ trans('test-theme::content.by') }} 
     <a href="{{ url('/test-theme/user', [$content->user->id]) }}">
         {{ $content->user->name }}
     </a>
 </p>

 <hr>

 <p class="lead">
    {{ trans('test-theme::content.tags') }} 
    @foreach($content->contentTags as $tag)
    <a href="{{ url('/test-theme/tag', [$tag->id]) }}">
      <span class="label label-default">{{ $tag->tag_content }}</span>
    </a>
  @endforeach
</p>

<hr>

<!-- Date/Time -->
<p>
 <span class="glyphicon glyphicon-time"></span> 
 {{ trans('test-theme::content.on') }} {{ $content->created_at->toDayDateTimeString() }}
</p>

<hr>

<!-- Preview Image -->
@if($content->contentImage)
<img class="img-responsive" src="{{ $content->contentImage->path }}" width="900" height="300">
@else
<img class="img-responsive" src="http://placehold.it/900x300" alt="">
@endif

<hr>

<!-- Post Content -->
<p class="lead">
    {!! $content->data['content'] !!}
</p>

<hr>
{!! $commentTemplate !!}

@endsection