<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Üzenetek</h2></x-slot>
    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">
                <table class="min-w-full text-sm">
                    <thead class="border-b">
                        <tr class="text-left">
                            <th class="py-2 px-2">Név</th>
                            <th class="py-2 px-2">Email</th>
                            <th class="py-2 px-2">Üzenet</th>
                            <th class="py-2 px-2">Dátum</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $m)
                            <tr class="border-b last:border-0">
                                <td class="py-2 px-2 font-medium">{{ $m->name }}</td>
                                <td class="py-2 px-2">{{ $m->email }}</td>
                                <td class="py-2 px-2">{{ Str::limit($m->content,60) }}</td>
                                @php($offset = config('messages.display_offset_minutes'))
                                @php($displayTime = $offset ? $m->created_at->copy()->addMinutes($offset) : $m->created_at)
                                <td class="py-2 px-2 text-gray-500" title="Eredeti: {{ $m->created_at->format('Y-m-d H:i') }}{{ $offset ? ' | Késleltetés: '.$offset.' perc' : '' }}">{{ $displayTime->format('Y-m-d H:i') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="py-4 text-center text-gray-500">Nincs üzenet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">{{ $messages->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
