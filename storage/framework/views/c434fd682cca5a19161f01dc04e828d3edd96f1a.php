<!-- Checkboxes Ouer -->
<div class="checkbox-outer">
    <h4><?php echo e($val['title']); ?></h4>
    <ul class="checkboxes">
        <li>
            <input id="check-a1" type="radio" name="date_posted" value="all" <?php if(request()->get('date_posted') == 'all'): ?> checked <?php endif; ?>>
            <label for="check-a1"><?php echo e(__("All")); ?></label>
        </li>
        <li>
            <input id="check-a" type="radio" name="date_posted" value="last_hour" <?php if(request()->get('date_posted') == 'last_hour'): ?> checked <?php endif; ?>>
            <label for="check-a"><?php echo e(__("Last Hour")); ?></label>
        </li>
        <li>
            <input id="check-b" type="radio" name="date_posted" value="last_1" <?php if(request()->get('date_posted') == 'last_1'): ?> checked <?php endif; ?>>
            <label for="check-b"><?php echo e(__("Last 24 Hours")); ?></label>
        </li>
        <li>
            <input id="check-c" type="radio" name="date_posted" value="last_7" <?php if(request()->get('date_posted') == 'last_7'): ?> checked <?php endif; ?>>
            <label for="check-c"><?php echo e(__("Last 7 Days")); ?></label>
        </li>
        <li>
            <input id="check-d" type="radio" name="date_posted" value="last_14" <?php if(request()->get('date_posted') == 'last_14'): ?> checked <?php endif; ?>>
            <label for="check-d"><?php echo e(__("Last 14 Days")); ?></label>
        </li>
        <li>
            <input id="check-e" type="radio" name="date_posted" value="last_30" <?php if(request()->get('date_posted') == 'last_30'): ?> checked <?php endif; ?>>
            <label for="check-e"><?php echo e(__("Last 30 Days")); ?></label>
        </li>
    </ul>
</div>
<?php /**PATH C:\wamp64\www\rvoize\modules/Job/Views/frontend/layouts/form-search/fields/form-style-1/date_posted.blade.php ENDPATH**/ ?>