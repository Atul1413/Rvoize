<!-- Filter Block -->
<div class="filter-block">
    <h4><?php echo e($val['title']); ?></h4>
    <div class="range-slider-one">
        <div class="range-slider"></div>
        <div class="input-outer">
            <div class="amount-outer"><span class="count"></span></div>
        </div>
        <input type="hidden" class="range_from" name="from_date" value="<?php echo e(Request::query('from_date')); ?>">
        <input type="hidden" class="range_to" name="to_date" value="<?php echo e(Request::query('to_date')); ?>">

    </div>
</div>
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Company/Views/frontend/layouts/sidebars/fields/style-1/founded_date.blade.php ENDPATH**/ ?>