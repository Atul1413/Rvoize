
<?php $__env->startSection('content'); ?>
    <div class="order-confirmation">
        <div class="auto-container">
            <div class="upper-box">
                <?php switch($row->status):
                    case ('completed'): ?>
                        <span class="icon fa fa-check"></span>
                    <?php break; ?>
                    <?php default: ?>
                        <span class="icon fa fa-info"></span>
                    <?php break; ?>
                <?php endswitch; ?>

                <h4>
                    <?php switch($row->status):
                        case ('completed'): ?>
                            <?php echo e(__('Your order is completed!')); ?>

                        <?php break; ?>
                        <?php default: ?>
                        <?php echo e(__('Your order detail')); ?>

                        <?php break; ?>
                    <?php endswitch; ?>
                </h4>
                <div class="text">
                    <?php switch($row->status):
                        case ('completed'): ?>
                        <?php echo e(__('Thank you. Your order has been received.')); ?>

                        <?php break; ?>
                        <?php default: ?>
                        <?php echo e(__('Here is your order detail')); ?>

                        <?php break; ?>
                    <?php endswitch; ?>
                </div>
            </div>
            <ul class="order-info">
                <li>
                    <span><?php echo e(__('Order Number')); ?></span>
                    <strong>#<?php echo e($row->id); ?></strong>
                </li>

                <li>
                    <span><?php echo e(__('Date')); ?></span>
                    <strong><?php echo e(display_date($row->created_at)); ?></strong>
                </li>

                <li>
                    <span><?php echo e(__('Total')); ?></span>
                    <strong><?php echo e(format_money($row->total)); ?></strong>
                </li>

                <li>
                    <span><?php echo e(__('Payment Method')); ?></span>
                    <strong><?php echo e($row->gateway_obj ? $row->gateway_obj->getDisplayName() : ''); ?></strong>
                </li>
                <li>
                    <span><?php echo e(__('Status')); ?></span>
                    <strong><?php echo e($row->status_name); ?></strong>
                </li>
            </ul>
            <div class="order-box">
                <h3><?php echo e(__('Order details')); ?></h3>
                <table>
                    <thead>
                    <tr>
                        <th><strong><?php echo e(__('Product')); ?></strong></th>
                        <th width="20%"><strong><?php echo e(__('Subtotal')); ?></strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $row->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $model = $orderItem->model(); ?>
                        <tr class="cart-item">
                            <td class="product-name"><?php echo e($model ? $model->title : $orderItem->name); ?> x<?php echo e($orderItem->qty); ?>


                                <?php if(!empty($orderItem->meta['package'])): ?>
                                    <div class="mt-3"><?php echo e(__('Package: ')); ?> <?php echo e(package_key_to_name($orderItem->meta['package'])); ?> (<?php echo e(format_money($orderItem->price)); ?>)</div>
                                <?php endif; ?>
                                <?php if(!empty($orderItem->meta['extra_prices'])): ?>
                                    <div class="mt-3"><strong><?php echo e(__("Extra Prices:")); ?></strong></div>
                                    <ul class="list-unstyled mt-2">
                                        <?php $__currentLoopData = $orderItem->meta['extra_prices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra_price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($extra_price['name'] ?? ''); ?> : <?php echo e(format_money($extra_price['price'] ?? 0)); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php endif; ?>
                            </td>
                            <td class="product-total"><?php echo e(format_money($orderItem->subtotal)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                    <tfoot>
                    <tr class="order-total">
                        <td><?php echo e(__('Total')); ?></td>
                        <td><span class="amount"><?php echo e(format_money($row->total)); ?></span></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("Layout::app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Order/Views/frontend/detail.blade.php ENDPATH**/ ?>