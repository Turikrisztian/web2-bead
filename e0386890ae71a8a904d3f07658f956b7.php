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
        <div class="relative overflow-hidden rounded-lg">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-500 via-red-500 to-yellow-500 opacity-30"></div>
            <div class="relative px-6 py-10 sm:py-14 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                <div class="space-y-4 max-w-xl">
                    <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-red-600 to-orange-500">PizzaShop Laravel</h1>
                    <p class="text-gray-700 leading-relaxed">Frissen sütött, kézműves pizzák kategóriák szerint – Laravel + Breeze + Tailwind alapokon. Fedezd fel a kínálatot, rendelj, és nézd meg a statisztikákat!</p>
                    <div class="flex flex-wrap gap-3">
                        <a href="<?php echo e(route('products.index')); ?>" class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-2.5 rounded shadow">
                            <span>Termékek</span>
                        </a>
                        <a href="<?php echo e(route('diagram.index')); ?>" class="inline-flex items-center gap-2 bg-white text-red-600 border border-red-300 hover:border-red-400 hover:bg-red-50 font-semibold px-5 py-2.5 rounded shadow">
                            <span>Diagram</span>
                        </a>
                        <?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('login')); ?>" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-5 py-2.5 rounded shadow">
                            <span>Bejelentkezés</span>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                    $fallbacks = [
                        'Margherita' => 'https://images.unsplash.com/photo-1600628421053-9d099463c165?auto=format&fit=crop&w=600&q=60',
                        'Marinara' => 'https://images.unsplash.com/photo-1628840048990-cb5b7b7e96c5?auto=format&fit=crop&w=600&q=60',
                        'Pepperoni' => 'https://images.unsplash.com/photo-1601924582971-b7e36300f22b?auto=format&fit=crop&w=600&q=60',
                        'Hawaii' => 'https://images.unsplash.com/photo-1593565819510-a1a2f2852f90?auto=format&fit=crop&w=600&q=60',
                        'BBQ Csirke' => 'https://images.unsplash.com/photo-1594007654729-407eedc4be65?auto=format&fit=crop&w=600&q=60',
                        'Veggie Delight' => 'https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=600&q=60',
                        'Mediterrán' => 'https://images.unsplash.com/photo-1603079848644-d8b5f9d4d9a9?auto=format&fit=crop&w=600&q=60',
                        'Quattro Formaggi' => 'https://images.unsplash.com/photo-1574071318508-1c29f39f1d87?auto=format&fit=crop&w=600&q=60',
                        'Cheddar Burst' => 'https://images.unsplash.com/photo-1614098898570-9f31e502d090?auto=format&fit=crop&w=600&q=60',
                    ];
                    $bases = [
                        'Margherita' => 'margherita',
                        'Marinara' => 'marinara',
                        'Pepperoni' => 'pepperoni',
                        'Hawaii' => 'hawaii',
                        'BBQ Csirke' => 'bbqcsirke',
                        'Veggie Delight' => 'veggie',
                        'Mediterrán' => 'mediterran', // ékezet nélkül
                        'Quattro Formaggi' => 'quattro',
                        'Cheddar Burst' => 'cheddar',
                    ];
                    $tryExt = ['svg','webp','jpg','jpeg','png'];
                    $imageMap = [];
                    foreach ($bases as $name => $base) {
                        $found = null;
                        foreach ($tryExt as $ext) {
                            $rel = "images/pizzas/{$base}.{$ext}";
                            if (file_exists(public_path($rel))) { $found = $rel; break; }
                        }
                        $imageMap[$name] = $found ?: ($fallbacks[$name] ?? null);
                    }
                ?>
                <div class="grid grid-cols-2 gap-4 w-full max-w-md">
                    <?php $__empty_1 = true; $__currentLoopData = ($featuredProducts ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if (isset($component)) { $__componentOriginal87db68dc3e8868517e84354d52c20b17 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal87db68dc3e8868517e84354d52c20b17 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.featured-product-card','data' => ['product' => $fp,'image' => $imageMap[$fp->name] ?? null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('featured-product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($fp),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($imageMap[$fp->name] ?? null)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal87db68dc3e8868517e84354d52c20b17)): ?>
