<!-- Checkboxes Ouer -->
<div class="checkbox-outer">
    <h4><?php echo e($val['title']); ?></h4>
    <ul class="checkboxes square">
        <li>
            <input id="check-b0" type="checkbox" name="experience[]" value="fresh" <?php if(!empty($experience = request()->get('experience')) && in_array('fresh', $experience)): ?> checked <?php endif; ?>>
            <label for="check-b0"><?php echo e(__("Fresh")); ?></label>
        </li>
        <li>
            <input id="check-b1" type="checkbox" name="experience[]" value="1" <?php if(!empty($experience = request()->get('experience')) && in_array('1', $experience)): ?> checked <?php endif; ?>>
            <label for="check-b1"><?php echo e(__("1 Year")); ?></label>
        </li>
        <li>
            <input id="check-b2" type="checkbox" name="experience[]" value="2" <?php if(!empty($experience = request()->get('experience')) && in_array('2', $experience)): ?> checked <?php endif; ?>>
            <label for="check-b2"><?php echo e(__("2 Years")); ?></label>
        </li>
        <li>
            <input id="check-b3" type="checkbox" name="experience[]" value="3" <?php if(!empty($experience = request()->get('experience')) && in_array('3', $experience)): ?> checked <?php endif; ?>>
            <label for="check-b3"><?php echo e(__("3 Years")); ?></label>
        </li>
        <li>
            <input id="check-b4" type="checkbox" name="experience[]" value="4" <?php if(!empty($experience = request()->get('experience')) && in_array('4', $experience)): ?> checked <?php endif; ?>>
            <label for="check-b4"><?php echo e(__("4 Years")); ?></label>
        </li>
        <li class="tg d-none">
            <input id="check-b5" type="checkbox" name="experience[]" value="5" <?php if(!empty($experience = request()->get('experience')) && in_array('5', $experience)): ?> checked <?php endif; ?>>
            <label for="check-b5"><?php echo e(__("5 Years")); ?></label>
        </li>
        <li>
            <button class="view-more" type="button"><span class="icon flaticon-plus"></span>
                <span class="tg-text"><?php echo e(__("View More")); ?></span>
                <span class="tg-text d-none"><?php echo e(__("Show Less")); ?></span>
            </button>
        </li>
    </ul>
</div>
<?php /**PATH E:\xampp\htdocs\rvoize\modules/Job/Views/frontend/layouts/form-search/fields/form-style-1/experience.blade.php ENDPATH**/ ?>