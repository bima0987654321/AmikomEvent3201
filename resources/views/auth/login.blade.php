<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md px-4">
        <!-- Logo & Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-500 rounded-2xl mb-4 shadow-lg">
                <span class="text-2xl font-bold text-white">AH</span>
            </div>
            <h1 class="text-3xl font-black text-white mb-1">AmikomEventHub</h1>
            <p class="text-indigo-300 text-sm">Admin Panel</p>
        </div>

        <!-- Login Card -->
        <div class="bg-slate-800/50 backdrop-blur border border-slate-700 rounded-3xl shadow-2xl p-8 md:p-10">
            <h2 class="text-2xl font-bold text-white mb-2">Selamat Datang Kembali</h2>
            <p class="text-slate-400 text-sm mb-8">Masuk ke akun admin Anda untuk mengelola event</p>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/30 rounded-lg">
                    <div class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-exclamation text-red-400 mt-0.5"></i>
                        <div>
                            @foreach ($errors->all() as $error)
                                <p class="text-red-400 text-sm font-medium">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email Input -->
                <div>
                    <label class="flex items-center gap-2 text-slate-300 text-sm font-semibold mb-2">
                        <i class="fa-solid fa-envelope w-4 h-4 text-indigo-400"></i>
                        Email Anda
                    </label>
                    <input
                        type="email"
                        name="email"
                        class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-lg text-white placeholder-slate-500 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition"
                        placeholder="admin@gmail.com"
                        value="{{ old('email') }}"
                        required>
                </div>

                <!-- Password Input -->
                <div>
                    <label class="flex items-center gap-2 text-slate-300 text-sm font-semibold mb-2">
                        <i class="fa-solid fa-lock w-4 h-4 text-indigo-400"></i>
                        Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-lg text-white placeholder-slate-500 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition"
                        placeholder="••••••••"
                        required>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition shadow-lg flex items-center justify-center gap-2">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Masuk ke Dashboard
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-8 pt-6 border-t border-slate-700">
                <p class="text-center text-xs text-slate-500">
                    <i class="fa-solid fa-shield-halved"></i> Sistem Admin Panel
                </p>
                <p class="text-center text-xs text-slate-600 mt-2">
                    © 2024 AmikomEventHub | Universitas AMIKOM Yogyakarta | Sistem Informasi
                </p>
            </div>
        </div>
    </div>

</body>
</html>

