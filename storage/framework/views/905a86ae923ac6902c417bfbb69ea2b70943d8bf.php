

<?php $__env->startSection('content'); ?>
    <?php
        $languages = \Modules\Language\Models\Language::getActive();
    ?>
    <form method="post" action="<?php echo e(route('user.store.job', ['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')] )); ?>" class="default-form" >
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo e($row->id); ?>">
        <div class="upper-title-box">
            <div class="row">
                <div class="col-md-9">
                    <h3><?php echo e($row->id ? __('Edit: ').$row->title : __('Add new job')); ?></h3>
                    <div class="text">
                        <?php if($row->slug): ?>
                            <p class="item-url-demo"><?php echo e(__("Permalink")); ?>: <?php echo e(url( config('job.job_route_prefix') )); ?>/<a href="#" class="open-edit-input" data-name="slug"><?php echo e($row->slug); ?></a>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-3 text-right">
                    <?php if($row->slug): ?>
                        <a class="theme-btn btn-style-one" href="<?php echo e($row->getDetailUrl(request()->query('lang'))); ?>" target="_blank"><?php echo e(__("View Job")); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if($row->id): ?>
            <?php echo $__env->make('Language::admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <div class="row">
            <div class="col-xl-9">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title"><h4><?php echo e(__("Job Content")); ?></h4></div>
                        <div class="widget-content">
                            <div class="form-group">
                                <label><?php echo e(__("Title")); ?> <span class="required">*</span></label>
                                <input type="text" value="<?php echo e(old('title', $translation->title)); ?>" placeholder="<?php echo e(__("Title")); ?>" name="title" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Content")); ?></label>
                                <div class="">
                                    <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e(old('content', $translation->content)); ?></textarea>
                                </div>
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__("Expiration Date")); ?> <span class="required">*</span></label>
                                            <input type="text" value="<?php echo e(old( 'expiration_date', $row->expiration_date ? date('Y/m/d', strtotime($row->expiration_date)) : '')); ?>" placeholder="YYYY/MM/DD" name="expiration_date" autocomplete="false" required class="form-control has-datepicker bg-white">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__("Hours")); ?></label>
                                            <div class="input-group">
                                                <input type="text" value="<?php echo e(old('hours', $row->hours)); ?>" placeholder="<?php echo e(__("hours")); ?>" name="hours" class="form-control">
                                                <div class="input-group-append">
                                                    <select class="form-control" name="hours_type">
                                                        <option value="" <?php if(old('hours_type', $row->hours_type) == ''): ?> selected <?php endif; ?> > -- </option>
                                                        <option value="day" <?php if(old('hours_type', $row->hours_type) == 'day'): ?> selected <?php endif; ?> ><?php echo e(__("/day")); ?></option>
                                                        <option value="week" <?php if(old('hours_type', $row->hours_type) == 'week'): ?> selected <?php endif; ?> ><?php echo e(__("/week")); ?></option>
                                                        <option value="month" <?php if(old('hours_type', $row->hours_type) == 'month'): ?> selected <?php endif; ?> ><?php echo e(__("/month")); ?></option>
                                                        <option value="year" <?php if(old('hours_type', $row->hours_type) == 'year'): ?> selected <?php endif; ?> ><?php echo e(__("/year")); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender"><?php echo e(__("Gender")); ?></label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="Both" <?php if(old('gender', $row->gender) == 'Both'): ?> selected <?php endif; ?> ><?php echo e(__("Both")); ?></option>
                                                <option value="Male" <?php if(old('gender', $row->gender) == 'Male'): ?> selected <?php endif; ?> ><?php echo e(__("Male")); ?></option>
                                                <option value="Female" <?php if(old('gender', $row->gender) == 'Female'): ?> selected <?php endif; ?> ><?php echo e(__("Female")); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__("Salary")); ?></label>
                                            <div class="input-group">
                                                <input type="text" value="<?php echo e(old('salary_min', $row->salary_min)); ?>" placeholder="<?php echo e(__("Min")); ?>" name="salary_min" class="form-control">
                                                <input type="text" value="<?php echo e(old('salary_max', $row->salary_max)); ?>" placeholder="<?php echo e(__("Max")); ?>" name="salary_max" class="form-control">
                                                <div class="input-group-append">
                                                    <select class="form-control" name="salary_type">
                                                        <option value="hourly" <?php if(old('salary_type', $row->salary_type) == 'hourly'): ?> selected <?php endif; ?> > <?php echo e(__("/hourly")); ?> </option>
                                                        <option value="daily" <?php if(old('salary_type', $row->salary_type) == 'daily'): ?> selected <?php endif; ?> ><?php echo e(__("/daily")); ?></option>
                                                        <option value="weekly" <?php if(old('salary_type', $row->salary_type) == 'weekly'): ?> selected <?php endif; ?> ><?php echo e(__("/weekly")); ?></option>
                                                        <option value="monthly" <?php if(old('salary_type', $row->salary_type) == 'monthly'): ?> selected <?php endif; ?> ><?php echo e(__("/monthly")); ?></option>
                                                        <option value="yearly" <?php if(old('salary_type', $row->salary_type) == 'yearly'): ?> selected <?php endif; ?> ><?php echo e(__("/yearly")); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <label class="mt-2">
                                                <input type="checkbox" name="wage_agreement" <?php if(old('wage_agreement', $row->wage_agreement)): ?> checked <?php endif; ?> value="1" /> <?php echo e(__("Wage Agreement")); ?>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__("Experience")); ?></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="<?php echo e(__("Experience")); ?>" name="experience" value="<?php echo e(old('experience',$row->experience)); ?>">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" style="font-size: 14px;"><?php echo e(__("year(s)")); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__("Number Of Recruitments")); ?></label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="<?php echo e(__("0")); ?>" name="number_recruitments" value="<?php echo e(old('number_recruitments',$row->number_recruitments)); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo e(__("Video Url")); ?></label>
                                            <input type="text" name="video" class="form-control" value="<?php echo e(old('video',$row->video)); ?>" placeholder="<?php echo e(__("Youtube link video")); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?php echo e(__("Video Cover Image")); ?></label>
                                            <div class="form-group">
                                                <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('video_cover_id',$row->video_cover_id); ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo e(__("Gallery")); ?> (<?php echo e(__('Recommended size image:1080 x 1920px')); ?>)</label>
                                            <?php
                                                $gallery_id = $row->gallery ?? old('gallery');
                                            ?>
                                            <?php echo \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery', $gallery_id); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if(is_default_lang()): ?>
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title"><h4><?php echo e(__("Job Location")); ?></h4></div>
                        <div class="widget-content">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Location")); ?> <span class="required">*</span></label>
                                <?php if(!empty($is_smart_search)): ?>
                                    <div class="form-group-smart-search">
                                        <div class="form-content">
                                            <?php
                                            $location_name = "";
                                            $list_json = [];
                                            $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json , &$location_name,$row) {
                                                foreach ($locations as $location) {
                                                    $translate = $location->translateOrOrigin(app()->getLocale());
                                                    if (old('location_id', $row->location_id) == $location->id){
                                                        $location_name = $translate->name;
                                                    }
                                                    $list_json[] = [
                                                        'id' => $location->id,
                                                        'title' => $prefix . ' ' . $translate->name,
                                                    ];
                                                    $traverse($location->children, $prefix . '-');
                                                }
                                            };
                                            $traverse($job_location);
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
                                        <select required name="location_id" class="form-control">
                                            <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                            <?php
                                            $traverse = function ($locations, $prefix = '') use (&$traverse, $row) {
                                                foreach ($locations as $location) {
                                                    $selected = '';
                                                    if (old('location_id', $row->location_id) == $location->id)
                                                        $selected = 'selected';
                                                    printf("<option value='%s' %s>%s</option>", $location->id, $selected, $prefix . ' ' . $location->name);
                                                    $traverse($location->children, $prefix . '-');
                                                }
                                            };
                                            $traverse($job_location);
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
                                            <input type="text" name="map_lat" class="form-control" value="<?php echo e(old('map_lat', $row->map_lat)); ?>" onkeydown="return event.key !== 'Enter';">
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo e(__("Map Longitude")); ?>:</label>
                                            <input type="text" name="map_lng" class="form-control" value="<?php echo e(old('map_lng', $row->map_lng)); ?>" onkeydown="return event.key !== 'Enter';">
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo e(__("Map Zoom")); ?>:</label>
                                            <input type="text" name="map_zoom" class="form-control" value="<?php echo e(old('map_zoom', $row->map_zoom ?? "8")); ?>" onkeydown="return event.key !== 'Enter';">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php echo $__env->make('Core::frontend/seo-meta/seo-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

                <?php if(setting_item('job_need_approve')): ?>
                        <!-- Ls widget -->
                        <div class="ls-widget">
                            <div class="tabs-box">
                                <div class="widget-title"><h4><?php echo e(__("Approval Status")); ?></h4></div>
                                <div class="widget-content">

                                    <?php if($row->id && $row->is_approved =='approved'): ?>
                                    <div disabled class="alert alert-success" type="submit"> <?php echo e(__('Your job is approved!')); ?></div>
                                    <?php else: ?>
                                        <div class="form-group">
                                            <label><?php echo e(__('Do you want to send request to Admin?')); ?></label>
                                            <br>
                                            <label>
                                                <input type="radio" name="is_approved" <?php if(old('is_approved',$row->is_approved) == "waiting"): ?> checked <?php endif; ?> value="waiting"> <?php echo e(__("Yes, send request to Admin")); ?>

                                            </label>
                                            <br>
                                            <label>
                                                <input type="radio" name="is_approved" <?php if(old('is_approved',$row->is_approved) == "draft" || empty(old('is_approved',$row->is_approved))): ?> checked <?php endif; ?> value="draft"> <?php echo e(__("No")); ?>

                                            </label>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                <?php endif; ?>

                <?php if(is_default_lang()): ?>
                    <?php if(empty(setting_item('job_hide_job_apply'))): ?>
                        <!-- Ls widget -->
                        <div class="ls-widget">
                            <div class="tabs-box">
                                <div class="widget-title"><h4><?php echo e(__("Job Apply")); ?></h4></div>
                                <div class="widget-content">
                                    <div class="form-group">
                                        <label><?php echo e(__('Apply Type')); ?></label>
                                        <select name="apply_type" class="form-control">
                                            <option value=""><?php echo e(__("Default")); ?></option>
                                            <option value="email" <?php if(old('apply_type', $row->apply_type) == 'email'): ?> selected <?php endif; ?> ><?php echo e(__("Send Email")); ?></option>
                                            <option value="external" <?php if(old('apply_type', $row->apply_type) == 'external'): ?> selected <?php endif; ?> ><?php echo e(__("External")); ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group" data-condition="apply_type:is(external)">
                                        <label><?php echo e(__("Apply Link")); ?></label>
                                        <input type="text" name="apply_link" class="form-control" value="<?php echo e(old('apply_link',$row->apply_link)); ?>" />
                                    </div>
                                    <div class="form-group" data-condition="apply_type:is(email)">
                                        <label><?php echo e(__("Apply Email")); ?></label>
                                        <input type="text" name="apply_email" class="form-control" value="<?php echo e(old('apply_email',$row->apply_email)); ?>" />
                                        <small><i><?php echo e(__("If is empty, it will be sent to the company's email")); ?></i></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("Availability")); ?></h4></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <label><?php echo e(__('Job Urgent')); ?></label>
                                    <br>
                                    <label>
                                        <input type="checkbox" name="is_urgent" <?php if(old('is_urgent',$row->is_urgent)): ?> checked <?php endif; ?> value="1"> <?php echo e(__("Enable Urgent")); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("Category")); ?> <span class="required">*</span></h4></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <div class="">
                                        <select name="category_id" class="form-control" required>
                                            <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                            <?php
                                            $traverse = function ($categories, $prefix = '') use (&$traverse, $row) {
                                                foreach ($categories as $category) {
                                                    $selected = '';
                                                    if (old('category_id', $row->category_id) == $category->id)
                                                        $selected = 'selected';

                                                    $translate = $category->translateOrOrigin(app()->getLocale());
                                                    printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $translate->name);
                                                    $traverse($category->children, $prefix . '-');
                                                }
                                            };
                                            $traverse($categories);
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("Job Type")); ?></h4></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <div class="">
                                        <select name="job_type_id" class="form-control" required>
                                            <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                            <?php
                                            foreach ($job_types as $job_type) {
                                                $selected = '';
                                                if (old('job_type_id', $row->job_type_id) == $job_type->id)
                                                    $selected = 'selected';
                                                printf("<option value='%s' %s>%s</option>", $job_type->id, $selected, $job_type->name);
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("Job Skills")); ?></h4></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <div class="">
                                        <select id="job_type_id" name="job_skills[]" class="form-control" multiple="multiple">
                                            <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                            <?php
                                            foreach ($job_skills as $job_skill) {
                                                $selected = '';
                                                if ($row->skills){
                                                    foreach ($row->skills as $skill){
                                                        if($job_skill->id == $skill->id){
                                                            $selected = 'selected';
                                                        }
                                                    }
                                                }
                                                printf("<option value='%s' %s>%s</option>", $job_skill->id, $selected, $job_skill->name);
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("Feature Image")); ?></h4></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('thumbnail_id',old('thumbnail_id', $row->thumbnail_id)); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script type="text/javascript" src="<?php echo e(asset('libs/daterange/moment.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libs/daterange/daterangepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('libs/select2/js/select2.min.js')); ?>" ></script>
    <script src="<?php echo e(asset('js/condition.js')); ?>"></script>
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
                locale:{
                    format:'YYYY/MM/DD'
                }
            }).on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('YYYY/MM/DD'));
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

            });

            $('.open-edit-input').on('click', function (e) {
                e.preventDefault();
                $(this).replaceWith('<input type="text" name="' + $(this).data('name') + '" value="' + $(this).html() + '">');
            });

            $(".form-group-item").each(function () {
                let container = $(this);
                $(this).on('click','.btn-remove-item',function () {
                    $(this).closest(".item").remove();
                });

                $(this).on('press','input,select',function () {
                    let value = $(this).val();
                    $(this).attr("value",value);
                });
            });
            $(".form-group-item .btn-add-item").on('click',function () {
                var p = $(this).closest(".form-group-item").find(".g-items");

                let number = $(this).closest(".form-group-item").find(".g-items .item:last-child").data("number");
                if(number === undefined) number = 0;
                else number++;
                let extra_html = $(this).closest(".form-group-item").find(".g-more").html();
                extra_html = extra_html.replace(/__name__=/gi, "name=");
                extra_html = extra_html.replace(/__number__/gi, number);
                p.append(extra_html);

                if(extra_html.indexOf('dungdt-select2-field-lazy') >0 ){

                    p.find('.dungdt-select2-field-lazy').each(function () {
                        var configs = $(this).data('options');
                        $(this).select2(configs);
                    });
                }
            });

            $('#job_type_id').select2();

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rvoize\modules/Job/Views/frontend/layouts/manage-job/edit-job.blade.php ENDPATH**/ ?>