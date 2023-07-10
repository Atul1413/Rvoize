
<div class="sidebar-widget contact-widget">
    <h4 class="widget-title"><?php echo e(__('Contact Us')); ?></h4>
    <div class="widget-content">
        <!-- Comment Form -->
        <div class="default-form">
            <!--Comment Form-->
            <form method="post" action="<?php echo e(route("company.contact.store")); ?>"  class="bravo-contact-block-form">
                <input type="hidden" name="origin_id" value="<?php echo e($origin_id); ?>">
                <input type="hidden" name="contact_to" value="company">
                <?php if(!empty($job_id)): ?>
                    <input type="hidden" name="object_id" value="<?php echo e($job_id); ?>">
                    <input type="hidden" name="object_model" value="job">
                <?php endif; ?>
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
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Job/Views/frontend/layouts/details/contact.blade.php ENDPATH**/ ?>