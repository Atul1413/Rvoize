<!-- Job Detail Section -->
<section class="job-detail-section">

    <!-- Upper Box -->
    <div class="upper-box">
        <div class="auto-container">
            <!-- Job Block -->
            <div class="job-block-seven">
                <div class="inner-box">
                    <?php echo $__env->make("Job::frontend.layouts.details.upper-box", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make("Job::frontend.layouts.details.apply-button", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="job-detail-outer">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-8 col-md-12 col-sm-12">

                    <div class="job-detail">
                        <?php echo @clean($translation->content); ?>

                    </div>

                    <?php echo $__env->make("Job::frontend.layouts.details.gallery", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make("Job::frontend.layouts.details.video", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make("Job::frontend.layouts.details.social-share", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make("Job::frontend.layouts.details.related", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>

                <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar">
                        <div class="sidebar-widget">

                            <?php echo $__env->make("Job::frontend.layouts.details.overview", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php if($row->map_lat && $row->map_lng): ?>
                                <h4 class="widget-title"><?php echo e(__("Job Location")); ?></h4>
                                <div class="widget-content">
                                    <?php echo $__env->make("Job::frontend.layouts.details.location", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>

                            <?php echo $__env->make("Job::frontend.layouts.details.skills", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </div>

                        <?php echo $__env->make("Job::frontend.layouts.details.company", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Job Detail Section -->
<?php /**PATH C:\wamp64\www\rvoize\modules/Job/Views/frontend/layouts/detail-ver/job-single-v1.blade.php ENDPATH**/ ?>