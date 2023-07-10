<?php $translation = $row->translateOrOrigin(app()->getLocale()); ?>
<div class="map-box">
    <div class="map-listing-item">
        <div class="inner-box">
            <div class="infoBox-close"><i class="fa fa-times"></i></div>
            <div class="image-box">
                <a class="image" href="<?php echo e($row->getDetailUrl()); ?>"><img src="<?php echo e(get_file_url($row->avatar_id) ?? asset('images/avatar.png')); ?>" alt="<?php echo e($translation->name); ?>"></a>
            </div>
            <div class="content">
                <h3><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($translation->name); ?></a></h3>
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
        </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\rvoize\modules/Company/Views/frontend/layouts/elements/map-infobox.blade.php ENDPATH**/ ?>