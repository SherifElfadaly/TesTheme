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
@if($content->content_image && $content->content_image > 0)
<img class="img-responsive" src="{{ $content->contentImage->path }}" width="900" height="300">
@else
<img class="img-responsive" src="http://placehold.it/900x300" alt="">
@endif

<hr>

<!-- Post Content -->
<p class="lead">
    {!! $content->data['content'] !!}
</p>


<!-- 
    <hr>

    Blog Comments

    Comments Form
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form role="form">
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <hr>

    Posted Comments

    Comment
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            Nested Comment
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Nested Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            End Nested Comment
        </div>
    </div> -->
@endsection