
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Company name")); ?></label>
                <input type="text" required value="<?php echo e(old('name',$translation->name)); ?>" name="name" placeholder="<?php echo e(__("Company name")); ?>" class="form-control">
            </div>
        </div>
        <?php if(is_default_lang()): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__('E-mail')); ?></label>
                <input type="email" required value="<?php echo e(old('email',$row->email)); ?>" placeholder="<?php echo e(__('Email')); ?>" name="email" class="form-control"  >
            </div>
        </div>
        <?php endif; ?>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__('Phone Number')); ?></label>
                <input type="text" value="<?php echo e(old('phone',$row->phone)); ?>" placeholder="<?php echo e(__('Phone')); ?>" name="phone" class="form-control" required   >
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Website")); ?></label>
                <input type="text" value="<?php echo e(old('website',$row->website)); ?>" name="website" placeholder="<?php echo e(__("Website")); ?>" class="form-control">
            </div>
        </div>
        <?php if(is_default_lang()): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__('Est. Since')); ?></label>
                <input type="text" value="<?php echo e(old('founded_in',$row->founded_in ? date("Y/m/d",strtotime($row->founded_in)) :'')); ?>" placeholder="<?php echo e(__('Est. Since')); ?>" name="founded_in" class="form-control has-datepicker input-group date">
            </div>
        </div>
        <?php endif; ?>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__('Address')); ?></label>
                <input type="text" value="<?php echo e(old('address',$row->address)); ?>" placeholder="<?php echo e(__('Address')); ?>" name="address" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("City")); ?></label>
                <input type="text" value="<?php echo e(old('city',$row->city)); ?>" name="city" placeholder="<?php echo e(__("City")); ?>" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("State")); ?></label>
                <input type="text" value="<?php echo e(old('state',$row->state)); ?>" name="state" placeholder="<?php echo e(__("State")); ?>" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class=""><?php echo e(__("Country")); ?></label>
                <select name="country" class="form-control" id="country-sms-testing">
                    <option value=""><?php echo e(__('-- Select --')); ?></option>
                    <?php $__currentLoopData = get_country_lists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($row->country==$id): ?> selected <?php endif; ?> value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Zip Code")); ?></label>
                <input type="text" value="<?php echo e(old('zip_code',$row->zip_code)); ?>" name="zip_code" placeholder="<?php echo e(__("Zip Code")); ?>" class="form-control">
            </div>
        </div>
        <?php if(is_default_lang()): ?>
        <div class="col-md-6">
            <div class="form-group">
                <input <?php if($row->allow_search): ?> checked <?php endif; ?> type="checkbox" name="allow_search" value="1" class="form-control">
                <label><?php echo e(__("Allow In Search & Listing")); ?></label>
            </div>
        </div>
        <?php endif; ?>
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label"><?php echo e(__('About Company')); ?></label>
                <div class="">
                    <textarea name="about" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e(old('about',$translation->about)); ?></textarea>
                </div>
            </div>
        </div>
    </div>



<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Company/Views/admin/company/form.blade.php ENDPATH**/ ?>