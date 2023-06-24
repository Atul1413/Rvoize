

<?php $__env->startSection('content'); ?>
    <div class="upper-title-box">
        <h3><?php echo e(__("Applied Jobs")); ?></h3>
        <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
    </div>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4><?php echo e(__("My Applied Jobs")); ?></h4>


                        <div class="chosen-outer">

                            <form method="get" class="default-form form-inline" action="<?php echo e(route('user.applied_jobs')); ?>">
                                <!--Tabs Box-->
                                <div class="form-group mb-2 mb-md-0 mr-1">
                                    <select class="form-control" name="status">
                                        <option value=""><?php echo e(__("All Status")); ?></option>
                                        <option value="pending" <?php if(request()->get('status') == 'pending'): ?> selected <?php endif; ?>><?php echo e(__("Pending")); ?></option>
                                        <option value="approved" <?php if(request()->get('status') == 'approved'): ?> selected <?php endif; ?>><?php echo e(__("Approved")); ?></option>
                                        <option value="rejected" <?php if(request()->get('status') == 'rejected'): ?> selected <?php endif; ?>><?php echo e(__("Rejected")); ?></option>
                                    </select>
                                </div>
                                <div class="form-group mb-0 mr-1">
                                    <input type="text" name="s" placeholder="<?php echo e(__("Search by job name")); ?>" value="<?php echo e(request()->get('s')); ?>" class="form-control">
                                </div>
                                <button type="submit" class="theme-btn btn-style-one"><?php echo e(__("Search")); ?></button>
                            </form>

                            <form method="get" class="default-form form-inline ml-3 d-md-block d-none" action="<?php echo e(route('user.applied_jobs')); ?>">
                                <!--Tabs Box-->
                                <div class="form-group d-inline-flex mb-0 align-items-center" style="flex-wrap: nowrap; min-width: 230px">
                                    <label class="mr-2" style="min-width: 70px"><?php echo e(__("Order By")); ?></label>
                                    <select class="form-control" name="orderby" onchange="this.form.submit()">
                                        <option value="" <?php if(request()->get('orderby') == ''): ?> selected <?php endif; ?> ><?php echo e(__("Default")); ?></option>
                                        <option value="newest" <?php if(request()->get('orderby') == 'newest'): ?> selected <?php endif; ?> ><?php echo e(__("Newest")); ?></option>
                                        <option value="oldest" <?php if(request()->get('orderby') == 'oldest'): ?> selected <?php endif; ?> ><?php echo e(__("Oldest")); ?></option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="widget-content">
                        <div class="table-outer">
                            <table class="default-table manage-job-table">
                                <thead>
                                <tr>
                                    <th><?php echo e(__("Job Title")); ?></th>
                                    <th><?php echo e(__("Date Applied")); ?></th>
                                    <th><?php echo e(__("Status")); ?></th>
                                    <th><?php echo e(__("Action")); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if($rows->count() > 0): ?>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($row->jobInfo): ?>
                                            <tr>
                                                <td>
                                                    <!-- Job Block -->
                                                    <div class="job-block">
                                                        <div class="inner-box">
                                                            <div class="content">
                                                                <?php if($row->jobInfo->company && $company_logo = $row->jobInfo->getThumbnailUrl()): ?>
                                                                    <span class="company-logo">
                                                                        <a href="<?php echo e($row->jobInfo->company->getDetailUrl()); ?>"><img src="<?php echo e($company_logo); ?>" alt="<?php echo e($row->jobInfo->company); ?>"></a>
                                                                    </span>
                                                                <?php endif; ?>
                                                                <h4><a href="<?php echo e($row->jobInfo->getDetailUrl()); ?>"><?php echo e($row->jobInfo->title); ?></a></h4>
                                                                <ul class="job-info">
                                                                    <?php if($row->jobInfo->category): ?>
                                                                        <?php $cat_translation = $row->jobInfo->category->translateOrOrigin(app()->getLocale()) ?>
                                                                        <li><span class="icon flaticon-briefcase"></span> <?php echo e($cat_translation->name); ?></li>
                                                                    <?php endif; ?>
                                                                    <?php if($row->jobInfo->location): ?>
                                                                        <?php $location_translation = $row->jobInfo->location->translateOrOrigin(app()->getLocale()) ?>
                                                                        <li><span class="icon flaticon-map-locator"></span> <?php echo e($location_translation->name); ?></li>
                                                                    <?php endif; ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo e(display_date($row->created_at)); ?></td>
                                                <td><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></td>
                                                <td>
                                                    <div class="option-box">
                                                        <ul class="option-list">
                                                            <li><a href="<?php echo e($row->jobInfo->getDetailUrl()); ?>" data-text="View Job"><span class="la la-eye"></span></a></li>
                                                            <?php if($row->status == 'pending'): ?>
                                                                <li><a href="<?php echo e(route('user.myApplied.delete', ['id' => $row->id])); ?>" data-confirm="<?php echo e(__("Do you want to delete?")); ?>" data-text="Delete Application" class="bc-delete-item"><span class="la la-trash"></span></a></li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr><td colspan="4" class="text-center"><?php echo e(__("No Items")); ?></td></tr>
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

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\rvoize\modules/Candidate/Views/frontend/layouts/user/applied-jobs.blade.php ENDPATH**/ ?>