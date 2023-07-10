<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Jobs List")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Config page list jobs of your website')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Title Page")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="job_page_search_title" value="<?php echo e(setting_item_with_lang('job_page_search_title',request()->query('lang'),$settings['job_page_search_title'] ?? __("Find Jobs"))); ?>" class="form-control">
                    </div>
                </div>

                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Require User Plan to Post")); ?></label>
                        <div class="form-controls">
                            <label ><input type="checkbox" name="job_require_plan" value="1" <?php if(setting_item('job_require_plan')): ?> checked <?php endif; ?> > <?php echo e(__("Yes Please")); ?></label>
                        </div>
                    </div>
                    <div class="form-group" data-condition="job_require_plan:is()">
                        <label class="" ><?php echo e(__("Company Posting Maximum Jobs")); ?></label>
                        <div class="form-controls">
                            <input type="number" name="job_company_max_post_jobs" value="<?php echo e(setting_item('job_company_max_post_jobs') ?? ''); ?>" class="form-control">
                            <small><i><?php echo e(__("0 or blank: unlimited")); ?></i></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Enable hide expired jobs")); ?></label>
                        <div class="form-controls">
                            <label ><input type="checkbox" name="job_hide_expired_jobs" value="1" <?php if(setting_item('job_hide_expired_jobs')): ?> checked <?php endif; ?> > <?php echo e(__("Yes")); ?></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="" ><?php echo e(__("Hide Apply Type: External/Sendmail")); ?></label>
                        <div class="form-controls">
                            <label ><input type="checkbox" name="job_hide_job_apply" value="1" <?php if(setting_item('job_hide_job_apply')): ?> checked <?php endif; ?> > <?php echo e(__("Yes")); ?></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="" ><?php echo e(__("JOB is created by employer must be approved by admin")); ?></label>
                        <div class="form-controls">
                            <label ><input type="checkbox" name="job_need_approve" value="1" <?php if(setting_item('job_need_approve')): ?> checked <?php endif; ?> > <?php echo e(__("Yes")); ?></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="" ><?php echo e(__("Page list jobs layout")); ?></label>
                        <div class="form-controls">
                            <select name="jobs_list_layout" class="form-control">
                                <option value="job-list-v1" <?php if(setting_item('jobs_list_layout') == 'job-list-v1'): ?> selected <?php endif; ?> ><?php echo e(__("V1")); ?></option>
                                <option value="job-list-v2" <?php if(setting_item('jobs_list_layout') == 'job-list-v2'): ?> selected <?php endif; ?> ><?php echo e(__("V2")); ?></option>
                                <option value="job-list-v3" <?php if(setting_item('jobs_list_layout') == 'job-list-v3'): ?> selected <?php endif; ?> ><?php echo e(__("V3")); ?></option>
                                <option value="job-list-v4" <?php if(setting_item('jobs_list_layout') == 'job-list-v4'): ?> selected <?php endif; ?> ><?php echo e(__("V4")); ?></option>
                                <option value="job-list-v5" <?php if(setting_item('jobs_list_layout') == 'job-list-v5'): ?> selected <?php endif; ?> ><?php echo e(__("V5")); ?></option>
                                <option value="job-list-v6" <?php if(setting_item('jobs_list_layout') == 'job-list-v6'): ?> selected <?php endif; ?> ><?php echo e(__("V6")); ?></option>
                                <option value="job-list-v7" <?php if(setting_item('jobs_list_layout') == 'job-list-v7'): ?> selected <?php endif; ?> ><?php echo e(__("V7")); ?></option>
                                <option value="job-list-v8" <?php if(setting_item('jobs_list_layout') == 'job-list-v6'): ?> selected <?php endif; ?> ><?php echo e(__("V8")); ?></option>
                                <option value="job-list-v9" <?php if(setting_item('jobs_list_layout') == 'job-list-v9'): ?> selected <?php endif; ?> ><?php echo e(__("V9")); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="" ><?php echo e(__("Job Single Layout")); ?></label>
                        <div class="form-controls">
                            <select name="job_single_layout" class="form-control">
                                <option value="job-single-v1" <?php if(setting_item('job_single_layout') == 'job-single-v1'): ?> selected <?php endif; ?> ><?php echo e(__("V1")); ?></option>
                                <option value="job-single-v2" <?php if(setting_item('job_single_layout') == 'job-single-v2'): ?> selected <?php endif; ?> ><?php echo e(__("V2")); ?></option>
                                <option value="job-single-v3" <?php if(setting_item('job_single_layout') == 'job-single-v3'): ?> selected <?php endif; ?> ><?php echo e(__("V3")); ?></option>
                                <option value="job-single-v4" <?php if(setting_item('job_single_layout') == 'job-single-v4'): ?> selected <?php endif; ?> ><?php echo e(__("V4")); ?></option>
                                <option value="job-single-v5" <?php if(setting_item('job_single_layout') == 'job-single-v5'): ?> selected <?php endif; ?> ><?php echo e(__("V5")); ?></option>
                            </select>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if(is_default_lang()): ?>
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Sidebar - Search fields")); ?></label>
                        <div class="form-controls">
                            <div class="form-group-item">
                                <div class="g-items-header">
                                    <div class="row">
                                        <div class="col-md-5"><?php echo e(__("Title")); ?></div>
                                        <div class="col-md-4"><?php echo e(__('Type')); ?></div>
                                        <div class="col-md-2"><?php echo e(__('Order')); ?></div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="g-items">
                                    <?php
                                    $languages = \Modules\Language\Models\Language::getActive();
                                    if(!empty($settings['job_sidebar_search_fields'])){
                                    $job_sidebar_search_fields  = json_decode($settings['job_sidebar_search_fields']);
                                    ?>
                                    <?php $__currentLoopData = $job_sidebar_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item" data-number="<?php echo e($key); ?>">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : "";
                                                                $title_lang = 'title'.$key_lang;
                                                            ?>
                                                            <div class="g-lang">
                                                                <div class="title-lang"><?php echo e($language->name); ?></div>
                                                                <input type="text" name="job_sidebar_search_fields[<?php echo e($key); ?>][title<?php echo e($key_lang); ?>]" class="form-control" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e($item->$title_lang ?? ''); ?>">
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <input type="text" name="job_sidebar_search_fields[<?php echo e($key); ?>][title]" class="form-control" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e($item->title ?? ''); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="job_sidebar_search_fields[<?php echo e($key); ?>][type]">
                                                        <option value="keyword" <?php if(!empty($item->type) && $item->type=='keyword'): ?> selected <?php endif; ?>><?php echo e(__("Keyword")); ?></option>
                                                        <option value="location" <?php if(!empty($item->type) && $item->type=='location'): ?> selected <?php endif; ?>><?php echo e(__("Location")); ?></option>
                                                        <option value="category" <?php if(!empty($item->type) && $item->type=='category'): ?> selected <?php endif; ?>><?php echo e(__("Category")); ?></option>
                                                        <option value="job_type" <?php if(!empty($item->type) && $item->type=='job_type'): ?> selected <?php endif; ?>><?php echo e(__("Job Type")); ?></option>
                                                        <option value="date_posted" <?php if(!empty($item->type) && $item->type=='date_posted'): ?> selected <?php endif; ?>><?php echo e(__("Date Posted")); ?></option>
                                                        <option value="experience" <?php if(!empty($item->type) && $item->type=='experience'): ?> selected <?php endif; ?>><?php echo e(__("Experience Level")); ?></option>
                                                        <option value="salary" <?php if(!empty($item->type) && $item->type=='salary'): ?> selected <?php endif; ?>><?php echo e(__("Salary")); ?></option>
                                                        <option value="zipcode" <?php if(!empty($item->type) && $item->type=='zipcode'): ?> selected <?php endif; ?>><?php echo e(__("Zip Code")); ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" name="job_sidebar_search_fields[<?php echo e($key); ?>][position]" min="0" value="<?php echo e($item->position ?? 1); ?>" class="form-control">
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php } ?>
                                </div>
                                <div class="text-right">
                                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                                </div>
                                <div class="g-more hide">
                                    <div class="item" data-number="__number__">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $key = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                                        <div class="g-lang">
                                                            <div class="title-lang"><?php echo e($language->name); ?></div>
                                                            <input type="text" __name__="job_sidebar_search_fields[__number__][title<?php echo e($key); ?>]" class="form-control" placeholder="<?php echo e(__('Title')); ?>">
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <input type="text" __name__="job_sidebar_search_fields[__number__][title]" class="form-control" placeholder="<?php echo e(__('Title')); ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" __name__="job_sidebar_search_fields[__number__][type]">
                                                    <option value="keyword"><?php echo e(__("Keyword")); ?></option>
                                                    <option value="location"><?php echo e(__("Location")); ?></option>
                                                    <option value="category"><?php echo e(__("Category")); ?></option>
                                                    <option value="job_type"><?php echo e(__("Job Type")); ?></option>
                                                    <option value="date_posted"><?php echo e(__("Date Posted")); ?></option>
                                                    <option value="experience"><?php echo e(__("Experience Level")); ?></option>
                                                    <option value="salary"><?php echo e(__("Salary")); ?></option>
                                                    <option value="zipcode"><?php echo e(__("Zip Code")); ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" __name__="job_sidebar_search_fields[__number__][position]" min="0" value="1" class="form-control">
                                            </div>
                                            <div class="col-md-1">
                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="" ><?php echo e(__("Banner - Search fields")); ?></label>
                        <div class="form-controls">
                            <div class="form-group-item">
                                <div class="g-items-header">
                                    <div class="row">
                                        <div class="col-md-5"><?php echo e(__("Title")); ?></div>
                                        <div class="col-md-4"><?php echo e(__('Type')); ?></div>
                                        <div class="col-md-2"><?php echo e(__('Order')); ?></div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="g-items">
                                    <?php
                                    if(!empty($settings['job_banner_search_fields'])){
                                    $job_banner_search_fields  = json_decode($settings['job_banner_search_fields']);

                                    ?>
                                    <?php $__currentLoopData = $job_banner_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item" data-number="<?php echo e($key); ?>">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : "";
                                                            $title_lang = 'title'.$key_lang;
                                                            ?>
                                                            <div class="g-lang">
                                                                <div class="title-lang"><?php echo e($language->name); ?></div>
                                                                <input type="text" name="job_banner_search_fields[<?php echo e($key); ?>][title<?php echo e($key_lang); ?>]" class="form-control" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e($item->$title_lang ?? ''); ?>">
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <input type="text" name="job_banner_search_fields[<?php echo e($key); ?>][title]" class="form-control" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e($item->title ?? ''); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="job_banner_search_fields[<?php echo e($key); ?>][type]">
                                                        <option value="keyword" <?php if(!empty($item->type) && $item->type=='keyword'): ?> selected <?php endif; ?>><?php echo e(__("Keyword")); ?></option>
                                                        <option value="location" <?php if(!empty($item->type) && $item->type=='location'): ?> selected <?php endif; ?>><?php echo e(__("Location")); ?></option>
                                                        <option value="category" <?php if(!empty($item->type) && $item->type=='category'): ?> selected <?php endif; ?>><?php echo e(__("Category")); ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" name="job_banner_search_fields[<?php echo e($key); ?>][position]" min="0" value="<?php echo e($item->position ?? 1); ?>" class="form-control">
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php } ?>
                                </div>
                                <div class="text-right">
                                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                                </div>
                                <div class="g-more hide">
                                    <div class="item" data-number="__number__">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $key = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                                        <div class="g-lang">
                                                            <div class="title-lang"><?php echo e($language->name); ?></div>
                                                            <input type="text" __name__="job_banner_search_fields[__number__][title<?php echo e($key); ?>]" class="form-control" placeholder="<?php echo e(__('Title')); ?>">
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <input type="text" __name__="job_banner_search_fields[__number__][title]" class="form-control" placeholder="<?php echo e(__('Title')); ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" __name__="job_banner_search_fields[__number__][type]">
                                                    <option value="keyword"><?php echo e(__("Keyword")); ?></option>
                                                    <option value="location"><?php echo e(__("Location")); ?></option>
                                                    <option value="category"><?php echo e(__("Category")); ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" __name__="job_banner_search_fields[__number__][position]" min="0" value="1" class="form-control">
                                            </div>
                                            <div class="col-md-1">
                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if(is_default_lang()): ?>
                        <div class="form-group">
                            <label class="" ><?php echo e(__("Location Field Style")); ?></label>
                            <div class="form-controls">
                                <select name="job_location_search_style" class="form-control">
                                    <option value="normal" <?php if(setting_item('job_location_search_style') == 'normal'): ?> selected <?php endif; ?> ><?php echo e(__("Normal")); ?></option>
                                    <option value="autocomplete" <?php if(setting_item('job_location_search_style') == 'autocomplete'): ?> selected <?php endif; ?> ><?php echo e(__("Autocomplete from locations")); ?></option>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
            $job_sidebar_cta = setting_item_with_lang('job_sidebar_cta',request()->query('lang'), $settings['job_sidebar_cta'] ?? false);
            if(!empty($job_sidebar_cta)) $job_sidebar_cta = json_decode($job_sidebar_cta);
        ?>
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Sidebar - Call to action")); ?></label>
                    <div class="form-group-border p-3" style="border: 1px solid #ddd">
                        <div class="form-group">
                            <label><?php echo e(__("Title")); ?></label>
                            <div class="form-controls">
                                <input type="text" name="job_sidebar_cta[title]" value="<?php echo e($job_sidebar_cta->title ?? __("Recruiting?")); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__("Description")); ?></label>
                            <div class="form-controls">
                                <textarea name="job_sidebar_cta[desc]" class="form-control"><?php echo e($job_sidebar_cta->desc ?? ''); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__("Button")); ?></label>
                            <div class="form-controls">
                                <div class="input-group">
                                    <input type="text" name="job_sidebar_cta[button][url]" class="form-control" placeholder="<?php echo e(__("Url")); ?>" value="<?php echo e($job_sidebar_cta->button->url ?? ''); ?>">
                                    <input type="text" name="job_sidebar_cta[button][name]" class="form-control" placeholder="<?php echo e(__("Name")); ?>" value="<?php echo e($job_sidebar_cta->button->name ?? ''); ?>">
                                    <div class="input-group-append">
                                        <select name="job_sidebar_cta[button][target]" class="form-control">
                                            <option value="" selected disabled><?php echo e(__("Target")); ?></option>
                                            <option value="_self" <?php if(($job_sidebar_cta->button->target ?? '') == '_self'): ?> selected <?php endif; ?>><?php echo e(__("Same window")); ?></option>
                                            <option value="_blank" <?php if(($job_sidebar_cta->button->target ?? '') == '_blank'): ?> selected <?php endif; ?>><?php echo e(__("Open new tab")); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__("Image")); ?></label>
                            <div class="form-controls">
                                <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('job_sidebar_cta[image]', $job_sidebar_cta->image ?? ''); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("SEO Options")); ?></label>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#seo_1"><?php echo e(__("General Options")); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#seo_2"><?php echo e(__("Share Facebook")); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#seo_3"><?php echo e(__("Share Twitter")); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content" >
                        <div class="tab-pane active" id="seo_1">
                            <div class="form-group" >
                                <label class="control-label"><?php echo e(__("Seo Title")); ?></label>
                                <input type="text" name="job_page_list_seo_title" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e(setting_item_with_lang('job_page_list_seo_title',request()->query('lang'),$settings['job_page_list_seo_title'] ?? "")); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Seo Description")); ?></label>
                                <input type="text" name="job_page_list_seo_desc" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e(setting_item_with_lang('job_page_list_seo_desc',request()->query('lang'),$settings['job_page_list_seo_desc'] ?? "")); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Featured Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('job_page_list_seo_image', $settings['job_page_list_seo_image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <?php $seo_share = !empty($settings['job_page_list_seo_share']) ? json_decode($settings['job_page_list_seo_share'],true): false;
                        $seo_share = setting_item_with_lang('job_page_list_seo_share',request()->query('lang'),$seo_share)
                        ?>
                        <div class="tab-pane" id="seo_2">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Facebook Title")); ?></label>
                                <input type="text" name="job_page_list_seo_share[facebook][title]" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e($seo_share['facebook']['title'] ?? ""); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Facebook Description")); ?></label>
                                <input type="text" name="job_page_list_seo_share[facebook][desc]" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e($seo_share['facebook']['desc'] ?? ""); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Facebook Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('job_page_list_seo_share[facebook][image]',$seo_share['facebook']['image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane" id="seo_3">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Twitter Title")); ?></label>
                                <input type="text" name="job_page_list_seo_share[twitter][title]" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e($seo_share['twitter']['title'] ?? ""); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Twitter Description")); ?></label>
                                <input type="text" name="job_page_list_seo_share[twitter][desc]" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e($seo_share['twitter']['title'] ?? ""); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Twitter Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('job_page_list_seo_share[twitter][image]', $seo_share['twitter']['image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Job/Views/admin/settings/job.blade.php ENDPATH**/ ?>