<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Kategori</label>
                    <input type="text" name="name" id="name"
                        class="w-full border gray-300 dark:border-gray-700 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent @error('name') red-500 @enderror"
                        value="{{ old('name', $category->name) }}" required autofocus>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex space-x-2 mt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                        Update
                    </button>
                    <a href="{{ route('categories.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
