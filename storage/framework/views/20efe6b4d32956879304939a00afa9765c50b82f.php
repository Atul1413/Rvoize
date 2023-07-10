<div class="form-group">
    <label><?php echo e(__("Name")); ?></label>
    <input type="text" value="<?php echo e($translation->name); ?>" placeholder="<?php echo e(__("Attribute name")); ?>" name="name" class="form-control">
</div>
<?php if(is_default_lang()): ?>
    <div class="form-group">
        <label><?php echo e(__("Position Order")); ?></label>
        <input type="number" min="0" value="<?php echo e($row->position); ?>" placeholder="<?php echo e(__("Ex: 1")); ?>" name="position" class="form-control">
        <small>
            <?php echo e(__("The position will be used to order in the Filter page search. The greater number is priority")); ?>

        </small>
    </div>
<?php endif; ?>
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Company/Views/admin/attribute/form.blade.php ENDPATH**/ ?>