<div class="job-detail">
    <h4><?php echo e(__('Candidates About')); ?></h4>
<?php echo clean($row->user->bio); ?>

<!-- Resume / Education -->

    <?php if(!empty($row->education)): ?>
        <div class="resume-outer">
            <div class="upper-title">
                <h4><?php echo e(__('Education')); ?></h4>
            </div>
            <div class="my_resume_eduarea">
                <?php $__currentLoopData = $row->education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="resume-block">
                        <div class="inner">
                            <span class="name"><?php echo e(@$oneData['location'][0]); ?></span>
                            <div class="title-box">
                                <div class="info-box">
                                    <h3><?php echo e(@$oneData['reward']); ?></h3>
                                    <span><?php echo e(@$oneData['location']); ?></span>
                                </div>
                                <div class="edit-box">
                                    <span class="year"><?php echo e(@$oneData['from']); ?> - <?php echo e(@$oneData['to']); ?></span>
                                </div>
                            </div>
                            <div class="text"><?php echo nl2br(strip_tags(@$oneData['information'])); ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty($row->experience)): ?>
    <!-- Resume / Work & Experience -->
        <div class="resume-outer theme-blue">
            <div class="upper-title">
                <h4><?php echo e(__('Work & Experience')); ?></h4>
            </div>
            <?php $__currentLoopData = $row->experience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="resume-block">
                    <div class="inner">
                        <span class="name"><?php echo e(@$oneData['location'][0]); ?></span>
                        <div class="title-box">
                            <div class="info-box">
                                <h3><?php echo e(@$oneData['position']); ?></h3>
                                <span><?php echo e(@$oneData['location']); ?></span>
                            </div>
                            <div class="edit-box">
                                <span class="year"><?php echo e(@$oneData['from']); ?> - <?php echo e(@$oneData['to']); ?></span>
                            </div>
                        </div>
                        <div class="text"><?php echo nl2br(strip_tags(@$oneData['information'])); ?></div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <?php if($row->getGallery()): ?>
    <!-- Portfolio -->
        <div class="portfolio-outer">
            <div class="row">
                <?php $__currentLoopData = $row->getGallery(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <figure class="image">
                            <a href="<?php echo e($item['large']); ?>" class="lightbox-image"><img src="<?php echo e($item['thumb']); ?>" alt=""></a>
                            <span class="icon flaticon-plus"></span>
                        </figure>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty($row->award)): ?>
    <!-- Resume / Awards -->
        <div class="resume-outer theme-yellow">
            <div class="upper-title">
                <h4><?php echo e(__('Awards')); ?></h4>
            </div>
            <?php $__currentLoopData = $row->award; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="resume-block">
                    <div class="inner">
                        <span class="name"></span>
                        <div class="title-box">
                            <div class="info-box">
                                <h3><?php echo e(@$oneData['reward']); ?></h3>
                                <span></span>
                            </div>
                            <div class="edit-box">
                                <span class="year"><?php echo e(@$oneData['from']); ?> - <?php echo e(@$oneData['to']); ?></span>
                            </div>
                        </div>
                        <div class="text"><?php echo nl2br(strip_tags(@$oneData['information'])); ?></div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <?php if($row->video): ?>
    <!-- Video Box -->
        <div class="video-outer">
            <h4><?php echo e(__('Candidates About')); ?></h4>
            <div class="video-box">
                <figure class="image">
                    <a href="<?php echo e($row->video); ?>" class="play-now" data-fancybox="gallery" data-caption="">
                        <?php if($row->video_cover_id): ?>
                            <img src="<?php echo e(get_file_url($row->video_cover_id, 'full')); ?>" alt="">
                        <?php else: ?>
                            <img src="<?php echo e(asset('images/resource/video-img.jpg')); ?>" alt="">
                        <?php endif; ?>
                        <i class="icon flaticon-play-button-3" aria-hidden="true"></i>
                    </a>
                </figure>
            </div>
        </div>
    <?php endif; ?>
</div>



<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Candidate/Views/frontend/layouts/details/candidate-detail.blade.php ENDPATH**/ ?>