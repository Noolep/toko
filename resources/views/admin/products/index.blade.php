<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Produk') }}
            </h2>
            {{-- Tombol Tambah --}}
            <a href="{{ url('admin/products/create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                + Tambah Produk Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <table class="w-full text-sm text-left text-gray-500 border">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 border">Nama Produk</th>
                            <th class="px-6 py-3 border">Kategori</th>
                            <th class="px-6 py-3 border">Detail</th>
                            <th class="px-6 py-3 border">Tags</th>
                            <th class="px-6 py-3 border">Harga</th>
                            <th class="px-6 py-3 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-bold text-gray-900">{{ $product->name }}</td>
                                <td class="px-6 py-4">{{ $product->category->name ?? 'Tanpa Kategori' }}</td>
                                <td class="px-6 py-4">
                                    {{ $product->detail?->description ?? 'Belum ada detail' }} <br>
                                    <span class="text-xs text-gray-400">Dimensi: {{ $product->detail?->dimensions ?? '-' }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    @foreach ($product->tags as $tag)
                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 flex space-x-4">
                                    {{-- Tombol Edit --}}
                                 <a href="{{ url('admin/products/' . $product->id . '/edit') }}" 
                                    class="px-3 py-1.5 bg-blue-600 text-white text-xs font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                                    Edit
                                </a>
                                    {{-- Tombol Hapus Data --}}
                                   <form action="{{ url('admin/products/' . $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');" class="m-0 p-0">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" 
                                       class="px-3 py-1.5 bg-red-600 text-white text-xs font-semibold rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all">
                                       Hapus
                                </button>
                               </form>
                              </div>
                             </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>