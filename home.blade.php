<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden rounded-lg">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-500 via-red-500 to-yellow-500 opacity-30"></div>
            <div class="relative px-6 py-10 sm:py-14 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                <div class="space-y-4 max-w-xl">
                    <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-red-600 to-orange-500">
                        PizzaShop Laravel
                    </h1>
                    <p class="text-gray-700 leading-relaxed">
                        Frissen sütött, kézműves pizzák kategóriák szerint – Laravel + Breeze + Tailwind alapokon.
                        Fedezd fel a kínálatot, rendelj, és nézd meg a statisztikákat!
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('products.index') }}"
                           class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-2.5 rounded shadow">
                            <span>Termékek</span>
                        </a>
                        <a href="{{ route('diagram.index') }}"
                           class="inline-flex items-center gap-2 bg-white text-red-600 border border-red-300 hover:border-red-400 hover:bg-red-50 font-semibold px-5 py-2.5 rounded shadow">
                            <span>Diagram</span>
                        </a>
                        @guest
                            <a href="{{ route('login') }}"
                               class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-5 py-2.5 rounded shadow">
                                <span>Bejelentkezés</span>
                            </a>
                        @endguest
                    </div>
                </div>

                {{-- 🔥 FEATURED TERMÉKEK – CSAK LOKÁLIS KÉPEK, UNSPLASH NÉLKÜL  --}}
                <div class="grid grid-cols-2 gap-4 w-full max-w-md">
                    @forelse(($featuredProducts ?? []) as $fp)

                        @php
                            $img = $fp->image
                                ? asset('images/'.$fp->image)
                                : asset('images/pizza-placeholder.jpg'); // optional placeholder
                        @endphp

                        <x-featured-product-card :product="$fp" :image="$img" />
                    @empty
                        <p class="col-span-2 text-sm text-gray-600">Nincs még termék a kiemeléshez.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            @if(session('status'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded shadow">
                    {{ session('status') }}
                </div>
            @endif

            {{-- ADMIN: HA NINCSENEK TERMÉKEK --}}
            @if(isset($productCount) && $productCount === 0 && Auth::check() && Auth::user()->role==='admin')
                <form method="POST" action="{{ route('admin.pizza.reseed') }}"
                      class="bg-yellow-50 border border-yellow-200 rounded p-4 flex flex-col sm:flex-row sm:items-center gap-4">
                    @csrf
                    <div class="flex-1">
                        <h3 class="font-semibold text-yellow-800">Nincsenek még pizza termékek</h3>
                        <p class="text-sm text-yellow-700">Futtasd a reseed műveletet a kategóriák és pizzák betöltéséhez.</p>
                    </div>
                    <button
                        class="inline-flex items-center gap-2 bg-yellow-600 hover:bg-yellow-700 text-white font-semibold px-4 py-2 rounded shadow">
                        Újratöltés (reseed)
                    </button>
                </form>
            @endif

            {{-- KÁRTYÁK --}}
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div class="p-5 bg-white rounded shadow flex flex-col gap-2">
                    <h3 class="font-semibold">Kapcsolat</h3>
                    <p class="text-sm text-gray-600">Írj üzenetet a kapcsolat űrlapon keresztül. Mentés adatbázisba, admin látja.</p>
                    <a class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-3 py-2 rounded"
                       href="{{ route('contact.show') }}">Űrlap</a>
                </div>

                <div class="p-5 bg-white rounded shadow flex flex-col gap-2">
                    <h3 class="font-semibold">Termékek</h3>
                    <p class="text-sm text-gray-600">Teljes CRUD: listázás, létrehozás, szerkesztés, törlés.</p>
                    <a class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-3 py-2 rounded"
                       href="{{ route('products.index') }}">Megnyitás</a>
                </div>

                <div class="p-5 bg-white rounded shadow flex flex-col gap-2">
                    <h3 class="font-semibold">Diagram</h3>
                    <p class="text-sm text-gray-600">Kategóriánkénti termékszám + rendelés összesítés.</p>
                    <a class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-3 py-2 rounded"
                       href="{{ route('diagram.index') }}">Statisztika</a>
                </div>

                <div class="p-5 bg-white rounded shadow flex flex-col gap-2">
                    <h3 class="font-semibold">Üzenetek</h3>
                    <p class="text-sm text-gray-600">Saját beküldött üzenetek áttekintése.</p>
                    <a class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-3 py-2 rounded"
                       href="{{ route('messages.index') }}">Lista</a>
                </div>

                @auth
                    <div class="p-5 bg-white rounded shadow flex flex-col gap-2">
                        <h3 class="font-semibold">Rendelés</h3>
                        <p class="text-sm text-gray-600">Termék részletein mennyiséggel rendelést indíthatsz.</p>
                        <a class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-3 py-2 rounded"
                           href="{{ route('products.index') }}">Rendelés indítása</a>
                    </div>
                @endauth

                @if(Auth::check() && Auth::user()->role==='admin')
                    <div class="p-5 bg-white rounded shadow flex flex-col gap-2">
                        <h3 class="font-semibold">Admin</h3>
                        <p class="text-sm text-gray-600">Statisztikák és legutóbbi elemek.</p>
                        <a class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-3 py-2 rounded"
                           href="{{ route('admin.index') }}">Dashboard</a>
                    </div>
                @endif
            </div>

            {{-- LOGIN INFO --}}
            <div class="bg-white rounded shadow p-4">
                @guest
                    <p class="text-sm">Még nem vagy bejelentkezve.
                        <a class="text-indigo-600 underline" href="{{ route('login') }}">Bejelentkezés</a>
                    </p>
                @else
                    <p class="text-sm">
                        Bejelentkezve mint <strong>{{ Auth::user()->name }}</strong> ({{ Auth::user()->role }}).
                    </p>
                @endguest
            </div>

            {{-- KATEGÓRIÁK --}}
            <div class="bg-white rounded shadow p-6">
                <h2 class="text-lg font-semibold mb-4">Kategóriák áttekintése</h2>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @forelse(($categories ?? []) as $cat)
                        <div class="border border-gray-200 rounded-lg p-4 flex flex-col">
                            <h3 class="font-medium text-gray-800">{{ $cat->name }}</h3>
                            <p class="text-xs text-gray-500">
                                Termékek: <span class="font-semibold">{{ $cat->products_count }}</span>
                            </p>
                            <a href="{{ route('products.index') }}"
                               class="mt-auto inline-flex justify-center text-xs bg-gray-100 hover:bg-gray-200 text-gray-700 px-2 py-1 rounded">
                                Megnyitás
                            </a>
                        </div>
                    @empty
                        <p class="text-sm text-gray-600">Még nincsenek kategóriák. Seed futtatása szükséges.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
