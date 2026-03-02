<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- 🔥 CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OLC2 - Compilador</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')
</head>

<body>

<div class="container-fluid">
    @yield('content')
</div>

@stack('scripts')

</body>
</html>