<?php $translation = $row->translateOrOrigin(app()->getLocale()); ?>
    <div class="inner-box">
        <div class="image-box">
            <div class="image">
                <?php if($image_tag = get_image_tag($row->image_id,'full',['alt'=>$translation->title,'class'=>'img-fluid rounded-xs w-100'])): ?>
                    <a class="d-block" href="<?php echo e($row->getDetailUrl()); ?>">
                        <?php echo $image_tag; ?>

                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="lower-content">
            <ul class="post-meta">
                <li><a href="#"><?php echo e(display_date($row->updated_at)); ?></a></li>
            </ul>
            <h3>
                <a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($translation->title); ?></a>
            </h3>
            <p class="text-lh-lg mb-3">
                <?php echo get_exceprt($translation->content,80,'...'); ?>

            </p>
            <a href="<?php echo e($row->getDetailUrl()); ?>" class="read-more"><?php echo e(__('Read More')); ?> <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/News/Views/frontend/layouts/details/news-loop.blade.php ENDPATH**/ ?>