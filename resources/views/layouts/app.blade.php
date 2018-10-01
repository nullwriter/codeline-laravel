<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body>

<div class="container">
    <div class="mb-1 mt-5 text-center">
        <a href="{{ route('films') }}" class="mr-2 ml-2">Home</a>
        <a href="{{ route('film.create') }}" class="mr-2 ml-2">Create Film</a>
        @guest
        <a class="mr-2 ml-2" href="{{ route('login') }}">{{ __('Login') }}</a>
        <a class="mr-2 ml-2" href="{{ route('register') }}">{{ __('Register') }}</a>
        @else
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            (<span>{{ Auth::user()->name }}</span>)
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endguest
    </div>
    <div id="main" class="pt-4">
        @yield('content')
    </div>
    @include('includes.footer_scripts')
    @yield('extra_scripts')
</div>

</body>
</html>
