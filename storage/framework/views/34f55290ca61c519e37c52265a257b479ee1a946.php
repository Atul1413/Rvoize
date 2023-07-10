<section class="page-title <?php echo e((!empty($bg_class)) ? $bg_class : ''); ?>" style="background-color: <?php echo e($bg_color ?? ''); ?>">
    <div class="auto-container">
        <div class="title-outer">
            <h1><?php echo e($title); ?></h1>
            <ul class="page-breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li><?php echo e($sub_title); ?></li>
            </ul>
        </div>
    </div>
</section>
<?php /**PATH C:\wamp64\www\rvoize\modules/Template/Views/frontend/blocks/box-hero.blade.php ENDPATH**/ ?>