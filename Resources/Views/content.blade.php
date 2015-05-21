@extends('testtheme::master')
@section('content')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{!! $content->data['title'] !!}</h1>

    <!-- Author -->
    <p class="lead">
     {{ trans('testtheme::content.by') }} 
     <a href="{{ url('user', [$content->user->id]) }}">
         {{ $content->user->name }}
     </a>
 </p>

 <hr>

 <p class="lead">
    {{ trans('testtheme::content.tags') }} 
    @foreach($content->tags as $tag)
    <a href="{{ url('tag', [$tag->id]) }}">
      <span class="label label-default">{{ $tag->tag_name }}</span>
    </a>
  @endforeach
</p>

<hr>

<!-- Date/Time -->
<p>
 <span class="glyphicon glyphicon-time"></span> 
 {{ trans('testtheme::content.on') }} {{ $content->created_at->toDayDateTimeString() }}
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