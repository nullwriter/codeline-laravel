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
    </div>
    <div id="main">
        @yield('content')
    </div>
    @include('includes.footer_scripts')
    @yield('extra_scripts')
</div>

</body>
</html>
