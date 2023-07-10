<?php if(request()->get('s')): ?>
    <input type="hidden" name="s" value="<?php echo e(request()->get('s')); ?>">
<?php endif; ?>
<?php if(request()->get('date_posted')): ?>
    <input type="hidden" name="date_posted" value="<?php echo e(request()->get('date_posted')); ?>">
<?php endif; ?>
<?php
    $experience = request()->get('experience');
    $job_type = request()->get('job_type');
?>
<?php if(!empty($experience) && is_array($experience)): ?>
    <?php $__currentLoopData = $experience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="experience[]" value="<?php echo e($val); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(!empty($job_type) && is_array($job_type)): ?>
    <?php $__currentLoopData = $job_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="job_type[]" value="<?php echo e($val); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(request()->get('category')): ?>
    <input type="hidden" name="category" value="<?php echo e(request()->get('category')); ?>">
<?php endif; ?>
<?php if(request()->get('location')): ?>
    <input type="hidden" name="location" value="<?php echo e(request()->get('location')); ?>">
<?php endif; ?>
<?php if(request()->get('amount_to')): ?>
    <input type="hidden" name="amount_from" value="<?php echo e(request()->get('amount_from') ?? 0); ?>">
    <input type="hidden" name="amount_to" value="<?php echo e(request()->get('amount_to')); ?>">
<?php endif; ?>
<select class="chosen-select" name="orderby" onchange="this.form.submit()">
    <option value=""><?php echo e(__('Sort by (Default)')); ?></option>
    <option value="new" <?php if(request()->get('orderby') == 'new'): ?> selected <?php endif; ?>><?php echo e(__('Newest')); ?></option>
    <option value="old" <?php if(request()->get('orderby') == 'old'): ?> selected <?php endif; ?>><?php echo e(__('Oldest')); ?></option>
    <option value="name_high" <?php if(request()->get('orderby') == 'name_high'): ?> selected <?php endif; ?>><?php echo e(__('Name [a->z]')); ?></option>
    <option value="name_low" <?php if(request()->get('orderby') == 'name_low'): ?> selected <?php endif; ?>><?php echo e(__('Name [z->a]')); ?></option>
</select>

<select class="chosen-select" name="limit" onchange="this.form.submit()">
    <option value="10" <?php if(request()->get('limit') == 10): ?> selected <?php endif; ?> ><?php echo e(__("Show 10")); ?></option>
    <option value="20" <?php if(request()->get('limit') == 20): ?> selected <?php endif; ?> ><?php echo e(__("Show 20")); ?></option>
    <option value="30" <?php if(request()->get('limit') == 30): ?> selected <?php endif; ?> ><?php echo e(__("Show 30")); ?></option>
    <option value="40" <?php if(request()->get('limit') == 40): ?> selected <?php endif; ?> ><?php echo e(__("Show 40")); ?></option>
    <option value="50" <?php if(request()->get('limit') == 50): ?> selected <?php endif; ?> ><?php echo e(__("Show 50")); ?></option>
    <option value="60" <?php if(request()->get('limit') == 60): ?> selected <?php endif; ?> ><?php echo e(__("Show 60")); ?></option>
</select>
<?php if(isset($_GET['_layout'])): ?>
    <input type="hidden" name="_layout" value="<?php echo e($_GET['_layout']); ?>">
<?php endif; ?>
<?php /**PATH C:\wamp64\www\rvoize\modules/Job/Views/frontend/layouts/search/order-sort.blade.php ENDPATH**/ ?>