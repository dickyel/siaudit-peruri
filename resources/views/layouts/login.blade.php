<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @stack('before-style')
    @include('components.styles-login')
    @stack('after-style')

    <title>@yield('title')</title>
</head>

<body>
  
    
    @yield('content')


    @stack('before-script')
    @include('components.scripts-login')
    @stack('after-script')
</body>

</html>