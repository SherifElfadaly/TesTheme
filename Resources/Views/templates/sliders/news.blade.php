  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      @foreach($slideShows as $slideShow)
        <li data-target="#myCarousel" data-slide-to="{{ $slideShow->id }}"></li>
      @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      @foreach($slideShows as $slideShow)
        <div class="item @if($slideShow->id == 3) active @endif">
          @if($slideShow->slideShowImage)
            <img class="img-responsive" src="{{ $slideShow->slideShowImage->path }}" width="460" height="345">
          @else
            <img class="img-responsive" src="http://placehold.it/460x345" alt="">
          @endif
          <div class="carousel-caption">
            {!! $slideShow->description !!}
          </div>
        </div>
      @endforeach

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <style>
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img 
    {
      width: 70%;
      margin: auto;
    }
  </style>