
<?php $__env->startSection('head'); ?>
    <style>
        #permanentlyDeleteAccount .close-modal {
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
                <h3 class="title"><?php echo e(__('My Profile')); ?></h3>
                <div class="text"><?php echo e(__('Ready to jump back in?')); ?></div>
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
                        </div>
                        <?php continue; ?>;
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
                    <!-- Basic Information -->
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4><?php echo e(__('Basic Information')); ?></h4>
                            </div>
                            <div class="widget-content">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('First name')); ?> <span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo e(old('first_name', $user->first_name)); ?>"
                                                    name="first_name" placeholder="<?php echo e(__('First name')); ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('Last name')); ?> <span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo e(old('last_name', $user->last_name)); ?>"
                                                    name="last_name" placeholder="<?php echo e(__('Last name')); ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('E-mail')); ?> <span class="text-danger">*</span></label>
                                                <input type="email" required
                                                    value="<?php echo e(old('email', $row->user?->email)); ?>"
                                                    placeholder="<?php echo e(__('Email')); ?>" name="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender"><?php echo e(__('Gender')); ?></label>
                                                <select class="form-control" id="gender" name="gender">
                                                    <option value="" <?php if(old('gender', @$user->candidate->gender) == ''): ?> selected <?php endif; ?>>
                                                        <?php echo e(__('Select')); ?></option>
                                                    <option value="male" <?php if(old('gender', @$user->candidate->gender) == 'male'): ?> selected <?php endif; ?>>
                                                        <?php echo e(__('Male')); ?></option>
                                                    <option value="female" <?php if(old('gender', @$user->candidate->gender) == 'female'): ?> selected <?php endif; ?>>
                                                        <?php echo e(__('Female')); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('Contact Number')); ?> <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo e(old('phone', @$row->user?->phone)); ?>"
                                                    placeholder="<?php echo e(__('Contact Number')); ?>" name="phone"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <?php if(empty($row->user?->phone_verified_at) && !empty($row->user?->phone)): ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__('Verify Contact Number')); ?> </label>
                                                    <br />
                                                    <button class="btn btn-primary bc-call-modal mt-1 verifyNumber"
                                                        type="button">Send Verify Status</button>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('Spoken Languages known')); ?></label>
                                                <select id="languages" name="languages[]" class="form-control"
                                                    multiple="multiple">
                                                    <option value=""><?php echo e(__('-- Please Select --')); ?></option>
                                                    <?php
                                                    foreach ($languages as $language) {
                                                        $selected = '';
                                                        if (!empty($user->candidate->languages)) {
                                                            $lang = explode(',', $user->candidate->languages);
                                                            $lang = array_map('trim', $lang);
                                                            if (in_array($language, $lang)) {
                                                                $selected = 'selected';
                                                            }
                                                        }
                                                        printf("<option value='%s' %s>%s</option>", $language, $selected, $language);
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                       
                                    </div>

                                    <div class="row">
                                   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('Website')); ?></label>
                                                <input type="text" value="<?php echo e(old('website', @$user->candidate->website)); ?>"
                                                    name="website" placeholder="<?php echo e(__('Website')); ?>" class="form-control">
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('Work Experience')); ?></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="<?php echo e(__('Work Experience')); ?>" name="experience_year"
                                                        value="<?php echo e(old('experience_year', @$user->candidate->experience_year)); ?>">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"
                                                            style="font-size: 14px;"><?php echo e(__('year(s)')); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
       
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="bio">About me</label>
                                                <div>
                                                    <textarea name="bio" id="bio" rows="12" class="form-control"><?php echo e(strip_tags(old('bio', $user->bio))); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class=""><?php echo e(__('Country')); ?></label>
                                                <select name="country" class="form-control" id="country-sms-testing">
                                                    <option value=""><?php echo e(__('-- Select --')); ?></option>
                                                    <?php $__currentLoopData = get_country_lists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if(@$user->candidate->country == $id): ?> selected <?php endif; ?>
                                                            value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('City')); ?></label>
                                                <input type="text" value="<?php echo e(old('city', @$user->candidate->city)); ?>"
                                                    name="city" placeholder="<?php echo e(__('City')); ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><?php echo e(__('Address Line')); ?></label>
                                                <input type="text"
                                                    value="<?php echo e(old('address', @$user->candidate->address)); ?>"
                                                    placeholder="<?php echo e(__('Address')); ?>" name="address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo e(__('Location')); ?></label>
                                                <?php if(!empty($is_smart_search)): ?>
                                                    <div class="form-group-smart-search">
                                                        <div class="form-content">
                                                            <?php
                                                                $location_name = '';
                                                                $list_json = [];
                                                                $candidate = $user->candidate;
                                                                $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json, &$location_name, $candidate) {
                                                                    foreach ($locations as $location) {
                                                                        $translate = $location->translateOrOrigin(app()->getLocale());
                                                                        if (@$candidate->location_id == $location->id) {
                                                                            $location_name = $translate->name;
                                                                        }
                                                                        $list_json[] = [
                                                                            'id' => $location->id,
                                                                            'title' => $prefix . ' ' . $translate->name,
                                                                        ];
                                                                        $traverse($location->children, $prefix . '-');
                                                                    }
                                                                };
                                                                $traverse($locations);
                                                            ?>
                                                            <div class="smart-search">
                                                                <input type="text"
                                                                    class="smart-search-location parent_text form-control"
                                                                    placeholder="<?php echo e(__('-- Please Select --')); ?>"
                                                                    value="<?php echo e($location_name); ?>"
                                                                    data-onLoad="<?php echo e(__('Loading...')); ?>"
                                                                    data-default="<?php echo e(json_encode($list_json)); ?>">
                                                                <input type="hidden" class="child_id" name="location_id"
                                                                    value="<?php echo e(@$user->candidate->location_id ?? Request::query('location_id')); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="">
                                                        <select name="location_id" class="form-control">
                                                            <option value=""><?php echo e(__('-- Please Select --')); ?></option>
                                                            <?php
                                                                $candidate = $user->candidate;
                                                                $traverse = function ($locations, $prefix = '') use (&$traverse, $candidate) {
                                                                    foreach ($locations as $location) {
                                                                        $selected = '';
                                                                        if (@$candidate->location_id == $location->id) {
                                                                            $selected = 'selected';
                                                                        }
                                                                        printf("<option value='%s' %s>%s</option>", $location->id, $selected, $prefix . ' ' . $location->name);
                                                                        $traverse($location->children, $prefix . '-');
                                                                    }
                                                                };
                                                                $traverse($locations);
                                                            ?>
                                                        </select>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"><?php echo e(__('The geographic coordinate')); ?></label>
                                                <div class="control-map-group">
                                                    <div id="map_content"></div>
                                                    <input type="text" placeholder="<?php echo e(__('Search by name...')); ?>"
                                                        class="bravo_searchbox form-control" autocomplete="off"
                                                        onkeydown="return event.key !== 'Enter';">
                                                    <div class="g-control">
                                                        <div class="form-group">
                                                            <label><?php echo e(__('Map Latitude')); ?>:</label>
                                                            <input type="text" name="map_lat" class="form-control"
                                                                value="<?php echo e(@$user->candidate->map_lat ?? '51.505'); ?>"
                                                                onkeydown="return event.key !== 'Enter';">
                                                        </div>
                                                        <div class="form-group">
                                                            <label><?php echo e(__('Map Longitude')); ?>:</label>
                                                            <input type="text" name="map_lng" class="form-control"
                                                                value="<?php echo e(@$user->candidate->map_lng ?? '-0.09'); ?>"
                                                                onkeydown="return event.key !== 'Enter';">
                                                        </div>
                                                        <div class="form-group">
                                                            <label><?php echo e(__('Map Zoom')); ?>:</label>
                                                            <input type="text" name="map_zoom" class="form-control"
                                                                value="<?php echo e(@$user->candidate->map_zoom ?? '8'); ?>"
                                                                onkeydown="return event.key !== 'Enter';">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <!-- Basic Extra -->
                               
                                <!--  Basic Extra End -->
                            </div>
                        </div>
                    </div>
                    <!-- Basic Information End -->
                    
                    <!-- Qualification -->
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4><?php echo e(__('Qualification Information')); ?></h4>
                            </div>
                            <div class="widget-content">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="education_level"><?php echo e(__('Highest Qualification')); ?></label>
                                            <select class="form-control" id="education_level" name="education_level">
                                                <option value="" <?php if(old('education_level', @$user->candidate->education_level) == ''): ?> selected <?php endif; ?>>
                                                    <?php echo e(__('Select')); ?></option>
                                                <option value="certificate"
                                                    <?php if(old('education_level', @$user->candidate->education_level) == 'certificate'): ?> selected <?php endif; ?>>
                                                    <?php echo e(__('Certificate')); ?></option>
                                                <option value="diploma"
                                                    <?php if(old('education_level', @$user->candidate->education_level) == 'diploma'): ?> selected <?php endif; ?>>
                                                    <?php echo e(__('Diploma')); ?></option>
                                                <option value="associate"
                                                    <?php if(old('education_level', @$user->candidate->education_level) == 'associate'): ?> selected <?php endif; ?>>
                                                    <?php echo e(__('Associate')); ?></option>
                                                <option value="bachelor"
                                                    <?php if(old('education_level', @$user->candidate->education_level) == 'bachelor'): ?> selected <?php endif; ?>>
                                                    <?php echo e(__('Bachelor')); ?></option>
                                                <option value="master" <?php if(old('education_level', @$user->candidate->education_level) == 'master'): ?> selected <?php endif; ?>>
                                                    <?php echo e(__('Master')); ?></option>
                                                <option value="professional"
                                                    <?php if(old('education_level', @$user->candidate->education_level) == 'professional'): ?> selected <?php endif; ?>>
                                                    <?php echo e(__('Professional')); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                               
                                <!-- EEA -->

                                <h3 class="panel-body-title"><?php echo e(__('Education')); ?></h3>
                                <div class="form-group-item">
                                    <div class="g-items-header">
                                        <div class="row">
                                            <div class="col-md-2"><?php echo e(__('Year')); ?></div>
                                            <div class="col-md-3"><?php echo e(__('Location')); ?></div>
                                            <div class="col-md-3"><?php echo e(__('Reward')); ?></div>
                                            <div class="col-md-3"><?php echo e(__('More Information')); ?></div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                    <div class="g-items">
                                        <?php $educations = @$user->candidate->education; ?>
                                        <?php if(!empty($educations)): ?>
                                            <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="item" data-number="<?php echo e($key); ?>">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="text"
                                                                name="education[<?php echo e($key); ?>][from]"
                                                                class="form-control" value="<?php echo e(@$item['from']); ?>"
                                                                placeholder="<?php echo e(__('From')); ?>">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="text"
                                                                name="education[<?php echo e($key); ?>][to]"
                                                                class="form-control" value="<?php echo e(@$item['to']); ?>"
                                                                placeholder="<?php echo e(__('To')); ?>">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text"
                                                                name="education[<?php echo e($key); ?>][location]"
                                                                class="form-control" value="<?php echo e(@$item['location']); ?>">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text"
                                                                name="education[<?php echo e($key); ?>][reward]"
                                                                class="form-control" value="<?php echo e(@$item['reward']); ?>">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <textarea name="education[<?php echo e($key); ?>][information]" class="form-control"><?php echo e(@$item['information']); ?></textarea>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                                    class="fa fa-trash"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-right">
                                        <span class="btn btn-info btn-sm btn-add-item"><i
                                                class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                                    </div>
                                    <div class="g-more hide">
                                        <div class="item" data-number="__number__">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="text" __name__="education[__number__][from]"
                                                        class="form-control" value=""
                                                        placeholder="<?php echo e(__('From')); ?>">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" __name__="education[__number__][to]"
                                                        class="form-control" value=""
                                                        placeholder="<?php echo e(__('To')); ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" __name__="education[__number__][location]"
                                                        class="form-control" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" __name__="education[__number__][reward]"
                                                        class="form-control" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <textarea __name__="education[__number__][information]" class="form-control"></textarea>
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                            class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h3 class="panel-body-title"><?php echo e(__('Experience')); ?></h3>
                                <div class="form-group-item">
                                    <div class="g-items-header">
                                        <div class="row">
                                            <div class="col-md-2"><?php echo e(__('Year')); ?></div>
                                            <div class="col-md-3"><?php echo e(__('Location')); ?></div>
                                            <div class="col-md-3"><?php echo e(__('Position')); ?></div>
                                            <div class="col-md-3"><?php echo e(__('More Information')); ?></div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                    <div class="g-items">
                                        <?php $experiences = @$user->candidate->experience; ?>
                                        <?php if(!empty($experiences)): ?>
                                            <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="item" data-number="<?php echo e($key); ?>">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="text"
                                                                name="experience[<?php echo e($key); ?>][from]"
                                                                class="form-control" value="<?php echo e(@$item['from']); ?>"
                                                                placeholder="<?php echo e(__('From')); ?>">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="text"
                                                                name="experience[<?php echo e($key); ?>][to]"
                                                                class="form-control" value="<?php echo e(@$item['to']); ?>"
                                                                placeholder="<?php echo e(__('To')); ?>">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text"
                                                                name="experience[<?php echo e($key); ?>][location]"
                                                                class="form-control" value="<?php echo e(@$item['location']); ?>">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text"
                                                                name="experience[<?php echo e($key); ?>][position]"
                                                                class="form-control" value="<?php echo e(@$item['position']); ?>">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <textarea name="experience[<?php echo e($key); ?>][information]" class="form-control"><?php echo e(@$item['information']); ?></textarea>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                                    class="fa fa-trash"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-right">
                                        <span class="btn btn-info btn-sm btn-add-item"><i
                                                class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                                    </div>
                                    <div class="g-more hide">
                                        <div class="item" data-number="__number__">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="text" __name__="experience[__number__][from]"
                                                        class="form-control" value=""
                                                        placeholder="<?php echo e(__('From')); ?>">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" __name__="experience[__number__][to]"
                                                        class="form-control" value=""
                                                        placeholder="<?php echo e(__('To')); ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" __name__="experience[__number__][location]"
                                                        class="form-control" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" __name__="experience[__number__][position]"
                                                        class="form-control" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <textarea __name__="experience[__number__][information]" class="form-control" value=""></textarea>
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                            class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h3 class="panel-body-title"><?php echo e(__('Skills')); ?></h3>
                                <div class="form-group">
                                    <div class="">
                                        <select id="skills" name="skills[]" class="form-control" multiple="multiple">
                                            <option value=""><?php echo e(__('-- Please Select --')); ?></option>
                                            <?php
                                            foreach ($skills as $oneSkill) {
                                                $selected = '';
                                                if (!empty($row->skills)) {
                                                    foreach ($row->skills as $skill) {
                                                        if ($oneSkill->id == $skill->id) {
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

                                <hr>
                                <h3 class="panel-body-title"><?php echo e(__('Certifications')); ?></h3>
                                <div class="form-group-item">
                                    <div class="g-items-header">
                                        <div class="row">
                                            <div class="col-md-2"><?php echo e(__('Year')); ?></div>
                                            <div class="col-md-3"><?php echo e(__('Location')); ?></div>
                                            <div class="col-md-3"><?php echo e(__('Reward')); ?></div>
                                            <div class="col-md-3"><?php echo e(__('More Information')); ?></div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                    <div class="g-items">
                                        <?php $awards = @$candidate->award; ?>
                                        <?php if(!empty($awards)): ?>
                                            <?php $__currentLoopData = $awards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="item" data-number="<?php echo e($key); ?>">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="text"
                                                                name="award[<?php echo e($key); ?>][from]"
                                                                class="form-control" value="<?php echo e(@$item['from']); ?>"
                                                                placeholder="<?php echo e(__('From')); ?>">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="text" name="award[<?php echo e($key); ?>][to]"
                                                                class="form-control" value="<?php echo e(@$item['to']); ?>"
                                                                placeholder="<?php echo e(__('To')); ?>">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text"
                                                                name="award[<?php echo e($key); ?>][location]"
                                                                class="form-control" value="<?php echo e(@$item['location']); ?>">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text"
                                                                name="award[<?php echo e($key); ?>][reward]"
                                                                class="form-control" value="<?php echo e(@$item['reward']); ?>">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <textarea name="award[<?php echo e($key); ?>][information]" class="form-control"><?php echo e(@$item['information']); ?></textarea>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                                    class="fa fa-trash"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-right">
                                        <span class="btn btn-info btn-sm btn-add-item"><i
                                                class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                                    </div>
                                    <div class="g-more hide">
                                        <div class="item" data-number="__number__">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="text" __name__="award[__number__][from]"
                                                        class="form-control" value=""
                                                        placeholder="<?php echo e(__('From')); ?>">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" __name__="award[__number__][to]"
                                                        class="form-control" value=""
                                                        placeholder="<?php echo e(__('To')); ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" __name__="award[__number__][location]"
                                                        class="form-control" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" __name__="award[__number__][reward]"
                                                        class="form-control" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <textarea __name__="award[__number__][information]" class="form-control"></textarea>
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                            class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- EEA End -->
                            </div>
                        </div>
                    </div>
                    <!-- Qualification End -->

                    <!-- Job Preferences -->
                    <div class="ls-widget mb-4 card-sub_information">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__('Job Preferences')); ?></h4></div>
                            <div class="widget-content">
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__('Job title')); ?> <span class="text-danger">*</span></label>
                                            <input type="text" value="<?php echo e(old('title', @$user->candidate->title)); ?>"
                                                name="title" placeholder="<?php echo e(__('Job title')); ?>" required
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="job_type_id"><?php echo e(__('Job Type')); ?></label>
                                            <select name="job_type_id" id="job_type_id" class="form-control">
                                                <option value=""><?php echo e(__(" Select Job Type")); ?></option>
                                                <?php
                                                foreach ($job_types as $job_type) {
                                                    $selected = '';
                                                    if (old('job_type_id', $user->candidate?->job_type_id) == $job_type->id)
                                                        $selected = 'selected';
                                                    printf("<option value='%s' %s>%s</option>", $job_type->id, $selected, $job_type->name);
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__('Expected Pay')); ?></label>
                                            <div class="input-group">
                                                <input type="text"
                                                    value="<?php echo e(old('expected_salary', @$user->candidate->expected_salary)); ?>"
                                                    placeholder="<?php echo e(__('Expected Pay')); ?>" name="expected_salary"
                                                    class="form-control">
                                                <div class="input-group-append">
                                                    <select class="form-control" name="salary_type">
                                                        <option value="hourly"
                                                            <?php if(old('salary_type', @$user->candidate->salary_type) == 'hourly'): ?> selected <?php endif; ?>>
                                                            <?php echo e(currency_symbol() . __('/hourly')); ?> </option>
                                                        <option value="daily"
                                                            <?php if(old('salary_type', @$user->candidate->salary_type) == 'daily'): ?> selected <?php endif; ?>>
                                                            <?php echo e(currency_symbol() . __('/daily')); ?></option>
                                                        <option value="weekly"
                                                            <?php if(old('salary_type', @$user->candidate->salary_type) == 'weekly'): ?> selected <?php endif; ?>>
                                                            <?php echo e(currency_symbol() . __('/weekly')); ?></option>
                                                        <option value="monthly"
                                                            <?php if(old('salary_type', @$user->candidate->salary_type) == 'monthly'): ?> selected <?php endif; ?>>
                                                            <?php echo e(currency_symbol() . __('/monthly')); ?></option>
                                                        <option value="yearly"
                                                            <?php if(old('salary_type', @$user->candidate->salary_type) == 'yearly'): ?> selected <?php endif; ?>>
                                                            <?php echo e(currency_symbol() . __('/yearly')); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Are you willing to relocate checkbox -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Are you willing to relocate ? (Yes / No) </label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo e($user->candidate?->relocate === 'Yes' ? 'checked' : ''); ?> type="radio" name="relocate" id="relocateyes" value="Yes">
                                                <label class="form-check-label" for="relocateyes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo e($user->candidate?->relocate === 'No' ? 'checked' : ''); ?> type="radio" name="relocate" id="relocateno" value="No">
                                                <label class="form-check-label" for="relocateno">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Are you willing to relocate checkbox end -->
                                    <!-- Work Type dropdown to be added in Database -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="work_type"> Desired work setting ( Remote / In Office / Hybrid)  </label>
                                            <select name="work_type" id="work_type" class="form-control">
                                                <option value=""><?php echo e(__(" Select Work Type")); ?></option>
                                                <option <?php echo e($user->candidate?->work_type === 'Remote' ? 'selected' : ''); ?> value="Remote">Remote</option>
                                                <option <?php echo e($user->candidate?->work_type === 'In-office' ? 'selected' : ''); ?> value="In-office">In-Office</option>
                                                <option <?php echo e($user->candidate?->work_type === 'Hybrid' ? 'selected' : ''); ?> value="Hybrid">Hybrid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Work Type dropdown to be added in Database End -->


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Job Preferences End -->


                    
                   
                    



                    <?php echo $__env->make('Core::frontend.seo-meta.seo-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="mb-4 d-none d-md-block">
                        <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save"
                                style="padding-right: 5px"></i> <?php echo e(__('Save Changes')); ?></button>
                    </div>
                </div>

                <div class="col-lg-3 col-12">
                    <div class="ls-widget mb-4 ">
                        <div class="tabs-box">
                            <div class="widget-title"><strong><?php echo e(__('Profile')); ?></strong></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('avatar_id', old('avatar_id', $user->avatar_id)); ?>

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
                                        <option <?php if(old('allow_search', @$row->allow_search) == 'hide'): ?> selected <?php endif; ?> value="hide">
                                            <?php echo e(__('Hide')); ?></option>
                                        <option <?php if(old('allow_search', @$row->allow_search) == 'publish'): ?> selected <?php endif; ?> value="publish">
                                            <?php echo e(__('Publish')); ?></option>
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
                                    <select id="categories" class="form-control" name="categories[]"
                                        multiple="multiple">
                                        <option value=""><?php echo e(__('-- Please Select --')); ?></option>
                                        <?php
                                        foreach ($categories as $oneCategories) {
                                            $selected = '';
                                            if (!empty($row->categories)) {
                                                foreach ($row->categories as $category) {
                                                    if ($oneCategories->id == $category->id) {
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



                    <div class="ls-widget mb-4 card-social">
                        <div class="tabs-box">
                            <div class="widget-title"><strong><?php echo e(__('Social Media')); ?></strong></div>
                            <div class="widget-content">
                                <?php $socialMediaData = !empty($row) ? $row->social_media : []; ?>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-google"><i
                                                class="fab fa-linkedin"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="social_media[linkedin]"
                                        value="<?php echo e(@$socialMediaData['linkedin']); ?>" placeholder="<?php echo e(__('Linkedin')); ?>"
                                        aria-label="<?php echo e(__('Linkedin')); ?>" aria-describedby="social-linkedin">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 text-center">
                        <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save"
                                style="padding-right: 5px"></i> <?php echo e(__('Save Changes')); ?></button>
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
                            <?php echo e(__('Delete account')); ?>

                        </h4>
                    </div>
                    <div class="widget-content">
                        <div class="mb-4 mt-2">
                            <?php echo clean(
                                setting_item_with_lang(
                                    'user_permanently_delete_content',
                                    '',
                                    __(
                                        'Your account will be permanently deleted. Once you delete your account, there is no going back. Please be certain.',
                                    ),
                                ),
                            ); ?>

                        </div>
                        <a rel="modal:open" class="btn btn-danger"
                            href="#permanentlyDeleteAccount"><?php echo e(__('Delete your account')); ?></a>
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
                        <a href="<?php echo e(route('user.permanently.delete')); ?>"
                            class="btn btn-danger"><?php echo e(__('Confirm')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Modal -->
    <?php if(empty(@$row->user?->phone_verified_at) && !empty(@$row->user?->phone)): ?>
        <div class="modal fade verifyNumber" id="verifyNumber">
            <div id="login-modal">
                <div class="login-form default-form">
                    <div class="form-inner">
                        <div class="form-inner">
                            <h3>Verify Phone Number</h3>
                            <div class="alert alert-danger " id="verifyNumberAlert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <?php echo e(__('Please check the form below for problems')); ?>

                                <ul class="pl-2" id="verifyNumberAlertContent">
                                </ul>
                            </div>
                            <form class="form" id="bravo-form-verify-otp" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="<?php echo e(@$row->user?->id); ?>">
                                    <input type="text" name="otp" placeholder="<?php echo e(__('Enter OTP')); ?>" required>
                                </div>
                                <div class="form-group d-flex flex-column flex-sm-row  justify-content-around">
                                    <button class="btn btn-primary m-1" id="sendOtp" type="button">SEND OTP
                                        <span class="spinner-grow spinner-grow-sm icon-loading" role="status"
                                            aria-hidden="true"></span>
                                    </button>
                                    <button class="btn btn-success m-1" id="verifyOtp" type="button">VERIFY
                                        <span class="spinner-grow spinner-grow-sm icon-loading" role="status"
                                            aria-hidden="true"></span>
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
    <script src="<?php echo e(asset('libs/select2/js/select2.min.js')); ?>"></script>
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
        }).on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY/MM/DD'));
        });



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

        $('#sendOtp').on('click', function(e) {
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
                'url': `<?php echo e(route('user.sendOtp')); ?>`,
                'data': {
                    'id': form.find('input[name=user_id]').val(),
                },
                'type': 'POST',
                beforeSend: function() {
                    form.find('.error').hide();
                    form.find('.icon-loading').css("display", 'inline-block');
                },
                success: function(data) {
                    form.find('.icon-loading').hide();
                    console.log(data);
                    if (data.error === true) {
                        if (data.messages !== undefined) {
                            for (var item in data.messages) {
                                var msg = data.messages[item];
                                verifyAlertContent.append(`<li>${msg}</li>`);
                            }
                        }

                        verifyAlert.show();
                    }
                },
                error: function(e) {
                    form.find('.icon-loading').hide();
                    console.log(e);
                    // if(typeof e.responseJSON !== "undefined" && typeof e.responseJSON.message !='undefined'){
                    //     form.find('.message-error').show().html('<div class="alert alert-danger">' + e.responseJSON.message + '</div>');
                    // }
                }
            });
        });

        $('#verifyOtp').on('click', function(e) {
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
                'url': `<?php echo e(route('user.verifyNumber')); ?>`,
                'data': {
                    'id': form.find('input[name=user_id]').val(),
                    'otp': form.find('input[name=otp]').val(),
                },
                'type': 'POST',
                beforeSend: function() {
                    form.find('.error').hide();
                    form.find('.icon-loading').css("display", 'inline-block');
                },
                success: function(data) {
                    form.find('.icon-loading').hide();
                    if (data.error === true) {
                        if (data.messages !== undefined) {
                            for (var item in data.messages) {
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
                error: function(e) {
                    form.find('.icon-loading').hide();
                    console.log(e);
                    // if(typeof e.responseJSON !== "undefined" && typeof e.responseJSON.message !='undefined'){
                    //     form.find('.message-error').show().html('<div class="alert alert-danger">' + e.responseJSON.message + '</div>');
                    // }
                }
            });
        });


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

            let mapLat = <?php echo e($row->map_lat ?? setting_item('default_location_lat', '51.505')); ?>;
            let mapLng = <?php echo e($row->map_lng ?? setting_item('default_location_lng', '-0.09')); ?>;
            let mapZoom = <?php echo e($row->map_zoom ?? '8'); ?>;

            jQuery(function($) {
                new BravoMapEngine('map_content', {
                    disableScripts: true,
                    fitBounds: true,
                    center: [mapLat, mapLng],
                    zoom: mapZoom,
                    ready: function(engineMap) {
                        engineMap.addMarker([mapLat, mapLng], {
                            icon_options: {}
                        });
                        engineMap.on('click', function(dataLatLng) {
                            engineMap.clearMarkers();
                            engineMap.addMarker(dataLatLng, {
                                icon_options: {}
                            });
                            $("input[name=map_lat]").attr("value", dataLatLng[0]);
                            $("input[name=map_lng]").attr("value", dataLatLng[1]);
                        });
                        engineMap.on('zoom_changed', function(zoom) {
                            $("input[name=map_zoom]").attr("value", zoom);
                        });
                        engineMap.searchBox($('#customPlaceAddress'), function(dataLatLng) {
                            engineMap.clearMarkers();
                            engineMap.addMarker(dataLatLng, {
                                icon_options: {}
                            });
                            $("input[name=map_lat]").attr("value", dataLatLng[0]);
                            $("input[name=map_lng]").attr("value", dataLatLng[1]);
                        });
                        engineMap.searchBox($('.bravo_searchbox'), function(dataLatLng) {
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

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rvoize\modules/Candidate/Views/frontend/profile/edit.blade.php ENDPATH**/ ?>