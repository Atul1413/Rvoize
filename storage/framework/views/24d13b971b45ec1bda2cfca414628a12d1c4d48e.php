<div class="bravo-faq-lists faqs-section p-0">
    <div class="auto-container">
        <h3 class="title"><?php echo e($title ?? ''); ?></h3>
        <?php if(!empty($list_item)): ?>
            <ul class="accordion-box item-list">
            <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="accordion block <?php echo e(($k == 0) ? 'active-block' : ''); ?>">
                    <div class="acc-btn <?php echo e(($k == 0) ? 'active' : ''); ?>"> <?php echo e($item['title']); ?> <span class="icon flaticon-add"></span></div>
                    <div class="acc-content <?php echo e(($k == 0) ? 'current' : ''); ?>">
                        <div class="content">
                            <?php echo clean($item['sub_title'],'html5-definitions'); ?>

                        </div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Template/Views/frontend/blocks/faq-list.blade.php ENDPATH**/ ?>