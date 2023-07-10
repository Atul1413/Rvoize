<div class="sidebar-widget">
    <div class="widget-content">
        <ul class="job-overview">
            <?php if($row->experience_year): ?>
                <li>
                    <i class="icon icon-calendar"></i>
                    <h5><?php echo e(__('Experience')); ?>:</h5>
                    <span><?php echo e($row->experience_year); ?> <?php echo e(__('Years')); ?></span>
                </li>
            <?php endif; ?>
            <?php if(!empty($row->user->birthday)): ?>
                <li>
                    <i class="icon icon-expiry"></i>
                    <h5><?php echo e(__('Birthday')); ?>:</h5>
                    <span><?php echo e(!empty($row->user->birthday) ? display_date($row->user->birthday) : ''); ?></span>
                </li>
            <?php endif; ?>

            <?php if($row->expected_salary): ?>
                <li>
                    <i class="icon icon-salary"></i>
                    <h5><?php echo e(__('Expected Salary')); ?>:</h5>
                    <span><?php echo e($row->expected_salary); ?> <?php echo e(currency_symbol()); ?> / <?php echo e($row->salary_type); ?></span>
                </li>
            <?php endif; ?>

            <?php if($row->gender): ?>
                <li>
                    <i class="icon icon-user-2"></i>
                    <h5><?php echo e(__('Gender')); ?>:</h5>
                    <span><?php echo e($row->gender_text); ?></span>
                </li>
            <?php endif; ?>

            <?php if($row->languages): ?>
                <li>
                    <i class="icon icon-language"></i>
                    <h5><?php echo e(__('Language')); ?>:</h5>
                    <span><?php echo e(str_replace(",", ", ", $row->languages)); ?></span>
                </li>
            <?php endif; ?>

            <?php if($row->education_level): ?>
                <li>
                    <i class="icon icon-degree"></i>
                    <h5><?php echo e(__('Education Level')); ?>:</h5>
                    <span><?php echo e(ucfirst(__($row->education_level))); ?></span>
                </li>
            <?php endif; ?>

        </ul>
    </div>

</div>

<div class="sidebar-widget social-media-widget">
    <h4 class="widget-title"><?php echo e(__('Social media')); ?></h4>
    <div class="widget-content">
        <div class="social-links">
            <?php
            $socialMediaData = @$row->social_media;
            ?>
            <?php if(!empty(@$socialMediaData['facebook'])): ?>
                <a target="_blank" href="<?php echo e($socialMediaData['facebook']); ?>"><i class="fab fa-facebook-f"></i></a>
            <?php endif; ?>
            <?php if(!empty(@$socialMediaData['twitter'])): ?>
                <a target="_blank" href="<?php echo e($socialMediaData['twitter']); ?>"><i class="fab fa-twitter"></i></a>
            <?php endif; ?>
            <?php if(!empty(@$socialMediaData['instagram'])): ?>
                <a target="_blank" href="<?php echo e($socialMediaData['instagram']); ?>"><i class="fab fa-instagram"></i></a>
            <?php endif; ?>
            <?php if(!empty(@$socialMediaData['pinterest'])): ?>
                <a target="_blank" href="<?php echo e($socialMediaData['pinterest']); ?>"><i class="fab fa-pinterest"></i></a>
            <?php endif; ?>
            <?php if(!empty(@$socialMediaData['dribbble'])): ?>
                <a target="_blank" href="<?php echo e($socialMediaData['dribbble']); ?>"><i class="fab fa-dribbble"></i></a>
            <?php endif; ?>
            <?php if(!empty(@$socialMediaData['google'])): ?>
                <a target="_blank" href="<?php echo e($socialMediaData['google']); ?>"><i class="fab fa-google"></i></a>
            <?php endif; ?>
            <?php if(!empty(@$socialMediaData['linkedin'])): ?>
                <a target="_blank" href="<?php echo e($socialMediaData['linkedin']); ?>"><i class="fab fa-linkedin-in"></i></a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if(!empty($row->skills) && count($row->skills) > 0): ?>
    <div class="sidebar-widget">
        <!-- Job Skills -->
        <h4 class="widget-title"><?php echo e(__('Professional Skills')); ?></h4>
        <div class="widget-content">
            <ul class="job-skills">
                <?php $__currentLoopData = $row->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $trans = $skill->translateOrOrigin(app()->getLocale()); ?>
                    <li><a target="_blank" href="<?php echo e(route('candidate.index', ['skill' => $skill->id])); ?>"><?php echo e($trans->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?>

<div class="sidebar-widget contact-widget">
    <h4 class="widget-title"><?php echo e(__('Contact Us')); ?></h4>
    <div class="widget-content">
        <!-- Comment Form -->
        <div class="default-form">
            <!--Comment Form-->
            <form method="post" action="<?php echo e(route("candidate.contact.store")); ?>"  class="bravo-contact-block-form">
                <input type="hidden" name="origin_id" value="<?php echo e($row->id); ?>">
                <?php echo e(csrf_field()); ?>

                <div style="display: none;">
                    <input type="hidden" name="g-recaptcha-response" value="">
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <input type="text" name="name" placeholder="<?php echo e(__('Your Name')); ?>" required>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <input type="email" name="email" placeholder="<?php echo e(__('Email Address')); ?>" required>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <textarea class="darma" name="message" placeholder="<?php echo e(__('Message')); ?>"></textarea>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <?php echo e(recaptcha_field('contact')); ?>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <button class="theme-btn btn-style-one" type="submit" name="submit-form"><?php echo e(__('Send Message')); ?></button>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="form-mess"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\rvoize\modules/Candidate/Views/frontend/layouts/details/candidate-sidebar.blade.php ENDPATH**/ ?>