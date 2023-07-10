<!-- Preloader -->
<div class="preloader"></div>
<!-- Main Header-->
<header class="main-header">
    <div class="container-fluid">
        <!-- Main box -->

    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo">
            <a href="<?php echo e(home_url()); ?>">
                <?php if($logo_id = setting_item("logo_id")): ?>
                    <?php $logo = get_file_url($logo_id,'full') ?>
                    <img src="<?php echo e($logo); ?>" alt="<?php echo e(setting_item("site_title")); ?>">
                <?php else: ?>
                    <img src="<?php echo e(asset('/images/logo.svg')); ?>" alt="logo">
                <?php endif; ?>
            </a>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>
</header>
<!--End Main Header -->
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Layout/auth/header.blade.php ENDPATH**/ ?>