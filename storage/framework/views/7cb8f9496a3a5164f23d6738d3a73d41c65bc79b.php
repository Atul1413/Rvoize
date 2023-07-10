<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Company List")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Config page list company of your website')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Title Page")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="company_page_search_title" value="<?php echo e(setting_item_with_lang('company_page_search_title',request()->query('lang'),$settings['company_page_search_title'] ?? __("Find Company"))); ?>" class="form-control">
                    </div>
                </div>
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Page list company layout")); ?></label>
                        <div class="form-controls">
                            <select name="company_list_layout" class="form-control">
                                <option value="company-list-v1" <?php if(setting_item('company_list_layout') == 'company-list-v1'): ?> selected <?php endif; ?> ><?php echo e(__("V1")); ?></option>
                                <option value="company-list-v2" <?php if(setting_item('company_list_layout') == 'company-list-v2'): ?> selected <?php endif; ?> ><?php echo e(__("V2")); ?></option>
                                <option value="company-list-v3" <?php if(setting_item('company_list_layout') == 'company-list-v3'): ?> selected <?php endif; ?> ><?php echo e(__("V3")); ?></option>
                                <option value="company-list-v4" <?php if(setting_item('company_list_layout') == 'company-list-v4'): ?> selected <?php endif; ?> ><?php echo e(__("V4")); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Company Single Layout")); ?></label>
                        <div class="form-controls">
                            <select name="single_company_layout" class="form-control">
                                <option value="company-single-v1" <?php if(setting_item('single_company_layout') == 'company-single-v1'): ?> selected <?php endif; ?> ><?php echo e(__("V1")); ?></option>
                                <option value="company-single-v2" <?php if(setting_item('single_company_layout') == 'company-single-v2'): ?> selected <?php endif; ?> ><?php echo e(__("V2")); ?></option>
                                <option value="company-single-v3" <?php if(setting_item('single_company_layout') == 'company-single-v3'): ?> selected <?php endif; ?> ><?php echo e(__("V3")); ?></option>
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
                        <label><?php echo e(__("Enable Hide Email & Phone")); ?></label>
                        <div class="form-controls">
                            <label> <input type="checkbox" <?php if($settings['enable_hide_email_company'] ?? '' == 1): ?> checked <?php endif; ?> name="enable_hide_email_company" value="1"> <?php echo e(__("Yes")); ?></label>
                        </div>
                    </div>
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
                                    if(!empty($settings['company_sidebar_search_fields'])){
                                    $company_sidebar_search_fields  = json_decode($settings['company_sidebar_search_fields']);

                                    ?>
                                    <?php $__currentLoopData = $company_sidebar_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                                <input type="text" name="company_sidebar_search_fields[<?php echo e($key); ?>][title<?php echo e($key_lang); ?>]" class="form-control" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e($item->$title_lang ?? ''); ?>">
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <input type="text" name="company_sidebar_search_fields[<?php echo e($key); ?>][title]" class="form-control" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e($item->title); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="company_sidebar_search_fields[<?php echo e($key); ?>][type]">
                                                        <option value="keyword" <?php if(!empty($item->type) && $item->type=='keyword'): ?> selected <?php endif; ?>><?php echo e(__("Keyword")); ?></option>
                                                        <option value="location" <?php if(!empty($item->type) && $item->type=='location'): ?> selected <?php endif; ?>><?php echo e(__("Location")); ?></option>
                                                        <option value="category" <?php if(!empty($item->type) && $item->type=='category'): ?> selected <?php endif; ?>><?php echo e(__("Category")); ?></option>
                                                        <option value="att" <?php if(!empty($item->type) && $item->type=='att'): ?> selected <?php endif; ?>><?php echo e(__("Attribute")); ?></option>
                                                        <option value="founded_date" <?php if(!empty($item->type) && $item->type=='founded_date'): ?> selected <?php endif; ?>><?php echo e(__("Founded Date")); ?></option>
                                                        <option value="zipcode" <?php if(!empty($item->type) && $item->type=='zipcode'): ?> selected <?php endif; ?>><?php echo e(__("Zip Code")); ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" name="company_sidebar_search_fields[<?php echo e($key); ?>][position]" min="0" value="<?php echo e($item->position ?? 1); ?>" class="form-control">
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
                                                            <input type="text" __name__="company_sidebar_search_fields[__number__][title<?php echo e($key); ?>]" class="form-control" placeholder="<?php echo e(__('Title')); ?>">
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <input type="text" __name__="company_sidebar_search_fields[__number__][title]" class="form-control" placeholder="<?php echo e(__('Title')); ?>">
                                                <?php endif; ?>

                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" __name__="company_sidebar_search_fields[__number__][type]">
                                                    <option value="keyword"><?php echo e(__("Keyword")); ?></option>
                                                    <option value="location"><?php echo e(__("Location")); ?></option>
                                                    <option value="category"><?php echo e(__("Category")); ?></option>
                                                    <option value="att"><?php echo e(__("Attribute")); ?></option>
                                                    <option value="founded_date"><?php echo e(__("Founded Date")); ?></option>
                                                    <option value="zipcode"><?php echo e(__("Zip Code")); ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" __name__="company_sidebar_search_fields[__number__][position]" min="0" value="1" class="form-control">
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
                                <select name="company_location_search_style" class="form-control">
                                    <option value="normal" <?php if(setting_item('company_location_search_style') == 'normal'): ?> selected <?php endif; ?> ><?php echo e(__("Normal")); ?></option>
                                    <option value="autocomplete" <?php if(setting_item('company_location_search_style') == 'autocomplete'): ?> selected <?php endif; ?> ><?php echo e(__("Autocomplete from locations")); ?></option>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
            $company_sidebar_cta = setting_item_with_lang('company_sidebar_cta',request()->query('lang'), $settings['company_sidebar_cta'] ?? false);
            if(!empty($company_sidebar_cta)) $company_sidebar_cta = json_decode($company_sidebar_cta);
        ?>
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Sidebar - Call to action")); ?></label>
                    <div class="form-group-border p-3" style="border: 1px solid #ddd">
                        <div class="form-group">
                            <label><?php echo e(__("Title")); ?></label>
                            <div class="form-controls">
                                <input type="text" name="company_sidebar_cta[title]" value="<?php echo e($company_sidebar_cta->title ?? __("Recruiting?")); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__("Description")); ?></label>
                            <div class="form-controls">
                                <textarea name="company_sidebar_cta[desc]" class="form-control"><?php echo e($company_sidebar_cta->desc ?? ''); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__("Button")); ?></label>
                            <div class="form-controls">
                                <div class="input-group">
                                    <input type="text" name="company_sidebar_cta[button][url]" class="form-control" placeholder="<?php echo e(__("Url")); ?>" value="<?php echo e($company_sidebar_cta->button->url ?? ''); ?>">
                                    <input type="text" name="company_sidebar_cta[button][name]" class="form-control" placeholder="<?php echo e(__("Name")); ?>" value="<?php echo e($company_sidebar_cta->button->name ?? ''); ?>">
                                    <div class="input-group-append">
                                        <select name="company_sidebar_cta[button][target]" class="form-control">
                                            <option value="" selected disabled><?php echo e(__("Target")); ?></option>
                                            <option value="_self" <?php if(($company_sidebar_cta->button->target ?? '') == '_self'): ?> selected <?php endif; ?>><?php echo e(__("Same window")); ?></option>
                                            <option value="_blank" <?php if(($company_sidebar_cta->button->target ?? '') == '_blank'): ?> selected <?php endif; ?>><?php echo e(__("Open new tab")); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__("Image")); ?></label>
                            <div class="form-controls">
                                <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('company_sidebar_cta[image]', $company_sidebar_cta->image ?? ''); ?>

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
                                <input type="text" name="company_page_list_seo_title" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e(setting_item_with_lang('company_page_list_seo_title',request()->query('lang'),$settings['company_page_list_seo_title'] ?? "")); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Seo Description")); ?></label>
                                <input type="text" name="company_page_list_seo_desc" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e(setting_item_with_lang('company_page_list_seo_desc',request()->query('lang'),$settings['company_page_list_seo_desc'] ?? "")); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Featured Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('company_page_list_seo_image', $settings['company_page_list_seo_image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <?php $seo_share = !empty($settings['company_page_list_seo_share']) ? json_decode($settings['company_page_list_seo_share'],true): false;
                        $seo_share = setting_item_with_lang('company_page_list_seo_share',request()->query('lang'),$seo_share)
                        ?>
                        <div class="tab-pane" id="seo_2">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Facebook Title")); ?></label>
                                <input type="text" name="company_page_list_seo_share[facebook][title]" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e($seo_share['facebook']['title'] ?? ""); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Facebook Description")); ?></label>
                                <input type="text" name="company_page_list_seo_share[facebook][desc]" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e($seo_share['facebook']['desc'] ?? ""); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Facebook Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('company_page_list_seo_share[facebook][image]',$seo_share['facebook']['image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane" id="seo_3">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Twitter Title")); ?></label>
                                <input type="text" name="company_page_list_seo_share[twitter][title]" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e($seo_share['twitter']['title'] ?? ""); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Twitter Description")); ?></label>
                                <input type="text" name="company_page_list_seo_share[twitter][desc]" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e($seo_share['twitter']['title'] ?? ""); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Twitter Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('company_page_list_seo_share[twitter][image]', $seo_share['twitter']['image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Comany Register')); ?></h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <div class="form-controls">
                            <div class="form-group">
                                <label> <input type="checkbox" <?php if($settings['company_auto_approved'] ?? '' == 1): ?> checked <?php endif; ?> name="company_auto_approved" value="1"> <?php echo e(__("Company Auto Approved?")); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Company Role')); ?></label>
                        <div class="form-controls">
                            <select name="company_role" class="form-control">

                                <?php $__currentLoopData = \Modules\User\Models\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>" <?php echo e(($settings['company_role'] ?? '') == $role->id ? 'selected': ''); ?>><?php echo e(ucfirst($role->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                <?php else: ?>
                    <p><?php echo e(__('You can edit on main lang.')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<hr>
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Company/Views/admin/settings/company.blade.php ENDPATH**/ ?>