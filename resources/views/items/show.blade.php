<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Produk') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">{{ $item->name }}</h3>

            <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>Kategori:</strong> {{ $item->category->name ?? '-' }}</p>
            <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>Harga:</strong> Rp {{ number_format($item->price, 2, ',', '.') }}</p>
            <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>Stok:</strong> {{ $item->stock }}</p>

            <p class="text-gray-700 dark:text-gray-300 mb-1"><strong>Deskripsi:</strong></p>
            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $item->description ?? '-' }}</p>
        </div>

        <a href="{{ route('items.index') }}"
            class="inline-block mt-6 px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded font-semibold">
            Kembali ke Daftar Produk
        </a>
    </div>
</x-app-layout>
