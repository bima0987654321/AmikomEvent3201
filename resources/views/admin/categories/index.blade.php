@extends('layouts.admin')

@section('content')
<div class="p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Kategori</h1>
            <p class="text-gray-500 text-sm">Kelola kategori event Anda</p>
        </div>

        <a href="{{ route('admin.categories.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow transition">
            + Tambah Kategori
        </a>
    </div>

    <!-- SUCCESS MESSAGE -->
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- ERROR MESSAGE -->
    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <!-- SEARCH FORM -->
    <div class="mb-6 bg-white rounded-xl shadow-sm border p-4">
        <form method="GET" action="{{ route('admin.categories') }}" class="flex gap-4">
            <div class="flex-1">
                <input type="text" name="search" placeholder="Cari nama kategori..." 
                    value="{{ request('search') }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                Cari
            </button>
            @if (request('search'))
                <a href="{{ route('admin.categories') }}" class="px-6 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- CARD -->
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden">

        <!-- TABLE -->
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-gray-500 text-sm uppercase">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Nama Kategori</th>
                    <th class="px-6 py-4">Slug</th>
                    <th class="px-6 py-4">Dibuat Pada</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-700">
                @forelse ($categories as $category)
                    <tr class="border-t hover:bg-gray-50 transition">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-medium">{{ $category->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $category->slug }}</td>
                        <td class="px-6 py-4 text-sm">{{ $category->created_at->format('d M Y H:i') }}</td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="px-3 py-1 text-sm bg-blue-100 text-blue-600 rounded-md hover:bg-blue-200 transition inline-block">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus kategori ini?')" class="px-3 py-1 text-sm bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="border-t">
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            Tidak ada kategori ditemukan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</div>
@endsection