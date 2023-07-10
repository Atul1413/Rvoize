<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Candidates List")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Config page list candidates of your website')); ?></p>
    </div>
    <div class="col-sm-8">
        <?php if(is_default_lang()): ?>
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Candidate Single Layout")); ?></label>
                        <div class="form-controls">
                            <select class="form-control" name="candidate_single_layout">
                                <?php for($i = 1; $i <= 2; $i++): ?>
                                    <option value="v<?php echo e($i); ?>" <?php if(setting_item('candidate_single_layout','v1') == "v$i"): ?> selected <?php endif; ?>><?php echo e(__('Version :ver',['ver' => $i])); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Candidate List Layout")); ?></label>
                        <div class="form-controls">
                            <select class="form-control" name="candidate_list_layout">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <option value="v<?php echo e($i); ?>" <?php if(setting_item('candidate_list_layout','v1') == "v$i"): ?> selected <?php endif; ?>><?php echo e(__('Version :ver',['ver' => $i])); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Title Page")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="candidate_page_search_title" value="<?php echo e(setting_item_with_lang('candidate_page_search_title',request()->query('lang'),$settings['candidate_page_search_title'] ?? __("Find Candidates"))); ?>" class="form-control">
                    </div>
                </div>
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Login required to download CV?")); ?></label>
                        <div class="form-controls">
                            <input type="checkbox" name="candidate_download_cv_required_login" <?php if(!empty(setting_item('candidate_download_cv_required_login'))): ?> checked <?php endif; ?> value="1" class="form-control"> <?php echo e(__("On")); ?>

                        </div>
                    </div>
                <?php endif; ?>
                <?php $candidate_public_policy = setting_item('candidate_public_policy', 'public'); ?>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Candidate public information policy")); ?></label>
                    <div class="form-controls">
                        <select class="form-control" name="candidate_public_policy">
                            <option value="public"><?php echo e(__("Anyone can view")); ?></option>
                            <option value="employer" <?php if($candidate_public_policy == 'employer'): ?> selected <?php endif; ?>><?php echo e(__("Only employer")); ?></option>
                            <option value="employer_applied" <?php if($candidate_public_policy == 'employer_applied'): ?> selected <?php endif; ?>><?php echo e(__("Only applied employer")); ?></option>
                        </select>
                    </div>
                </div>
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Maximum value")); ?></label>
                        <div class="form-controls">
                            <input type="number" name="candidate_maximum_job_apply" value="<?php echo e(setting_item('candidate_maximum_job_apply', '') ?? ''); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Limit to apply by")); ?></label>
                        <?php $candidate_limit_apply_by = setting_item('candidate_limit_apply_by', ''); ?>
                        <div class="form-controls">
                            <select class="form-control" name="candidate_limit_apply_by">
                                <option value="none"><?php echo e(__("None")); ?></option>
                                <option value="day" <?php if($candidate_limit_apply_by == 'day'): ?> selected <?php endif; ?>><?php echo e(__("Limit by day")); ?></option>
                                <option value="month" <?php if($candidate_limit_apply_by == 'month'): ?> selected <?php endif; ?>><?php echo e(__("Limit by month")); ?></option>
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
                                    if(!empty($settings['candidate_sidebar_search_fields'])){
                                    $candidate_sidebar_search_fields  = json_decode($settings['candidate_sidebar_search_fields']);
                                    ?>
                                    <?php $__currentLoopData = $candidate_sidebar_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                                <input type="text" name="candidate_sidebar_search_fields[<?php echo e($key); ?>][title<?php echo e($key_lang); ?>]" class="form-control" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e($item->$title_lang ?? ''); ?>">
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <input type="text" name="candidate_sidebar_search_fields[<?php echo e($key); ?>][title]" class="form-control" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e($item->title ?? ''); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="candidate_sidebar_search_fields[<?php echo e($key); ?>][type]">
                                                        <option value="keyword" <?php if(!empty($item->type) && $item->type=='keyword'): ?> selected <?php endif; ?>><?php echo e(__("Keyword")); ?></option>
                                                        <option value="location" <?php if(!empty($item->type) && $item->type=='location'): ?> selected <?php endif; ?>><?php echo e(__("Location")); ?></option>
                                                        <option value="category" <?php if(!empty($item->type) && $item->type=='category'): ?> selected <?php endif; ?>><?php echo e(__("Category")); ?></option>
                                                        <option value="skill" <?php if(!empty($item->type) && $item->type=='skill'): ?> selected <?php endif; ?>><?php echo e(__("Skill")); ?></option>
                                                        <option value="education" <?php if(!empty($item->type) && $item->type=='education'): ?> selected <?php endif; ?>><?php echo e(__("Education Level")); ?></option>
                                                        <option value="date_posted" <?php if(!empty($item->type) && $item->type=='date_posted'): ?> selected <?php endif; ?>><?php echo e(__("Date Posted")); ?></option>
                                                        <option value="experience" <?php if(!empty($item->type) && $item->type=='experience'): ?> selected <?php endif; ?>><?php echo e(__("Experience Level")); ?></option>
                                                        <option value="salary" <?php if(!empty($item->type) && $item->type=='salary'): ?> selected <?php endif; ?>><?php echo e(__("Salary")); ?></option>
                                                        <option value="zipcode" <?php if(!empty($item->type) && $item->type=='zipcode'): ?> selected <?php endif; ?>><?php echo e(__("Zip Code")); ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" name="candidate_sidebar_search_fields[<?php echo e($key); ?>][position]" min="0" value="<?php echo e($item->position ?? 1); ?>" class="form-control">
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
                                                            <input type="text" __name__="candidate_sidebar_search_fields[__number__][title<?php echo e($key); ?>]" class="form-control" placeholder="<?php echo e(__('Title')); ?>">
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <input type="text" __name__="candidate_sidebar_search_fields[__number__][title]" class="form-control" placeholder="<?php echo e(__('Title')); ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" __name__="candidate_sidebar_search_fields[__number__][type]">
                                                    <option value="keyword"><?php echo e(__("Keyword")); ?></option>
                                                    <option value="location"><?php echo e(__("Location")); ?></option>
                                                    <option value="category"><?php echo e(__("Category")); ?></option>
                                                    <option value="education"><?php echo e(__("Education Level")); ?></option>
                                                    <option value="date_posted"><?php echo e(__("Date Posted")); ?></option>
                                                    <option value="experience"><?php echo e(__("Experience Level")); ?></option>
                                                    <option value="salary"><?php echo e(__("Salary")); ?></option>
                                                    <option value="zipcode"><?php echo e(__("Zip Code")); ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" __name__="candidate_sidebar_search_fields[__number__][position]" min="0" value="1" class="form-control">
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
                                <select name="candidate_location_search_style" class="form-control">
                                    <option value="normal" <?php if(setting_item('candidate_location_search_style') == 'normal'): ?> selected <?php endif; ?> ><?php echo e(__("Normal")); ?></option>
                                    <option value="autocomplete" <?php if(setting_item('candidate_location_search_style') == 'autocomplete'): ?> selected <?php endif; ?> ><?php echo e(__("Autocomplete from locations")); ?></option>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        <?php endif; ?>
        <?php
            $candidate_sidebar_cta = setting_item_with_lang('candidate_sidebar_cta',request()->query('lang'), $settings['candidate_sidebar_cta'] ?? false);
            if(!empty($candidate_sidebar_cta)) $candidate_sidebar_cta = json_decode($candidate_sidebar_cta);
        ?>
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Sidebar - Call to action")); ?></label>
                    <div class="form-group-border p-3" style="border: 1px solid #ddd">
                        <div class="form-group">
                            <label><?php echo e(__("Title")); ?></label>
                            <div class="form-controls">
                                <input type="text" name="candidate_sidebar_cta[title]" value="<?php echo e($candidate_sidebar_cta->title ?? __("Recruiting?")); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__("Description")); ?></label>
                            <div class="form-controls">
                                <textarea name="candidate_sidebar_cta[desc]" class="form-control"><?php echo e($candidate_sidebar_cta->desc ?? ''); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__("Button")); ?></label>
                            <div class="form-controls">
                                <div class="input-group">
                                    <input type="text" name="candidate_sidebar_cta[button][url]" class="form-control" placeholder="<?php echo e(__("Url")); ?>" value="<?php echo e($candidate_sidebar_cta->button->url ?? ''); ?>">
                                    <input type="text" name="candidate_sidebar_cta[button][name]" class="form-control" placeholder="<?php echo e(__("Name")); ?>" value="<?php echo e($candidate_sidebar_cta->button->name ?? ''); ?>">
                                    <div class="input-group-append">
                                        <select name="candidate_sidebar_cta[button][target]" class="form-control">
                                            <option value="" selected disabled><?php echo e(__("Target")); ?></option>
                                            <option value="self" <?php if(($candidate_sidebar_cta->button->target ?? '') == 'self'): ?> selected <?php endif; ?>><?php echo e(__("Same window")); ?></option>
                                            <option value="blank" <?php if(($candidate_sidebar_cta->button->target ?? '') == 'blank'): ?> selected <?php endif; ?>><?php echo e(__("Open new tab")); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__("Image")); ?></label>
                            <div class="form-controls">
                                <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('candidate_sidebar_cta[image]', $candidate_sidebar_cta->image ?? ''); ?>

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
                                <input type="text" name="candidate_page_list_seo_title" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e(setting_item_with_lang('candidate_page_list_seo_title',request()->query('lang'),$settings['candidate_page_list_seo_title'] ?? "")); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Seo Description")); ?></label>
                                <input type="text" name="candidate_page_list_seo_desc" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e(setting_item_with_lang('candidate_page_list_seo_desc',request()->query('lang'),$settings['candidate_page_list_seo_desc'] ?? "")); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Featured Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('candidate_page_list_seo_image', $settings['candidate_page_list_seo_image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <?php $seo_share = !empty($settings['candidate_page_list_seo_share']) ? json_decode($settings['candidate_page_list_seo_share'],true): false;
                        $seo_share = setting_item_with_lang('candidate_page_list_seo_share',request()->query('lang'),$seo_share)
                        ?>
                        <div class="tab-pane" id="seo_2">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Facebook Title")); ?></label>
                                <input type="text" name="candidate_page_list_seo_share[facebook][title]" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e($seo_share['facebook']['title'] ?? ""); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Facebook Description")); ?></label>
                                <input type="text" name="candidate_page_list_seo_share[facebook][desc]" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e($seo_share['facebook']['desc'] ?? ""); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Facebook Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('candidate_page_list_seo_share[facebook][image]',$seo_share['facebook']['image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane" id="seo_3">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Twitter Title")); ?></label>
                                <input type="text" name="candidate_page_list_seo_share[twitter][title]" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e($seo_share['twitter']['title'] ?? ""); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Twitter Description")); ?></label>
                                <input type="text" name="candidate_page_list_seo_share[twitter][desc]" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e($seo_share['twitter']['title'] ?? ""); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Twitter Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('candidate_page_list_seo_share[twitter][image]', $seo_share['twitter']['image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\rvoize\modules/Candidate/Views/admin/settings/candidate.blade.php ENDPATH**/ ?>