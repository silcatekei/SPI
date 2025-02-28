<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">  <!-- Link to your main CSS or create a separate admin CSS -->
</head>
<body>
    <div class="container">
        @include('components.navbar')

        <main>
            @yield('content')  <!-- Content of the admin pages will go here -->
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>