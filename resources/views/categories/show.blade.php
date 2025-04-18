<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">{{ $category->name }}</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-2">Dibuat pada: {{ $category->created_at->format('d M Y, H:i') }}</p>
            <p class="text-gray-700 dark:text-gray-300">Terakhir diupdate: {{ $category->updated_at->format('d M Y, H:i') }}</p>
        </div>

        <a href="{{ route('categories.index') }}" 
           class="inline-block mt-6 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
            Kembali ke Daftar
        </a>
    </div>
</x-app-layout>
