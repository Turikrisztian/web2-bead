@php $isEdit = isset($product) && $product; @endphp
<form method="POST" action="{{ $isEdit ? route('products.update',$product) : route('products.store') }}" class="space-y-6">
    @csrf
    @if($isEdit) @method('PUT') @endif
    <div>
        <label class="block text-sm font-medium text-gray-700">Név</label>
        <input name="name" value="{{ old('name', $isEdit ? $product->name : '') }}" required class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
        @error('name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Ár</label>
        <input name="price" type="number" step="0.01" value="{{ old('price', $isEdit ? $product->price : '') }}" required class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
        @error('price')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Leírás</label>
        <textarea name="description" rows="5" class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $isEdit ? $product->description : '') }}</textarea>
        @error('description')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Kép URL / relatív path</label>
        <input name="image_url" value="{{ old('image_url', $isEdit ? $product->image_url : '') }}" placeholder="pl. images/pizzas/ujpizza.jpg vagy https://..." class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
        <p class="text-xs text-gray-500 mt-1">Ha relatív útvonal (images/...), az <code>asset()</code>-tel lesz feloldva. Üresen hagyható.</p>
        @error('image_url')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>
    <div class="flex gap-3">
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-sm">{{ $submitLabel ?? ($isEdit ? 'Mentés' : 'Létrehozás') }}</button>
        <a href="{{ route('products.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded text-sm">Vissza</a>
    </div>
</form>