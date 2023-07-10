
<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/gig/css/gig.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css")); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1><?php echo e($page_title); ?></h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo e(home_url()); ?>"><?php echo e(__("Home")); ?></a></li>
                    <li><?php echo e(__("Gigs")); ?></li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <div class="gig_category_level1">
        <div class="auto-container">
            <div class="mt-5">
                <div class="ls-outer mb-4">
                    <?php echo $__env->make('Gig::frontend.search.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php if($rows->isNotEmpty()): ?>
                        <div class="row mb-5">
                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                                    <?php echo $__env->make('Gig::frontend.search.loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="ls-pagination">
                            <?php echo e($rows->appends(request()->query())->links()); ?>

                        </div>
                    <?php else: ?>
                        <div class="gig-results-not-found text-center pt-5 pb-5">
                            <h3><?php echo e(__("No gig results found")); ?></h3>
                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('module/gig/js/gig.js?_ver='.config('app.version'))); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Gig/Views/frontend/search.blade.php ENDPATH**/ ?>