

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-9">
            <div class="upper-title-box">
                <h3><?php echo e(__("Manage Jobs")); ?></h3>
                <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
            </div>
        </div>
        <div class="col-md-3 text-right">
            <a class="theme-btn btn-style-one" href="<?php echo e(route('user.create.job')); ?>"><?php echo e(__("Add new job")); ?></a>
        </div>
    </div>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4><?php echo e(__("Manage Jobs")); ?></h4>

                        <div class="chosen-outer">
                            <form method="get" class="default-form form-inline" action="<?php echo e(route('user.manage.jobs')); ?>">
                                <!--Tabs Box-->
                                <div class="form-group mb-0 mr-2">
                                    <input type="text" name="s" value="<?php echo e(request()->input('s')); ?>" placeholder="<?php echo e(__('Search by name')); ?>" class="form-control">
                                </div>
                                <button type="submit" class="theme-btn btn-style-one"><?php echo e(__("Search")); ?></button>
                            </form>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="table-outer">
                            <table class="default-table manage-job-table">
                                <thead>
                                <tr>
                                    <th><?php echo e(__("Title")); ?></th>
                                    <th width="200px"><?php echo e(__('Location')); ?></th>
                                    <th width="150px"><?php echo e(__('Category')); ?></th>
                                    <th width="100px"><?php echo e(__('Status')); ?></th>
                                    <th width="100px"><?php echo e(__('Date')); ?></th>
                                    <?php if(setting_item('job_need_approve')): ?>
                                        <th width="100px"> <?php echo e(__('Approved')); ?></th>
                                    <?php endif; ?>
                                    <th width="100px"></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if($rows->total() > 0): ?>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="<?php echo e($row->status); ?>">
                                            <td class="title">
                                                <a href="<?php echo e(route('user.edit.job', ['id' => $row->id])); ?>"><?php echo e($row->title); ?></a>
                                            </td>
                                            <td><?php echo e($row->location->name ?? ''); ?></td>
                                            <td><?php echo e($row->category->name ?? ''); ?></td>
                                            <td><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></td>
                                            <td><?php echo e(display_date($row->updated_at)); ?></td>
                                            <?php if(setting_item('job_need_approve')): ?>
                                            <td> <?php if($row->is_approved == 'approved'): ?> 
                                                <span class="badge badge-success"> <?php echo e(__('Approved')); ?> </span>
                                                <?php elseif($row->is_approved == 'draft'): ?>
                                                <span class="badge badge-secondary"> <?php echo e(__('Draft')); ?> </span>
                                                <?php elseif($row->is_approved == 'waiting'): ?>
                                                <span class="badge badge-warning"> <?php echo e(__('Waiting for Approval')); ?> </span>
                                                <?php endif; ?>
                                            </td>
                                        <?php endif; ?>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <li><a href="<?php echo e($row->getDetailUrl()); ?>" target="_blank" data-text="<?php echo e(__("View Job")); ?>" ><span class="la la-eye"></span></a></li>
                                                        <li><a href="<?php echo e(route('user.edit.job', ['id' => $row->id])); ?>" data-text="<?php echo e(__("Edit Job")); ?>"><span class="la la-pencil"></span></a></li>
                                                        <li><a href="<?php echo e(route('user.delete.job', ['id' => $row->id])); ?>" data-text="<?php echo e(__("Delete Job")); ?>" class="bc-delete-item" data-confirm="<?php echo e(__("Do you want to delete?")); ?>"><span class="la la-trash"></span></a></li>
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

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Job/Views/frontend/layouts/manage-job/manage-jobs.blade.php ENDPATH**/ ?>