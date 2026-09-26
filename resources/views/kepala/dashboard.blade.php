<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru - SIMS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main>
        <h1>Dashboard Kepala Sekolah</h1>

        <p>
            Selamat datang, {{ auth()->user()->name }}!
        </p>

        <p>
            Role: {{ auth()->user()->role->display_name }}
        </p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </main>
</body>
</html>