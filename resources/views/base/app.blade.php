<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fixora</title>

    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>

<body>

    <div class="full-content" style="opacity: 1;">
        @if (session()->has('user'))
            @include('partials.navbar-user')
        @else
            @include('partials.navbar')
        @endif

        <main class="flex-grow">
            @yield('content')
        </main> </div>

    @include('partials.footer')

</body>

</html>