<?php $attributes = $__attributesOriginal87db68dc3e8868517e84354d52c20b17; ?>
<?php unset($__attributesOriginal87db68dc3e8868517e84354d52c20b17); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal87db68dc3e8868517e84354d52c20b17)): ?>
<?php $component = $__componentOriginal87db68dc3e8868517e84354d52c20b17; ?>
<?php unset($__componentOriginal87db68dc3e8868517e84354d52c20b17); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="col-span-2 text-sm text-gray-600">Nincs még termék a kiemeléshez.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
     <?php $__env->endSlot(); ?>
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            <?php if(session('status')): ?>
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded shadow"><?php echo e(session('status')); ?></div>
            <?php endif; ?>
            <?php if(isset($productCount) && $productCount === 0 && Auth::check() && Auth::user()->role==='admin'): ?>
                <form method="POST" action="<?php echo e(route('admin.pizza.reseed')); ?>" class="bg-yellow-50 border border-yellow-200 rounded p-4 flex flex-col sm:flex-row sm:items-center gap-4">
                    <?php echo csrf_field(); ?>
                    <div class="flex-1">
                        <h3 class="font-semibold text-yellow-800">Nincsenek még pizza termékek</h3>
                        <p class="text-sm text-yellow-700">Futtasd a reseed műveletet a kategóriák és pizzák betöltéséhez.</p>
                    </div>
                    <button class="inline-flex items-center gap-2 bg-yellow-600 hover:bg-yellow-700 text-white font-semibold px-4 py-2 rounded shadow">
                        Újratöltés (reseed)
                    </button>
                </form>
            <?php endif; ?>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div class="p-5 bg-white rounded shadow flex flex-col gap-2">
                    <h3 class="font-semibold">Kapcsolat</h3>
                    <p class="text-sm text-gray-600">Írj üzenetet a kapcsolat űrlapon keresztül. Mentés adatbázisba, admin látja.</p>
                    <a class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-3 py-2 rounded" href="<?php echo e(route('contact.show')); ?>">Űrlap</a>
                </div>
                <div class="p-5 bg-white rounded shadow flex flex-col gap-2">
                    <h3 class="font-semibold">Termékek</h3>
                    <p class="text-sm text-gray-600">Teljes CRUD: listázás, létrehozás, szerkesztés, törlés.</p>
                    <a class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-3 py-2 rounded" href="<?php echo e(route('products.index')); ?>">Megnyitás</a>
                </div>
                <div class="p-5 bg-white rounded shadow flex flex-col gap-2">
                    <h3 class="font-semibold">Diagram</h3>
                    <p class="text-sm text-gray-600">Kategóriánkénti termékszám + rendelés összesítés.</p>
                    <a class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-3 py-2 rounded" href="<?php echo e(route('diagram.index')); ?>">Statisztika</a>
                </div>
                <div class="p-5 bg-white rounded shadow flex flex-col gap-2">
                    <h3 class="font-semibold">Üzenetek</h3>
                    <p class="text-sm text-gray-600">Saját beküldött üzenetek áttekintése.</p>
                    <a class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-3 py-2 rounded" href="<?php echo e(route('messages.index')); ?>">Lista</a>
                </div>
                <?php if(auth()->guard()->check()): ?>
                <div class="p-5 bg-white rounded shadow flex flex-col gap-2">
                    <h3 class="font-semibold">Rendelés</h3>
                    <p class="text-sm text-gray-600">Termék részletein mennyiséggel rendelést indíthatsz.</p>
                    <a class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-3 py-2 rounded" href="<?php echo e(route('products.index')); ?>">Rendelés indítása</a>
                </div>
                <?php endif; ?>
                <?php if(Auth::check() && Auth::user()->role==='admin'): ?>
                <div class="p-5 bg-white rounded shadow flex flex-col gap-2">
                    <h3 class="font-semibold">Admin</h3>
                    <p class="text-sm text-gray-600">Statisztikák és legutóbbi elemek.</p>
                    <a class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-3 py-2 rounded" href="<?php echo e(route('admin.index')); ?>">Dashboard</a>
                </div>
                <?php endif; ?>
            </div>
            <div class="bg-white rounded shadow p-4">
                <?php if(auth()->guard()->guest()): ?>
                    <p class="text-sm">Még nem vagy bejelentkezve. <a class="text-indigo-600 underline" href="<?php echo e(route('login')); ?>">Bejelentkezés</a></p>
                <?php else: ?>
                    <p class="text-sm">Bejelentkezve mint <strong><?php echo e(Auth::user()->name); ?></strong> (<?php echo e(Auth::user()->role); ?>).</p>
                <?php endif; ?>
            </div>
            <div class="bg-white rounded shadow p-6">
                <h2 class="text-lg font-semibold mb-4">Kategóriák áttekintése</h2>
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <?php $__empty_1 = true; $__currentLoopData = ($categories ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="border border-gray-200 rounded-lg p-4 flex flex-col">
                            <h3 class="font-medium text-gray-800"><?php echo e($cat->name); ?></h3>
                            <p class="text-xs text-gray-500">Termékek: <span class="font-semibold"><?php echo e($cat->products_count); ?></span></p>
                            <a href="<?php echo e(route('products.index')); ?>" class="mt-auto inline-flex justify-center text-xs bg-gray-100 hover:bg-gray-200 text-gray-700 px-2 py-1 rounded">Megnyitás</a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-sm text-gray-600">Még nincsenek kategóriák. Seed futtatása szükséges.</p>
                    <?php endif; ?>
                </div>
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
<?php /**PATH C:\Users\krisz\OneDrive\Asztali gép\5. felev beadandok\web2 eloadas\beadandonew\resources\views/home.blade.php ENDPATH**/ ?>