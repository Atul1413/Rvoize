<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
<div class="company-block-three company-bookmark-item">
    <div class="inner-box">
        <div class="content">
            <div class="content-inner">
                <span class="company-logo">
                    <?php if($image_tag = get_image_tag($row->avatar_id,'full',['alt'=>$translation->title, 'class'=>'img-fluid mb-4 rounded-xs w-100'])): ?>
                        <?php echo $image_tag; ?>

                    <?php endif; ?>
                </span>
                <h4><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo clean($translation->name); ?></a></h4>
                <ul class="job-info">
                    <?php if($row->location): ?>
                        <?php $location_translation = $row->location->translateOrOrigin(app()->getLocale()); ?>
                        <li><span class="icon flaticon-map-locator"></span> <?php echo e($location_translation->name); ?></li>
                    <?php endif; ?>
                    <?php $category = $row->category; ?>
                    <?php if(!empty($category)): ?>
                        <?php $t = $category->translateOrOrigin(app()->getLocale()); ?>
                        <li><span class="icon flaticon-briefcase"></span> <?php echo e($t->name ?? ''); ?></li>
                    <?php endif; ?>
                </ul>
            </div>
            <ul class="job-other-info">
                <?php if($row->is_featured): ?>
                    <li class="privacy"><?php echo e(__("Featured")); ?></li>
                <?php endif; ?>
                <li class="time"><?php echo e(__("Open Jobs – :count",["count"=> number_format($row->job_count)])); ?></li>
            </ul>
        </div>
        <a href="#" data-text="Remove" data-confirm="<?php echo e(__("Do you want to remove?")); ?>" data-id="<?php echo e($wishlist->id); ?>" class="remove-wishlist bookmark-btn" ><span class="la la-trash"></span></a>
    </div>
</div>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Company/Views/frontend/layouts/loop/company-item-bookmark.blade.php ENDPATH**/ ?>