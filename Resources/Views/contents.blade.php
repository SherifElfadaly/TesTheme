@extends('testtheme::master')

@section('content')

<!-- Blog Entries Column -->
<div class="col-md-8">

    <h1 class="page-header">
        {{ $title }}
    </h1>

    @foreach($contents as $content)
    <!-- Blog Post -->
    <h2>
        <a href="{{ url('content', [$content->id]) }}">{!! $content->data['title'] !!}</a>
    </h2>
    <p class="lead">
        {{ trans('testtheme::content.by') }} <a href="{{ url('user', [$content->user->id]) }}">{{ $content->user->name }}</a>
    </p>
    <p>
        <span class="glyphicon glyphicon-time"></span> 
        {{ trans('testtheme::content.on') }} {{ $content->created_at->toDayDateTimeString() }}
    </p>
    <hr>
    
    @if($content->contentImage)
    <img class="img-responsive" src="{{ $content->contentImage->path }}" width="900" height="300">
    @else
    <img class="img-responsive" src="http://placehold.it/900x300" alt="">
    @endif

    <hr>
    <p>{!! $content->data['description'] !!}</p>
    <a class="btn btn-primary" href="{{ url('content', [$content->id]) }}">
        {{ trans('testtheme::content.More') }} <span class="glyphicon glyphicon-chevron-right"></span>
    </a>

    <hr>
    @endforeach
    <!-- Pager -->
    <ul class="pager">
        <li class="previous">
            <a href="{{ $contents->previousPageUrl() }}">&larr; {{ trans('testtheme::content.pre') }}</a>
        </li>
        <li class="next">
            <a href="{{ $contents->nextPageUrl() }}">{{ trans('testtheme::content.next') }} &rarr;</a>
        </li>
    </ul>

</div>
@endsection