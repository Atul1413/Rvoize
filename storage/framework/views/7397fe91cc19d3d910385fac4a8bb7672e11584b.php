<?php if(!empty($packages=$row->packages)): ?>
    <div class="gig-page-packages-table mb-4">
        <h4 class="section-title mb-4"><?php echo e(__("Compare Packages")); ?></h4>
        <div class="table-responsive">
            <table>
                <tbody>
                <tr class="package-type">
                    <th><?php echo e(count($packages) > 1 ? __("Packages") : __("Package")); ?></th>
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
                            <td class="text-center" style="min-width: 150px">
                                <p class="price"><?php echo e(format_money($price)); ?> </p>
                                <b class="type"><?php echo e($item['name'] ?? ""); ?></b>
                                <b class="title"></b>
                            </td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr class="description">
                    <th></th>
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($item['price'])): ?>
                            <td class="text-center">
                                <?php echo e($item['desc'] ?? ""); ?>

                            </td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php if(!empty($package_compare = $row->package_compare) and !empty($package_compare[0]['name'])): ?>
                    <?php $__currentLoopData = $package_compare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2=>$item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($item['price'])): ?>
                            <tr>
                                <th>
                                    <?php echo e($item2['name']); ?>

                                </th>

                                <td>
                                    <?php echo e($item2['content']); ?>

                                </td>
                                <td>
                                    <?php echo e($item2['content1']); ?>

                                </td>
                                <td>
                                    <?php echo e($item2['content2']); ?>

                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <tr>
                    <th>
                        <?php echo e(__('Revisions')); ?>

                    </th>
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($item['price'])): ?>
                            <td>
                                <?php if($item['revision'] == -1): ?>
                                    <?php echo e(__("Unlimited")); ?>

                                <?php else: ?>
                                    <?php echo e(__(":number Revisions",['number'=>$item['revision'] ?? ""])); ?>

                                <?php endif; ?>
                            </td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr class="delivery-time">
                    <th><?php echo e(__("Delivery Time")); ?></th>
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($item['price'])): ?>
                            <td>
                                <?php echo e(__(":number Day Delivery",['number'=>$item['delivery_time'] ?? ""])); ?>

                            </td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>

<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Gig/Views/frontend/layouts/details/compare-packages.blade.php ENDPATH**/ ?>