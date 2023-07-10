
<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/news/css/news.css?_ver='.config('app.version'))); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dist/frontend/css/app.css?_ver='.config('app.version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/daterange/daterangepicker.css")); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css")); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/fotorama/fotorama.css")); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo-news">
        <?php echo $__env->make('Template::frontend.blocks.box-hero',[
            'title' => setting_item_with_lang('news_page_list_title'),
            'sub_title' => setting_item_with_lang('news_page_list_sub_title')
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="sidebar-page-container">
            <div class="auto-container">
                <div class="row">
                    <div class="content-side col-lg-8 col-md-12 col-sm-12">
                        <div class="blog-grid">
                            <div class="row">
                                <?php if($rows->count() > 0): ?>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="news-block col-lg-6 col-md-6 col-sm-12">
                                        <?php echo $__env->make('News::frontend.layouts.details.news-loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="alert alert-danger">
                                        <?php echo e(__("Sorry, but nothing matched your search terms. Please try again with some different keywords.")); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php echo e($rows->appends(request()->query())->links('vendor.pagination.news-pagination')); ?>

                    </div>
                    <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                        <?php echo $__env->make('News::frontend.layouts.details.news-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/rvoize.com/public_html/modules/News/Views/frontend/index.blade.php ENDPATH**/ ?>