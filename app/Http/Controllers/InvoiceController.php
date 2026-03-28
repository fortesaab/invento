<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with(['customer', 'user'])
            ->latest()
            ->paginate(10);

        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $customers = Customer::orderBy('name')->get();
        $products = Product::orderBy('name')->get();

        return view('invoices.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'invoice_date' => 'required|date',
            'status' => 'required|in:pending,paid,cancelled',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($validated) {
            $product = Product::findOrFail($validated['product_id']);

            if ($product->stock_quantity < $validated['quantity']) {
                abort(422, 'Not enough stock available for this product.');
            }

            $unitPrice = $product->price;
            $subtotal = $unitPrice * $validated['quantity'];

            $invoice = Invoice::create([
                'customer_id' => $validated['customer_id'],
                'user_id' => Auth::id(),
                'invoice_number' => 'INV-' . now()->format('YmdHis'),
                'invoice_date' => $validated['invoice_date'],
                'total_amount' => $subtotal,
                'status' => $validated['status'],
            ]);

            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'product_id' => $product->id,
                'quantity' => $validated['quantity'],
                'unit_price' => $unitPrice,
                'subtotal' => $subtotal,
            ]);

            $product->decrement('stock_quantity', $validated['quantity']);
        });

        return redirect()
            ->route('invoices.index')
            ->with('success', 'Invoice created successfully.');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load(['customer', 'user', 'items.product']);

        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        //
    }

    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    public function destroy(Invoice $invoice)
    {
        //
    }
}
