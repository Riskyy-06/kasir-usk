<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Transaksi Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf

                <div id="items-container">
                    <div class="flex space-x-4 mb-4 item-row">
                        <select name="items[0][item_id]" required
                            class="flex-1 rounded gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 @error('items.0.item_id') border-red-500 @enderror">
                            <option value=""> Pilih Produk </option>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}" {{ old('items.0.item_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }} (Stok: {{ $item->stock }})
                                </option>
                            @endforeach
                        </select>
                        <input type="number" name="items[0][quantity]" min="1" value="{{ old('items.0.quantity', 1) }}" required
                            class="w-24 rounded gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 @error('items.0.quantity') border-red-500 @enderror" />
                        <button type="button" onclick="removeItemRow(this)" class="text-red-600 hover:text-red-900 font-bold">Hapus</button>
                    </div>
                </div>

                <button type="button" onclick="addItemRow()" class="mb-6 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Tambah Produk
                </button>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('transactions.index') }}" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold">Batal</a>
                    <button type="submit" class="px-4 py-2 rounded bg-green-600 hover:bg-green-700 text-white font-semibold">Simpan Transaksi</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let index = 1;

        function addItemRow() {
            const container = document.getElementById('items-container');
            const div = document.createElement('div');
            div.classList.add('flex', 'space-x-4', 'mb-4', 'item-row');
            div.innerHTML = `
                <select name="items[${index}][item_id]" required
                    class="flex-1 rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                    <option value=""> Pilih Produk </option>
                    @foreach($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} (Stok: {{ $item->stock }})</option>
                    @endforeach
                </select>
                <input type="number" name="items[${index}][quantity]" min="1" value="1" required
                    class="w-24 rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100" />
                <button type="button" onclick="removeItemRow(this)" class="text-red-600 hover:text-red-900 font-bold">Hapus</button>
            `;
            container.appendChild(div);
            index++;
        }

        function removeItemRow(button) {
            button.parentElement.remove();
        }
    </script>
</x-app-layout>
