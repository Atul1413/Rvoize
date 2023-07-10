
<!-- Job Block -->
<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
<div class="job-block">
    <div class="inner-box">
        <div class="content">
            <span class="company-logo">
                <?php if($row->company && $company_logo = $row->getThumbnailUrl()): ?>
                    <span class="company-logo">
                        <a href="<?php echo e($row->company->getDetailUrl()); ?>"><img src="<?php echo e($company_logo); ?>" alt="<?php echo e($row->company ? $row->company->name : 'company'); ?>"></a>
                    </span>
                <?php endif; ?>
            </span>
            <h4><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($translation->title); ?></a></h4>
            <ul class="job-info">
                <?php if($row->category): ?>
                    <?php $cat_translation = $row->category->translateOrOrigin(app()->getLocale()) ?>
                    <li><span class="icon flaticon-briefcase"></span> <?php echo e($cat_translation->name); ?></li>
                <?php endif; ?>
                <?php if($row->location): ?>
                    <?php $location_translation = $row->location->translateOrOrigin(app()->getLocale()) ?>
                    <li><span class="icon flaticon-map-locator"></span> <?php echo e($location_translation->name); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Job/Views/frontend/layouts/loop/job-item-bookmark.blade.php ENDPATH**/ ?>