<?php if(!empty($model_tag)): ?>
<div class="sidebar-widget widget_tag_cloud">
    <div class="sidebar-title"><h4><?php echo e($item->title); ?></h4></div>
    <ul class="tag-list">
        <?php
            $list_tags = \Modules\News\Models\NewsTag::getTags();
        ?>
        <?php if($list_tags): ?>
            <?php $__currentLoopData = $list_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $translation = $tag->translateOrOrigin(app()->getLocale()) ?>
                <li>
                    <a href="<?php echo e($tag->getDetailUrl(app()->getLocale())); ?>" class="tag-cloud-link"><?php echo e($translation->name); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ul>
</div>
<?php endif; ?>
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/News/Views/frontend/layouts/sidebars/tag.blade.php ENDPATH**/ ?>