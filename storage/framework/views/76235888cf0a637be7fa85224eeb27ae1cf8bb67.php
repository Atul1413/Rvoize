
<?php $__env->startSection('title','Candidate'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__("All candidate")); ?></h1>
            <div class="title-actions">
                <a href="<?php echo e(route('user.admin.create', ['candidate_create' => 1])); ?>" class="btn btn-primary"><?php echo e(__("Add new Candidate")); ?></a>
            </div>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                <?php if(!empty($rows)): ?>
                    <form method="post" action="<?php echo e(url('admin/module/candidate/bulkEdit')); ?>"
                          class="filter-form filter-form-left d-flex justify-content-start">
                        <?php echo e(csrf_field()); ?>

                        <select name="action" class="form-control">
                            <option value=""><?php echo e(__(" Bulk Actions ")); ?></option>
                            <option value="delete"><?php echo e(__(" Delete ")); ?></option>
                        </select>
                        <button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button"><?php echo e(__('Apply')); ?></button>
                    </form>
                <?php endif; ?>
            </div>
            <div class="col-left">
                <form method="get" action="<?php echo e(url('/admin/module/candidate/')); ?> " class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <input type="text" name="s" value="<?php echo e(Request()->s); ?>" placeholder="<?php echo e(__('Search by name')); ?>"
                           class="form-control">
                    <select name="cate_id" class="form-control">
                        <option value=""><?php echo e(__('--All Category --')); ?> </option>
                        <?php
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                printf("<option ".(Request()->cate_id == $category->id ? 'selected' : '')." value='%s' >%s</option>", $category->id, $category->name);
                            }
                        }
                        ?>
                    </select>
                    <select name="status" class="form-control">
                        <option value=""><?php echo e(__('-- Status --')); ?> </option>
                        <option <?php if((Request()->status == 'publish')): ?> selected <?php endif; ?> value="publish"> <?php echo e(__('Publish')); ?> </option>
                        <option <?php if((Request()->status == 'blocked')): ?> selected <?php endif; ?> value="blocked"> <?php echo e(__('Blocked')); ?> </option>
                    </select>
                    <select name="allow_search" class="form-control">
                        <option value=""><?php echo e(__('-- Allow Search --')); ?> </option>
                        <option <?php if((Request()->allow_search == 'publish')): ?> selected <?php endif; ?> value="publish"> <?php echo e(__('Publish')); ?> </option>
                        <option <?php if((Request()->allow_search == 'hide')): ?> selected <?php endif; ?> value="hide"> <?php echo e(__('Hide')); ?> </option>
                    </select>
                    <button class="btn-info btn btn-icon btn_search" type="submit"><?php echo e(__('Search Candidate')); ?></button>
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
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="60px"><input type="checkbox" class="check-all"></th>
                                    <th class="title"> <?php echo e(__('Name')); ?></th>
                                    <th class="title"> <?php echo e(__('Current Position')); ?></th>
                                    <th class="title"> <?php echo e(__('Email')); ?></th>
                                    <th class="title"> <?php echo e(__('Phone')); ?></th>
                                    <th width="100px"> <?php echo e(__('Date')); ?></th>
                                    <th width="100px"><?php echo e(__('Status')); ?></th>
                                    <th width="100px"><?php echo e(__('Allow Search')); ?></th>
                                    <th width="100px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($rows->total() > 0): ?>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check-item" name="ids[]" value="<?php echo e($row->id); ?>">
                                            </td>
                                            <td class="title">
                                                <a href="<?php echo e(route('user.admin.detail',['id'=>$row->id])); ?>"><?php echo e($row->getDisplayName()); ?></a>
                                            </td>
                                            <td> <?php echo e($row->candidate->title ?? ''); ?></td>
                                            <td> <?php echo e($row->email); ?></td>
                                            <td> <?php echo e($row->phone); ?></td>
                                            <td> <?php echo e(display_date($row->updated_at)); ?></td>
                                            <td><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></td>
                                            <td><span class="badge badge-<?php echo e(($row->candidate->allow_search ?? '') == 'publish' ? 'active' : 'warning'); ?>"><?php echo e(($row->candidate->allow_search ?? '') == 'publish' ? __('Publish') : __('Hide')); ?></span></td>
                                            <td>
                                                <a href="<?php echo e(route('user.admin.detail',['id'=>$row->id])); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6"><?php echo e(__("No data")); ?></td>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Candidate/Views/admin/candidate/index.blade.php ENDPATH**/ ?>