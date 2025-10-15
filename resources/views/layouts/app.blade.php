<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem User' }}</title>

    <!-- Bootstrap CSS -->
    <link 
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" 
        rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    {{-- Navbar --}}
    @include('components.navbar')

    <main class="container flex-grow-1 my-4">

        {{-- Konten utama halaman --}}
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    <!-- Bootstrap JS Bundle -->
    <script 
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js">
    </script>
</body>
</html>
