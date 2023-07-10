<div class="gallery about-section-three pb-0">
    <div class="auto-container">
        <div class="images-box">
            <div class="row">
                <?php if(!empty($list_item)): ?>
                    <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="column col-lg-3 col-md-6 col-sm-6">
                            <?php if(!empty($item)): ?>
                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <figure class="image">
                                        <img src="<?php echo e(get_file_url($img['image_id'],'full')); ?>" alt="<?php echo e(__('About')); ?>">
                                    </figure>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Template/Views/frontend/blocks/gallery/style_1.blade.php ENDPATH**/ ?>