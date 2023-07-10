<ul >
    <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <div class="radio-option radio-box">
                <input type="radio" name="payment_gateway" value="<?php echo e($k); ?>" id="payment-<?php echo e($k); ?>" >
                <label for="payment-<?php echo e($k); ?>">
                    <?php if($logo = $gateway->getDisplayLogo()): ?>
                        <img src="<?php echo e($logo); ?>" alt="<?php echo e($gateway->getDisplayName()); ?>">
                    <?php endif; ?>
                    <?php echo e($gateway->getDisplayName()); ?>

                </label>
                <div class="gateway_html">
                    <?php echo $gateway->getDisplayHtml(); ?>

                </div>
            </div>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Order/Views/frontend/checkout/payment.blade.php ENDPATH**/ ?>