<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>
    
    @if(Lang::locale() == 'ar')
        <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/master/dist/cdnjs/3.3.1/css/bootstrap-rtl.min.css">
    @endif

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('cms/app/Modules/Testtheme/Resources/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('cms/app/Modules/Testtheme/Resources/assets/css/blog-home.css') }}">

    
    <!-- jQuery -->
    <script src="{{ url('cms/app/Modules/Testtheme/Resources/assets/js/jquery.js') }}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

       {!! \CMS::menus()->renderMenu('main_menu', \Lang::locale(), 'templates.menus.mainmenu')  !!}
        
        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <!-- Blog Post Content Column -->
               <div class="col-lg-7">
                   @yield('content')
               </div>

               <!-- Blog Sidebar Widgets Column -->
               <div class="col-md-5">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>{{ trans('testtheme::master.Search') }}</h4>
                    <form action="{{ url('search') }}" method="get">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>{{ trans('testtheme::master.Categories') }}</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                {!! $categories !!}
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                
                <!-- Blog Categories Well -->

                <div class="well">
                @if( ! Auth::check())
                    <h4>{{ trans('testtheme::master.Login') }}</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                         <form class="form-horizontal" id="login-form" role="form" method="POST" action="{{ url('Acl/login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="redirect" value="{{ Request::url() }}">

                            <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('testtheme::master.email') }}</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('testtheme::master.password') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> {{ trans('testtheme::master.remember') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                        {{ trans('testtheme::master.login') }}
                                    </button> {{ trans('testtheme::master.or') }} 
                                     <a href="{{ url('admin/Acl/register') }}">{{ trans('testtheme::master.register') }}</a>
                                </div>
                            </div>

                             <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="{{ url('admin/Acl/password/email') }}">{{ trans('testtheme::master.forgot') }}</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="{{ url('admin/Acl/social/facebook') }}"><i class="fa fa-facebook-square fa-2x"></i></a>
                                    <a href="{{ url('admin/Acl/social/twitter') }}"><i class="fa fa-twitter-square fa-2x"></i></a>
                                    <a href="{{ url('admin/Acl/social/google') }}"><i class="fa fa-google-plus-square fa-2x"></i></a>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    @else
                    <a href="{{ url('admin/Acl/logout') }}">{{ trans('testtheme::master.logout') }}</a>
                    @endif
                </div>
                
                {!! \CMS::widgets()->renderWidget('about', \Lang::locale()) !!}
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>{{ trans('testtheme::master.Copyright') }}</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('cms/app/Modules/Testtheme/Resources/assets/js/bootstrap.min.js') }}"></script>
    
    <script type="text/javascript">
     $(document).ready(function(){
        form = $('#login-form');
        form.on('submit',function(e){
            e.preventDefault();
            url  = $(this).attr('action');
            post = $.post(url, $(this).serialize());
            post.fail(function(data){
                $.each(data.responseJSON, function(index, value){
                    alert(value);
                })
            })
            post.done(function(data){
                form.fadeOut();
                setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 1000);
            })
        });
    });
    </script>
</body>
</html>