<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div>
                <h2 class="text-2xl font-semibold text-slate-800">Dashboard</h2>
                <p class="mt-1 text-sm text-slate-500">Overview of your inventory and invoice activity.</p>
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Total Products</p>
                    <h3 class="mt-3 text-3xl font-semibold text-slate-800">{{ $totalProducts }}</h3>
                    <p class="mt-2 text-sm text-slate-400">Products currently in inventory</p>
                </div>

                <div class="rounded-2xl border border-amber-200 bg-amber-50 p-6 shadow-sm">
                    <p class="text-sm font-medium text-amber-700">Low Stock Products</p>
                    <h3 class="mt-3 text-3xl font-semibold text-amber-800">{{ $lowStockCount }}</h3>
                    <p class="mt-2 text-sm text-amber-600">Products that need restocking soon</p>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Total Customers</p>
                    <h3 class="mt-3 text-3xl font-semibold text-slate-800">{{ $totalCustomers }}</h3>
                    <p class="mt-2 text-sm text-slate-400">Registered customers in the system</p>
                </div>

                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-6 shadow-sm">
                    <p class="text-sm font-medium text-emerald-700">Total Revenue</p>
                    <h3 class="mt-3 text-3xl font-semibold text-emerald-800">${{ number_format($totalRevenue, 2) }}</h3>
                    <p class="mt-2 text-sm text-emerald-600">Revenue from paid invoices</p>
                </div>
            </div>

            <div class="mt-8 grid gap-6 lg:grid-cols-2">
                <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <div class="border-b border-slate-100 px-6 py-5">
                        <h3 class="text-lg font-semibold text-slate-800">Recent Invoices</h3>
                        <p class="mt-1 text-sm text-slate-500">Latest invoices created in the system.</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Invoice</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Customer</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Total</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 bg-white">
                                @forelse($recentInvoices as $invoice)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium text-slate-800">
                                            {{ $invoice->invoice_number }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-slate-600">
                                            {{ $invoice->customer?->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-slate-600">
                                            ${{ number_format($invoice->total_amount, 2) }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-slate-600">
                                            {{ ucfirst($invoice->status) }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-sm text-slate-500">
                                            No invoices found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <div class="border-b border-slate-100 px-6 py-5">
                        <h3 class="text-lg font-semibold text-slate-800">Low Stock Alert</h3>
                        <p class="mt-1 text-sm text-slate-500">Products with low remaining stock.</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Product</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        SKU</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Stock</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 bg-white">
                                @forelse($lowStockProducts as $product)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium text-slate-800">
                                            {{ $product->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-slate-600">
                                            {{ $product->sku }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-amber-700 font-semibold">
                                            {{ $product->stock_quantity }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-8 text-center text-sm text-slate-500">
                                            No low stock products.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
