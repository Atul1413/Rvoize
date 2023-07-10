<!-- Switchbox Outer -->
<?php if($job_types): ?>
    <div class="switchbox-outer">
        <h4><?php echo e($val['title']); ?></h4>
        <ul class="switchbox">
            <?php $__currentLoopData = $job_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $translation = $type->translateOrOrigin(app()->getLocale());
                    ?>
                <li>
                    <label class="switch">
                        <input type="checkbox" name="job_type[]" value="<?php echo e($type->id); ?>" <?php if(!empty(request()->get('job_type')) && in_array($type->id, request()->get('job_type'))): ?> checked <?php endif; ?>>
                        <span class="slider round"></span>
                        <span class="title"><?php echo e($translation->name); ?></span>
                    </label>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Job/Views/frontend/layouts/form-search/fields/form-style-1/job_type.blade.php ENDPATH**/ ?>