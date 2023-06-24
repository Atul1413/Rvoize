
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="upper-title-box">
        <h3><?php echo e(__("My Current Plan")); ?></h3>
        <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
    </div>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">

        <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item">
                <div class="left">
                    <i class="icon flaticon-briefcase"></i>
                </div>
                <div class="right">
                    <h4>
                        <?php if(is_employer()): ?>
                            <?php if($user->company): ?> <?php echo e($user->company->jobs()->count('id')); ?> <?php endif; ?>
                        <?php else: ?>
                            <?php echo e($user->gigs()->count('id')); ?>

                        <?php endif; ?>
                    </h4>
                    <p><?php echo e(__("Total posted")); ?></p>
                </div>
            </div>
        </div>
        <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item ui-green">
                <div class="left">
                    <i class="icon la la-bookmark-o"></i>
                </div>
                <div class="right">
                    <h4>
                        <?php if(is_employer()): ?>
                            <?php if($user->company): ?> <?php echo e($user->company->jobsPublish()->count('id')); ?> <?php endif; ?>
                        <?php else: ?>
                            <?php echo e($user->gigsPublish()->count('id')); ?>

                        <?php endif; ?>
                    </h4>
                    <p><?php echo e(__("Total published")); ?></p>
                </div>
            </div>
        </div>
        <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item ui-yellow">
                <div class="left">
                    <i class="icon la la-comment-o"></i>
                </div>
                <div class="right">
                    <h4><?php echo e(auth()->user()->getMaximumPublishItems()); ?></h4>
                    <p><?php echo e(__("Maximum published")); ?></p>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4><?php echo e(__("My Current Plan")); ?></h4>
                    </div>
                    <div class="widget-content">
                        <?php
                            $user_plans = $user->userPlans;
                        ?>
                        <table class="default-table manage-job-table mb-5">
                            <thead>
                            <tr>
                                <th><?php echo e(__("Plan ID")); ?></th>
                                <th><?php echo e(__("Plan Name")); ?></th>
                                <th><?php echo e(__("Expiry")); ?></th>
                                <th><?php echo e(__("Publish Allowed")); ?></th>
                                <th><?php echo e(__("Price")); ?></th>
                                <th><?php echo e(__("Status")); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php if($user_plans && count($user_plans) > 0): ?>
                                <?php $__currentLoopData = $user_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>#<?php echo e($user_plan->plan_id); ?></td>
                                        <td class="trans-id"><?php echo e($user_plan->plan->title ?? ''); ?></td>
                                        <td class="total-jobs"><?php echo e(display_datetime($user_plan->end_date)); ?></td>
                                        <td class="used"><?php if(!$user_plan->max_service): ?> <?php echo e(__("Unlimited")); ?> <?php else: ?> <?php echo e($user_plan->max_service); ?> <?php endif; ?></td>
                                        <td class="remaining"><?php echo e(format_money($user_plan->price)); ?></td>
                                        <td >
                                            <?php if($user_plan->is_valid): ?>
                                                <span class="text-success"><?php echo e(__('Active')); ?></span>
                                            <?php else: ?>
                                                <div class="text-danger mb-3"><?php echo e(__('Expired')); ?></div>
                                                <div>
                                                    <a href="<?php echo e(route('plan')); ?>" class="btn btn-warning"><?php echo e(__('Renew')); ?></a>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <?php echo e(__("No Items")); ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\rvoize\modules/User/Views/frontend/plan/my-plan.blade.php ENDPATH**/ ?>