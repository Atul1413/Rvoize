<!-- Filter Block -->
<?php
    $selected = (array) Request::query('terms');
?>
<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="filter-block checkbox-outer">
        <?php $attribute_trans = $attribute->translateOrOrigin(app()->getLocale()); ?>
        <h4><?php echo e($attribute_trans->name); ?></h4>
        <ul class="checkboxes square">
            <?php $__currentLoopData = $attribute->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $translate = $term->translateOrOrigin(app()->getLocale()); ?>
                <li>
                    <input id="check-<?php echo e($term->id); ?>" type="checkbox" name="terms[]" value="<?php echo e($term->id); ?>" <?php if(in_array($term->id,$selected)): ?> checked <?php endif; ?>>
                    <label for="check-<?php echo e($term->id); ?>"><?php echo e($translate->name); ?></label>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH E:\xampp\htdocs\rvoize\modules/Company/Views/frontend/layouts/sidebars/fields/style-1/att.blade.php ENDPATH**/ ?>