<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Edit Category</h2>
                <p class="mt-1 text-sm text-slate-500">Update the selected category information.</p>
            </div>

            <a href="{{ route('categories.index') }}"
                class="inline-flex items-center rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm transition hover:bg-slate-50">
                Back to Categories
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-100 via-white to-amber-50 py-10">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-200/60">
                <div class="border-b border-slate-100 bg-slate-50 px-8 py-6">
                    <h3 class="text-lg font-semibold text-slate-800">Update Category</h3>
                    <p class="mt-1 text-sm text-slate-500">Make changes and save when you are ready.</p>
                </div>

                <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-6 px-8 py-8">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">Category
                            Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                            class="block w-full rounded-xl border border-slate-300 px-4 py-3 text-slate-800 shadow-sm outline-none transition focus:border-amber-500 focus:ring-4 focus:ring-amber-100">
                        @error('name')
                            <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description"
                            class="mb-2 block text-sm font-semibold text-slate-700">Description</label>
                        <textarea name="description" id="description" rows="5"
                            class="block w-full rounded-xl border border-slate-300 px-4 py-3 text-slate-800 shadow-sm outline-none transition focus:border-amber-500 focus:ring-4 focus:ring-amber-100">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-4">
                        <a href="{{ route('categories.index') }}"
                            class="inline-flex items-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                            Cancel
                        </a>

                        <button type="submit"
                            class="inline-flex items-center rounded-xl bg-amber-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-amber-200 transition hover:bg-amber-600">
                            Update Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
