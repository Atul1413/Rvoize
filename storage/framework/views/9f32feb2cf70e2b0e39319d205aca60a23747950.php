<div class="job-block-outer">
    <div class="job-block-seven">
        <div class="inner-box">
            <div>
                <h4><?php echo clean($translation->title); ?></h4>
                <ul class="job-info">
                    <?php if($row->cat): ?>
                        <?php $cat_translation = $row->cat->translateOrOrigin(app()->getLocale()); ?>
                        <li><span class="icon flaticon-briefcase"></span> <?php echo e($cat_translation->name); ?></li>
                    <?php endif; ?>
                    <?php if($row->cat2): ?>
                        <?php $cat_translation = $row->cat2->translateOrOrigin(app()->getLocale()); ?>
                        <li><span class="icon flaticon-briefcase"></span> <?php echo e($cat_translation->name); ?></li>
                    <?php endif; ?>
                    <?php if($row->cat3): ?>
                        <?php $cat_translation = $row->cat3->translateOrOrigin(app()->getLocale()); ?>
                        <li><span class="icon flaticon-briefcase"></span> <?php echo e($cat_translation->name); ?></li>
                    <?php endif; ?>
                </ul>
                <?php
                $reviewData = $row->getScoreReview();
                $score_total = $reviewData['score_total'];
                ?>
                <div class="service-review review-<?php echo e($score_total); ?>">
                    <div class="d-inline-flex align-items-center">
                        <div class="list-star">
                            <ul class="item-rating-stars">
                                <li><i class="far fa-star"></i></li>
                                <li><i class="far fa-star"></i></li>
                                <li><i class="far fa-star"></i></li>
                                <li><i class="far fa-star"></i></li>
                                <li><i class="far fa-star"></i></li>
                            </ul>
                            <div class="item-rating-stars-active" style="width: <?php echo e($score_total * 2 * 10 ?? 0); ?>%">
                                <ul class="item-rating-stars">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <span class="text-secondary">
                            <?php if($reviewData['total_review'] > 1): ?>
                                <?php echo e(__(":number Reviews",["number"=>$reviewData['total_review'] ])); ?>

                            <?php else: ?>
                                <?php echo e(__(":number Review",["number"=>$reviewData['total_review'] ])); ?>

                            <?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($row->getGallery()): ?>
    <div class="g-gallery">
        <div class="fotorama" data-width="100%" data-thumbwidth="90" data-thumbheight="90" data-thumbmargin="15" data-nav="thumbs" data-allowfullscreen="true">
            <?php $__currentLoopData = $row->getGallery(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($item['large']); ?>" data-thumb="<?php echo e($item['thumb']); ?>" data-alt="<?php echo e(__("Gallery")); ?>"></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<div class="overview mb-4">
    <h4 class="mb-4"><?php echo e(__("About This Gig")); ?></h4>
    <p>
        <?php echo $translation->content ?>
    </p>
</div>
<?php echo $__env->make('Gig::frontend.layouts.details.profile-card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Gig::frontend.layouts.details.compare-packages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(!empty($row->video_url)): ?>
    <div class="video-outer">
        <h4><?php echo e(__("Gig Video")); ?></h4>
        <div class="video-box">
            <figure class="image">
                <a href="<?php echo e($row->video_url); ?>" class="play-now" data-fancybox="gallery" data-caption="">
                    <?php echo get_image_tag($row->image_id,'full',['alt'=>$row->title]); ?>

                    <i class="icon flaticon-play-button-3" aria-hidden="true"></i>
                </a>
            </figure>
        </div>
    </div>
<?php endif; ?>

<?php echo $__env->make('Gig::frontend.layouts.details.faqs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="other-options">
    <div class="social-share">
        <h5><?php echo e(__("Share this job")); ?></h5>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i> <?php echo e(__("Facebook")); ?></a>
        <a href="https://twitter.com/share?url=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" class="twitter"><i class="fab fa-twitter"></i> <?php echo e(__("Twitter")); ?></a>
        <a href="http://pinterest.com/pin/create/button/?url=<?php echo e($row->getDetailUrl()); ?>&description=<?php echo e($translation->title); ?>" target="_blank" class="google"><i class="fab fa-pinterest"></i> <?php echo e(__("Pinterest")); ?></a>
    </div>
</div>
<?php echo $__env->make('Review::frontend.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Gig::frontend.layouts.details.related', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Gig/Views/frontend/layouts/details/detail.blade.php ENDPATH**/ ?>