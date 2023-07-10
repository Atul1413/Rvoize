<!-- Filter Block -->
<div class="filter-block">
    <h4><?php echo e($val['title']); ?></h4>
    <div class="form-group">
        <input type="text" name="s" value="<?php echo e(request()->input('s')); ?>" placeholder="<?php echo e(__("Job title...")); ?>">
        <span class="icon flaticon-search-3"></span>
    </div>
</div>
<?php /**PATH C:\wamp64\www\rvoize\modules/Job/Views/frontend/layouts/form-search/fields/form-style-1/keyword.blade.php ENDPATH**/ ?>