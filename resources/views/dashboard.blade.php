<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Grid untuk Kartu Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                
                {{-- Kartu Total Produk --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                    <div class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Total Produk</div>
                    <div class="text-3xl font-bold text-gray-800">{{ $totalProducts }} Item</div>
                </div>

                {{-- Kartu Total Kategori --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Kategori Utama</div>
                    <div class="text-3xl font-bold text-gray-800">{{ $totalCategories }} Kategori</div>
                </div>

                {{-- Kartu Total Tags --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-purple-500">
                    <div class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Label / Tags</div>
                    <div class="text-3xl font-bold text-gray-800">{{ $totalTags }} Tag</div>
                </div>

            </div>

            {{-- Pesan Selamat Datang --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Selamat datang di Panel Admin, <strong>{{ auth()->user()->name}}</strong>! Sistem pengelola toko beroperasi dengan normal.
                </div>
            </div>

        </div>
    </div>
</x-app-layout>