<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-indigo-900 text-indigo-100 flex flex-col p-6 space-y-8 sticky top-0 h-screen">

        <!-- Logo -->
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">
                AH
            </div>

            <span class="text-xl font-bold text-white tracking-tight">
                AmikomEventHub
            </span>
        </div>

        <!-- Menu -->
        <nav class="flex-1 space-y-2">

            <p class="text-[10px] font-bold uppercase tracking-widest text-indigo-400 mb-4 px-2">
                Main Menu
            </p>

            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold
               {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }}">

                Dashboard

            </a>

            <!-- Event -->
            <a href="{{ route('admin.events') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold
               {{ request()->routeIs('admin.events') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }}">

                Kelola Event

            </a>

            <!-- Categories -->
            <a href="{{ route('admin.categories') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold
               {{ request()->routeIs('admin.categories') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }}">

                Kategori

            </a>

            <!-- Partner -->
            <a href="/admin/partners"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold
               {{ request()->is('admin/partners*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }}">

                Partner

            </a>

            <!-- Transactions -->
            <a href="{{ route('admin.transactions') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold
               {{ request()->routeIs('admin.transactions') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }}">

                Laporan Transaksi

            </a>

        </nav>

        <!-- Logout -->
        <div class="pt-6 border-t border-indigo-800">

            <form method="POST" action="{{ route('admin.logout') }}" class="w-full">
                @csrf
                <button type="submit"
                    class="w-full text-left flex items-center gap-3 px-4 py-3 text-indigo-300 hover:text-white font-medium hover:bg-indigo-800 rounded-lg transition">

                    <i class="fas fa-sign-out-alt"></i>
                    Keluar

                </button>
            </form>

        </div>

    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10 overflow-y-auto">

        <!-- Header -->
        <header class="flex justify-between items-center mb-10">

            <div>

                <h1 class="text-3xl font-black">
                    @yield('title')
                </h1>

                <p class="text-slate-500 font-medium">
                    Selamat datang kembali, Admin!
                </p>

            </div>

            <div class="flex items-center gap-4">

                <div class="text-right hidden md:block">

                    <p class="font-bold">
                        Admin Super
                    </p>

                    <p class="text-xs text-slate-400">
                        Penyelenggara Utama
                    </p>

                </div>

                <div class="w-12 h-12 bg-white rounded-2xl shadow-sm border flex items-center justify-center p-1">

                    <img src="https://ui-avatars.com/api/?name=Admin+Super&background=6366f1&color=fff"
                         class="rounded-xl">

                </div>

            </div>

        </header>

        <!-- Content -->
        @yield('content')

    </main>

</body>
</html>