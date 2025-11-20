<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['product','image' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['product','image' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<?php
    $override = trim((string)($image ?? ''));
    $stored   = trim((string)($product->image_url ?? ''));
    $candidate = $override !== '' ? $override : $stored;
    $isExternal = preg_match('/^https?:\/\//i', $candidate) === 1;
    if($candidate !== '' && !$isExternal) {
        $candidate = asset($candidate);
        $isExternal = true;
    }
    $src = $candidate !== '' ? $candidate : 'https://images.unsplash.com/photo-1548369937-47519962c11a?auto=format&fit=crop&w=600&q=60';
    if(str_contains($src, 'images.unsplash.com')) {
        $src = preg_replace('/(&?q=)\d+/','${1}60',$src);
        if(!str_contains($src,'q=')) { $src .= (str_contains($src,'?') ? '&' : '?').'q=60'; }
    }
?>
<div class="group relative bg-white/80 backdrop-blur rounded-lg p-4 shadow hover:shadow-lg transition-shadow flex flex-col">
    <div class="aspect-video w-full rounded-md overflow-hidden mb-3 bg-gray-100">
        <img
            src="<?php echo e($src); ?>"
            alt="<?php echo e($product->name); ?>"
            class="h-full w-full object-cover object-center group-hover:scale-105 transition-transform duration-300"
            loading="lazy"
            decoding="async"
            referrerpolicy="no-referrer"
            onerror="this.onerror=null;this.src='https://placehold.co/600x338?text=Pizza';"
        >
    </div>
    <h3 class="font-semibold text-sm truncate"><?php echo e($product->name); ?></h3>
    <p class="text-xs text-gray-600 line-clamp-2 mb-2"><?php echo e($product->description); ?></p>
    <div class="mt-auto flex items-center justify-between">
        <span class="text-sm font-bold text-red-600"><?php echo e(number_format($product->price,0,'','.')); ?> Ft</span>
        <a href="<?php echo e(route('products.index')); ?>" class="text-xs inline-flex items-center gap-1 px-2 py-1 rounded bg-red-50 text-red-600 hover:bg-red-100">Részletek</a>
    </div>
</div>
<?php /**PATH C:\Users\krisz\OneDrive\Asztali gép\5. felev beadandok\web2 eloadas\beadandonew\resources\views/components/featured-product-card.blade.php ENDPATH**/ ?>