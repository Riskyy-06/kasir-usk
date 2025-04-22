<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user')->latest()->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $items = Item::where('stock', '>', 0)->get();
        return view('transactions.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.item_id' => 'required|exists:items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $total = 0;
            foreach ($request->items as $itemData) {
                $item = Item::findOrFail($itemData['item_id']);
                if ($item->stock < $itemData['quantity']) {
                    return redirect()->back()->with('error', "Stok item {$item->name} tidak cukup.");
                }
                $total += $item->price * $itemData['quantity'];
            }

            $transaction = Transaction::create([
                'user_id' => Auth::id(),
                'total' => $total,
            ]);

            foreach ($request->items as $itemData) {
                $item = Item::findOrFail($itemData['item_id']);
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'item_id' => $item->id,
                    'quantity' => $itemData['quantity'],
                    'price' => $item->price,
                ]);

              
                $item->decrement('stock', $itemData['quantity']);
            }

            DB::commit();

            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan transaksi.');
        }
    }

    public function show(Transaction $transaction)
    {
        $transaction->load('details.item', 'user');
        return view('transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
