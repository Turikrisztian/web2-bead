<nav class="bg-gray-50 border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center gap-8">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
                <div class="flex items-center gap-4 text-sm">
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">Kezdőlap</x-nav-link>
                        <x-nav-link :href="route('contact.show')" :active="request()->routeIs('contact.show')">Kapcsolat</x-nav-link>
                        <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">Termékek</x-nav-link>
                        <x-nav-link :href="route('diagram.index')" :active="request()->routeIs('diagram.index')">Diagram</x-nav-link>
                        @auth
                            <x-nav-link :href="route('messages.index')" :active="request()->routeIs('messages.index')">Üzeneteim</x-nav-link>
                            @if(Auth::user()->role === 'admin')
                                <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">Admin</x-nav-link>
                            @endif
                        @endauth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
                </div>
            </div>
            <div class="flex items-center gap-4">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="ms-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">Profil</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Kilépés</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-md bg-indigo-600 text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 transition">Bejelentkezés</a>
                @endauth
            </div>
        </div>
    </div>
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">Kezdőlap</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('contact.show')" :active="request()->routeIs('contact.show')">Kapcsolat</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">Termékek</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('diagram.index')" :active="request()->routeIs('diagram.index')">Diagram</x-responsive-nav-link>
                @auth
                    <x-responsive-nav-link :href="route('messages.index')" :active="request()->routeIs('messages.index')">Üzeneteim</x-responsive-nav-link>
                    @if(Auth::user()->role === 'admin')
                        <x-responsive-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">Admin</x-responsive-nav-link>
                    @endif
                @endauth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-responsive-nav-link>
            </div>
            <div class="pt-4 pb-1 border-t border-gray-200">
                @auth
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')">Profil</x-responsive-nav-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Kilépés</x-responsive-nav-link>
                        </form>
                    </div>
                @else
                    <div class="px-4">
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-md bg-indigo-600 text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 transition">Bejelentkezés</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
