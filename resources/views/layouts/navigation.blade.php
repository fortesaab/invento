<nav x-data="{ open: false }" class="border-b border-slate-700 bg-slate-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-slate-200" />
                    </a>
                </div>

                <div class="hidden sm:ms-10 sm:flex sm:items-center sm:gap-8">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    @if (auth()->user()->isAdmin())
                        <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                            Categories
                        </x-nav-link>

                        <x-nav-link :href="route('suppliers.index')" :active="request()->routeIs('suppliers.*')">
                            Suppliers
                        </x-nav-link>
                    @endif

                    @if (auth()->user()->isAdmin() || auth()->user()->isStaff())
                        <x-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.*')">
                            Customers
                        </x-nav-link>

                        <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                            Products
                        </x-nav-link>

                        <x-nav-link :href="route('invoices.index')" :active="request()->routeIs('invoices.*')">
                            Invoices
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:ms-6 sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center rounded-md border border-transparent bg-slate-800 px-3 py-2 text-sm font-medium leading-4 text-slate-300 transition duration-150 ease-in-out hover:text-white focus:outline-none">
                            <div>{{ auth()->user()->name }}</div>

                            <div class="ms-2 rounded-full bg-slate-700 px-2 py-0.5 text-xs font-medium text-slate-200">
                                {{ ucfirst(auth()->user()->role) }}
                            </div>

                            <div class="ms-2">
                                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Account
                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center rounded-md p-2 text-slate-400 transition duration-150 ease-in-out hover:bg-slate-700 hover:text-slate-200 focus:bg-slate-700 focus:text-slate-200 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="space-y-1 pb-3 pt-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-responsive-nav-link>

            @if (auth()->user()->isAdmin())
                <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                    Categories
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('suppliers.index')" :active="request()->routeIs('suppliers.*')">
                    Suppliers
                </x-responsive-nav-link>
            @endif

            @if (auth()->user()->isAdmin() || auth()->user()->isStaff())
                <x-responsive-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.*')">
                    Customers
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                    Products
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('invoices.index')" :active="request()->routeIs('invoices.*')">
                    Invoices
                </x-responsive-nav-link>
            @endif
        </div>

        <div class="border-t border-slate-700 pb-1 pt-4">
            <div class="px-4">
                <div class="text-base font-medium text-slate-200">{{ auth()->user()->name }}</div>
                <div class="text-sm font-medium text-slate-400">{{ auth()->user()->email }}</div>
                <div class="mt-1 inline-block rounded-full bg-slate-700 px-2 py-0.5 text-xs font-medium text-slate-200">
                    {{ ucfirst(auth()->user()->role) }}
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
