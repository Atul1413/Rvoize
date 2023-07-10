

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-9">
            <div class="upper-title-box">
                <h3><?php echo e(__("Manage Advertisements")); ?></h3>
                
            </div>
        </div>
        <div class="col-md-3 text-right">
            <a class="theme-btn btn-style-one" href="<?php echo e(route('user.company.advertisement.create.ads')); ?>"><?php echo e(__("Create New Ad")); ?></a>
        </div>
    </div>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php echo e(__('Please make sure if you\'ve updated / upgraded your plan. Update all the advertisements Start and End dates as well if you wish to continue advertising given ads.')); ?>

            </div>
        </div>
        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4><?php echo e(__("Manage Ads")); ?></h4>
                    </div>
                    <div class="widget-content">
                        <div class="table-outer">
                            <table class="default-table manage-job-table">
                                <thead>
                                <tr>
                                    <th width="200px"><?php echo e(__("Title")); ?></th>
                                    <th width="50px"><?php echo e(__('URL')); ?></th>
                                    <th width="100px"><?php echo e(__('Start Date')); ?></th>
                                    <th width="100px"><?php echo e(__('End Date')); ?></th>
                                    <th width="100px"><?php echo e(__('Status')); ?></th>
                                    <th width="100px"> <?php echo e(__('Approved')); ?></th>
                                    <th width="100px"><?php echo e(__('Action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if($rows->total() > 0): ?>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="<?php echo e($row->status); ?>">
                                            <td class="title">
                                                <a href="#"><?php echo e($row->title); ?></a>
                                            </td>
                                            <td>
                                                <?php if(!empty($row->url)): ?>
                                                    <a target="_blank" style="color:blue;text-decoration:underline;" href="<?php echo e($row->url); ?>">URL</a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(display_date($row->start_date) ?? ''); ?></td>
                                            <td><?php echo e(display_date($row->end_date) ?? ''); ?></td>
                                            <td><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></td>
                                            <td> <?php if($row->is_approved): ?> 
                                                <span class="badge badge-success"> <?php echo e(__('Approved')); ?> </span>
                                                <?php else: ?>
                                                <span class="badge badge-danger"> <?php echo e(__('Not-Approved')); ?> </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <li><a href="<?php echo e($row->getEditUrl()); ?>" data-text="<?php echo e(__("Edit Ad")); ?>"><span class="la la-pencil"></span></a></li>
                                                        <li><a href="<?php echo e(route('user.company.advertisement.delete.ads',['id' => $row->id])); ?>" data-text="<?php echo e(__("Delete Ad")); ?>" class="bc-delete-item" data-confirm="<?php echo e(__("Do you want to delete?")); ?>"><span class="la la-trash"></span></a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7"><?php echo e(__("No data")); ?></td>
                                    </tr>
                                <?php endif; ?>

                                </tbody>
                            </table>
                        </div>

                        <div class="ls-pagination">
                            <?php echo e($rows->appends(request()->query())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\rvoize\modules/Advertisement/Views/frontend/layouts/manage-ads/manage-ads.blade.php ENDPATH**/ ?>