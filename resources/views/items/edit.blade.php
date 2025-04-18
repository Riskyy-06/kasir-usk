<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-lg mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('items.update', $item) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Kategori</label>
                    <select name="category_id" id="category_id" required
                        class="w-full rounded gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 @error('category_id') border-red-500 @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Nama Produk</label>
                    <input type="text" name="name" id="name" required autofocus
                        value="{{ old('name', $item->name) }}"
                        class="w-full rounded gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Deskripsi</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full rounded gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 @error('description') border-red-500 @enderror">{{ old('description', $item->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Harga</label>
                    <input type="text" name="price" id="price" required
                        value="{{ old('price', $item->price) }}"
                        placeholder="Masukkan harga (contoh: 15000 atau 15000.50)"
                        class="w-full rounded gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 @error('price') border-red-500 @enderror"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '')" />
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="stock" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Stok</label>
                    <input type="text" name="stock" id="stock" required
                        value="{{ old('stock', $item->stock) }}"
                        placeholder="Masukkan jumlah stok"
                        class="w-full rounded gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 @error('stock') border-red-500 @enderror"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                    @error('stock')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('items.index') }}"
                        class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold">Batal</a>
                    <button type="submit"
                        class="px-4 py-2 rounded bg-indigo-600 hover:bg-indigo-700 text-white font-semibold">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
