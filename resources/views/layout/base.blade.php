<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.header')
</head>

<body>
    @include('layout.nav')

    @yield('main-container')

    @include('layout.footer')
</body>

</html>
