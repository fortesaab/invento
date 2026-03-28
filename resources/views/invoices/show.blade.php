<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-800">Invoice Details</h2>
                    <p class="mt-1 text-sm text-slate-500">View the full invoice information.</p>
                </div>

                <x-ui.button :href="route('invoices.index')" variant="secondary">
                    Back
                </x-ui.button>
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-8">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 px-8 py-6">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-800">{{ $invoice->invoice_number }}</h3>
                            <p class="mt-1 text-sm text-slate-500">Invoice overview and item details.</p>
                        </div>

                        <div class="text-sm text-slate-600">
                            Status: <span class="font-medium text-slate-800">{{ ucfirst($invoice->status) }}</span>
                        </div>
                    </div>
                </div>

                <div class="grid gap-6 px-8 py-6 md:grid-cols-2">
                    <div>
                        <h4 class="text-sm font-semibold uppercase tracking-wide text-slate-500">Customer</h4>
                        <p class="mt-2 text-sm text-slate-800">{{ $invoice->customer?->name }}</p>
                        <p class="mt-1 text-sm text-slate-600">{{ $invoice->customer?->email }}</p>
                        <p class="mt-1 text-sm text-slate-600">{{ $invoice->customer?->phone }}</p>
                    </div>

                    <div>
                        <h4 class="text-sm font-semibold uppercase tracking-wide text-slate-500">Invoice Info</h4>
                        <p class="mt-2 text-sm text-slate-800">Date: {{ $invoice->invoice_date }}</p>
                        <p class="mt-1 text-sm text-slate-600">Created by: {{ $invoice->user?->name }}</p>
                        <p class="mt-1 text-sm text-slate-600">Total: ${{ number_format($invoice->total_amount, 2) }}
                        </p>
                    </div>
                </div>

                <div class="border-t border-slate-100 px-8 py-6">
                    <h4 class="text-base font-semibold text-slate-800">Items</h4>

                    <div class="mt-4 overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Product</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Quantity</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Unit Price</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 bg-white">
                                @forelse($invoice->items as $item)
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-slate-800">{{ $item->product?->name }}</td>
                                        <td class="px-4 py-3 text-sm text-slate-600">{{ $item->quantity }}</td>
                                        <td class="px-4 py-3 text-sm text-slate-600">
                                            ${{ number_format($item->unit_price, 2) }}</td>
                                        <td class="px-4 py-3 text-sm text-slate-600">
                                            ${{ number_format($item->subtotal, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-6 text-center text-sm text-slate-500">
                                            No items found for this invoice.
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
