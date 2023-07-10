<?php $translation = $row->translateOrOrigin(app()->getLocale());
    $user = \Modules\User\Models\User::find($row->create_user);
?>
<div class="auto-container">
    <div class="upper-box">
        <h3><?php echo e($translation->title); ?></h3>
        <ul class="post-info">
            <li>
                <?php if(!empty($user)): ?>
                    <span class="thumb">
                        <img src="<?php echo e($user->getAvatarUrl()); ?>" alt="<?php echo e($user->getDisplayName() ?? ''); ?>">
                    </span>
                <?php endif; ?>
                <?php echo e($user->getDisplayName()); ?>

            </li>
            <li><?php echo e(display_date($row->updated_at)); ?></li>
        </ul>
    </div>
</div>
<div class="main-image">
    <?php echo get_image_tag($row->banner_id,'full',['alt' => $translation->title]); ?>

</div>
<div class="auto-container">
    <div class="blog-content">
        <p class="mb-0 text-lh-lg">
            <?php echo $translation->content; ?>

        </p>

        <div class="other-options">
            <div class="social-share">
                <h5><?php echo e(__('Share this post')); ?></h5>
                <a class="facebook share-item" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" original-title="<?php echo e(__("Facebook")); ?>"><i class="fab fa-facebook-f"></i><?php echo e(__('Facebook')); ?></a>
                <a class="twitter share-item" href="https://twitter.com/share?url=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" original-title="<?php echo e(__("Twitter")); ?>"><i class="fab fa-twitter"></i> <?php echo e(__('Twitter')); ?></a>
                <a class="google share-item" href="https://plus.google.com/share?url=<?php echo e($row->getDetailUrl()); ?>" target="_blank" original-title="<?php echo e(__("Google+")); ?>"><i class="fab fa-google"></i> <?php echo e(__("Google+")); ?></a>
            </div>

            <div class="tags">
                <?php if($row->getTags()): ?>
                    <?php $__currentLoopData = $row->getTags(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($tag->getDetailUrl()); ?>"><?php echo e($tag->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>

        <?php if(!empty($near_post)): ?>
            <div class="post-control d-block overflow-hidden">
                <?php $__currentLoopData = $near_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $translation = $post->translateOrOrigin(app()->getLocale()); ?>
                    <?php if($post->id < $row->id): ?>
                        <div class="prev-post float-left">
                            <span class="icon flaticon-back"></span>
                            <span class="title"><?php echo e(__('Previous Post')); ?></span>
                            <h5><a href="<?php echo e($post->getDetailUrl()); ?>"><?php echo e($translation->title ?? ''); ?></a></h5>
                        </div>
                    <?php endif; ?>

                    <?php if($post->id > $row->id): ?>
                        <div class="next-post float-right">
                            <span class="icon flaticon-next"></span>
                            <span class="title"><?php echo e(__('Next Post')); ?></span>
                            <h5><a href="<?php echo e($post->getDetailUrl()); ?>"><?php echo e($translation->title ?? ''); ?></a></h5>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        
        <?php if(setting_item('news_enable_review')): ?>
            <?php $review_score = $row->review_data ?>
            <div id="reviews" class="blog-reviews">
                <?php echo $__env->make('Review::frontend.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\wamp64\www\rvoize\modules/News/Views/frontend/layouts/details/news-detail.blade.php ENDPATH**/ ?>