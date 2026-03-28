<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-800">Suppliers</h2>
                    <p class="mt-1 text-sm text-slate-500">Manage your inventory suppliers.</p>
                </div>

                <x-ui.button :href="route('suppliers.create')" variant="primary">
                    New Supplier
                </x-ui.button>
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-8">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div
                    class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 px-6 py-5">
                    <h3 class="text-lg font-semibold text-slate-800">Supplier List</h3>
                    <p class="mt-1 text-sm text-slate-500">View, edit, and delete your suppliers.</p>
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
                                    Email</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Phone</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Address</th>
                                <th
                                    class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            @forelse($suppliers as $supplier)
                                <tr class="transition hover:bg-slate-50/80">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-slate-800">{{ $supplier->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ $supplier->email ?: 'No email provided.' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ $supplier->phone }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ $supplier->address ?: 'No address provided.' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-end gap-3">
                                            <x-ui.button :href="route('suppliers.edit', $supplier)" variant="secondary">
                                                Edit
                                            </x-ui.button>

                                            <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this supplier?')">
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
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="mx-auto max-w-md">
                                            <h4 class="text-lg font-semibold text-slate-700">No suppliers yet</h4>
                                            <p class="mt-2 text-sm text-slate-500">Start by creating your first
                                                supplier.</p>
                                            <div class="mt-5">
                                                <x-ui.button :href="route('suppliers.create')" variant="primary">
                                                    Create First Supplier
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
                    {{ $suppliers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
