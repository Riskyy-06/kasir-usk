<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Detail Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg p-6">

            <p class="mb-2 text-white font-semibold"><strong>ID Transaksi:</strong> {{ $transaction->id }}</p>
            <p class="mb-4 text-white font-semibold"><strong>Tanggal:</strong> {{ $transaction->created_at->format('d-m-Y H:i') }}</p>

            <table class="min-w-full divide-y divide-gray-700 mb-4">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-300">Produk</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-300">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-300">Harga / Item</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-300">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach($transaction->details as $detail)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $detail->item->name ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $detail->quantity }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">Rp{{ number_format($detail->price, 2, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">Rp{{ number_format($detail->price * $detail->quantity, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <p class="text-right font-semibold text-lg text-white">Total: Rp{{ number_format($transaction->total, 2, ',', '.') }}</p>

            <a href="{{ route('transactions.index') }}" class="inline-block mt-6 px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded font-semibold">
                Kembali ke Daftar Transaksi
            </a>
        </div>
    </div>
</x-app-layout>
