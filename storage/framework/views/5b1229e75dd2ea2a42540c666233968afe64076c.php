
<?php $__env->startSection('title','My Applied'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
            <h1 class="title-bar"><?php echo e(__("Applied Jobs")); ?></h1>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                <form method="get" action="<?php echo e(route('candidate.admin.myApplied')); ?> " class="filter-form filter-form-right d-flex flex-column flex-sm-row" role="search">
                    <select class="form-control w-auto" name="status">
                        <option value=""><?php echo e(__("All Status")); ?></option>
                        <option value="pending" <?php if(request()->get('status') == 'pending'): ?> selected <?php endif; ?>><?php echo e(__("Pending")); ?></option>
                        <option value="approved" <?php if(request()->get('status') == 'approved'): ?> selected <?php endif; ?>><?php echo e(__("Approved")); ?></option>
                        <option value="rejected" <?php if(request()->get('status') == 'rejected'): ?> selected <?php endif; ?>><?php echo e(__("Rejected")); ?></option>
                    </select>
                    <input type="text" name="s" value="<?php echo e(request()->get('s')); ?>" placeholder="<?php echo e(__('Search by job name')); ?>" class="form-control">
                    <button class="btn-info btn btn-icon btn_search" type="submit"><?php echo e(__('Search')); ?></button>
                </form>
            </div>
            <div class="col-left">
                <form method="get" action="<?php echo e(request()->fullUrl()); ?> ">
                    <div class="form-group form-inline">
                        <label class="mr-2"><?php echo e(__("Order By")); ?></label>
                        <select class="form-control" name="orderby" onchange="this.form.submit()">
                            <option value=""><?php echo e(__("Default")); ?></option>
                            <option value="newest" <?php if(request()->get('orderby') == 'newest'): ?> selected <?php endif; ?>><?php echo e(__("Newest")); ?></option>
                            <option value="oldest" <?php if(request()->get('orderby') == 'oldest'): ?> selected <?php endif; ?>><?php echo e(__("Oldest")); ?></option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-right">
            <p><i><?php echo e(__('Found :total items',['total'=>$rows->total()])); ?></i></p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                                <table class="table table-hover table-vertical-middle">
                                    <thead>
                                    <tr>
                                        <th class="title" style="min-width: 200px"> <?php echo e(__('Job Title')); ?></th>
                                        <th class="title" style="min-width: 100px"> <?php echo e(__('Date Applied')); ?></th>
                                        <th width="100px"><?php echo e(__('Status')); ?></th>
                                        <th width="100px" style="min-width: 100px"><?php echo e(__("Actions")); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($rows->total() > 0): ?>
                                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="vertical">
                                                    <?php if($row->jobInfo): ?>
                                                        <a href="<?php echo e($row->jobInfo->getDetailUrl()); ?>" target="_blank">
                                                            <img src="<?php echo e($row->jobInfo->getThumbnailUrl()); ?>" class="company-logo" />
                                                            <?php echo e($row->jobInfo->title); ?>

                                                        </a>
                                                    <?php else: ?>
                                                        <?php echo e(__('[Deleted]')); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td> <?php echo e(display_date($row->created_at)); ?></td>
                                                <td>
                                                    <span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span>
                                                </td>
                                                <td>
                                                    <?php if($row->status == 'pending'): ?>
                                                        <a href="<?php echo e(route('candidate.admin.myApplied.delete', ['id' => $row->id])); ?>" data-confirm="<?php echo e(__("Do you want to delete?")); ?>" title="<?php echo e(__("Delete")); ?>" class="btn btn-danger btn-square-sm mr-1 bc-delete-item"><i class="ion-md-close"></i></a>
                                                    <?php endif; ?>
                                                    <?php if($row->jobInfo): ?>
                                                        <a href="<?php echo e($row->jobInfo->getDetailUrl() ?? ''); ?>" title="<?php echo e(__("View")); ?>" target="_blank" class="btn btn-primary btn-square-sm"><i class="ion-md-eye"></i></a>
                                                    <?php else: ?>
                                                        <?php echo e(__('[Deleted]')); ?>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center"><?php echo e(__("No data")); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <?php echo e($rows->appends(request()->query())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Candidate/Views/admin/candidate/my-applied.blade.php ENDPATH**/ ?>