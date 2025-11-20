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
     <?php $__env->slot('header', null, []); ?> <h2 class="font-semibold text-xl text-gray-800 leading-tight">Termék</h2> <?php $__env->endSlot(); ?>
    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6 space-y-4">
                <?php if($product): ?>
                    <h3 class="text-lg font-semibold"><?php echo e($product->name); ?></h3>
                    <p class="text-sm"><strong>Ár:</strong> <?php echo e(number_format($product->price,0,'.',' ')); ?> Ft</p>
                    <p class="text-sm text-gray-700"><?php echo e($product->description); ?></p>
                    <?php if(auth()->guard()->check()): ?>
                        <form method="POST" action="<?php echo e(route('orders.store')); ?>" class="space-y-4"><?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>" />
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Mennyiség</label>
                                <input type="number" name="quantity" value="1" min="1" class="mt-1 w-32 rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>
                            <div class="flex gap-3">
                                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-sm">Rendelés</button>
                                <a href="<?php echo e(route('products.index')); ?>" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded text-sm">Vissza</a>
                            </div>
                        </form>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-sm">Bejelentkezés a rendeléshez</a>
                    <?php endif; ?>
                <?php else: ?>
                    <p class="text-sm text-gray-600">Termék nem található.</p>
                    <a href="<?php echo e(route('products.index')); ?>" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded text-sm">Vissza</a>
                <?php endif; ?>
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
<?php /**PATH C:\Users\krisz\OneDrive\Asztali gép\5. felev beadandok\web2 eloadas\beadandonew\resources\views/products/show.blade.php ENDPATH**/ ?>