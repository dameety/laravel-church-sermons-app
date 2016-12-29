<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Church Sermons - Home</title>

        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('/css/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/semantic.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/style.css') }}" type="text/css">
        <link  rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}">

        <script>
            window.ChurchSermons = {
                csrfToken: '{{ csrf_token() }}'
            };
        </script>

    </head> 
    <body id="vue-app">
        <usernav></usernav>
        
        <div class="conatiner">    
            @yield('content')
        </div>

        <script src="{{ URL::asset('js/main.js') }}"></script> {{--vuejs and resource --}}
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('js/semantic.min.js') }}"></script>
        <script src="{{ URL::asset('js/validator.js') }}"></script>
    </body>
</html>                                   