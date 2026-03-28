<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-800">Create Category</h2>
                    <p class="mt-1 text-sm text-slate-500">Add a new category for your inventory.</p>
                </div>

                <x-ui.button :href="route('categories.index')" variant="secondary">
                    Back
                </x-ui.button>
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-8">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 px-8 py-5">
                    <h3 class="text-lg font-semibold text-slate-800">Category Details</h3>
                    <p class="mt-1 text-sm text-slate-500">Fill in the information below.</p>
                </div>

                <form action="{{ route('categories.store') }}" method="POST" class="space-y-5 px-8 py-6">
                    @csrf

                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-slate-700">
                            Category Name
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            placeholder="e.g. Electronics"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="mb-2 block text-sm font-medium text-slate-700">
                            Description
                        </label>
                        <textarea name="description" id="description" rows="3"
                            placeholder="Write a short description for this category..."
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-5">
                        <x-ui.button :href="route('categories.index')" variant="secondary">
                            Cancel
                        </x-ui.button>

                        <x-ui.button type="submit" variant="primary">
                            Save Category
                        </x-ui.button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</x-app-layout>
