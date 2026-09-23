<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - SIMS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <main>
        <div>
            <h1>SIMS</h1>

            <p>
                Sistem Informasi Manajemen Sekolah
            </p>

            <h2>Login</h2>

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <div>
                    <label for="email">
                        Email
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                    >

                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password">
                        Password
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    >

                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label>
                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                        >

                        Ingat saya
                    </label>
                </div>

                <button type="submit">
                    Login
                </button>
            </form>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </div>
    </main>

</body>
</html>