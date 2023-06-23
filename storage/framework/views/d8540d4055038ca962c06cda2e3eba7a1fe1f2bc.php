

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-9">
            <div class="upper-title-box">
                <h3><?php echo e(__("All Gigs")); ?></h3>
                <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
            </div>
        </div>
        <div class="col-md-3 text-right">
            <a class="theme-btn btn-style-one" href="<?php echo e(route('seller.gig.create')); ?>"><?php echo e(__("Add new gig")); ?></a>
        </div>
    </div>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">

                    <div class="widget-title">
                        <h4><?php echo e(__("All Gigs")); ?></h4>

                        <div class="chosen-outer">
                            <form method="get" class="default-form form-inline" action="<?php echo e(route('seller.all.gigs')); ?>">
                                <div class="form-group mb-0 mr-1">
                                    <input type="text" name="s" placeholder="<?php echo e(__("Search by name,...")); ?>" value="<?php echo e(request()->get('s')); ?>" class="form-control">
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
                                    <th style="width: 20%"><?php echo e(__("Name")); ?></th>
                                    <th><?php echo e(__("Price")); ?></th>
                                    <th><?php echo e(__("Category")); ?></th>
                                    <th><?php echo e(__("Status")); ?></th>
                                    <th><?php echo e(__("Reviews")); ?></th>
                                    <th><?php echo e(__("Date")); ?></th>
                                    <th style="width: 100px;"><?php echo e(__("Action")); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if($rows->count() > 0): ?>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><a href="<?php echo e(route('seller.gig.edit', ['id' => $row->id])); ?>"><?php echo e($row->title); ?></a></td>
                                            <td><?php echo e(format_money($row->basic_price)); ?></td>
                                            <td>
                                                <?php echo e($row->cat->name ?? ''); ?><br>
                                                 - <?php echo e($row->cat2->name ?? ''); ?><br>
                                                  -- <?php echo e($row->cat3->name ?? ''); ?>

                                            </td>
                                            <td><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></td>
                                            <td>
                                                <span class="review-count-approved">
                                                    <?php echo e($row->getNumberReviewsInService()); ?>

                                                </span>
                                            </td>
                                            <td><?php echo e(display_date($row->updated_at)); ?></td>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <li><a href="<?php echo e(route('seller.gig.edit', ['id' => $row->id])); ?>" data-text="Edit" ><span class="la la-pencil-alt"></span></a></li>
                                                        <li>
                                                            <form method="post" action="<?php echo e(route('seller.gig.delete')); ?>">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="hidden" name="gig_id" value="<?php echo e($row->id); ?>" />
                                                                <button type="submit" data-text="Delete" class="bc-btn-delete bc-delete-item" data-confirm="<?php echo e(__("Do you want to delete?")); ?>" ><span class="la la-trash"></span></button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr><td colspan="7" class="text-center"><?php echo e(__("No Items")); ?></td></tr>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\rvoize\modules/Gig/Views/frontend/seller/manageGig/index.blade.php ENDPATH**/ ?>