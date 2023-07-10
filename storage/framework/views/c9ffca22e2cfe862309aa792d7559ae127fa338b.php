<?php if($faqs = $translation->faqs and  !empty($faqs[0]['title'])): ?>
    <h4 class="title mb-4"> <?php echo e(__("FAQs")); ?></h4>
    <ul class="accordion-box">
        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="accordion block <?php if($key == 0 ): ?> active-block <?php endif; ?>">
                <div class="acc-btn <?php if($key == 0 ): ?> active <?php endif; ?> "><?php echo e($item['title']); ?> <span class="icon flaticon-add"></span></div>
                <div class="acc-content <?php if($key == 0 ): ?> current <?php endif; ?> ">
                    <div class="content">
                        <p><?php echo clean($item['content']); ?></p>
                    </div>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?><?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Gig/Views/frontend/layouts/details/faqs.blade.php ENDPATH**/ ?>