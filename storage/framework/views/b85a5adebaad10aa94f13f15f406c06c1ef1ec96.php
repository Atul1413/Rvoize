<?php if(!empty($gig_related) && count($gig_related) > 0): ?>
    <div class="related-jobs">
        <div class="title-box">
            <h3><?php echo e(__("Recommended For You")); ?></h3>
        </div>
        <div class="row">
            <?php $__currentLoopData = $gig_related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <?php echo $__env->make("Gig::frontend.search.loop", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Gig/Views/frontend/layouts/details/related.blade.php ENDPATH**/ ?>