<!-- Filter Block -->
<?php if(!empty($min_max_price[1])): ?>
    <div class="filter-block">
        <h4><?php echo e($val['title']); ?></h4>

        <div class="range-slider-one salary-range">
            <input type="hidden" name="amount_from" value="<?php echo e(request()->get('amount_from') ?? $min_max_price[0]); ?>">
            <input type="hidden" name="amount_to" value="<?php echo e(request()->get('amount_to') ?? $min_max_price[1]); ?>">
            <div class="job-salary-range-slider"></div>
            <div class="input-outer">
                <div class="amount-outer">
                    <span class="amount job-salary-amount">
                        <span class="min">0</span>
                        <span class="max">0</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\rvoize\modules/Job/Views/frontend/layouts/form-search/fields/form-style-1/salary.blade.php ENDPATH**/ ?>