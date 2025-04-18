<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems = Item::count();
        $totalCategories = Category::count();
        $totalTransactions = Transaction::count();

        return view('dashboard', compact('totalItems', 'totalCategories', 'totalTransactions'));
    }
}
