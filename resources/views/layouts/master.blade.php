<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>@yield("title") - CoffeeBreak</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css"/>
    <link rel="icon" type="image/png" href="/img/coffee.png"/>
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="/img/coffee.png" width="30" height="30" alt=""/> CoffeeBreak</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item {{ Route::currentRouteName() == 'menu' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                        </li>
                        @if(Auth::user()->isBarista())
                            <li class="nav-item {{ Route::currentRouteName() == 'order.view.open' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('order.view.open') }}">Open Orders <span class="badge badge-light">{{ App\Drink\DrinkOrder::whereNull('finished_at')->count() }}</span></a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'recipe.view' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('recipe.view') }}">Recipes</a>
                            </li>
                        @endif
                        <li class="nav-item {{ Route::currentRouteName() == 'user.logout' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.logout') }}">Log out</a>
                        </li>
                    @else
                        <li class="nav-item {{ Route::currentRouteName() == 'user.login' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.login') }}">Log in</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

        @if($errors->any())
            @include('layouts.errors')
        @endif

        @if(App::environment('local') && false)
            @include("layouts.debug")
        @endif

        @if(Auth::check())
            @include('layouts.alerts')
        @endif
    </div>

    <div class="container">
        <div class="content">
            @yield("content")
        </div>
    </div>

    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
