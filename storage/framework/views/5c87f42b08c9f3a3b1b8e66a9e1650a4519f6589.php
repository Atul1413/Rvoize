<div class="bravo-companies job-detail-section">
    <div class="upper-box">
        <div class="auto-container">
            <!-- Job Block -->
            <div class="job-block-seven">
                <div class="inner-box">
                    <div class="content">
                        <span class="company-logo">
                            <?php if($image_tag = get_image_tag($row->avatar_id,'full',['alt'=>$translation->title])): ?>
                                <?php echo $image_tag; ?>

                            <?php endif; ?>
                        </span>
                        <h4><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($translation->name); ?></a></h4>
                        <ul class="job-info">
                            <?php if($row->location): ?>
                                <?php $location =  $row->location->translateOrOrigin(app()->getLocale()) ?>
                                <li><span class="icon flaticon-map-locator"></span> <?php echo e($location->name); ?></li>
                            <?php endif; ?>
                            <?php if($row->category): ?>
                                <?php $t = $row->category->translateOrOrigin(app()->getLocale()); ?>
                                <li><span class="icon flaticon-briefcase"></span> <?php echo e($t->name); ?></li>
                            <?php endif; ?>
                            <?php if(!empty($row->phone)): ?>
                                <li><span class="icon flaticon-telephone-1"></span><?php echo e($row->phone); ?></li>
                            <?php endif; ?>
                            <?php if(!empty($row->email)): ?>
                                <li><span class="icon flaticon-mail"></span><?php echo e($row->email); ?></li>
                            <?php endif; ?>
                        </ul>
                        <?php if($row->job_count > 0): ?>
                            <ul class="job-other-info">
                                <li class="time"><?php echo e(__("Open Jobs – :count",["count"=>number_format($row->job_count)])); ?></li>
                            </ul>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="job-detail-outer">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="job-detail">
                        <h4><?php echo e(__("About Company")); ?></h4>
                        <?php echo $translation->about; ?>

                    </div>
                    <!-- Related Jobs -->
                    <div class="related-jobs">
                        <?php if($row->job_count > 0): ?>
                            <div class="title-box">
                                <h3><?php echo e(__(":count jobs at :title",["count"=>$row->job_count, "title"=> $translation->name])); ?></h3>
                            </div>
                        <?php endif; ?>
                        <?php if($jobs->count() > 0): ?>
                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="job-block">
                                    <?php echo $__env->make('Job::frontend.layouts.loop.job-item-1', ['row' => $job], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <div class="ls-pagination">
                            <?php echo e($jobs->appends(request()->query())->links()); ?>

                            <?php if($jobs->total() > 0): ?>
                                <span class="count-string"><?php echo e(__("Showing :from - :to of :total",["from"=>$jobs->firstItem(),"to"=>$jobs->lastItem(),"total"=>$jobs->total()])); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                    <?php echo $__env->make('Company::frontend.layouts.details.companies-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('Job::frontend.layouts.details.contact',['origin_id'=>$row->owner_id,'job_id'=>false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Company/Views/frontend/layouts/details/ver/company-single-v1.blade.php ENDPATH**/ ?>