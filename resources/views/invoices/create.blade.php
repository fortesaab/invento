<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-800">Create Invoice</h2>
                    <p class="mt-1 text-sm text-slate-500">Create a new invoice for a customer.</p>
                </div>

                <x-ui.button :href="route('invoices.index')" variant="secondary">
                    Back
                </x-ui.button>
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-8">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 px-8 py-5">
                    <h3 class="text-lg font-semibold text-slate-800">Invoice Details</h3>
                    <p class="mt-1 text-sm text-slate-500">Fill in the information below.</p>
                </div>

                <form action="{{ route('invoices.store') }}" method="POST" class="space-y-5 px-8 py-6">
                    @csrf

                    <div>
                        <label for="customer_id" class="mb-2 block text-sm font-medium text-slate-700">
                            Customer
                        </label>
                        <select name="customer_id" id="customer_id"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                            <option value="">Select customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" @selected(old('customer_id') == $customer->id)>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('customer_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="invoice_date" class="mb-2 block text-sm font-medium text-slate-700">
                            Invoice Date
                        </label>
                        <input type="date" name="invoice_date" id="invoice_date"
                            value="{{ old('invoice_date', now()->toDateString()) }}"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                        @error('invoice_date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="mb-2 block text-sm font-medium text-slate-700">
                            Status
                        </label>
                        <select name="status" id="status"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                            <option value="pending" @selected(old('status') == 'pending')>Pending</option>
                            <option value="paid" @selected(old('status') == 'paid')>Paid</option>
                            <option value="cancelled" @selected(old('status') == 'cancelled')>Cancelled</option>
                        </select>
                        @error('status')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="border-t border-slate-100 pt-5">
                        <h4 class="text-base font-semibold text-slate-800">Invoice Item</h4>
                        <p class="mt-1 text-sm text-slate-500">For now, this invoice supports one product item.</p>
                    </div>

                    <div>
                        <label for="product_id" class="mb-2 block text-sm font-medium text-slate-700">
                            Product
                        </label>
                        <select name="product_id" id="product_id"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                            <option value="">Select product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" @selected(old('product_id') == $product->id)>
                                    {{ $product->name }} (Stock: {{ $product->stock_quantity }})
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="quantity" class="mb-2 block text-sm font-medium text-slate-700">
                            Quantity
                        </label>
                        <input type="number" name="quantity" id="quantity" min="1"
                            value="{{ old('quantity', 1) }}"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                        @error('quantity')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-5">
                        <x-ui.button :href="route('invoices.index')" variant="secondary">
                            Cancel
                        </x-ui.button>

                        <x-ui.button type="submit" variant="primary">
                            Save Invoice
                        </x-ui.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
