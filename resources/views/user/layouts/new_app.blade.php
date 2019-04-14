<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link href={{asset("css/style.css")}} rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript" src="{{asset('js/custom.js')}}"></script>
</head>
<body>
    @include('user.layouts.navbar')
    <section class="section">
        <div class="container">
            @yield('content')
        </div>
    </section>    
    {{-- @include('user.layouts.footer') --}}
</body>
</html>