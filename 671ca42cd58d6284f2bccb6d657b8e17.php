<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin Dashboard</h2>
     <?php $__env->endSlot(); ?>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6">
                <?php ($cards = [
                    ['c'=>'users','label'=>'Felhasználók','icon'=>'👥'],
                    ['c'=>'categories','label'=>'Kategóriák','icon'=>'🗂️'],
                    ['c'=>'products','label'=>'Termékek','icon'=>'🍕'],
                    ['c'=>'messages','label'=>'Üzenetek','icon'=>'✉️'],
                    ['c'=>'orders','label'=>'Rendelések','icon'=>'🧾'],
                    ['c'=>'orders_today','label'=>'Mai rendelések','icon'=>'📅'],
                ]); ?>
                <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white p-4 rounded shadow flex flex-col">
                        <div class="text-xs text-gray-500 flex items-center gap-1"><?php echo e($card['icon']); ?> <?php echo e($card['label']); ?></div>
                        <div class="text-2xl font-bold mt-1"><?php echo e($stats[$card['c']]); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-gradient-to-br from-green-600 to-emerald-700 text-white p-7 rounded-xl shadow-xl flex flex-col md:items-center justify-center gap-1 ring-1 ring-white/10 sm:col-span-2 lg:col-span-2 xl:col-span-2">
                    <div class="text-xs sm:text-sm uppercase tracking-wider text-lime-100 font-semibold flex items-center gap-2">
                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-white/15">💰</span>
                        Összes bevétel
                    </div>
                    <div class="mt-1 text-4xl sm:text-5xl font-black drop-shadow-sm text-lime-200"><?php echo e(number_format($stats['income_total'],0,'.',' ')); ?> <span class="text-lime-300 text-2xl align-super font-bold">Ft</span></div>
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
                        <?php $__empty_1 = true; $__currentLoopData = $recentMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="border-b last:border-0">
                                <td class="py-2 px-2 font-medium"><?php echo e($m->name); ?></td>
                                <td class="py-2 px-2 text-gray-600"><?php echo e($m->email); ?></td>
                                <td class="py-2 px-2"><?php echo e(Str::limit($m->content,40)); ?></td>
                                <td class="py-2 px-2 text-gray-500 whitespace-nowrap"><?php echo e($m->created_at->format('Y-m-d H:i')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="4" class="py-4 text-center text-gray-500 text-xs">Nincs még üzenet.</td></tr>
                        <?php endif; ?>
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
                        <?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="border-b last:border-0">
                                <td class="py-2 px-2 font-medium">#<?php echo e($o->id); ?></td>
                                <td class="py-2 px-2"><?php echo e($o->product->name ?? '–'); ?></td>
                                <td class="py-2 px-2"><?php echo e($o->quantity); ?></td>
                                <td class="py-2 px-2"><?php echo e(number_format($o->total,0,'.',' ')); ?> Ft</td>
                                <td class="py-2 px-2 text-gray-600"><?php echo e($o->user->name ?? '–'); ?></td>
                                <td class="py-2 px-2 text-gray-500 whitespace-nowrap"><?php echo e($o->created_at->format('Y-m-d H:i')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="6" class="py-4 text-center text-gray-500 text-xs">Nincs még rendelés.</td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            
            <div class="grid gap-8 lg:grid-cols-2">
                <div class="bg-white shadow rounded p-6">
                    <h3 class="font-semibold mb-4 flex items-center gap-2">🍕 Top termékek (rendelések száma)</h3>
                    <ul class="text-sm divide-y">
                        <?php $__empty_1 = true; $__currentLoopData = $topProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li class="py-2 flex justify-between">
                                <span class="font-medium"><?php echo e($tp->name); ?></span>
                                <span class="text-gray-600"><?php echo e($tp->orders_count); ?> rendelés</span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li class="py-4 text-center text-gray-500 text-xs">Nincs adat.</li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="bg-white shadow rounded p-6">
                    <h3 class="font-semibold mb-4 flex items-center gap-2">🗂️ Top kategóriák (termékek száma)</h3>
                    <ul class="text-sm divide-y">
                        <?php $__empty_1 = true; $__currentLoopData = $topCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li class="py-2 flex justify-between">
                                <span class="font-medium"><?php echo e($tc->name); ?></span>
                                <span class="text-gray-600"><?php echo e($tc->products_count); ?> termék</span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li class="py-4 text-center text-gray-500 text-xs">Nincs adat.</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            
            <div class="bg-white shadow rounded p-6">
                <h3 class="font-semibold mb-4 flex items-center gap-2">🆕 Legutóbbi termékek</h3>
                <ul class="text-sm divide-y">
                    <?php $__empty_1 = true; $__currentLoopData = $recentProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="py-2 flex justify-between">
                            <span><?php echo e($p->name); ?></span>
                            <span class="text-gray-600"><?php echo e(number_format($p->price,0,'.',' ')); ?> Ft</span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="py-4 text-center text-gray-500 text-xs">Még nincs termék.</li>
                    <?php endif; ?>
                </ul>
            </div>

            
            <div class="bg-white shadow rounded p-6">
                <h3 class="font-semibold mb-4 flex items-center gap-2">⚠️ Rendszer állapot</h3>
                <ul class="text-xs space-y-2 text-gray-700">
                    <?php if($stats['categories'] === 0): ?>
                        <li>• Nincsenek kategóriák. Futtasd a reseed parancsot (<code>php artisan pizza:reseed</code>).</li>
                    <?php endif; ?>
                    <?php if($stats['products'] === 0): ?>
                        <li>• Nincsenek termékek. Reseed szükséges.</li>
                    <?php endif; ?>
                    <?php if($stats['messages'] === 0): ?>
                        <li>• Még nem érkezett üzenet a kapcsolat űrlapról.</li>
                    <?php endif; ?>
                    <?php if($stats['orders'] === 0): ?>
                        <li>• Még nincs rendelés létrehozva.</li>
                    <?php endif; ?>
                    <li>• Laravel verzió: <?php echo e(app()->version()); ?></li>
                    <li>• Timezone: <?php echo e(config('app.timezone')); ?></li>
                </ul>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\krisz\OneDrive\Asztali gép\5. felev beadandok\web2 eloadas\beadandonew\resources\views/admin/index.blade.php ENDPATH**/ ?>