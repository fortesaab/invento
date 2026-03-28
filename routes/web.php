<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalProducts = Product::count();
    $lowStockCount = Product::where('stock_quantity', '<=', 5)->count();
    $totalCustomers = Customer::count();
    $totalRevenue = Invoice::where('status', 'paid')->sum('total_amount');

    $recentInvoices = Invoice::with('customer')
        ->latest()
        ->take(5)
        ->get();

    $lowStockProducts = Product::where('stock_quantity', '<=', 5)
        ->orderBy('stock_quantity')
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'totalProducts',
        'lowStockCount',
        'totalCustomers',
        'totalRevenue',
        'recentInvoices',
        'lowStockProducts'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categories', CategoryController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('customers',CustomerController::class);
    Route::resource('products', ProductController::class);
    Route::resource('invoices',InvoiceController::class);
});

require __DIR__.'/auth.php';
