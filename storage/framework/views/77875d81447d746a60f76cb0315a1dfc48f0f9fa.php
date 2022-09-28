 <?php $__env->slot('header', null, []); ?> 
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <?php echo e(__('Users')); ?>

    </h2>
 <?php $__env->endSlot(); ?>

<div class="bg-white shadow-lg mt-5 max-w-8xl p-4 min-h-screen">
    <input wire:model.debounce.1000ms="search" type="text">

    <ul>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <li> <?php echo e($user->name); ?>   </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

</div>
<?php /**PATH /home/abanoub/work/larawire/resources/views/livewire/user.blade.php ENDPATH**/ ?>