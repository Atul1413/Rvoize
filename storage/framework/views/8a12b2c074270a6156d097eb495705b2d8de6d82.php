<div class="checkout-form" data-select2-id="6">
    <h3 class="title"><?php echo e(__('Billing Details')); ?></h3>
    <div class="default-form" data-select2-id="5">
        <div class="row">
            <!--Form Group-->
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                <div class="field-label"><?php echo e(__('First name')); ?> <span class="text-danger">*</span></div>
                <input type="text" name="first_name" value="<?php echo e(old('first_name',$user->billing_first_name ? $user->billing_first_name : $user->first_name)); ?>" placeholder="">
            </div>

            <!--Form Group-->
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                <div class="field-label"><?php echo e(__('Last name')); ?> <span class="text-danger">*</span></div>
                <input type="text" name="last_name" value="<?php echo e(old('last_name',$user->billing_last_name ? $user->billing_last_name : $user->last_name)); ?>" placeholder="">
            </div>
            <div class="col-sm-6 mb-4 form-group">
                <label class="form-label">
                    <?php echo e(__("Phone")); ?> <span class="text-danger">*</span>
                </label>
                <input type="email" placeholder="<?php echo e(__("Your Phone")); ?>"  value="<?php echo e($user->phone ?? ''); ?>" name="phone">
            </div>
            <div class="col-sm-6 mb-4 form-group">
                <label class="form-label">
                    <?php echo e(__("Country")); ?>  <span class="text-danger">*</span>
                </label>
                <select name="country" >
                    <option value=""><?php echo e(__('-- Select --')); ?></option>
                    <?php $__currentLoopData = get_country_lists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if(($user->country ?? '') == $id): ?> selected <?php endif; ?> value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-sm-6 mb-4 form-group">
                <label class="form-label">
                    <?php echo e(__("State/Province/Region")); ?>

                </label>
                <input type="text"  value="<?php echo e($user->state ?? ''); ?>" name="state" placeholder="<?php echo e(__("State/Province/Region")); ?>">
            </div>
            <div class="col-sm-6 mb-4 form-group">
                <label class="form-label">
                    <?php echo e(__("City")); ?>

                </label>
                <input type="text"  value="<?php echo e($user->city ?? ''); ?>" name="city" placeholder="<?php echo e(__("Your City")); ?>">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <div class="field-label"><?php echo e(__("Street address")); ?> <span class="text-danger">*</span></div>
                <input type="text" value="<?php echo e($user->address ?? ''); ?>" name="address" placeholder="<?php echo e(__('House number and street name')); ?>">
                <input type="text" value="<?php echo e($user->address2 ?? ''); ?>" name="address_line_2" placeholder="<?php echo e(__('Apartment,suite,unit etc. (optional)')); ?>">
            </div>
            <div class="col-sm-6 mb-4 form-group">
                <label class="form-label">
                    <?php echo e(__("ZIP code/Postal code")); ?>  <span class="text-danger">*</span>
                </label>
                <input type="text"  value="<?php echo e($user->zip_code ?? ''); ?>" name="zip_code" placeholder="<?php echo e(__("ZIP code/Postal code")); ?>">
            </div>
            <div class="w-100"></div>
        </div>
    </div>
</div>
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Order/Views/frontend/checkout/billing.blade.php ENDPATH**/ ?>