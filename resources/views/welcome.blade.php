<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Toko</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900">

    <nav class="bg-white shadow-sm py-4 px-6 md:px-12 flex justify-between items-center border-b">
        <div class="text-2xl font-extrabold text-blue-700 tracking-tight">STOREFRONT</div>
        <div class="text-sm font-medium">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-blue-600 transition">Panel Admin</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 transition mr-4">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 shadow-sm transition">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <div class="bg-blue-600 text-white text-center py-16 md:py-24">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Pusat Kebutuhan Anda</h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto">
            Temukan koleksi Elektronik, Furnitur, dan Hiasan berkualitas tinggi dengan harga terbaik.
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 border-b-2 border-gray-200 pb-2 inline-block">Produk Terbaru</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition duration-300 flex flex-col">
                    
                    @if ($product->image)
                        <div class="h-48 w-full overflow-hidden border-b border-gray-100">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        </div>
                    @else
                        <div class="h-48 bg-gray-100 flex items-center justify-center border-b border-gray-100">
                            <span class="text-gray-400 font-bold tracking-widest uppercase">{{ $product->category->name ?? 'PRODUK' }}</span>
                        </div>
                    @endif

                    <div class="p-5 flex-grow flex flex-col">
                        <div class="text-xs text-blue-600 font-bold uppercase mb-1">{{ $product->category->name ?? 'Tanpa Kategori' }}</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 leading-tight">{{ $product->name }}</h3>
                        
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">
                            {{ $product->detail?->description ?? 'Deskripsi belum tersedia untuk produk ini.' }}
                        </p>
                        
                        <div class="flex flex-wrap gap-2 mb-4 mt-auto">
                            @foreach ($product->tags as $tag)
                                <span class="bg-blue-50 text-blue-700 text-[10px] font-semibold px-2 py-1 rounded-full border border-blue-100">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                        
                        <div class="flex justify-between items-end mt-2 pt-4 border-t border-gray-100">
                            <div>
                                <span class="text-xs text-gray-400 block mb-1">Harga</span>
                                <span class="text-lg font-extrabold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                            <button class="bg-gray-900 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                                Beli
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white rounded-lg border border-dashed border-gray-300 p-12 text-center">
                    <p class="text-gray-500 mb-2">Belum ada produk yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>
    </div>

    <footer class="bg-gray-900 text-gray-400 text-center py-8 mt-12 text-sm">
        <p>&copy; {{ date('Y') }} Storefront. Beroperasi secara optimal.</p>
    </footer>

</body>
</html>