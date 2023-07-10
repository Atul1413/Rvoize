<aside class="sidebar">
    <?php if(!empty($packages=$row->packages)): ?>
        <form class="bravo_form_book_gig">
            <input type="hidden" name="gig_id" value="<?php echo e($row->id); ?>">
            <div class="default-tabs style-two tabs-box">
                <ul class="tab-buttons clearfix">
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $price = $row->basic_price;
                            if( $key == 1){
                                $price = $row->standard_price;
                            }
                            if( $key == 2){
                                 $price = $row->premium_price;
                            }
                            $packages[$key]['price'] = $price;
                        ?>
                        <?php if(!empty($price)): ?>
                            <li class="tab-btn <?php if($key == 0): ?> active-btn <?php endif; ?>" data-tab="#tab_price_<?php echo e($key); ?>">
                                <?php echo e(package_key_to_name($item['key'])); ?>

                                <input class="d-none" type="radio" name="package" <?php if($key == 0): ?> checked <?php endif; ?> value="<?php echo e($item['key']); ?>">
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="tabs-content pb-0">
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($item['price'])): ?>
                            <div class="tab fadeIn <?php if($key == 0): ?> active-tab <?php endif; ?>" id="tab_price_<?php echo e($key); ?>">
                                <div class="d-flex justify-content-between align-items-center mb-3 fs-16">
                                    <div><strong><?php echo e(!empty($item['name']) ? $item['name'] : package_key_to_name($item['key'])); ?></strong></div>
                                    <div>
                                        <strong class="fs-18"><?php echo e(format_money($item['price'])); ?></strong>
                                    </div>
                                </div>

                                <div class="mb-3"><?php echo e($item['desc'] ?? ""); ?></div>
                                <div class="include mb-3">
                                    <div class="item fw-500">
                                        <i class="flaticon-clock"></i> <?php echo e(__(":number Day Delivery",['number'=>$item['delivery_time'] ?? ""])); ?>

                                    </div>
                                    <div class="item fw-500">
                                        <i class="flaticon-reload"></i>
                                        <?php if($item['revision'] == -1): ?>
                                            <?php echo e(__("Unlimited")); ?>

                                        <?php else: ?>
                                            <?php echo e(__(":number Revisions",['number'=>$item['revision'] ?? ""])); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php if(!empty($extra_price = $row->extra_price) and !empty($extra_price[0]['price'])): ?>
                    <div class="extra mt-4">
                        <strong>
                            <?php echo e(__("Extra services")); ?>

                        </strong>
                        <div class="checkbox-outer margin-top-10">
                            <ul class="checkboxes square">
                                <?php $__currentLoopData = $extra_price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key3=>$item3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <input id="check-<?php echo e($key3); ?>" type="checkbox" name="extra_services[<?php echo e($key3); ?>][enable]" value="1">
                                        <label class="d-flex justify-content-between" for="check-<?php echo e($key3); ?>">
                                            <div class="name"><?php echo e($item3['name']); ?></div>
                                            <div class="val"><?php echo e(format_money($item3['price'])); ?></div>
                                        </label>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="action text-center mt-4">
                    <div>
                        <button class="btn btn-success w-100 btn-add-cart" type="button">
                            <?php echo e(__("Continue")); ?> <i class="fa fa-spinner fa-spin d-none is_loading" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-default  w-100 compare_packages"  type="button"> <?php echo e(__("Compare Packages")); ?> </button>
                    </div>
                    <div class="msg"></div>
                </div>
            </div>
        </form>
    <?php endif; ?>
</aside>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Gig/Views/frontend/layouts/details/form-book.blade.php ENDPATH**/ ?>