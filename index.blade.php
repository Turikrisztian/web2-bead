<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin Dashboard</h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6">
                @php($cards = [
                    ['c'=>'users','label'=>'Felhasználók','icon'=>'👥'],
                    ['c'=>'categories','label'=>'Kategóriák','icon'=>'🗂️'],
                    ['c'=>'products','label'=>'Termékek','icon'=>'🍕'],
                    ['c'=>'messages','label'=>'Üzenetek','icon'=>'✉️'],
                    ['c'=>'orders','label'=>'Rendelések','icon'=>'🧾'],
                    ['c'=>'orders_today','label'=>'Mai rendelések','icon'=>'📅'],
                ])
                @foreach($cards as $card)
                    <div class="bg-white p-4 rounded shadow flex flex-col">
                        <div class="text-xs text-gray-500 flex items-center gap-1">{{ $card['icon'] }} {{ $card['label'] }}</div>
                        <div class="text-2xl font-bold mt-1">{{ $stats[$card['c']] }}</div>
                    </div>
                @endforeach
                <div class="bg-gradient-to-br from-green-600 to-emerald-700 text-white p-7 rounded-xl shadow-xl flex flex-col md:items-center justify-center gap-1 ring-1 ring-white/10 sm:col-span-2 lg:col-span-2 xl:col-span-2">
                    <div class="text-xs sm:text-sm uppercase tracking-wider text-lime-100 font-semibold flex items-center gap-2">
                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-white/15">💰</span>
                        Összes bevétel
                    </div>
                    <div class="mt-1 text-4xl sm:text-5xl font-black drop-shadow-sm text-lime-200">{{ number_format($stats['income_total'],0,'.',' ') }} <span class="text-lime-300 text-2xl align-super font-bold">Ft</span></div>
                </div>
            </div>

            
            <div class="grid gap-8 lg:grid-cols-2">
                <div class="bg-white shadow rounded p-6">
                    <h3 class="font-semibold mb-4 flex items-center gap-2">✉️ Legutóbbi üzenetek</h3>
                    <table class="min-w-full text-sm">
                        <thead class="border-b bg-gray-50">
                            <tr class="text-left">
                                <th class="py-2 px-2">Név</th>
                                <th class="py-2 px-2">Email</th>
                                <th class="py-2 px-2">Rövid</th>
                                <th class="py-2 px-2">Dátum</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($recentMessages as $m)
                            <tr class="border-b last:border-0">
                                <td class="py-2 px-2 font-medium">{{ $m->name }}</td>
                                <td class="py-2 px-2 text-gray-600">{{ $m->email }}</td>
                                <td class="py-2 px-2">{{ Str::limit($m->content,40) }}</td>
                                <td class="py-2 px-2 text-gray-500 whitespace-nowrap">{{ $m->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="py-4 text-center text-gray-500 text-xs">Nincs még üzenet.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="bg-white shadow rounded p-6">
                    <h3 class="font-semibold mb-4 flex items-center gap-2">🧾 Legutóbbi rendelések</h3>
                    <table class="min-w-full text-sm">
                        <thead class="border-b bg-gray-50">
                            <tr class="text-left">
                                <th class="py-2 px-2">ID</th>
                                <th class="py-2 px-2">Termék</th>
                                <th class="py-2 px-2">Db</th>
                                <th class="py-2 px-2">Összeg</th>
                                <th class="py-2 px-2">Felhasználó</th>
                                <th class="py-2 px-2">Dátum</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($recentOrders as $o)
                            <tr class="border-b last:border-0">
                                <td class="py-2 px-2 font-medium">#{{ $o->id }}</td>
                                <td class="py-2 px-2">{{ $o->product->name ?? '–' }}</td>
                                <td class="py-2 px-2">{{ $o->quantity }}</td>
                                <td class="py-2 px-2">{{ number_format($o->total,0,'.',' ') }} Ft</td>
                                <td class="py-2 px-2 text-gray-600">{{ $o->user->name ?? '–' }}</td>
                                <td class="py-2 px-2 text-gray-500 whitespace-nowrap">{{ $o->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="py-4 text-center text-gray-500 text-xs">Nincs még rendelés.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            
            <div class="grid gap-8 lg:grid-cols-2">
                <div class="bg-white shadow rounded p-6">
                    <h3 class="font-semibold mb-4 flex items-center gap-2">🍕 Top termékek (rendelések száma)</h3>
                    <ul class="text-sm divide-y">
                        @forelse($topProducts as $tp)
                            <li class="py-2 flex justify-between">
                                <span class="font-medium">{{ $tp->name }}</span>
                                <span class="text-gray-600">{{ $tp->orders_count }} rendelés</span>
                            </li>
                        @empty
                            <li class="py-4 text-center text-gray-500 text-xs">Nincs adat.</li>
                        @endforelse
                    </ul>
                </div>
                <div class="bg-white shadow rounded p-6">
                    <h3 class="font-semibold mb-4 flex items-center gap-2">🗂️ Top kategóriák (termékek száma)</h3>
                    <ul class="text-sm divide-y">
                        @forelse($topCategories as $tc)
                            <li class="py-2 flex justify-between">
                                <span class="font-medium">{{ $tc->name }}</span>
                                <span class="text-gray-600">{{ $tc->products_count }} termék</span>
                            </li>
                        @empty
                            <li class="py-4 text-center text-gray-500 text-xs">Nincs adat.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            
            <div class="bg-white shadow rounded p-6">
                <h3 class="font-semibold mb-4 flex items-center gap-2">🆕 Legutóbbi termékek</h3>
                <ul class="text-sm divide-y">
                    @forelse($recentProducts as $p)
                        <li class="py-2 flex justify-between">
                            <span>{{ $p->name }}</span>
                            <span class="text-gray-600">{{ number_format($p->price,0,'.',' ') }} Ft</span>
                        </li>
                    @empty
                        <li class="py-4 text-center text-gray-500 text-xs">Még nincs termék.</li>
                    @endforelse
                </ul>
            </div>

            
            <div class="bg-white shadow rounded p-6">
                <h3 class="font-semibold mb-4 flex items-center gap-2">⚠️ Rendszer állapot</h3>
                <ul class="text-xs space-y-2 text-gray-700">
                    @if($stats['categories'] === 0)
                        <li>• Nincsenek kategóriák. Futtasd a reseed parancsot (<code>php artisan pizza:reseed</code>).</li>
                    @endif
                    @if($stats['products'] === 0)
                        <li>• Nincsenek termékek. Reseed szükséges.</li>
                    @endif
                    @if($stats['messages'] === 0)
                        <li>• Még nem érkezett üzenet a kapcsolat űrlapról.</li>
                    @endif
                    @if($stats['orders'] === 0)
                        <li>• Még nincs rendelés létrehozva.</li>
                    @endif
                    <li>• Laravel verzió: {{ app()->version() }}</li>
                    <li>• Timezone: {{ config('app.timezone') }}</li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
