<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="<?php echo e($html_class ?? ''); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php event(new \Modules\Layout\Events\LayoutBeginHead()); ?>
    <?php
        $favicon = setting_item('site_favicon');
    ?>
    <?php if($favicon): ?>
        <?php
            $file = (new \Modules\Media\Models\MediaFile())->findById($favicon);
        ?>
        <?php if(!empty($file)): ?>
            <link rel="icon" type="<?php echo e($file['file_type']); ?>" href="<?php echo e(asset('uploads/'.$file['file_path'])); ?>" />
        <?php else: ?>:
        <link rel="icon" type="image/png" href="<?php echo e(url('images/favicon.png')); ?>" />
        <?php endif; ?>
    <?php endif; ?>

    <?php echo $__env->make('Layout::parts.seo-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        :root{
            --main-color:<?php echo e(setting_item('style_main_color','#1967D2')); ?>

        }
    </style>
<!-- Stylesheets -->
    <link href="<?php echo e(asset('module/superio/css/font.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('module/superio/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('module/superio/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('module/superio/css/responsive.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dist/frontend/css/app.css')); ?>" rel="stylesheet">

    <?php echo \App\Helpers\Assets::css(); ?>

    <?php echo \App\Helpers\Assets::js(); ?>

    <script>
        var superio = {
            url:'<?php echo e(url( app_get_locale() )); ?>',
            url_root:'<?php echo e(url('')); ?>',
            booking_decimals:<?php echo e((int)get_current_currency('currency_no_decimal',2)); ?>,
            thousand_separator:'<?php echo e(get_current_currency('currency_thousand')); ?>',
            decimal_separator:'<?php echo e(get_current_currency('currency_decimal')); ?>',
            currency_position:'<?php echo e(get_current_currency('currency_format')); ?>',
            currency_symbol:'<?php echo e(currency_symbol()); ?>',
            currency_rate:'<?php echo e(get_current_currency('rate',1)); ?>',
            date_format:'<?php echo e(get_moment_date_format()); ?>',
            map_provider:'<?php echo e(setting_item('map_provider')); ?>',
            map_gmap_key:'<?php echo e(setting_item('map_gmap_key')); ?>',
            routes:{
                login:'<?php echo e(route('auth.login')); ?>',
                register:'<?php echo e(route('auth.register')); ?>',
                checkout:'<?php echo e(is_api() ? route('api.booking.doCheckout') : route('booking.doCheckout')); ?>'
            },
            module:{
                job:'',
            },
            currentUser: <?php echo e((int)Auth::id()); ?>,
            isAdmin : <?php echo e(is_admin() ? 1 : 0); ?>,
            rtl: <?php echo e(setting_item_with_lang('enable_rtl') ? "1" : "0"); ?>,
            markAsRead:'<?php echo e(route('core.notification.markAsRead')); ?>',
            markAllAsRead:'<?php echo e(route('core.notification.markAllAsRead')); ?>',
            loadNotify : '<?php echo e(route('core.notification.loadNotify')); ?>',
            pusher_api_key : '<?php echo e(setting_item("pusher_api_key")); ?>',
            pusher_cluster : '<?php echo e(setting_item("pusher_cluster")); ?>',
        };
        var i18n = {
            warning:"<?php echo e(__("Warning")); ?>",
            success:"<?php echo e(__("Success")); ?>",
        };
        var daterangepickerLocale = {
            "applyLabel": "<?php echo e(__('Apply')); ?>",
            "cancelLabel": "<?php echo e(__('Cancel')); ?>",
            "fromLabel": "<?php echo e(__('From')); ?>",
            "toLabel": "<?php echo e(__('To')); ?>",
            "customRangeLabel": "<?php echo e(__('Custom')); ?>",
            "weekLabel": "<?php echo e(__('W')); ?>",
            "first_day_of_week": <?php echo e(setting_item("site_first_day_of_the_weekin_calendar","1")); ?>,
            "daysOfWeek": [
                "<?php echo e(__('Su')); ?>",
                "<?php echo e(__('Mo')); ?>",
                "<?php echo e(__('Tu')); ?>",
                "<?php echo e(__('We')); ?>",
                "<?php echo e(__('Th')); ?>",
                "<?php echo e(__('Fr')); ?>",
                "<?php echo e(__('Sa')); ?>"
            ],
            "monthNames": [
                "<?php echo e(__('January')); ?>",
                "<?php echo e(__('February')); ?>",
                "<?php echo e(__('March')); ?>",
                "<?php echo e(__('April')); ?>",
                "<?php echo e(__('May')); ?>",
                "<?php echo e(__('June')); ?>",
                "<?php echo e(__('July')); ?>",
                "<?php echo e(__('August')); ?>",
                "<?php echo e(__('September')); ?>",
                "<?php echo e(__('October')); ?>",
                "<?php echo e(__('November')); ?>",
                "<?php echo e(__('December')); ?>"
            ],
        };
    </script>
    <!-- Styles -->
    <?php echo $__env->yieldContent('head'); ?>
    <?php if(setting_item_with_lang('enable_rtl')): ?>
        <link href="<?php echo e(asset('dist/frontend/css/rtl.css')); ?>" rel="stylesheet">
    <?php endif; ?>
    <?php echo setting_item('head_scripts'); ?>

    <?php echo setting_item_with_lang_raw('head_scripts'); ?>


    <?php event(new \Modules\Layout\Events\LayoutEndHead()); ?>

</head>
<body class="frontend-page <?php echo e($body_class ?? ''); ?> <?php if(!empty($is_home) or !empty($header_transparent)): ?> header_transparent <?php endif; ?> <?php if(setting_item_with_lang('enable_rtl')): ?> is-rtl <?php endif; ?> <?php if(is_api()): ?> is_api <?php endif; ?>">
<?php event(new \Modules\Layout\Events\LayoutBeginBody()); ?>

<?php echo setting_item('body_scripts'); ?>

<?php echo setting_item_with_lang_raw('body_scripts'); ?>

<div class="bravo_wrap page-wrapper">
    <?php echo $__env->make('Layout::auth.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>
</div>
<script src="<?php echo e(asset('libs/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('module/superio/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('module/superio/js/chosen.min.js')); ?>"></script>
<script src="<?php echo e(asset('module/superio/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('module/superio/js/jquery.fancybox.js')); ?>"></script>
<script src="<?php echo e(asset('module/superio/js/jquery.modal.min.js')); ?>"></script>
<script src="<?php echo e(asset('module/superio/js/mmenu.polyfills.js')); ?>"></script>
<script src="<?php echo e(asset('module/superio/js/mmenu.js')); ?>"></script>
<script src="<?php echo e(asset('module/superio/js/appear.js')); ?>"></script>
<script src="<?php echo e(asset('module/superio/js/owl.js')); ?>"></script>
<script src="<?php echo e(asset('module/superio/js/wow.js')); ?>"></script>
<script src="<?php echo e(asset('module/superio/js/script.js')); ?>"></script>
<script src="<?php echo e(asset('js/home.js?_ver='.config('app.asset_version'))); ?>"></script>

<?php echo setting_item('footer_scripts'); ?>

<?php echo setting_item_with_lang_raw('footer_scripts'); ?>

<?php event(new \Modules\Layout\Events\LayoutEndBody()); ?>
<?php \App\Helpers\ReCaptchaEngine::scripts() ?>

</body>
</html>
<?php /**PATH E:\xampp\htdocs\rvoize\modules/Layout/auth/app.blade.php ENDPATH**/ ?>