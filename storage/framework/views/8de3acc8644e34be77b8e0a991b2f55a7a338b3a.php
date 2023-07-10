
<?php $__env->startSection('title','My Contact'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
            <h1 class="title-bar"><?php echo e(__("My Contact")); ?></h1>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">

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
                                        <th> <?php echo e(__('Name')); ?></th>
                                        <th> <?php echo e(__('Email')); ?></th>
                                        <th><?php echo e(__('Message')); ?></th>
                                        <th><?php echo e(__('Time Sent')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($rows->total() > 0): ?>
                                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td> <?php echo e($row->name); ?></td>
                                                <td> <?php echo e($row->email); ?></td>
                                                <td> <?php echo e($row->message); ?></td>
                                                <td> <?php echo e(display_date($row->created_at)); ?></td>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Candidate/Views/admin/candidate/my-contact.blade.php ENDPATH**/ ?>