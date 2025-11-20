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
     <?php $__env->slot('header', null, []); ?> <h2 class="font-semibold text-xl text-gray-800 leading-tight">Termékek</h2> <?php $__env->endSlot(); ?>
    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">
                <div class="mb-4 flex justify-between items-center">
                    <a href="<?php echo e(route('products.create')); ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-4 py-2 rounded">Új termék</a>
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
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-b last:border-0">
                            <td class="py-2 px-2 font-medium"><?php echo e($product->name); ?></td>
                            <td class="py-2 px-2"><?php echo e(number_format($product->price,0,'.',' ')); ?> Ft</td>
                            <td class="py-2 px-2">
                                <div class="flex flex-wrap gap-2">
                                    <a href="<?php echo e(route('products.show',$product)); ?>" class="bg-gray-200 hover:bg-gray-300 px-2 py-1 rounded text-xs">Megnyit</a>
                                    <a href="<?php echo e(route('products.edit',$product)); ?>" class="bg-gray-200 hover:bg-gray-300 px-2 py-1 rounded text-xs">Szerkeszt</a>
                                    <form method="POST" action="<?php echo e(route('products.destroy',$product)); ?>" onsubmit="return confirm('Biztos törlöd?')" class="inline">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs">Törlés</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="3" class="py-4 text-center text-gray-500">Nincs termék.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <div class="mt-4"><?php echo e($products->links()); ?></div>
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
<?php /**PATH C:\Users\krisz\OneDrive\Asztali gép\5. felev beadandok\web2 eloadas\beadandonew\resources\views/products/index.blade.php ENDPATH**/ ?>