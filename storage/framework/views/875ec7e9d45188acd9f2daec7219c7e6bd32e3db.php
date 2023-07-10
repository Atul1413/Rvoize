

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-9">
            <div class="upper-title-box">
                <h3><?php echo e(__("All Applicants")); ?></h3>
                <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
            </div>
        </div>
        <div class="col-md-3 text-right">
            <a class="theme-btn btn-style-one" href="<?php echo e(route('user.applicants.create')); ?>"><?php echo e(__("Add new applicant")); ?></a>
        </div>
    </div>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4><?php echo e(__("Applicants")); ?></h4>

                        <div class="chosen-outer">
                            <form method="get" class="default-form form-inline" action="<?php echo e(route('user.applicants')); ?>">
                                <!--Tabs Box-->

                                <a href="<?php echo e(route('user.applicants.export')); ?>" target="_blank" title="<?php echo e(__("Export to excel")); ?>" class="theme-btn btn-style-two mr-1"><?php echo e(__("Export")); ?></a>

                                <div class="chosen-outer frontend-select-2 mr-1">
                                    <?php
                                        $job = \Modules\Job\Models\Job::find(Request()->input('job_id'));
                                        \App\Helpers\AdminForm::select2('job_id', [
                                            'configs' => [
                                                'ajax'        => [
                                                    'url' => route('job.admin.getForSelect2'),
                                                    'dataType' => 'json'
                                                ],
                                                'allowClear'  => true,
                                                'placeholder' => __('-- Select Job --')
                                            ]
                                        ], !empty($job->id) ? [
                                            $job->id,
                                            $job->title . ' (#' . $job->id . ')'
                                        ] : false);
                                    ?>
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
                                    <th><?php echo e(__("Candidate")); ?></th>
                                    <th><?php echo e(__("Job Title")); ?></th>
                                    <th><?php echo e(__("CV")); ?></th>
                                    <th><?php echo e(__("Date Applied")); ?></th>
                                    <th><?php echo e(__("Status")); ?></th>
                                    <th class="text-center"><?php echo e(__("Actions")); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if($rows->total() > 0): ?>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="<?php echo e($row->status); ?> applicant-item">
                                            <td>
                                                <?php if($row->user): ?>
                                                    <a href="<?php echo e($row->candidateInfo->getDetailUrl().'?apply_id='.$row->id); ?>" target="_blank" class="candidate">
                                                        <img src="<?php echo e($row->user->getAvatarUrl()); ?>" style="border-radius: 50%" class="company-logo" />
                                                        <?php echo e(!empty($row->user->getDisplayName()) ? $row->user->getDisplayName() : $row->user->id); ?>

                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td class="title">
                                                <a href="<?php echo e($row->jobInfo->getDetailUrl()); ?>" target="_blank"><?php echo e($row->jobInfo->title); ?></a>
                                            </td>
                                            <td>
                                                <?php if(!empty($row->cvInfo->file_id)): ?>
                                                    <?php $file = (new \Modules\Media\Models\MediaFile())->findById($row->cvInfo->file_id) ?>
                                                    <a href="<?php echo e(\Modules\Media\Helpers\FileHelper::url($row->cvInfo->file_id)); ?>" target="_blank" download>
                                                        <?php echo e($file->file_name.'.'.$file->file_extension); ?>

                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(display_date($row->created_at)); ?></td>
                                            <td><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></td>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <!--<li><a class="dropdown-item" href="<?php echo e(route('candidate.detail', ['slug' => $row->candidateInfo->slug])); ?>" data-text="<?php echo e(__("View Candidate Profile")); ?>"><span class="la la-user"></span></a></li>-->
                                                        <li><a href="#modal-applied-<?php echo e($row->id); ?>" class="bc-call-modal" data-text="<?php echo e(__("View Application")); ?>" ><span class="la la-eye"></span></a></li>
                                                        <li><a href="<?php echo e(route('user.applicants.changeStatus', ['status' => 'approved', 'id' => $row->id])); ?>" data-text="<?php echo e(__("Approve Application")); ?>"><span class="la la-check"></span></a></li>
                                                        <li><a href="<?php echo e(route('user.applicants.changeStatus', ['status' => 'rejected', 'id' => $row->id])); ?>" data-text="<?php echo e(__("Reject Application")); ?>"><span class="la la-times-circle"></span></a></li>
                                                        <li><a href="<?php echo e(route('user.applicants.changeStatus', ['status' => 'delete', 'id' => $row->id])); ?>" data-text="<?php echo e(__("Delete Application")); ?>" class="bc-delete-item" data-confirm="<?php echo e(__("Do you want to delete?")); ?>"><span class="la la-trash"></span></a></li>
                                                    </ul>
                                                </div>

                                                <div class="model bc-model applied-modal" id="modal-applied-<?php echo e($row->id); ?>">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo e(__("Applied Detail")); ?></h4>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="info-form">
                                                                    <div class="applied-list">
                                                                        <div class="applied-item">
                                                                            <div class="label"><?php echo e(__("Candidate:")); ?></div>
                                                                            <div class="val">
                                                                                <?php if(!empty($row->candidateInfo->user->getDisplayName())): ?>
                                                                                    <a href="<?php echo e($row->candidateInfo->getDetailUrl().'?apply_id='.$row->id); ?>" target="_blank" class="candidate">
                                                                                        <img src="<?php echo e($row->candidateInfo->user->getAvatarUrl()); ?>" style="border-radius: 50%" class="company-logo" />
                                                                                        <?php echo e($row->candidateInfo->user->getDisplayName() ?? ''); ?>

                                                                                    </a>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="applied-item">
                                                                            <div class="label"><?php echo e(__('Job Title:')); ?></div>
                                                                            <div class="val">
                                                                                <a href="<?php echo e($row->jobInfo->getDetailUrl()); ?>" target="_blank"><?php echo e($row->jobInfo->title); ?></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="applied-item">
                                                                            <div class="label"><?php echo e(__("CV:")); ?></div>
                                                                            <div class="val">
                                                                                <?php if(!empty($row->cvInfo->file_id)): ?>
                                                                                    <?php $file = (new \Modules\Media\Models\MediaFile())->findById($row->cvInfo->file_id) ?>
                                                                                    <a href="<?php echo e(\Modules\Media\Helpers\FileHelper::url($row->cvInfo->file_id)); ?>" target="_blank" download>
                                                                                        <?php echo e($file->file_name.'.'.$file->file_extension); ?>

                                                                                    </a>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="applied-item">
                                                                            <div class="label"><?php echo e(__("Message:")); ?></div>
                                                                            <div class="val"><?php echo e($row->message); ?></div>
                                                                        </div>
                                                                        <div class="applied-item">
                                                                            <div class="label"><?php echo e(__("Date Applied:")); ?></div>
                                                                            <div class="val"><?php echo e(display_date($row->created_at)); ?></div>
                                                                        </div>
                                                                        <div class="applied-item">
                                                                            <div class="label"><?php echo e(__("Status:")); ?></div>
                                                                            <div class="val"><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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


    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Job/Views/frontend/layouts/manage-job/applicants.blade.php ENDPATH**/ ?>