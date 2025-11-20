<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Termék</h2></x-slot>
    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6 space-y-4">
                @if($product)
                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                    <p class="text-sm"><strong>Ár:</strong> {{ number_format($product->price,0,'.',' ') }} Ft</p>
                    <p class="text-sm text-gray-700">{{ $product->description }}</p>
                    @auth
                        <form method="POST" action="{{ route('orders.store') }}" class="space-y-4">@csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}" />
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Mennyiség</label>
                                <input type="number" name="quantity" value="1" min="1" class="mt-1 w-32 rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>
                            <div class="flex gap-3">
                                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-sm">Rendelés</button>
                                <a href="{{ route('products.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded text-sm">Vissza</a>
                            </div>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-sm">Bejelentkezés a rendeléshez</a>
                    @endauth
                @else
                    <p class="text-sm text-gray-600">Termék nem található.</p>
                    <a href="{{ route('products.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded text-sm">Vissza</a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
