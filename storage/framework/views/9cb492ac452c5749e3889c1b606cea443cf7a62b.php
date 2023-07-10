
<!-- Filter Block -->
<div class="filter-block">
    <h4><?php echo e($val['title']); ?></h4>
    <div class="form-group">
        <input type="text" name="s" value="<?php echo e(Request::query("s")); ?>" placeholder="<?php echo e(__("Job title, keywords, or company")); ?>">
        <span class="icon flaticon-search-3"></span>
    </div>
</div>
<!-- Filter Block -->
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Company/Views/frontend/layouts/sidebars/fields/style-1/keyword.blade.php ENDPATH**/ ?>