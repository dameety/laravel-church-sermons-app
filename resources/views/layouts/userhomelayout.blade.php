<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Church Sermons - Home</title>

        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('/css/semantic.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/style.css') }}" type="text/css">
        <link  rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}">
        <script>
            window.ChurchSermons = {
                csrfToken: '{{ csrf_token() }}'
            };
        </script>
    </head> 
    <body>
    <div class="navigation-bar">
        <nav role="navigation" class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ route('userhome_path') }}" class="navbar-brand">ChurchSermons</a>
            </div>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav"></ul>
                {{-- <form role="search" class="navbar-form navbar-left">
                    <div class="form-group large">
                        <input type="text" placeholder="Search" class="form-control">
                    </div>
                </form> --}}

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/user/profile') }}"> <button type="button" class="btn btn-primary">Profile</button></a></li>
                    <li><a href="{{ url('/logout') }}"> <button type="button" class="btn btn-danger">Logout</button></a></li>
                </ul>   
            </div>
        </nav>
    </div> {{-- END OF THE HEADER --}}
    
    <div id="vue-app" class="conatiner">    
        @yield('content')
    </div>


    <script src="{{ URL::asset('js/main.js') }}"></script> {{--vuejs and resource --}}
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/semantic.min.js') }}"></script>
    </body>
</html>                                   