<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-800">Create Product</h2>
                    <p class="mt-1 text-sm text-slate-500">Add a new product to your inventory.</p>
                </div>

                <x-ui.button :href="route('products.index')" variant="secondary">
                    Back
                </x-ui.button>
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-8">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 px-8 py-5">
                    <h3 class="text-lg font-semibold text-slate-800">Product Details</h3>
                    <p class="mt-1 text-sm text-slate-500">Fill in the information below.</p>
                </div>

                <form action="{{ route('products.store') }}" method="POST" class="space-y-5 px-8 py-6">
                    @csrf

                    <div>
                        <label for="category_id" class="mb-2 block text-sm font-medium text-slate-700">
                            Category
                        </label>
                        <select name="category_id" id="category_id"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                            <option value="">Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="supplier_id" class="mb-2 block text-sm font-medium text-slate-700">
                            Supplier
                        </label>
                        <select name="supplier_id" id="supplier_id"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                            <option value="">Select supplier</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" @selected(old('supplier_id') == $supplier->id)>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-slate-700">
                            Product Name
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            placeholder="e.g. Dell Monitor"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="sku" class="mb-2 block text-sm font-medium text-slate-700">
                            SKU
                        </label>
                        <input type="text" name="sku" id="sku" value="{{ old('sku') }}"
                            placeholder="e.g. MON-001"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                        @error('sku')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="mb-2 block text-sm font-medium text-slate-700">
                            Description
                        </label>
                        <textarea name="description" id="description" rows="3" placeholder="Write a short description for this product..."
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="mb-2 block text-sm font-medium text-slate-700">
                            Price
                        </label>
                        <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}"
                            placeholder="e.g. 149.99"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                        @error('price')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="stock_quantity" class="mb-2 block text-sm font-medium text-slate-700">
                            Stock Quantity
                        </label>
                        <input type="number" name="stock_quantity" id="stock_quantity"
                            value="{{ old('stock_quantity') }}" placeholder="e.g. 25"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                        @error('stock_quantity')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-5">
                        <x-ui.button :href="route('products.index')" variant="secondary">
                            Cancel
                        </x-ui.button>

                        <x-ui.button type="submit" variant="primary">
                            Save Product
                        </x-ui.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
