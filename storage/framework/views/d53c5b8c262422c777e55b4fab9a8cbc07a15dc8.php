<div class="bravo-contact-block">
    <div class="iframe_map map-section">
        <?php echo ( setting_item("page_contact_iframe_google_map")); ?>

    </div>
    <div class="contact-section">
        <div class="auto-container">
            <div class="upper-box">
                <div class="row">
                    <?php if(!empty($contact_lists = setting_item("page_contact_lists"))): ?>
                        <?php  $contact_lists = json_decode($contact_lists,true) ?>
                        <?php $__currentLoopData = $contact_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="contact-block col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <span class="icon"><img src="<?php echo e(get_file_url($item['icon'])); ?>" alt="<?php echo e($item['title']); ?>"></span>
                                    <h4><?php echo e($item['title']); ?></h4>
                                    <p><?php echo clean($item['desc']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="contact-form default-form">
                <h3><?php echo e(__('Leave A Message')); ?></h3>
                <form method="post" action="<?php echo e(route("contact.store")); ?>"  class="bravo-contact-block-form">
                    <?php echo e(csrf_field()); ?>

                    <div style="display: none;">
                        <input type="hidden" name="g-recaptcha-response" value="">
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <div class="response"></div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label><?php echo e(__('Your Name')); ?></label>
                            <input type="text" name="name" class="username" placeholder="<?php echo e(__('Your Name')); ?>*" required>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label><?php echo e(__('Your Email')); ?></label>
                            <input type="email" name="email" class="email" placeholder="<?php echo e(__('Your Email')); ?>*" required>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <label><?php echo e(__('Subject')); ?></label>
                            <input type="text" name="subject" class="subject" placeholder="<?php echo e(__('Subject')); ?> *" required>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <label><?php echo e(__('Your Message')); ?></label>
                            <div class="js-form-message">
                                <div class="input-group">
                                    <textarea name="message" placeholder="<?php echo e(__('Write your message...')); ?>" required=""></textarea>
                                </div>
                            </div>
                        </div>
                        <?php if(setting_item("recaptcha_enable")): ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <?php echo e(recaptcha_field('contact')); ?>

                                <span class="invalid-feedback error error-recaptcha"></span>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group m-0">
                            <button type="submit" class="theme-btn btn-style-one">
                                <?php echo e(__("Send Message")); ?>

                                <i class="fa fa-spinner fa-pulse fa-fw"></i>
                            </button>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <div class="form-mess"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="call-to-action style-two">
        <div class="auto-container">
            <div class="outer-box">
                <div class="content-column">
                    <div class="sec-title">
                        <h2><?php echo e(setting_item('contact_call_to_action_title')); ?></h2>
                        <div class="text"><?php echo clean(setting_item('contact_call_to_action_sub_title')); ?></div>
                        <a href="<?php echo e(setting_item('contact_call_to_action_button_link')); ?>" class="theme-btn btn-style-one bg-blue"><span class="btn-title"><?php echo e(setting_item('contact_call_to_action_button_text')); ?></span></a>
                    </div>
                </div>

                <div class="image-column" style="background-image: url(<?php echo e(get_file_url(setting_item('contact_call_to_action_image'),'full')); ?>);"></div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Contact/Views/frontend/blocks/contact/index.blade.php ENDPATH**/ ?>