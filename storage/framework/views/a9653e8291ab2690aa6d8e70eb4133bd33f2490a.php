

<?php $__env->startSection('content'); ?>
  
    <form method="post" action="<?php echo e(route('user.company.advertisement.store.ads',['id' => $row->id ?? '-1'])); ?>" enctype="multipart/form-data" class="default-form">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo e($row->id); ?>">
        <div class="upper-title-box">
            <div class="row">
                <div class="col-md-9">
                    <h4><?php echo e($row->id ? __('Edit: ').$row->title : __('New Advertisement')); ?></h4>
                </div>
              
            </div>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        

        <div class="row">
            <div class="col-xl-9">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title"><h4><?php echo e(__("Advertisement Content")); ?></h4></div>
                        <div class="widget-content">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label><?php echo e(__("Title")); ?> <span class="required">*</span></label>
                                        <input type="text" value="<?php echo e(old('title', $row->title)); ?>" placeholder="<?php echo e(__("Title")); ?>" name="title" required class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(__("Advertisement URL")); ?></label>
                                        <input type="text" name="url" required class="form-control" value="<?php echo e(old('url',$row->url)); ?>" placeholder="<?php echo e(__("Advertisement URL")); ?>">
                                    </div>
                                </div>
                            </div>
                         
                         
                            <?php if(is_default_lang()): ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__("Start Date")); ?> <span class="required">*</span></label>
                                            <input type="text" value="<?php echo e(old( 'start_date', $row->start_date ? date('Y/m/d', strtotime($row->start_date)) : '')); ?>" placeholder="YYYY/MM/DD" name="start_date" autocomplete="false" required class="form-control has-datepicker bg-white">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__("End Date")); ?> <span class="required">*</span></label>
                                            <input type="text" value="<?php echo e(old( 'end_date', $row->end_date ? date('Y/m/d', strtotime($row->end_date)) : '')); ?>" placeholder="YYYY/MM/DD" name="end_date" autocomplete="false" required class="form-control has-datepicker bg-white">
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="">
                                                <label for="countries">Countries <strong>( Advertise in these countries)</strong> </label>
                                                <select id="countries" name="countries[]" class="form-control" required multiple="multiple">
                                                    <option value=""><?php echo e(__('-- Please Select --')); ?></option>
                                                    <?php
                                                    foreach (get_country_lists() as $countryId => $country) {
                                                        $selected = '';
                                                        if (!empty($row->countries)) {
                                                            foreach ($row->countries as $selectedCountry) {
                                                                if ($countryId == $selectedCountry->country) {
                                                                    $selected = 'selected';
                                                                }
                                                            }
                                                        }
                                                        printf("<option value='%s' %s>%s</option>", $countryId, $selected, $country);
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                                                    

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?php echo e(__("Banner Image")); ?> (<?php echo e(__('Recommended size image: '.\Modules\Advertisement\Models\Advertisement::HEIGHT.' px x '.\Modules\Advertisement\Models\Advertisement::WIDTH.' px')); ?>)</label>
                                            <div class="form-group">
                                                <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('banner',$row->banner); ?>

                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

               
                <div class="mb-4 d-none d-md-block">
                    <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save" style="padding-right: 5px"></i> <?php echo e(__('Save Changes')); ?></button>
                </div>

            </div>

            <div class="col-xl-3">

                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title"><h4><?php echo e(__("Publish")); ?></h4></div>
                        <div class="widget-content pb-4">
                            <?php if(is_default_lang()): ?>
                                <div>
                                    <label><input <?php if($row->status =='publish'): ?> checked <?php endif; ?> type="radio" name="status" value="publish"> <?php echo e(__("Publish")); ?></label>
                                </div>
                                <div>
                                    <label><input <?php if($row->status =='draft'): ?> checked <?php endif; ?> type="radio" name="status" value="draft"> <?php echo e(__("Draft")); ?></label>
                                </div>
                            <?php endif; ?>
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
    <script type="text/javascript" src="<?php echo e(asset('libs/daterange/moment.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libs/daterange/daterangepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('libs/select2/js/select2.min.js')); ?>" ></script>
    <script>
        jQuery(function ($) {
            "use strict"

            $('.has-datepicker').daterangepicker({
                singleDatePicker: true,
                showCalendar: false,
                autoUpdateInput: false, //disable default date
                showDropdowns: true,
                sameDate: true,
                autoApply           : true,
                disabledPast        : true,
                enableLoading       : true,
                showEventTooltip    : true,
                classNotAvailable   : ['disabled', 'off'],
                disableHightLight: true,
                minDate: `<?php echo e(auth()->user()->user_plan?->start_date?->format('Y-m-d H:i:s')); ?>`,
                maxDate: `<?php echo e(auth()->user()->user_plan?->end_date?->format('Y-m-d H:i:s')); ?>`,
                locale:{
                    format:'YYYY/MM/DD'
                }
            }).on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('YYYY/MM/DD'));
            });


        })

        $(document).ready(function() {
                $('#countries').select2();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\rvoize\modules/Advertisement/Views/frontend/layouts/manage-ads/edit-ads.blade.php ENDPATH**/ ?>