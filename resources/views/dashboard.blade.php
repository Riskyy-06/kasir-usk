<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="mt-12 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center text-gray-900 dark:text-gray-100">
        {{ __("Selamat datang Admin!") }}
    </div>

    
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Jumlah Kategori</h3>
                <p class="text-4xl font-bold text-indigo-600 dark:text-indigo-400">{{ $totalCategories }}</p>
            </div>


            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Jumlah Produk</h3>
                <p class="text-4xl font-bold text-indigo-600 dark:text-indigo-400">{{ $totalItems }}</p>
            </div>


            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Total Transaksi</h3>
                <p class="text-4xl font-bold text-indigo-600 dark:text-indigo-400">{{ $totalTransactions }}</p>
            </div>

        </div>

       
    </div>
</x-app-layout>
