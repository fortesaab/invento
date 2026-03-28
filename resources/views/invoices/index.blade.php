<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-800">Invoices</h2>
                    <p class="mt-1 text-sm text-slate-500">Manage customer invoices and sales records.</p>
                </div>

                <x-ui.button :href="route('invoices.create')" variant="primary">
                    New Invoice
                </x-ui.button>
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div
                    class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 px-6 py-5">
                    <h3 class="text-lg font-semibold text-slate-800">Invoice List</h3>
                    <p class="mt-1 text-sm text-slate-500">View all invoices created in the system.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Invoice No.</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Customer</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Date</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Status</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Total</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Created By</th>
                                <th
                                    class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            @forelse($invoices as $invoice)
                                <tr class="transition hover:bg-slate-50/80">
                                    <td class="px-6 py-4 text-sm font-semibold text-slate-800">
                                        {{ $invoice->invoice_number }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ $invoice->customer?->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ $invoice->invoice_date }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ ucfirst($invoice->status) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        ${{ number_format($invoice->total_amount, 2) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ $invoice->user?->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-end gap-3">
                                            <x-ui.button :href="route('invoices.show', $invoice)" variant="secondary">
                                                View
                                            </x-ui.button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center">
                                        <div class="mx-auto max-w-md">
                                            <h4 class="text-lg font-semibold text-slate-700">No invoices yet</h4>
                                            <p class="mt-2 text-sm text-slate-500">Start by creating your first invoice.
                                            </p>
                                            <div class="mt-5">
                                                <x-ui.button :href="route('invoices.create')" variant="primary">
                                                    Create First Invoice
                                                </x-ui.button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="border-t border-slate-100 px-6 py-4">
                    {{ $invoices->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
