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
     <?php $__env->slot('header', null, []); ?> <h2 class="font-semibold text-xl text-gray-800 leading-tight">Üzenetek</h2> <?php $__env->endSlot(); ?>
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
                        <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="border-b last:border-0">
                                <td class="py-2 px-2 font-medium"><?php echo e($m->name); ?></td>
                                <td class="py-2 px-2"><?php echo e($m->email); ?></td>
                                <td class="py-2 px-2"><?php echo e(Str::limit($m->content,60)); ?></td>
                                <?php ($offset = config('messages.display_offset_minutes')); ?>
                                <?php ($displayTime = $offset ? $m->created_at->copy()->addMinutes($offset) : $m->created_at); ?>
                                <td class="py-2 px-2 text-gray-500" title="Eredeti: <?php echo e($m->created_at->format('Y-m-d H:i')); ?><?php echo e($offset ? ' | Késleltetés: '.$offset.' perc' : ''); ?>"><?php echo e($displayTime->format('Y-m-d H:i')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="4" class="py-4 text-center text-gray-500">Nincs üzenet.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="mt-4"><?php echo e($messages->links()); ?></div>
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
<?php /**PATH C:\Users\krisz\OneDrive\Asztali gép\5. felev beadandok\web2 eloadas\beadandonew\resources\views/messages/index.blade.php ENDPATH**/ ?>