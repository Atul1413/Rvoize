<div class="" style="">
    <div class="b-container">
        <div class="b-header">
            <?php $email_header = setting_item_with_lang('email_header') ?>
            <?php echo $email_header ? $email_header : sprintf('<h1 class="site-title">%s</h1>',setting_item('site_title','Superio')); ?>

        </div>
    </div>
</div>
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Email/Views/parts/header.blade.php ENDPATH**/ ?>