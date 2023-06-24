<div class="inner-column pd-right">
    <form method="GET" action="<?php echo e(route('companies.index')); ?>" class="filters-outer search-company bravo_form_filter">
        <button type="button" class="theme-btn close-filters">X</button>
        <?php if(Request::query('_layout')): ?>
            <input type="hidden" name="_layout" value="<?php echo e(Request::query('_layout')); ?>">
        <?php endif; ?>
        <?php
            $company_sidebar_search_fields = setting_item_array('company_sidebar_search_fields');
            $company_sidebar_search_fields = array_values(\Illuminate\Support\Arr::sort($company_sidebar_search_fields, function ($value) {
                return $value['position'] ?? 0;
            }));
        ?>
        <?php if($company_sidebar_search_fields): ?>
            <?php $__currentLoopData = $company_sidebar_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $val['title'] = $val['title_'.app()->getLocale()] ?? $val['title'] ?? "" ?>
                <?php echo $__env->make("Company::frontend.layouts.sidebars.fields.style-1." . $val['type'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <div class="filter-block submit-filter">
            <button class="btn-submit theme-btn btn-style-one bg-blue" type="submit"><?php echo e(__("Find Employers")); ?></button>
        </div>
    </form>
    <!-- Call To Action -->
    <?php
        $company_sidebar_cta = setting_item_with_lang('company_sidebar_cta',request()->query('lang'), $settings['company_sidebar_cta'] ?? false);
        if(!empty($company_sidebar_cta)) $company_sidebar_cta = json_decode($company_sidebar_cta);
    ?>
    <?php if(!empty($company_sidebar_cta->title)): ?>
        <div class="call-to-action-four">
            <h5><?php echo e($company_sidebar_cta->title ?? ''); ?></h5>
            <p><?php echo e($company_sidebar_cta->desc ?? ''); ?></p>
            <?php if(!empty($company_sidebar_cta->button->url)): ?>
                <a href="<?php echo e(($company_sidebar_cta->button->url)); ?>" class="theme-btn btn-style-one bg-blue"><span class="btn-title"><?php echo e($company_sidebar_cta->button->name ?? __("Start Recruiting Now")); ?></span></a>
            <?php endif; ?>
            <div class="image" style="background-image: url(<?php echo e(!empty($company_sidebar_cta->image) ? \Modules\Media\Helpers\FileHelper::url($company_sidebar_cta->image, 'full') : ''); ?>);"></div>
        </div>
    <?php endif; ?>
    <!-- End Call To Action -->
</div>
<?php $__env->startSection('footer'); ?>
    <script>
        <?php if(!empty(Request::query('from_date')) && !empty(Request::query('to_date'))): ?>
            $(document).on('ready', function () {
                var range_from = '<?php echo e(Request::query('from_date')); ?>';
                var range_to = '<?php echo e(Request::query('to_date')); ?>';
                $(".range-slider-one .range-slider").slider('values',0,range_from);
                $(".range-slider-one .range-slider").slider('values',1,range_to);
                $( ".range-slider-one .count" ).text( range_from + " - " + range_to );
            });
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH E:\xampp\htdocs\rvoize\modules/Company/Views/frontend/layouts/sidebars/category-sidebar.blade.php ENDPATH**/ ?>