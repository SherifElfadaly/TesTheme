<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">
        @foreach($menuItems as $menuItem)
          @if($menuItem->parent_id == 0)
            @include('testtheme::templates.menus.mainmenu.main_menu_items', ['menuItem' => $menuItem])
          @endif
        @endforeach
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> 
            {{ trans('testtheme::master.Language') }} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            @foreach($languages as $language)
              <li><a href="{{ url('language', $language->key) }}">{{ $language->title }}</a></li>
            @endforeach
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>