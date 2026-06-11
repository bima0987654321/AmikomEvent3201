@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12">
        <div class="flex-1 space-y-8">
            <span
                class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider">
                #1 Event Platform
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
                Temukan & Pesan <span class="text-indigo-600">Tiket Event</span> Impianmu.
            </h1>
            <p class="text-lg text-slate-500 max-w-lg leading-relaxed">
                Dari konser musik hingga workshop teknologi, semua ada di genggamanmu. Pesan aman & cepat dengan
                Midtrans.
            </p>
            <div class="flex gap-4">
                <a href="#events"
                    class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold text-lg shadow-xl shadow-indigo-200 hover:scale-105 transition-transform flex items-center gap-2">
                    <i class="fa-solid fa-arrow-right w-5 h-5"></i>
                    Mulai Jelajah
                </a>
                <a href="#"
                    class="px-8 py-4 border-2 border-slate-200 rounded-2xl font-bold text-lg hover:border-indigo-600 hover:text-indigo-600 transition flex items-center gap-2">
                    <i class="fa-solid fa-circle-info w-5 h-5"></i>
                    Cara Pesan
                </a>
            </div>
        </div>
        <div class="flex-1 relative">
            <div
                class="absolute -top-10 -left-10 w-64 h-64 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
            </div>
            <div
                class="absolute -bottom-10 -right-10 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
            </div>
            <img src="{{ asset('assets/concert.png') }}" alt="Concert"
                class="rounded-[2rem] shadow-2xl relative z-10 w-full object-cover aspect-[4/5] object-center">

            <div class="absolute -bottom-6 -left-6 glass p-6 rounded-2xl shadow-xl z-20 border border-white">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                        <i class="fa-solid fa-check text-xl"></i>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-bold uppercase">Terverifikasi</p>
                        <p class="font-bold">Pembayaran Aman via Midtrans</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Grid -->
    <section id="events" class="max-w-7xl mx-auto px-6 py-20">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-extrabold mb-2">Event Terdekat</h2>
                <p class="text-slate-500 font-medium">Jangan sampai ketinggalan acara seru minggu ini!</p>
            </div>
            <div class="mb-8 flex gap-4 justify-center">
                <a href="/" class="px-4 py-2 bg-gray-200 hover:bg-indigo-200 text-indigo-700 rounded shadow-sm transition">
                    Semua Kategori
                </a>
                @foreach($categories as $cat)
                    <a href="?category={{ $cat->slug }}" class="px-4 py-2 bg-indigo-100 hover:bg-indigo-200 text-indigo-700 rounded shadow-sm transition">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($events as $event)
                <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden">
                    <div class="relative overflow-hidden aspect-[3/4]">
                        <img src="{{ ($event->poster_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($event->poster_path))
                            ? asset('storage/' . $event->poster_path)
                            : 'https://placehold.co/200x600' }}" alt="{{ $event->title }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">

                        <div class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur rounded-lg text-xs font-bold uppercase text-indigo-600">
                            {{ $event->category->name }}
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 group-hover:text-indigo-600 transition">
                            {{ $event->title }}
                        </h3>

                        <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">
                            <i class="fa-solid fa-clock w-4 h-4 text-center"></i>
                            <span>{{ \Carbon\Carbon::parse($event->date)->format('d M Y, H:i') }}</span>
                        </div>

                        <div class="flex justify-between items-center pt-4 border-t">
                            <span class="text-2xl font-black text-indigo-600">
                                Rp {{ number_format($event->price, 0, ',', '.') }}
                            </span>

                            <a href="{{ route('events.show', $event->id) }}"
                                class="px-5 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition flex items-center gap-2">
                                <i class="fa-solid fa-eye w-4 h-4"></i>
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Partners Section -->
    @if($partners->count() > 0)
        <section class="max-w-7xl mx-auto px-6 py-24">
            <div class="text-center mb-20">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-indigo-100 to-purple-100 text-indigo-700 rounded-full text-xs font-bold uppercase tracking-widest mb-6 border border-indigo-200">
                    ✨ Dipercaya Oleh Puluhan Brand Terkemuka
                </span>
                <h2 class="text-4xl md:text-5xl font-black mb-4 bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                    Partner Kami
                </h2>
                <p class="text-slate-600 font-medium max-w-2xl mx-auto text-lg">
                    Bekerja sama dengan brand-brand terkemuka dan inovatif untuk memberikan pengalaman event terbaik
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">
                @foreach($partners as $partner)
                    <div class="group relative">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-400 to-purple-400 rounded-3xl blur opacity-0 group-hover:opacity-100 transition duration-500"></div>
                        
                        <div class="relative bg-white rounded-3xl border-2 border-indigo-100 shadow-lg hover:shadow-2xl transition-all duration-300 p-8 h-full flex items-center justify-center overflow-hidden group-hover:border-indigo-300">
                            <!-- Background decoration -->
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-indigo-50 to-transparent rounded-bl-3xl opacity-0 group-hover:opacity-100 transition duration-300"></div>
                            <div class="absolute bottom-0 left-0 w-20 h-20 bg-gradient-to-tr from-purple-50 to-transparent rounded-tr-3xl opacity-0 group-hover:opacity-100 transition duration-300"></div>
                            
                            <!-- Logo Container -->
                            <div class="relative z-10 transform group-hover:scale-110 transition-transform duration-300">
                                <img src="{{ $partner->logo_url }}" 
                                    alt="{{ $partner->name }}" 
                                    class="h-20 w-28 object-contain filter brightness-95 group-hover:brightness-100 transition duration-300"
                                    title="{{ $partner->name }}">
                            </div>
                            
                            <!-- Hover text -->
                            <div class="absolute inset-0 flex items-end justify-center pb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="text-xs font-bold text-indigo-700 bg-white/90 px-3 py-1 rounded-full">{{ $partner->name }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Footer decoration -->
            <div class="mt-16 text-center">
                <p class="text-sm text-slate-500 font-medium">
                    Bergabunglah dengan ribuan pengguna yang mempercayai platform kami
                </p>
            </div>
        </section>
    @endif
@endsection