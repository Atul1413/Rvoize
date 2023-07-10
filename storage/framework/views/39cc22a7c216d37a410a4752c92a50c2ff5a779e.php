<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Page Search")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Config page search of your website')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("General Options")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group ">
                    <label class="" ><?php echo e(__("Title Page")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="gig_page_search_title" value="<?php echo e(setting_item_with_lang('gig_page_search_title',request()->query('lang'))); ?>" class="form-control">
                    </div>
                </div>
                <?php if(is_default_lang()): ?>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Require User Plan to Post")); ?></label>
                    <div class="form-controls">
                        <label ><input type="checkbox" name="gig_require_plan" value="1" <?php if(setting_item('gig_require_plan')): ?> checked <?php endif; ?> > <?php echo e(__("Yes Please")); ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Limit item per Page")); ?></label>
                    <div class="form-controls">
                        <input type="number" min="1" name="gig_page_limit_item" placeholder="<?php echo e(__("Default: 24")); ?>" value="<?php echo e(setting_item('gig_page_limit_item', 24)); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Maximum posting gigs")); ?></label>
                    <div class="form-controls">
                        <input type="number" name="gig_max_posts" value="<?php echo e(setting_item('gig_max_posts', '')); ?>" class="form-control">
                        <small><i><?php echo e(__("0 or blank: unlimited")); ?></i></small>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("SEO Options")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
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
                                <input type="text" name="gig_page_list_seo_title" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e(setting_item_with_lang('gig_page_list_seo_title',request()->query('lang'))); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Seo Description")); ?></label>
                                <input type="text" name="gig_page_list_seo_desc" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e(setting_item_with_lang('gig_page_list_seo_desc',request()->query('lang'))); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Featured Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('gig_page_list_seo_image', $settings['gig_page_list_seo_image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <?php
                            $seo_share = json_decode(setting_item_with_lang('gig_page_list_seo_desc',request()->query('lang'),'[]'),true);
                        ?>
                        <div class="tab-pane" id="seo_2">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Facebook Title")); ?></label>
                                <input type="text" name="gig_page_list_seo_share[facebook][title]" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e($seo_share['facebook']['title'] ?? ""); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Facebook Description")); ?></label>
                                <input type="text" name="gig_page_list_seo_share[facebook][desc]" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e($seo_share['facebook']['desc'] ?? ""); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Facebook Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('gig_page_list_seo_share[facebook][image]',$seo_share['facebook']['image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane" id="seo_3">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Twitter Title")); ?></label>
                                <input type="text" name="gig_page_list_seo_share[twitter][title]" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e($seo_share['twitter']['title'] ?? ""); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Twitter Description")); ?></label>
                                <input type="text" name="gig_page_list_seo_share[twitter][desc]" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e($seo_share['twitter']['title'] ?? ""); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Twitter Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('gig_page_list_seo_share[twitter][image]', $seo_share['twitter']['image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(is_default_lang()): ?>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title"><?php echo e(__("Review Options")); ?></h3>
            <p class="form-group-desc"><?php echo e(__('Config review for gig')); ?></p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Enable review system for Gig?")); ?></label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="gig_enable_review" value="1" <?php if(!empty($settings['gig_enable_review'])): ?> checked <?php endif; ?> /> <?php echo e(__("Yes, please enable it")); ?> </label>
                            <br>
                            <small class="form-text text-muted"><?php echo e(__("Turn on the mode for reviewing gig")); ?></small>
                        </div>
                    </div>
                    <div class="form-group" data-condition="gig_enable_review:is(1)">
                        <label class="" ><?php echo e(__("Review number per page")); ?></label>
                        <div class="form-controls">
                            <input type="number" class="form-control" name="gig_review_number_per_page" value="<?php echo e($settings['gig_review_number_per_page'] ?? 5); ?>" />
                            <small class="form-text text-muted"><?php echo e(__("Break comments into pages")); ?></small>
                        </div>
                    </div>
                    <div class="form-group" data-condition="gig_enable_review:is(1)">
                        <label class="" ><?php echo e(__("Review criteria")); ?></label>
                        <div class="form-controls">
                            <div class="form-group-item">
                                <div class="g-items-header">
                                    <div class="row">
                                        <div class="col-md-5"><?php echo e(__("Title")); ?></div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="g-items">
                                    <?php
                                    if(!empty($settings['gig_review_stats'])){
                                    $social_share = json_decode($settings['gig_review_stats']);
                                    ?>
                                    <?php $__currentLoopData = $social_share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item" data-number="<?php echo e($key); ?>">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <input type="text" name="gig_review_stats[<?php echo e($key); ?>][title]" class="form-control" value="<?php echo e($item->title); ?>" placeholder="<?php echo e(__('Eg: Service')); ?>">
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
                                            <div class="col-md-11">
                                                <input type="text" __name__="gig_review_stats[__number__][title]" class="form-control" value="" placeholder="<?php echo e(__('Eg: Service')); ?>">
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
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if(is_default_lang()): ?>
    <?php if(is_default_lang()): ?>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <h3 class="form-group-title"><?php echo e(__("Booking Options")); ?></h3>
                <p class="form-group-desc"><?php echo e(__('Config Booking for event')); ?></p>
            </div>
            <div class="col-sm-8">
                <div class="panel">
                    <div class="panel-body">
                        <div class="form-group-item">
                            <label class="control-label"><?php echo e(__('Booking Buyer Fees')); ?></label>
                            <div class="g-items-header">
                                <div class="row">
                                    <div class="col-md-5"><?php echo e(__("Name")); ?></div>
                                    <div class="col-md-3"><?php echo e(__('Price')); ?></div>
                                    <div class="col-md-3"><?php echo e(__('Type')); ?></div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="g-items">
                                <?php  $languages = \Modules\Language\Models\Language::getActive();  ?>
                                <?php if(!empty($settings['gig_booking_buyer_fees'])): ?>
                                    <?php $gig_booking_buyer_fees = json_decode($settings['gig_booking_buyer_fees'],true); ?>
                                    <?php $__currentLoopData = $gig_booking_buyer_fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$buyer_fee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item" data-number="<?php echo e($key); ?>">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                                            <div class="g-lang">
                                                                <div class="title-lang"><?php echo e($language->name); ?></div>
                                                                <input type="text" name="gig_booking_buyer_fees[<?php echo e($key); ?>][name<?php echo e($key_lang); ?>]" class="form-control" value="<?php echo e($buyer_fee['name'.$key_lang] ?? ''); ?>" placeholder="<?php echo e(__('Fee name')); ?>">
                                                                <input type="text" name="gig_booking_buyer_fees[<?php echo e($key); ?>][desc<?php echo e($key_lang); ?>]" class="form-control" value="<?php echo e($buyer_fee['desc'.$key_lang] ?? ''); ?>" placeholder="<?php echo e(__('Fee desc')); ?>">
                                                            </div>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <input type="text" name="gig_booking_buyer_fees[<?php echo e($key); ?>][name]" class="form-control" value="<?php echo e($buyer_fee['name'] ?? ''); ?>" placeholder="<?php echo e(__('Fee name')); ?>">
                                                        <input type="text" name="gig_booking_buyer_fees[<?php echo e($key); ?>][desc]" class="form-control" value="<?php echo e($buyer_fee['desc'] ?? ''); ?>" placeholder="<?php echo e(__('Fee desc')); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" min="0" step="0.1"  name="gig_booking_buyer_fees[<?php echo e($key); ?>][price]" class="form-control" value="<?php echo e($buyer_fee['price']); ?>">
                                                    <select name="gig_booking_buyer_fees[<?php echo e($key); ?>][unit]" class="form-control">
                                                        <option <?php if( ($buyer_fee['unit'] ?? "") ==  'fixed'): ?> selected <?php endif; ?> value="fixed"><?php echo e(__("Fixed")); ?></option>
                                                        <option <?php if( ($buyer_fee['unit'] ?? "") ==  'percent'): ?> selected <?php endif; ?> value="percent"><?php echo e(__("Percent")); ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="text-right">
                                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                            </div>
                            <div class="g-more hide">
                                <div class="item" data-number="__number__">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $key = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                                    <div class="g-lang">
                                                        <div class="title-lang"><?php echo e($language->name); ?></div>
                                                        <input type="text" __name__="gig_booking_buyer_fees[__number__][name<?php echo e($key); ?>]" class="form-control" value="" placeholder="<?php echo e(__('Fee name')); ?>">
                                                        <input type="text" __name__="gig_booking_buyer_fees[__number__][desc<?php echo e($key); ?>]" class="form-control" value="" placeholder="<?php echo e(__('Fee desc')); ?>">
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <input type="text" __name__="gig_booking_buyer_fees[__number__][name]" class="form-control" value="" placeholder="<?php echo e(__('Fee name')); ?>">
                                                <input type="text" __name__="gig_booking_buyer_fees[__number__][desc]" class="form-control" value="" placeholder="<?php echo e(__('Fee desc')); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" min="0" step="0.1"  __name__="gig_booking_buyer_fees[__number__][price]" class="form-control" value="">
                                            <select __name__="gig_booking_buyer_fees[__number__][unit]" class="form-control">
                                                <option value="fixed"><?php echo e(__("Fixed")); ?></option>
                                                <option value="percent"><?php echo e(__("Percent")); ?></option>
                                            </select>
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
            </div>
        </div>
    <?php endif; ?>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Commission')); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Change your commission config')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <?php if(is_default_lang()): ?>
                    <div class="form-group" >
                        <label><?php echo e(__('Commission Type')); ?></label>
                        <div class="form-controls">
                            <select name="vendor_commission_type" class="form-control">
                                <option value="percent" <?php echo e(($settings['vendor_commission_type'] ?? '') == 'percent' ? 'selected' : ''); ?>><?php echo e(__('Percent')); ?></option>
                                <option value="amount" <?php echo e(($settings['vendor_commission_type'] ?? '') == 'amount' ? 'selected' : ''); ?>><?php echo e(__('Amount')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" >
                        <label><?php echo e(__('Commission Value')); ?></label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="vendor_commission_amount" value="<?php echo e(!empty($settings['vendor_commission_amount'])?$settings['vendor_commission_amount']:"0"); ?>">
                        </div>
                        <p>
                            <i><?php echo e(__('Example value : 10 or 10.5')); ?></i><br>
                            <i><?php echo e(__('Example: 10% commission. Seller get 90%, Admin get 10%')); ?></i>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<hr>
<?php if(is_default_lang()): ?>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Gig Order')); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Change gig order config')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group" >
                    <label><?php echo e(__('Number of days to auto complete delivered orders')); ?></label>
                    <div class="form-controls">
                        <input type="number" step="1" class="form-control" name="gig_days_complete_order" value="<?php echo e(!empty($settings['gig_days_complete_order'])?$settings['gig_days_complete_order']:3); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<?php endif; ?>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Review option')); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Change gig review config')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group" >
                    <label><?php echo e(__('GIG is created by candidate must be approved by admin')); ?></label>
                    <div class="form-controls">
                        <div class="form-controls">
                            <label><input type="checkbox" name="gig_need_approve" value="1" <?php if(setting_item('gig_need_approve')): ?> checked <?php endif; ?> >
                                <?php echo e(__('Yes, please enable it')); ?></label>
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
        <h3 class="form-group-title"><?php echo e(__("Disable Gig module?")); ?></h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("Disable Gig module")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-controls">
                    <label><input type="checkbox" name="gig_disable" value="1" <?php if(setting_item('gig_disable')): ?> checked <?php endif; ?> > <?php echo e(__('Yes, please disable it')); ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Gig/Views/admin/settings/gig.blade.php ENDPATH**/ ?>