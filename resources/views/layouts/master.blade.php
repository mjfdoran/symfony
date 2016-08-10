<html>
<head>
    <title>Symfony - @yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')  }}">
</head>
<body>



<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Symfony</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('pull-requests') }}">Open pull requests</a></li>
                <li><a href="{{ route('created-issues') }}">Created issues</a></li>
                <li><a href="{{ route('past-releases') }}">Past releases</a></li>
                <li><a href="{{ route('commit-statistics') }}">Commit statistics</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">

    @yield('content')

</div>


<script type="text/javascript" src="{{ asset('js/jquery-1.12.4.min.js')  }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js')  }}"></script>
</body>
</html>