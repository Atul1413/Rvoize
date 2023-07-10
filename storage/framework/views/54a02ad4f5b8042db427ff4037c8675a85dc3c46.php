<aside class="sidebar">
    <div class="sidebar-widget company-widget">
        <div class="widget-content">
            <ul class="company-info mt-0">
                <?php if($row->category): ?>
                    <?php $t = $row->category->translateOrOrigin(app()->getLocale()); ?>
                    <li><?php echo e(__("Primary industry")); ?>: <span><?php echo e($t->name); ?></span></li>
                <?php endif; ?>
                <?php if($row->companyTerm): ?>
                        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $attribute_trans = $attribute->translateOrOrigin(app()->getLocale()); ?>
                            <?php if(isset($attribute->company_term)): ?>
                            <li><?php echo e($attribute_trans->name); ?>:
                                <div>
                                    <?php $__currentLoopData = $attribute->company_term; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span><?php echo e($term); ?></span></br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if(!empty($row->founded_in)): ?>
                    <li><?php echo e(__("Founded in")); ?>: <span><?php echo e(\Carbon\Carbon::parse($row->founded_in)->year); ?></span></li>
                <?php endif; ?>
                <?php if(!empty($row->phone)): ?>
                    <li><?php echo e(__("Phone")); ?>: <span><?php echo e($row->phone); ?></span></li>
                <?php endif; ?>
                <?php if(!empty($row->email)): ?>
                    <li><?php echo e(__("Email")); ?>: <span><?php echo e($row->email); ?></span></li>
                <?php endif; ?>
                <?php if($row->location): ?>
                        <?php $location =  $row->location->translateOrOrigin(app()->getLocale()) ?>
                    <li><?php echo e(__("Location")); ?>: <span><?php echo e($location->name); ?></span></li>
                <?php endif; ?>
                <?php
                    $Social_media = !empty($row->social_media) ? $row->social_media : [];
                ?>
                <?php if(isset($Social_media['facebook']) || isset($Social_media['instagram']) || isset($Social_media['twitter']) || isset($Social_media['linkedin'])): ?>
                    <li><?php echo e(__("Social media")); ?>:
                        <div class="social-links">
                            <?php if(!empty($Social_media['skype'])): ?>
                                <a href="<?php echo e($Social_media['skype']); ?>"><i class="fab fa-skype"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($Social_media['facebook'])): ?>
                                <a href="<?php echo e($Social_media['facebook']); ?>"><i class="fab fa-facebook-f"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($Social_media['twitter'])): ?>
                                <a href="<?php echo e($Social_media['twitter']); ?>"><i class="fab fa-twitter"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($Social_media['instagram'])): ?>
                                <a href="<?php echo e($Social_media['instagram']); ?>"><i class="fab fa-instagram"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($Social_media['linkedin'])): ?>
                                <a href="<?php echo e($Social_media['linkedin']); ?>"><i class="fab fa-linkedin-in"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($Social_media['google'])): ?>
                                    <a href="<?php echo e($Social_media['google']); ?>"><i class="fab fa-google"></i></a>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
            <?php if(!empty($row->website)): ?>
                <div class="btn-box"><a rel="nofollow" target="_blank" href="<?php echo e($row->website); ?>" class="theme-btn btn-style-three"><?php echo e($row->website); ?></a></div>
            <?php endif; ?>
        </div>
    </div>
    <?php if(!empty($row->map_lat) && !empty($row->map_lng)): ?>
        <div class="sidebar-widget">
            <!-- Map Widget -->
            <h4 class="widget-title"><?php echo e(__("Company Location")); ?></h4>
            <div class="widget-content">
                <div class="map-outer mb-0">
                    <div class="map-canvas" id="map-canvas"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</aside>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Company/Views/frontend/layouts/details/companies-sidebar.blade.php ENDPATH**/ ?>