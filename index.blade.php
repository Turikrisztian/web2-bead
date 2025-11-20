<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Termékek</h2></x-slot>
    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">
                <div class="mb-4 flex justify-between items-center">
                    <a href="{{ route('products.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-4 py-2 rounded">Új termék</a>
                </div>
                <table class="min-w-full text-sm">
                    <thead class="border-b">
                        <tr class="text-left">
                            <th class="py-2 px-2">Név</th>
                            <th class="py-2 px-2">Ár</th>
                            <th class="py-2 px-2">Műveletek</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr class="border-b last:border-0">
                            <td class="py-2 px-2 font-medium">{{ $product->name }}</td>
                            <td class="py-2 px-2">{{ number_format($product->price,0,'.',' ') }} Ft</td>
                            <td class="py-2 px-2">
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('products.show',$product) }}" class="bg-gray-200 hover:bg-gray-300 px-2 py-1 rounded text-xs">Megnyit</a>
                                    <a href="{{ route('products.edit',$product) }}" class="bg-gray-200 hover:bg-gray-300 px-2 py-1 rounded text-xs">Szerkeszt</a>
                                    <form method="POST" action="{{ route('products.destroy',$product) }}" onsubmit="return confirm('Biztos törlöd?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs">Törlés</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="py-4 text-center text-gray-500">Nincs termék.</td></tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-4">{{ $products->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
