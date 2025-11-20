<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kapcsolat</h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('status'))
                <div class="mb-4 bg-green-100 text-green-800 px-4 py-3 rounded">{{ session('status') }}</div>
            @endif
            <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">@csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Név</label>
                    <input name="name" value="{{ old('name') }}" required class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    @error('name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    @error('email')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Üzenet</label>
                    <textarea name="content" rows="6" required class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('content') }}</textarea>
                    @error('content')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="flex gap-3">
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-sm">Küldés</button>
                    <a href="{{ route('home') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded text-sm">Vissza</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
