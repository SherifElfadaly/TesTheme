<li class="dropdown">
  @if($menuItem->children->count() > 0)
    <a href="{{ $menuItem->link }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> 
      {{ $menuItem->title }} <span class="caret"></span>
    </a>
    @foreach($menuItem->children as $child)
      <ul class="dropdown-menu" role="menu">
        @include('testtheme::templates.menus.mainmenu.main_menu_items', ['menuItem' => $child])
      </ul>
    @endforeach
  @else
    <a href="{{ $menuItem->link }}">{{ $menuItem->title }}</a>
  @endif
</li>