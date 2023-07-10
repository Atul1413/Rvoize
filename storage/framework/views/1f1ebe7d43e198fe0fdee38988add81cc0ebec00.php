
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="py-3 px-2">
        <ul class="page-breadcrumb">
            <li><a href="#"><?php echo e(__("Seller Dashboard")); ?></a></li>
            <li><a href="#"><?php echo e(__("Manage Orders")); ?></a></li>
        </ul>
    </div>
    <div class="upper-title-box">
        <h3><?php echo e(__("Manage Orders")); ?></h3>
        <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4><?php echo e(__("Manage Orders")); ?></h4>
                    </div>
                    <div class="widget-content">
                        <div class="mb-4">
                            <div class="default-tabs style-two tabs-box">
                                <ul class="tab-buttons clearfix">
                                    <li class="<?php if(request()->get('status') == \Modules\Gig\Models\GigOrder::INCOMPLETE): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route('seller.orders',['status'=>\Modules\Gig\Models\GigOrder::INCOMPLETE])); ?>"><?php echo e(__("Incomplete")); ?></a></li>
                                    <li class="<?php if(request()->get('status') == \Modules\Gig\Models\GigOrder::IN_PROGRESS): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route('seller.orders',['status'=>\Modules\Gig\Models\GigOrder::IN_PROGRESS])); ?>"><?php echo e(__("In Progress")); ?></a></li>
                                    <li class="<?php if(request()->get('status') == \Modules\Gig\Models\GigOrder::DELIVERED): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route('seller.orders',['status'=>\Modules\Gig\Models\GigOrder::DELIVERED])); ?>"><?php echo e(__("Delivered")); ?></a></li>
                                    <li class="<?php if(request()->get('status') == \Modules\Gig\Models\GigOrder::IN_REVISION): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route('seller.orders',['status'=>\Modules\Gig\Models\GigOrder::IN_REVISION])); ?>"><?php echo e(__("In Revision")); ?></a></li>
                                    <li class="<?php if(request()->get('status') == \Modules\Gig\Models\GigOrder::COMPLETED): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route('seller.orders',['status'=>\Modules\Gig\Models\GigOrder::COMPLETED])); ?>"><?php echo e(__("Completed")); ?></a></li>
                                    <li class="<?php if(request()->get('status') == \Modules\Gig\Models\GigOrder::CANCELLED): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route('seller.orders',['status'=>\Modules\Gig\Models\GigOrder::CANCELLED])); ?>"><?php echo e(__("Cancelled")); ?></a></li>
                                    <li class="<?php if(request()->get('status') == ''): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route('seller.orders')); ?>"><?php echo e(__("All")); ?></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="buyer-order">
                            <div class="table-outer table-responsive">
                                <table class="default-table manage-job-table">
                                    <thead>
                                    <tr>
                                        <th><?php echo e(__('Title')); ?></th>
                                        <th><?php echo e(__('Created')); ?></th>
                                        <th><?php echo e(__("Price")); ?></th>
                                        <th><?php echo e(__("Status")); ?></th>
                                        <th><?php echo e(__('Action')); ?></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php if($rows && count($rows) > 0): ?>
                                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="gig-name">
                                                    <?php if(!empty($row->gig->image_id)): ?>
                                                        <?php echo get_image_tag($row->gig->image_id,'full',['alt'=>$row->gig->title,'class'=>'gig-img img-fluid lazy loaded']); ?>

                                                    <?php endif; ?>
                                                    <a href="<?php echo e($row->gig ? $row->gig->getDetailUrl() : '#'); ?>"><?php echo e($row->gig->title ?? ''); ?></a>
                                                </td>
                                                <td><?php echo e(display_date($row->created_at)); ?></td>
                                                <td><?php echo e(format_money($row->price)); ?></td>
                                                <td>
                                                   <span class=""><?php echo e($row->status_text); ?></span>
                                                </td>
                                                <td class="order-detail"><a href="<?php echo e(route('seller.order',['id'=>$row->id])); ?>" class="btn btn-success"><?php echo e(__("View")); ?></a></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <?php echo e(__("No Items")); ?>

                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                                <div class="ls-pagination">
                                    <?php echo e($rows->appends(request()->query())->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Gig/Views/frontend/seller/order/index.blade.php ENDPATH**/ ?>