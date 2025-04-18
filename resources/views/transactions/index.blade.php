<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('transactions.create') }}" class="inline-block mb-4 px-4 py-2 bg-green-600 text-white font-bold rounded hover:bg-green-700">
                Buat Transaksi Baru
            </a>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-300">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-300">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-300">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($transactions as $transaction)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $transaction->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">Rp{{ number_format($transaction->total, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 flex space-x-2">
                                    <a href="{{ route('transactions.show', $transaction) }}" class="text-white-600 hover:text-white-900" title="Detail">
                                        <!-- Eye icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                    <button type="button" onclick="openDeleteModal({{ $transaction->id }})" class="text-red-600 hover:text-red-900" title="Hapus">
                                        <!-- Trash icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7L5 7M6 7l1 12a2 2 0 002 2h6a2 2 0 002-2l1-12M10 11v6M14 11v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">Belum ada transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center hidden z-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg max-w-sm w-full p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Konfirmasi Hapus</h3>
            <p class="mb-6 text-gray-700 dark:text-gray-300">Apakah Anda yakin ingin menghapus transaksi ini?</p>
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold">Batal</button>
                    <button type="submit" class="px-4 py-2 rounded bg-red-600 hover:bg-red-700 text-white font-semibold">Hapus</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openDeleteModal(transactionId) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            form.action = `/transactions/${transactionId}`;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    </script>
</x-app-layout>
