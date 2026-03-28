<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-800">Create Customer</h2>
                    <p class="mt-1 text-sm text-slate-500">Add a new customer for your inventory system.</p>
                </div>

                <x-ui.button :href="route('customers.index')" variant="secondary">
                    Back
                </x-ui.button>
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-8">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 px-8 py-5">
                    <h3 class="text-lg font-semibold text-slate-800">Customer Details</h3>
                    <p class="mt-1 text-sm text-slate-500">Fill in the information below.</p>
                </div>

                <form action="{{ route('customers.store') }}" method="POST" class="space-y-5 px-8 py-6">
                    @csrf

                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-slate-700">
                            Customer Name
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            placeholder="e.g. John Doe"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-slate-700">
                            Email Address
                        </label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            placeholder="customer@example.com"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="mb-2 block text-sm font-medium text-slate-700">
                            Phone Number
                        </label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                            placeholder="+383 44 123 456"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">
                        @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="address" class="mb-2 block text-sm font-medium text-slate-700">
                            Address
                        </label>
                        <textarea name="address" id="address" rows="3" placeholder="Write the customer address..."
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-5">
                        <x-ui.button :href="route('customers.index')" variant="secondary">
                            Cancel
                        </x-ui.button>

                        <x-ui.button type="submit" variant="primary">
                            Save Customer
                        </x-ui.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
