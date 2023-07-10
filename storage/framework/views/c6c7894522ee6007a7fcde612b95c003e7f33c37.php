<!--Page Title-->
<section class="page-title">
    <div class="auto-container">
        <div class="title-outer">
            <h1><?php echo e(setting_item_with_lang('company_page_search_title') ?? __("Companies")); ?></h1>
            <ul class="page-breadcrumb">
                <li><a href="<?php echo e(url("/")); ?>"><?php echo e(__("Home")); ?></a></li>
                <li><?php echo e(__("Companies")); ?></li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->
<!-- Listing Section -->
<section class="ls-section">
    <div class="auto-container">
        <div class="filters-backdrop"></div>
        <div class="row">
            <!-- Filters Column -->
            <div class="filters-column col-lg-4 col-md-12 col-sm-12">
                <?php echo $__env->make('Company::frontend.layouts.sidebars.category-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!-- Content Column -->
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
                <div class="ls-outer">
                    <button type="button" class="theme-btn btn-style-two toggle-filters"><?php echo e(__("Show Filters")); ?></button>
                    <!-- ls Switcher -->
                    <div class="ls-switcher">
                        <div class="showing-result">
                            <div class="text"><?php echo e(__("Showing :from - :to of :total",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></div>
                        </div>
                        <?php echo $__env->make('Company::frontend.layouts.search.company-sort', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- Block Block -->
                    <?php if($rows->count() > 0): ?>
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('Company::frontend.layouts.loop.company-item-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            <?php echo e(__("Sorry, but nothing matched your search terms. Please try again with some different keywords.")); ?>

                        </div>
                    <?php endif; ?>
                    <div class="bravo-pagination">
                        <?php echo e($rows->appends(request()->query())->links()); ?>

                        <?php if($rows->total() > 0): ?>
                            <span class="count-string"><?php echo e(__("Showing :from - :to of :total",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Listing Page Section -->
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Company/Views/frontend/layouts/search/company-list-v1.blade.php ENDPATH**/ ?>