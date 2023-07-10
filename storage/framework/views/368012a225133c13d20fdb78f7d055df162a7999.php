

<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(route('user.applicants.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-9">
                <div class="upper-title-box">
                    <h3><?php echo e(__("Create new applicant")); ?></h3>
                    <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
                </div>
            </div>

        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-lg-9">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title"><h4><?php echo e(__("Candidate Info")); ?></h4></div>
                        <div class="widget-content">
                            <div class="form-group">
                                <label><?php echo e(__("Candidate")); ?> <span class="text-danger">*</span></label>
                                <input type="hidden" name="candidate_id" value="">
                                <?php
                                $candidate = !empty($row->candidate_id) ? \Modules\Candidate\Models\Candidate::find($row->candidate_id) : false;
                                \App\Helpers\AdminForm::select2('candidate_id', [
                                    'configs' => [
                                        'ajax' => [
                                            'url' => route('candidate.admin.getForSelect2'),
                                            'dataType' => 'json'
                                        ],
                                        'allowClear' => true,
                                        'placeholder' => __('-- Select Candidate --')
                                    ]
                                ], !empty($candidate->id) ? [
                                    $candidate->id,
                                    $candidate->name . ' (#' . $candidate->id . ')'
                                ] : false)
                                ?>
                            </div>
                            <div class="form-group group-cv" style="display: none;">
                                <label><?php echo e(__("Cv")); ?> <span class="text-danger">*</span></label>
                                <div class="list-cv">
                                    <div class="form-group-item">
                                        <div class="g-items lists_cvs">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title"><h4><?php echo e(__("Job Info")); ?></h4></div>
                        <div class="widget-content">
                            <div class="form-group">
                                <label><?php echo e(__("Select Job")); ?> <span class="text-danger">*</span></label>
                                <input type="hidden" name="job_id" value="">
                                <?php
                                $job = !empty($row->job_id) ? \Modules\Job\Models\Job::find($row->job_id) : false;
                                \App\Helpers\AdminForm::select2('job_id', [
                                    'configs' => [
                                        'ajax' => [
                                            'url' => route('job.admin.getForSelect2').'?expiration_date=1',
                                            'dataType' => 'json'
                                        ],
                                        'allowClear' => true,
                                        'placeholder' => __('-- Select Job --')
                                    ]
                                ], !empty($job->id) ? [
                                    $job->id,
                                    $job->name . ' (#' . $job->id . ')'
                                ] : false)
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="content"><?php echo e(__("Message")); ?></label>
                                <textarea name="content" class="form-control" id="content" rows="5"><?php echo e(old('content', $row->message)); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ls-widget">
                    <div class="widget-title"><h4><?php echo e(__("Status")); ?></h4></div>
                    <div class="widget-content">
                        <div class="form-group">
                            <div>
                                <label><input <?php if($row->status=='pending'): ?> checked <?php endif; ?> type="radio" name="status" value="pending"> <?php echo e(__("Pending")); ?>

                                </label>
                            </div>
                            <div>
                                <label><input <?php if($row->status=='approved'): ?> checked <?php endif; ?> type="radio" name="status" value="publish"> <?php echo e(__("Approved")); ?>

                                </label>
                            </div>
                            <div>
                                <label><input <?php if($row->status=='rejected'): ?> checked <?php endif; ?> type="radio" name="status" value="rejected"> <?php echo e(__("Rejected")); ?>

                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="text-right">
                                <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save"></i> <?php echo e(__('Save Changes')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        jQuery(function ($) {
            "use strict"
            $('select[name="candidate_id"]').on('change',function (){
                var candidate_id = $(this).val();

                $('.list-cv .lists_cvs').children().remove();
                $.ajax({
                    url:'/admin/module/job/all-applicants/get-cv?id='+candidate_id,
                    method:'get',
                    success:function (json) {
                        if(json.status == 1)
                        {
                            if(json.cv)
                            {
                                for(var i= 0; i< json.cv.length; i++)
                                {
                                    if(json.cv[i].media)
                                    {
                                        var file_type = json.cv[i].media.file_extension == 'doc' || json.cv[i].media.file_extension == 'docx' ? 'fa-file-word-o' : 'fa-file-pdf-o';
                                        var list_cv = "<div class='item'><div class='row'><div class='col-md-1'><input type='radio' class='form-control' name='apply_cv_id' value="+json.cv[i].id+"></div><div class='col-md-8'><i class='fa "+file_type+"'></i> "+json.cv[i].media.file_name +"."+ json.cv[i].media.file_extension+"</div></div></div>";
                                        $('.list-cv .lists_cvs').append(list_cv);
                                    }
                                }
                            }
                            if(json.cv.length > 0)
                            {
                                $('.group-cv').show();
                            }
                        }
                    },
                    error:function (e) {

                    }
                });
            }).trigger('change')
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Job/Views/frontend/layouts/manage-job/applicant-create.blade.php ENDPATH**/ ?>