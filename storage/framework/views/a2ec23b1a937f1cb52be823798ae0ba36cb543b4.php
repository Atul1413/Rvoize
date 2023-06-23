

<?php $__env->startSection('content'); ?>
    <?php
        $languages = \Modules\Language\Models\Language::getActive();
    ?>
    <div class="bravo_user_profile">
        <form method="post" action="<?php echo e(route('user.company.update' )); ?>" class="default-form" >
            <?php echo csrf_field(); ?>
            <div class="upper-title-box">
                <h3><?php echo e(__('Edit: ').$row->name); ?></h3>
                <div class="text">
                    <?php if($row->slug): ?>
                        <p class="item-url-demo"><?php echo e(__("Permalink")); ?>: <?php echo e(url(config('companies.companies_route_prefix') )); ?>/<a href="#" class="open-edit-input" data-name="slug"><?php echo e($row->slug); ?></a></p>
                    <?php endif; ?>
                </div>
            </div>

            <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if($row->id): ?>
                <?php echo $__env->make('Language::admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-9 col-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("Company Info")); ?></h4></div>
                            <div class="widget-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__("Company name")); ?> <span class="text-danger">*</span></label>
                                            <input type="text" required value="<?php echo e(old('name',$translation->name)); ?>" name="name" placeholder="<?php echo e(__("Company name")); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <?php if(is_default_lang()): ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('E-mail')); ?> <span class="text-danger">*</span></label>
                                                <input type="email" required value="<?php echo e(old('email',$row->email)); ?>" placeholder="<?php echo e(__('Email')); ?>" name="email" class="form-control"  >
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__('Phone Number')); ?> <span class="text-danger">*</span></label>
                                            <input type="text" value="<?php echo e(old('phone',$row->phone)); ?>" placeholder="<?php echo e(__('Phone')); ?>" name="phone" class="form-control" required   >
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__("Website")); ?></label>
                                            <input type="text" value="<?php echo e(old('website',$row->website)); ?>" name="website" placeholder="<?php echo e(__("Website")); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <?php if(is_default_lang()): ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('Est. Since')); ?></label>
                                                <input type="text" value="<?php echo e(old('founded_in',$row->founded_in ? date("d/m/Y",strtotime($row->founded_in)) :'')); ?>" placeholder="<?php echo e(__('Est. Since')); ?>" name="founded_in" class="form-control has-datepicker input-group date">
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__('Address')); ?></label>
                                            <input type="text" value="<?php echo e(old('address',$row->address)); ?>" placeholder="<?php echo e(__('Address')); ?>" name="address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__("City")); ?></label>
                                            <input type="text" value="<?php echo e(old('city',$row->city)); ?>" name="city" placeholder="<?php echo e(__("City")); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__("State")); ?></label>
                                            <input type="text" value="<?php echo e(old('state',$row->state)); ?>" name="state" placeholder="<?php echo e(__("State")); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=""><?php echo e(__("Country")); ?></label>
                                            <select name="country" class="form-control" id="country-sms-testing">
                                                <option value=""><?php echo e(__('-- Select --')); ?></option>
                                                <?php $__currentLoopData = get_country_lists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($row->country==$id): ?> selected <?php endif; ?> value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__("Zip Code")); ?></label>
                                            <input type="text" value="<?php echo e(old('zip_code',$row->zip_code)); ?>" name="zip_code" placeholder="<?php echo e(__("Zip Code")); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <?php if(is_default_lang()): ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input <?php if($row->allow_search): ?> checked <?php endif; ?> type="checkbox" name="allow_search" value="1" class="form-control">
                                                <label><?php echo e(__("Allow In Search & Listing")); ?></label>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo e(__('About Company')); ?></label>
                                            <div class="">
                                                <textarea name="about" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e(old('about',$translation->about)); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("Company Location")); ?></h4></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <label class="control-label"><?php echo e(__("Location")); ?></label>
                                    <?php if(!empty($is_smart_search)): ?>
                                        <div class="form-group-smart-search">
                                            <div class="form-content">
                                                <?php
                                                $location_name = "";
                                                $list_json = [];
                                                $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json , &$location_name,$row) {
                                                    foreach ($locations as $location) {
                                                        $translate = $location->translateOrOrigin(app()->getLocale());
                                                        if ($row->location_id == $location->id){
                                                            $location_name = $translate->name;
                                                        }
                                                        $list_json[] = [
                                                            'id' => $location->id,
                                                            'title' => $prefix . ' ' . $translate->name,
                                                        ];
                                                        $traverse($location->children, $prefix . '-');
                                                    }
                                                };
                                                $traverse($company_location);
                                                ?>
                                                <div class="smart-search">
                                                    <input type="text" class="smart-search-location parent_text form-control" placeholder="<?php echo e(__("-- Please Select --")); ?>" value="<?php echo e($location_name); ?>" data-onLoad="<?php echo e(__("Loading...")); ?>"
                                                           data-default="<?php echo e(json_encode($list_json)); ?>">
                                                    <input type="hidden" class="child_id" name="location_id" value="<?php echo e($row->location_id ?? Request::query('location_id')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="">
                                            <select name="location_id" class="form-control">
                                                <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                                <?php
                                                $traverse = function ($locations, $prefix = '') use (&$traverse, $row) {
                                                    foreach ($locations as $location) {
                                                        $selected = '';
                                                        if ($row->location_id == $location->id)
                                                            $selected = 'selected';
                                                        printf("<option value='%s' %s>%s</option>", $location->id, $selected, $prefix . ' ' . $location->name);
                                                        $traverse($location->children, $prefix . '-');
                                                    }
                                                };
                                                $traverse($company_location);
                                                ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label class="control-label"><?php echo e(__("The geographic coordinate")); ?></label>
                                    <div class="control-map-group">
                                        <div id="map_content"></div>
                                        <input type="text" placeholder="<?php echo e(__("Search by name...")); ?>" class="bravo_searchbox form-control" autocomplete="off" onkeydown="return event.key !== 'Enter';">
                                        <div class="g-control">
                                            <div class="form-group">
                                                <label><?php echo e(__("Map Latitude")); ?>:</label>
                                                <input type="text" name="map_lat" class="form-control" value="<?php echo e($row->map_lat); ?>" onkeydown="return event.key !== 'Enter';">
                                            </div>
                                            <div class="form-group">
                                                <label><?php echo e(__("Map Longitude")); ?>:</label>
                                                <input type="text" name="map_lng" class="form-control" value="<?php echo e($row->map_lng); ?>" onkeydown="return event.key !== 'Enter';">
                                            </div>
                                            <div class="form-group">
                                                <label><?php echo e(__("Map Zoom")); ?>:</label>
                                                <input type="text" name="map_zoom" class="form-control" value="<?php echo e($row->map_zoom ?? "8"); ?>" onkeydown="return event.key !== 'Enter';">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php echo $__env->make('Core::frontend/seo-meta/seo-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="mb-4 d-none d-md-block">
                        <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save" style="padding-right: 5px"></i> <?php echo e(__('Save Changes')); ?></button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="ls-widget">
                        <div class="widget-title"><h4><?php echo e(__("Publish")); ?></h4></div>
                        <div class="widget-content">
                            <div class="form-group">
                                <?php if(is_default_lang()): ?>
                                    <div>
                                        <label><input <?php if($row->status=='publish'): ?> checked <?php endif; ?> type="radio" name="status" value="publish"> <?php echo e(__("Publish")); ?>

                                        </label></div>
                                    <div>
                                        <label><input <?php if($row->status=='draft' or !$row->status): ?> checked <?php endif; ?> type="radio" name="status" value="draft"> <?php echo e(__("Draft")); ?>

                                        </label></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <div class="text-right">
                                    <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save"></i> <?php echo e(__('Save Changes')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if(is_default_lang()): ?>
                        <div class="ls-widget">
                            <div class="widget-title"><h4><?php echo e(__("Categories")); ?></h4></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <select id="cat_id" class="form-control" name="category_id">
                                        <?php
                                        $selectedIds = !empty($row->category_id) ? explode(',', $row->category_id) : [];
                                        $traverse = function ($categories, $prefix = '') use (&$traverse, $selectedIds) {
                                            foreach ($categories as $category) {
                                                $selected = '';
                                                if (in_array($category->id, $selectedIds))
                                                    $selected = 'selected';
                                                printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $category->name);
                                                $traverse($category->children, $prefix . '-');
                                            }
                                        };
                                        $traverse($categories);
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(is_default_lang()): ?>
                        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="ls-widget">
                            <div class="widget-title"><h4><?php echo e(__('Attribute: :name',['name'=>$attribute->name])); ?></h4></div>
                            <div class="widget-content">
                                <div class="terms-scrollable mb-4">
                                    <?php $__currentLoopData = $attribute->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="term-item">
                                            <input <?php if(!empty($selected_terms) and $selected_terms->contains($term->id)): ?> checked <?php endif; ?> type="checkbox" name="terms[]" value="<?php echo e($term->id); ?>">
                                            <span class="term-name"><?php echo e($term->name); ?></span>
                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <?php if(is_default_lang()): ?>
                        <div class="ls-widget">
                            <div class="widget-title"><h4><?php echo e(__('Logo')); ?> </h4></div>
                            <div class="widget-content pb-4">
                                <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('avatar_id',$row->avatar_id); ?>

                                <p><i>(<?php echo e(__('Recommended size 330px x 300px')); ?>)</i></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(is_default_lang()): ?>
                        <div class="ls-widget">
                            <div class="widget-title"><h4><?php echo e(__("Social Media")); ?></h4></div>
                            <div class="widget-content">
                                <?php $socialMediaData = $row->social_media; ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-skype"><i class="la la-skype"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off" name="social_media[skype]" value="<?php echo e($socialMediaData['skype'] ?? ''); ?>" placeholder="<?php echo e(__('Skype')); ?>" aria-label="<?php echo e(__('Skype')); ?>" aria-describedby="social-skype">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-facebook"><i class="la la-facebook"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off"  name="social_media[facebook]" value="<?php echo e($socialMediaData['facebook'] ?? ''); ?>" placeholder="<?php echo e(__('Facebook')); ?>" aria-label="<?php echo e(__('Facebook')); ?>" aria-describedby="social-facebook">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-twitter"><i class="la la-twitter"></i></span>
                                    </div>
                                    <input type="text" class="form-control"autocomplete="off" name="social_media[twitter]" value="<?php echo e($socialMediaData['twitter'] ?? ''); ?>" placeholder="<?php echo e(__('Twitter')); ?>" aria-label="<?php echo e(__('Twitter')); ?>" aria-describedby="social-twitter">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-instagram"><i class="la la-instagram"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off" name="social_media[instagram]" value="<?php echo e($socialMediaData['instagram'] ?? ''); ?>" placeholder="<?php echo e(__('Instagram')); ?>" aria-label="<?php echo e(__('Instagram')); ?>" aria-describedby="social-instagram">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-linkedin"><i class="la la-linkedin"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off" name="social_media[linkedin]" value="<?php echo e($socialMediaData['linkedin'] ?? ''); ?>" placeholder="<?php echo e(__('Linkedin')); ?>" aria-label="<?php echo e(__('Linkedin')); ?>" aria-describedby="social-linkedin">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-google"><i class="la la-google"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off" name="social_media[google]" value="<?php echo e(@$socialMediaData['google'] ?? ''); ?>" placeholder="<?php echo e(__('Google')); ?>" aria-label="<?php echo e(__('Google')); ?>" aria-describedby="social-google">
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </form>
    </div>

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
                                <input type="hidden" name="company_id" value="<?php echo e(@$row->id); ?>">
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

        $(document).on('click', '.bc-call-modal.verifyNumber', function(event) {
            event.preventDefault();
            this.blur();
            $("#verifyNumber").modal({
                fadeDuration: 300,
                fadeDelay: 0.15
            });
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
                'url':  `<?php echo e(route('user.company.sendOtp')); ?>`,
                'data': {
                    'id': form.find('input[name=company_id]').val(),
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
                'url':  `<?php echo e(route('user.company.verifyNumber')); ?>`,
                'data': {
                    'id': form.find('input[name=company_id]').val(),
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
        
    </script>
    <script>

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

        });

        jQuery(function ($) {
            "use strict"
            $('.open-edit-input').on('click', function (e) {
                e.preventDefault();
                $(this).replaceWith('<input type="text" name="' + $(this).data('name') + '" value="' + $(this).html() + '">');
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\rvoize\modules/Company/Views/frontend/layouts/manageCompany/detail.blade.php ENDPATH**/ ?>