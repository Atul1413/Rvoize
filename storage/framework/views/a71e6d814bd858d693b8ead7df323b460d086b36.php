
<?php $__env->startSection('head'); ?>
    <style>
        #permanentlyDeleteAccount .close-modal{
            top: 35px;
        }

        .progress {
            width: 150px;
            height: 150px;
            background: none;
            position: relative;
        }

        .progress::after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 6px solid #eee;
            position: absolute;
            top: 0;
            left: 0;
        }

        .progress>span {
            width: 50%;
            height: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 1;
        }

        .progress .progress-left {
            left: 0;
        }

        .progress .progress-bar {
            width: 100%;
            height: 100%;
            background: none;
            border-width: 6px;
            border-style: solid;
            position: absolute;
            top: 0;
        }

        .progress .progress-left .progress-bar {
            left: 100%;
            border-top-right-radius: 80px;
            border-bottom-right-radius: 80px;
            border-left: 0;
            -webkit-transform-origin: center left;
            transform-origin: center left;
        }

        .progress .progress-right {
            right: 0;
        }

        .progress .progress-right .progress-bar {
            left: -100%;
            border-top-left-radius: 80px;
            border-bottom-left-radius: 80px;
            border-right: 0;
            -webkit-transform-origin: center right;
            transform-origin: center right;
        }

        .progress .progress-value {
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo_user_profile p-0">
        <div class="d-flex justify-content-between mb20">
            <div class="upper-title-box">
                <h3 class="title"><?php echo e(__("My Profile")); ?></h3>
                <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
            </div>
            
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Profile Progress Bar -->
        <?php if(count($percentage) > 0): ?>
        <div class="row justify-content-center">
            <?php $__currentLoopData = $percentage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $percentName => $percentValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($percentName === 'errors' && !empty($percentValue)): ?>
                    <div class="col-12">
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <?php echo e(__('Please fill the following below to complete the Profile progress')); ?>

                            <ul class="pl-2">
                                <?php $__currentLoopData = $percentValue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fillUpMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($fillUpMessage); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php continue; ?>;
                    </div>
                <?php endif; ?>
                <div class="col-xl-3 col-md-4 col-sm-6 mb-5">
                    <div class="bg-white rounded-lg p-4 shadow-sm">
                        <h2 class="h6 font-weight-bold text-center mb-4" style="height:30px;"><?php echo e($percentName); ?>

                            Percentage
                        </h2>

                        <!-- Progress bar 3 -->
                        <div class="progress mx-auto" data-value='<?php echo e($percentValue); ?>'>

                            <span class="progress-left">
                                <span class="progress-bar border-primary"></span>
                            </span>
                            <span class="progress-right">
                                <span class="progress-bar border-primary"></span>
                            </span>
                            <div
                                class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                <div class="h3 font-weight-bold"><?php echo e($percentValue); ?> <span class="small">%</span>
                                </div>
                            </div>
                        </div>
                        <!-- END -->

                        
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <?php endif; ?>
        <!-- Profile Progress Bar End-->


        <form action="<?php echo e(route('user.candidate.store')); ?>" method="post" class="default-form">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("Candidate Info")); ?></h4></div>
                            <div class="widget-content">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__("First name")); ?> <span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo e(old('first_name',$user->first_name)); ?>" name="first_name" placeholder="<?php echo e(__("First name")); ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__("Last name")); ?> <span class="text-danger">*</span></label>
                                                <input type="text" required value="<?php echo e(old('last_name',$user->last_name)); ?>" name="last_name" placeholder="<?php echo e(__("Last name")); ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('Phone Number')); ?> <span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo e(old('phone',@$row->phone)); ?>" placeholder="<?php echo e(__('Phone')); ?>" name="phone" class="form-control" required   >
                                            </div>
                                        </div>
                                        <?php if(empty($row->phone_verified_at) && !empty($row->phone)): ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Verify Phone")); ?> </label> 
                                                    <br/>
                                                    <button class="btn btn-primary bc-call-modal verifyNumber" type="button">Send Verify Status</button>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <hr>
                                <?php echo $__env->make('Candidate::admin.candidate.form',['row'=>$user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("About")); ?></h4></div>
                            <div class="widget-content">
                                <textarea name="bio" rows="5" class="form-control"><?php echo e(strip_tags(old('bio',$user->bio))); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("Location Info")); ?></h4></div>
                            <div class="widget-content">
                                <?php echo $__env->make('Candidate::admin.candidate.location',['row'=>$user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4 card-sub_information">
                        <div class="tabs-box">
                            <div class="widget-title"><strong><?php echo e(__("Education - Experience - Award")); ?></strong></div>
                            <div class="widget-content">
                                <?php echo $__env->make('Candidate::admin.candidate.sub_information',['row'=>$user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>

                    <?php echo $__env->make('Core::frontend.seo-meta.seo-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="mb-4 d-none d-md-block">
                        <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save" style="padding-right: 5px"></i> <?php echo e(__('Save Changes')); ?></button>
                    </div>
                </div>

                <div class="col-lg-3 col-12">
                    <div class="ls-widget mb-4 ">
                        <div class="tabs-box">
                            <div class="widget-title"><strong><?php echo e(__('Avatar')); ?></strong></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('avatar_id',old('avatar_id',$user->avatar_id)); ?>

                                </div>
                            </div>
                        </div>
                    </div>


                        <div class="ls-widget mb-4 ">
                            <div class="tabs-box">
                                <div class="widget-title"><strong><?php echo e(__('Visibility')); ?></strong></div>
                                <div class="widget-content">
                                    <div class="form-group">
                                        <select required class="custom-select" name="allow_search">
                                            <option <?php if(old('allow_search',@$row->allow_search) =='hide'): ?> selected <?php endif; ?> value="hide"><?php echo e(__('Hide')); ?></option>
                                            <option <?php if(old('allow_search',@$row->allow_search) =='publish'): ?> selected <?php endif; ?> value="publish"><?php echo e(__('Publish')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ls-widget mb-4">
                            <div class="tabs-box">
                                <div class="widget-title"><strong><?php echo e(__('Categories')); ?></strong></div>
                                <div class="widget-content">
                                    <div class="form-group">
                                        <select id="categories" class="form-control" name="categories[]" multiple="multiple">
                                            <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                            <?php
                                            foreach ($categories as $oneCategories) {
                                                $selected = '';
                                                if (!empty($row->categories)){

                                                    foreach ($row->categories as $category){
                                                        if($oneCategories->id == $category->id){
                                                            $selected = 'selected';
                                                        }
                                                    }
                                                }
                                                $trans = $oneCategories->translateOrOrigin(app()->getLocale());
                                                printf("<option value='%s' %s>%s</option>", $oneCategories->id, $selected, $oneCategories->name);
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ls-widget mb-4">
                            <div class="tabs-box">
                                <div class="widget-title"><strong><?php echo e(__("Skills")); ?></strong></div>
                                <div class="widget-content">
                                    <div class="form-group">
                                        <div class="">
                                            <select id="skills" name="skills[]" class="form-control" multiple="multiple">
                                                <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                                <?php
                                                foreach ($skills as $oneSkill) {
                                                    $selected = '';
                                                    if (!empty($row->skills)){
                                                        foreach ($row->skills as $skill){
                                                            if($oneSkill->id == $skill->id){
                                                                $selected = 'selected';
                                                            }
                                                        }
                                                    }
                                                    $trans = $oneSkill->translateOrOrigin(app()->getLocale());
                                                    printf("<option value='%s' %s>%s</option>", $oneSkill->id, $selected, $trans->name);
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ls-widget mb-4 card-social">
                            <div class="tabs-box">
                                <div class="widget-title"><strong><?php echo e(__('Social Media')); ?></strong></div>
                                <div class="widget-content">
                                    <?php $socialMediaData = !empty($row) ? $row->social_media : []; ?>
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="social-google"><i class="fab fa-linkedin"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="social_media[linkedin]" value="<?php echo e(@$socialMediaData['linkedin']); ?>" placeholder="<?php echo e(__('Linkedin')); ?>" aria-label="<?php echo e(__('Linkedin')); ?>" aria-describedby="social-linkedin">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="mb-4 text-center">
                        <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save" style="padding-right: 5px"></i> <?php echo e(__('Save Changes')); ?></button>
                    </div>
                </div>
            </div>
        </form>
        <hr>

    </div>
    <?php if(!empty(setting_item('user_enable_permanently_delete')) and !is_admin()): ?>
        <div class="row">
            <div class="col-lg-9">
                <div class="ls-widget">
                    <div class="widget-title">
                        <h4 class="text-danger">
                            <?php echo e(__("Delete account")); ?>

                        </h4>
                    </div>
                    <div class="widget-content">
                        <div class="mb-4 mt-2">
                            <?php echo clean(setting_item_with_lang('user_permanently_delete_content','',__('Your account will be permanently deleted. Once you delete your account, there is no going back. Please be certain.'))); ?>

                        </div>
                        <a rel="modal:open" class="btn btn-danger" href="#permanentlyDeleteAccount"><?php echo e(__('Delete your account')); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal bravo-form" id="permanentlyDeleteAccount">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Confirm permanently delete account')); ?></h5>
                    </div>
                    <div class="modal-body ">
                        <div class="my-3">
                            <?php echo clean(setting_item_with_lang('user_permanently_delete_content_confirm')); ?>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#close-modal" rel="modal:close" class="btn btn-secondary"><?php echo e(__('Close')); ?></a>
                        <a href="<?php echo e(route('user.permanently.delete')); ?>" class="btn btn-danger"><?php echo e(__('Confirm')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Modal -->
    <?php if(empty(@$row->phone_verified_at) && !empty(@$row->phone)): ?>
        <div class="modal fade verifyNumber" id="verifyNumber">
            <div id="login-modal">
                <div class="login-form default-form">
                    <div class="form-inner">
                        <div class="form-inner">
                            <h3>Verify Phone Number</h3>
                            <div class="alert alert-danger " id="verifyNumberAlert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <?php echo e(__("Please check the form below for problems")); ?>

                                <ul class="pl-2" id="verifyNumberAlertContent">
                                </ul>
                            </div>
                            <form class="form" id="bravo-form-verify-otp" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input type="hidden" name="candidate_id" value="<?php echo e(@$row->id); ?>">
                                    <input type="text" name="otp" placeholder="<?php echo e(__('Enter OTP')); ?>" required>
                                </div>
                                <div class="form-group d-flex justify-content-around">
                                    <button class="btn btn-primary" id="sendOtp" type="button">SEND OTP 
                                        <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
                                    </button>
                                    <button class="btn btn-success" id="verifyOtp" type="button">VERIFY 
                                        <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </form>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Modal End -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script type="text/javascript" src="<?php echo e(asset('libs/daterange/moment.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libs/daterange/daterangepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('libs/select2/js/select2.min.js')); ?>" ></script>
    <script>
        $('.has-datepicker').daterangepicker({
            singleDatePicker: true,
            showCalendar: false,
            autoUpdateInput: false,
            sameDate: true,
            autoApply: true,
            disabledPast: true,
            enableLoading: true,
            showEventTooltip: true,
            classNotAvailable: ['disabled', 'off'],
            disableHightLight: true,
            locale: {
                format: 'YYYY/MM/DD'
            }
        }).on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY/MM/DD'));
        });

        <?php if(!empty($row->phone)): ?>

            const verifyAlert = $('#verifyNumberAlert');
            const verifyAlertContent = $('#verifyNumberAlertContent');

            verifyAlert.hide();

            $(document).on('click', '.bc-call-modal.verifyNumber', function(event) {
                event.preventDefault();
                this.blur();
                $("#verifyNumber").modal({
                    fadeDuration: 300,
                    fadeDelay: 0.15
                });
            });

            $('#sendOtp').on('click',function (e) {
                e.preventDefault();
                let form = $('#bravo-form-verify-otp');
                verifyAlert.hide();
                verifyAlertContent.empty();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': form.find('input[name="_token"]').val()
                    }
                });
                $.ajax({
                    'url':  `<?php echo e(route('user.candidate.sendOtp')); ?>`,
                    'data': {
                        'id': form.find('input[name=candidate_id]').val(),
                    },
                    'type': 'POST',
                    beforeSend: function () {
                        form.find('.error').hide();
                        form.find('.icon-loading').css("display", 'inline-block');
                    },
                    success: function (data) {
                        form.find('.icon-loading').hide();
                        console.log(data);
                        if (data.error === true) {
                            if (data.messages !== undefined) {
                                for(var item in data.messages) {
                                    var msg = data.messages[item];
                                    verifyAlertContent.append(`<li>${msg}</li>`);
                                }
                            }
                        
                            verifyAlert.show();
                        } 
                    },
                    error:function (e) {
                        form.find('.icon-loading').hide();
                        console.log(e);
                        // if(typeof e.responseJSON !== "undefined" && typeof e.responseJSON.message !='undefined'){
                        //     form.find('.message-error').show().html('<div class="alert alert-danger">' + e.responseJSON.message + '</div>');
                        // }
                    }
                });
            });

            $('#verifyOtp').on('click',function (e) {
                e.preventDefault();
                let form = $('#bravo-form-verify-otp');
                verifyAlert.hide();
                verifyAlertContent.empty();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': form.find('input[name="_token"]').val()
                    }
                });
                $.ajax({
                    'url':  `<?php echo e(route('user.candidate.verifyNumber')); ?>`,
                    'data': {
                        'id': form.find('input[name=candidate_id]').val(),
                        'otp': form.find('input[name=otp]').val(),
                    },
                    'type': 'POST',
                    beforeSend: function () {
                        form.find('.error').hide();
                        form.find('.icon-loading').css("display", 'inline-block');
                    },
                    success: function (data) {
                        form.find('.icon-loading').hide();
                        if (data.error === true) {
                            if (data.messages !== undefined) {
                                for(var item in data.messages) {
                                    console.log(item);
                                    var msg = data.messages[item];
                                    verifyAlertContent.append(`<li>${msg}</li>`);
                                }
                            }
                            verifyAlert.show();
                        } else {
                            window.location.reload()
                        }
                    
                    },
                    error:function (e) {
                        form.find('.icon-loading').hide();
                        console.log(e);
                        // if(typeof e.responseJSON !== "undefined" && typeof e.responseJSON.message !='undefined'){
                        //     form.find('.message-error').show().html('<div class="alert alert-danger">' + e.responseJSON.message + '</div>');
                        // }
                    }
                });
            });

        <?php endif; ?>

        $(function() {

        $(".progress").each(function() {

            var value = $(this).attr('data-value');
            var left = $(this).find('.progress-left .progress-bar');
            var right = $(this).find('.progress-right .progress-bar');

            if (value > 0) {
                if (value <= 50) {
                    right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                } else {
                    right.css('transform', 'rotate(180deg)')
                    left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                }
            }

        })

        function percentageToDegrees(percentage) {

            return percentage / 100 * 360

        }
        });
    </script>
    <script>
        <?php if(is_candidate() || !empty($candidate_create)): ?>
        $(document).ready(function() {
            $('#categories').select2();
            $('#skills').select2();
            $('#languages').select2();
        });

        let mapLat = <?php echo e($row->map_lat ?? setting_item('default_location_lat', "51.505")); ?>;
        let mapLng = <?php echo e($row->map_lng ?? setting_item('default_location_lng', "-0.09")); ?>;
        let mapZoom = <?php echo e($row->map_zoom ?? "8"); ?>;

        jQuery(function ($) {
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [mapLat, mapLng],
                zoom: mapZoom,
                ready: function (engineMap) {
                    engineMap.addMarker([mapLat, mapLng], {
                        icon_options: {}
                    });
                    engineMap.on('click', function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function (zoom) {
                        $("input[name=map_zoom]").attr("value", zoom);
                    });
                    engineMap.searchBox($('#customPlaceAddress'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.searchBox($('.bravo_searchbox'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                }
            });

        })
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\rvoize\modules/Candidate/Views/frontend/profile/edit.blade.php ENDPATH**/ ?>