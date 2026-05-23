@extends('layouts.admin')

@section('content')
<div class="p-6">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Kategori</h1>
        <p class="text-gray-500 text-sm">Ubah informasi kategori event</p>
    </div>

    <!-- ERROR MESSAGES -->
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
            <h3 class="font-bold mb-2">Terjadi kesalahan:</h3>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORM CARD -->
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden">

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Kategori -->
            <div>
                <label for="name" class="block text-sm font-bold text-gray-800 mb-2">
                    Nama Kategori <span class="text-red-600">*</span>
                </label>
                <input type="text" 
                    name="name" 
                    id="name"
                    placeholder="Contoh: Seminar, Workshop, Konser" 
                    value="{{ old('name', $category->name) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('name') border-red-500 @enderror"
                    required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Slug (Read-only) -->
            <div>
                <label for="slug" class="block text-sm font-bold text-gray-800 mb-2">
                    Slug (Otomatis)
                </label>
                <input type="text" 
                    name="slug" 
                    id="slug"
                    value="{{ $category->slug }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-600"
                    readonly>
            </div>

            <!-- BUTTONS -->
            <div class="flex gap-4 pt-4">
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-bold">
                    Perbarui Kategori
                </button>
                <a href="{{ route('admin.categories') }}" class="px-6 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                    Batal
                </a>
            </div>
        </form>

    </div>

</div>
@endsection
