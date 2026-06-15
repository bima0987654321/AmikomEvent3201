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
<body class="bg-slate-50 min-h-screen flex items-center justify-center relative overflow-hidden">

    <div class="absolute top-0 left-0 w-96 h-96 bg-indigo-200/40 rounded-full filter blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-200/30 rounded-full filter blur-3xl translate-x-1/2 translate-y-1/2"></div>

    <div class="w-full max-w-md px-4 z-10">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-[#2a2a72] rounded-2xl mb-4 shadow-md shadow-indigo-200">
                <span class="text-2xl font-bold text-white">AH</span>
            </div>
            <h1 class="text-3xl font-black text-slate-800 mb-1">AmikomEventHub</h1>
            <p class="text-indigo-600 text-sm font-semibold tracking-wide">ADMIN SECURITY PANEL</p>
        </div>

        <div class="bg-white border border-slate-200 rounded-3xl shadow-xl shadow-slate-200/80 p-8 md:p-10">
            <h2 class="text-2xl font-bold text-slate-800 mb-1">Selamat Datang</h2>
            <p class="text-slate-500 text-sm mb-8">Silakan masuk untuk mengelola dashboard event</p>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-exclamation text-red-500 mt-0.5"></i>
                        <div>
                            @foreach ($errors->all() as $error)
                                <p class="text-red-600 text-sm font-medium">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="flex items-center gap-2 text-slate-600 text-sm font-semibold mb-2">
                        <i class="fa-solid fa-envelope w-4 h-4 text-indigo-500"></i>
                        Email Anda
                    </label>
                    <input
                        type="email"
                        name="email"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-indigo-600 focus:bg-white focus:border-transparent outline-none transition"
                        placeholder="admin@gmail.com"
                        value="{{ old('email') }}"
                        required>
                </div>

                <div>
                    <label class="flex items-center gap-2 text-slate-600 text-sm font-semibold mb-2">
                        <i class="fa-solid fa-lock w-4 h-4 text-indigo-500"></i>
                        Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-indigo-600 focus:bg-white focus:border-transparent outline-none transition"
                        placeholder="••••••••"
                        required>
                </div>

                <button
                    type="submit"
                    class="w-full py-3 bg-[#2a2a72] hover:bg-[#1e1e55] text-white rounded-xl font-semibold transition shadow-md shadow-indigo-100 flex items-center justify-center gap-2 mt-2">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Masuk ke Dashboard
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-100">
                <p class="text-center text-xs text-slate-400 font-medium">
                    <i class="fa-solid fa-shield-halved text-indigo-500"></i> Secure Admin Access
                </p>
                <p class="text-center text-[10px] text-slate-400 mt-2 leading-relaxed">
                    © 2026 AmikomEventHub | Universitas AMIKOM Yogyakarta
                </p>
            </div>
        </div>
    </div>

</body>
</html>