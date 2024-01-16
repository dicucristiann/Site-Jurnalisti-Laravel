<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Welcome')</title> <!-- Dynamic title -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('app.css') }}"> <!-- Ensure the path is correct -->
</head>
<body>
<div class="container">
    @yield('content') <!-- Content will be injected here -->
</div>
</body>
</html>
