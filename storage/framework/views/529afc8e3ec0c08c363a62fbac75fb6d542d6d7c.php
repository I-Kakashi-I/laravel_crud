<?php foreach($attributes->onlyProps(['route','icon','title']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['route','icon','title']); ?>
<?php foreach (array_filter((['route','icon','title']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<li class="menu-item sub-menu">
    <a><span class="menu-icon"><i class="<?php echo e($icon??'ri-question-mark'); ?>"></i></span><span
            class="menu-title"><?php echo e($title??''); ?></span></a>
    <div class="sub-menu-list">
        <ul>
            <?php echo e($slot); ?>

        </ul>
    </div>


</li>
<?php /**PATH /home/abanoub/work/larawire/resources/views/components/side-nav-sub-item.blade.php ENDPATH**/ ?>