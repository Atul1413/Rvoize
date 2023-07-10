<div class="sort-by">
    <form class="bc-form-order" action="<?php echo e(route("companies.index")); ?>" method="get">
        <input type="hidden" name="s" value="<?php echo e(Request::query("s")); ?>">
        <input type="hidden" name="location_id" value="<?php echo e(Request::query('location_id')); ?>">
        <?php if(Request::query('terms')): ?>
            <?php $__currentLoopData = Request::query('terms'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" name="terms[]" value="<?php echo e($term); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <input type="hidden" name="from_date" value="<?php echo e(Request::query('from_date')); ?>">
        <input type="hidden" name="to_date" value="<?php echo e(Request::query('to_date')); ?>">
        <?php if(Request::query('_layout')): ?>
            <input type="hidden" name="_layout" value="<?php echo e(Request::query('_layout')); ?>">
        <?php endif; ?>
        <select class="chosen-select" name="orderby" onchange="this.form.submit()">
            <option value=""><?php echo e(__('Sort by (Default)')); ?></option>
            <option value="newest" <?php if(request()->get('orderby') == 'newest'): ?> selected <?php endif; ?>><?php echo e(__('Newest')); ?></option>
            <option value="oldest" <?php if(request()->get('orderby') == 'oldest'): ?> selected <?php endif; ?>><?php echo e(__('Oldest')); ?></option>
            <option value="random" <?php if(request()->get('orderby') == 'random'): ?> selected <?php endif; ?>><?php echo e(__('Random')); ?></option>
        </select>
        <select class="chosen-select" name="limit" onchange="this.form.submit()">
            <option value="10" <?php if(request()->get('limit') == 10): ?> selected <?php endif; ?> ><?php echo e(__("Show 10")); ?></option>
            <option value="20" <?php if(request()->get('limit') == 20): ?> selected <?php endif; ?> ><?php echo e(__("Show 20")); ?></option>
            <option value="30" <?php if(request()->get('limit') == 30): ?> selected <?php endif; ?> ><?php echo e(__("Show 30")); ?></option>
            <option value="40" <?php if(request()->get('limit') == 40): ?> selected <?php endif; ?> ><?php echo e(__("Show 40")); ?></option>
            <option value="50" <?php if(request()->get('limit') == 50): ?> selected <?php endif; ?> ><?php echo e(__("Show 50")); ?></option>
            <option value="60" <?php if(request()->get('limit') == 60): ?> selected <?php endif; ?> ><?php echo e(__("Show 60")); ?></option>
        </select>
    </form>
</div>
<?php /**PATH C:\wamp64\www\rvoize\modules/Company/Views/frontend/layouts/search/company-sort.blade.php ENDPATH**/ ?>