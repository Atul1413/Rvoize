
<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('dist/frontend/module/order/css/checkout.css?_v='.config('app.asset_version'))); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1><?php echo e(__('Checkout')); ?></h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li><?php echo e(__('Checkout')); ?></li>
                </ul>
            </div>
        </div>
    </section>
    <div class="checkout-page" id="bravo-checkout-page" v-cloak>
        <div class="auto-container">
            <?php if(\Modules\Order\Helpers\CartManager::count()): ?>
            <div class="row">
                <div class="column col-lg-8 col-md-12 col-sm-12">
                    <?php echo $__env->make('Order::frontend.checkout.billing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="column col-lg-4 col-md-12 col-sm-12">
                    <?php echo $__env->make('Order::frontend.checkout.review', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="payment-box">
                        <div class="payment-options">
                            <?php echo $__env->make('Order::frontend.checkout.payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <hr>
                            <?php
                                $term_conditions = setting_item('booking_term_conditions');
                            ?>

                            <div class="form-group">
                                <label class="term-conditions-checkbox">
                                    <input type="checkbox" name="term_conditions"> <?php echo e(__('I have read and accept the')); ?>  <a target="_blank" href="<?php echo e(get_page_url($term_conditions)); ?>"><?php echo e(__('terms and conditions')); ?></a>
                                </label>
                            </div>
                            <?php if(setting_item("booking_enable_recaptcha")): ?>
                                <div class="form-group">
                                    <?php echo e(recaptcha_field('booking')); ?>

                                </div>
                            <?php endif; ?>
                            <div class="html_before_actions"></div>

                            <p class="alert mt10" v-show=" message.content" v-html="message.content" :class="{'alert-danger':!message.type,'alert-success':message.type}"></p>

                            <div class="form-actions btn-box">
                                <button class="theme-btn btn-style-one btn-block" @click="doCheckout"><?php echo e(__('Place Order')); ?>

                                    <i class="fa fa-spin fa-spinner" v-show="onSubmit"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <div class="alert alert-warning"><?php echo e(__("Your cart is empty!")); ?></div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('module/order/js/checkout.js')); ?>"></script>
    <script type="text/javascript">

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("Layout::app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Order/Views/frontend/checkout/index.blade.php ENDPATH**/ ?>