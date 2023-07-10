
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="upper-title-box">
        <?php if(is_employer()): ?>
            <h3><?php echo e(__("Shortlisted Resumes")); ?></h3>
        <?php else: ?>
            <h3><?php echo e(__("Shortlisted Jobs")); ?></h3>
        <?php endif; ?>
        <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
    </div>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <?php if(is_employer()): ?>
                            <h3><?php echo e(__("Shortlist Resumes")); ?></h3>
                        <?php else: ?>
                            <h4><?php echo e(__("My Favorite Jobs")); ?></h4>
                        <?php endif; ?>

                        <div class="chosen-outer">
                            <form method="get" class="default-form form-inline" action="">
                                <div class="form-group mb-0 mr-1">
                                    <input type="text" name="s" placeholder="<?php echo e(__("Search...")); ?>" value="<?php echo e(request()->get('s')); ?>" class="form-control">
                                </div>
                                <button type="submit" class="theme-btn btn-style-one"><?php echo e(__("Search")); ?></button>
                            </form>
                        </div>
                    </div>

                    <div class="widget-content">
                        <?php if(is_employer()): ?>

                            <?php if($rows->total() > 0): ?>
                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $id = $row->id;
                                    $row = $row->service;
                                    $translation = $row->translateOrOrigin(app()->getLocale());
                                    $view_profile = (!empty($hide_profile)) ? 0 : 1;
                                    ?>
                                    <div class="candidate-block-three">
                                        <div class="inner-box">
                                            <div class="content">
                                                <figure class="image">
                                                    <img src="<?php echo e($row->user->getAvatarUrl()); ?>" alt="<?php echo e($row->user->getDisplayName()); ?>">
                                                </figure>
                                                <h4 class="name"><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($row->user->getDisplayName()); ?></a></h4>
                                                <ul class="candidate-info">
                                                    <?php if($row->title): ?>
                                                        <li class="designation"><?php echo e($row->title); ?></li>
                                                    <?php endif; ?>
                                                    <?php if($row->city): ?>
                                                        <li><span class="icon flaticon-map-locator"></span> <?php echo e($row->city); ?></li>
                                                    <?php endif; ?>
                                                    <?php if($row->expected_salary): ?>
                                                        <li><span class="icon flaticon-money"></span> <?php echo e($row->expected_salary); ?> <?php echo e(currency_symbol()); ?>  / <?php echo e($row->salary_type); ?></li>
                                                    <?php endif; ?>
                                                </ul>
                                                <ul class="post-tags">
                                                    <?php if(!empty($row->categories)): ?>
                                                        <?php $__currentLoopData = $row->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $t = $oneCategory->translateOrOrigin(app()->getLocale()); ?>
                                                            <li><a href="<?php echo e(route('candidate.index', ['category' => $oneCategory->id])); ?>"><?php echo e($t->name); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <div class="option-box">
                                                <button class="delete-btn remove-wishlist" data-confirm="<?php echo e(__("Do you want to remove?")); ?>" data-id="<?php echo e($id); ?>" data-text="<?php echo e(__("Remove Candidate")); ?>"><span class="la la-trash"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="ls-pagination">
                                    <?php echo e($rows->appends(request()->query())->links()); ?>

                                </div>
                            <?php else: ?>
                                <h4 class="text-center mb-5"><?php echo e(__("No items")); ?></h4>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="table-outer">
                                <table class="default-table manage-job-table">
                                    <thead>
                                    <tr>
                                        <th><?php echo e(__("Job Title")); ?></th>
                                        <th><?php echo e(__("Posted Date")); ?></th>
                                        <th><?php echo e(__("Action")); ?></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php if($rows->total() > 0): ?>
                                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="wishlist-item">
                                                <td>
                                                    <?php echo $__env->make('Job::frontend.layouts.loop.job-item-bookmark',['row'=>$row->service], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </td>
                                                <td><?php echo e(display_date($row->service->create_date)); ?></td>
                                                <td>
                                                    <div class="option-box">
                                                        <ul class="option-list">
                                                            <li><a href="#" data-text="Remove" data-confirm="<?php echo e(__("Do you want to remove?")); ?>" data-id="<?php echo e($row->id); ?>" class="remove-wishlist" ><span class="la la-trash"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3" class="text-center"><?php echo e(__("No items")); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="ls-pagination mt-0">
                                <?php echo e($rows->appends(request()->query())->links()); ?>

                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/rvoize.com/public_html/modules/User/Views/frontend/wishList/index.blade.php ENDPATH**/ ?>