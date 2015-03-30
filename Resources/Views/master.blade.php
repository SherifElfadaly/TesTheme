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
    <link href="/laramodules/app/Modules/TestTheme/Resources/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link href="/laramodules/app/Modules/TestTheme/Resources/assets/css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/test-theme/') }}">{{ trans('test-theme::master.Home') }}</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   <!--  <ul class="nav navbar-nav">
                       <li>
                           <a href="#">About</a>
                       </li>
                       <li>
                           <a href="#">Services</a>
                       </li>
                       <li>
                           <a href="#">Contact</a>
                       </li>
                   </ul> -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> 
                                {{ trans('test-theme::master.Language') }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                @foreach($languages as $language)
                                <li><a href="{{ url('/test-theme/language', $language->key) }}">{{ $language->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

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
                    <h4>{{ trans('test-theme::master.Search') }}</h4>
                    <form action="{{ url('/test-theme/search/') }}" method="get">
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
                    <h4>{{ trans('test-theme::master.Categories') }}</h4>
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
                    <h4>{{ trans('test-theme::master.Login') }}</h4>
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
                            <label class="col-md-4 control-label">{{ trans('test-theme::master.email') }}</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('test-theme::master.password') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> {{ trans('test-theme::master.remember') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                        {{ trans('test-theme::master.login') }}
                                    </button> {{ trans('test-theme::master.or') }} 
                                     <a href="{{ url('/Acl/register') }}">{{ trans('test-theme::master.register') }}</a>
                                </div>
                            </div>

                             <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="{{ url('/Acl/password/email') }}">{{ trans('test-theme::master.forgot') }}</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="{{ url('Acl/social/facebook') }}"><i class="fa fa-facebook-square fa-2x"></i></a>
                                    <a href="{{ url('Acl/social/twitter') }}"><i class="fa fa-twitter-square fa-2x"></i></a>
                                    <a href="{{ url('Acl/social/google') }}"><i class="fa fa-google-plus-square fa-2x"></i></a>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    @else
                    <a href="{{ url('Acl/logout') }}">{{ trans('test-theme::master.logout') }}</a>
                    @endif
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>{{ trans('test-theme::master.Copyright') }}</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="/laramodules/app/Modules/TestTheme/Resources/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/laramodules/app/Modules/TestTheme/Resources/assets/js/bootstrap.min.js"></script>
    
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