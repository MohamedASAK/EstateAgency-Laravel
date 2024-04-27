<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME','EstateAgency')}}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    @include('layouts.shared.nav')
        <div class="container py-2">
            <h1 class="text-center">
                @yield('MainTitle')
            </h1>
        </div>
        <div class="py-3">
            <div class="container">
                @yield('Content')

            </div>
        </div>
    @include('layouts.shared.footer')
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
</body>
</html>
