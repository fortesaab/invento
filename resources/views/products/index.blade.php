<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-800">Products</h2>
                    <p class="mt-1 text-sm text-slate-500">Manage your inventory products.</p>
                </div>

                <x-ui.button :href="route('products.create')" variant="primary">
                    New Product
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
                    <h3 class="text-lg font-semibold text-slate-800">Product List</h3>
                    <p class="mt-1 text-sm text-slate-500">View, edit, and delete your products.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Name</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Category</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Supplier</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    SKU</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Price</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Stock</th>
                                <th
                                    class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            @forelse($products as $product)
                                <tr class="transition hover:bg-slate-50/80">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-slate-800">{{ $product->name }}</div>
                                        <div class="mt-1 text-xs text-slate-500">
                                            {{ $product->description ?: 'No description provided.' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ $product->category?->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ $product->supplier?->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ $product->sku }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        ${{ number_format($product->price, 2) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ $product->stock_quantity }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-end gap-3">
                                            <x-ui.button :href="route('products.edit', $product)" variant="secondary">
                                                Edit
                                            </x-ui.button>

                                            <form action="{{ route('products.destroy', $product) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                @csrf
                                                @method('DELETE')

                                                <x-ui.button type="submit" variant="danger">
                                                    Delete
                                                </x-ui.button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center">
                                        <div class="mx-auto max-w-md">
                                            <h4 class="text-lg font-semibold text-slate-700">No products yet</h4>
                                            <p class="mt-2 text-sm text-slate-500">Start by creating your first product.
                                            </p>
                                            <div class="mt-5">
                                                <x-ui.button :href="route('products.create')" variant="primary">
                                                    Create First Product
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
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
