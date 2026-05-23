@extends('layouts.admin')

@section('content')
<div class="p-6">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Partner Baru</h1>
        <p class="text-gray-500 text-sm">Isi form di bawah untuk menambah partner baru</p>
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

        <form action="{{ route('admin.partners.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <!-- Nama Partner -->
            <div>
                <label for="name" class="block text-sm font-bold text-gray-800 mb-2">
                    Nama Partner <span class="text-red-600">*</span>
                </label>
                <input type="text" 
                    name="name" 
                    id="name"
                    placeholder="Masukkan nama partner" 
                    value="{{ old('name') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('name') border-red-500 @enderror"
                    required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Logo URL -->
            <div>
                <label for="logo_url" class="block text-sm font-bold text-gray-800 mb-2">
                    URL Logo Partner <span class="text-red-600">*</span>
                </label>
                <input type="text" 
                    name="logo_url" 
                    id="logo_url"
                    placeholder="https://placehold.co/200x200" 
                    value="{{ old('logo_url', 'https://placehold.co/200x200') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('logo_url') border-red-500 @enderror"
                    required>
                @error('logo_url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Logo Preview -->
            <div>
                <label class="block text-sm font-bold text-gray-800 mb-2">Preview Logo</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex justify-center">
                    <img id="logoPreview" src="https://placehold.co/200x200" alt="Logo Preview" class="h-32 w-32 object-contain">
                </div>
            </div>

            <!-- BUTTONS -->
            <div class="flex gap-4 pt-4">
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-bold">
                    Simpan Partner
                </button>
                <a href="{{ route('admin.partners.index') }}" class="px-6 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                    Batal
                </a>
            </div>
        </form>

    </div>

</div>

<script>
    document.getElementById('logo_url').addEventListener('change', function() {
        document.getElementById('logoPreview').src = this.value;
    });
</script>
@endsection