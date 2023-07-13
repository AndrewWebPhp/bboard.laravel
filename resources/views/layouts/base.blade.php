<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') :: All Items</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <script src="{{ asset('assets/js/jquery-3.4.1.slim.min.js') }}" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-light bg-light mb-5">
        <a href="{{ route('index') }}" class="navbar-brand mr-auto">Main</a>


        @guest
            <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
            <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
        @endguest

        @auth
            <a href="{{ route('home') }}" class="nav-item nav-link">My Items</a>
            <form action="{{ route('logout') }}" method="POST" class="form-inline">
                @csrf
                <input type="submit" class="btn btn-danger" value="Logout">
            </form>
        @endauth

    </nav>
    <div class="container">
        @yield('main')
    </div>
</body>
</html>