<!-- ls Switcher -->
<form class="bc-form-order bc-gig-search" method="get">
    <div class="ls-switcher">
        <div class="showing-result">
            <div class="top-filters">
                <div class="form-group">
                    <select class="chosen-select" name="delivery_time" onchange="this.form.submit()">
                        <option value=""><?php echo e(__("Delivery Time")); ?></option>
                        <option <?php if(request()->input('delivery_time') == '1'): ?> selected <?php endif; ?> value="1"><?php echo e(__("Express 24H")); ?></option>
                        <option <?php if(request()->input('delivery_time') == '3'): ?> selected <?php endif; ?> value="3"><?php echo e(__("Up to 3 days")); ?></option>
                        <option <?php if(request()->input('delivery_time') == '7'): ?> selected <?php endif; ?> value="7"><?php echo e(__("Up to 7 days")); ?></option>
                        <option <?php if(request()->input('delivery_time') == 'any_time'): ?> selected <?php endif; ?> value="any_time"><?php echo e(__("Anytime")); ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="chosen-container chosen-container-single chosen-container-single-nosearch">
                        <button type="button" class="chosen-single dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo e(__("Budget")); ?>

                            <div><b></b></div>
                        </button>
                        <div class="dropdown-menu">
                            <div class="ml-3 mr-3" style="width: 300px">
                                <div class="">
                                    <lable>
                                        <?php echo e(__("Min.")); ?> - <?php echo e(__("Max.")); ?>

                                    </lable>
                                    <div class="range-slider-one salary-range">
                                        <input type="hidden" name="amount_from" value="<?php echo e(request()->get('amount_from') ?? $min_max_price[0]); ?>">
                                        <input type="hidden" name="amount_to" value="<?php echo e(request()->get('amount_to') ?? $min_max_price[1]); ?>">
                                        <div class="job-salary-range-slider"
                                             data-min="<?php echo e($min_max_price[0]); ?>"
                                             data-max="<?php echo e($min_max_price[1]); ?>"
                                             data-from="<?php echo e(request()->get('amount_from') ?? $min_max_price[0]); ?>"
                                             data-to="<?php echo e(request()->get('amount_to') ?? $min_max_price[1]); ?>"
                                        ></div>
                                        <div class="input-outer">
                                            <div class="amount-outer">
                                                <span class="amount job-salary-amount">
                                                    <span class="min">0</span>
                                                    <span class="max">0</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="text-right ml-4 mr-4"> <button type="submit" class="btn btn-info btn-sm"> <?php echo e(__("Apply")); ?> </button> </div>
                        </div>
                    </div>
                </div>
                <?php if(!empty($list_categories)): ?>
                    <div class="form-group">
                        <select class="bc-select2 form-control" name="category" onchange="this.form.submit()">
                            <option value=""><?php echo e(__("Choose a category")); ?></option>
                            <?php
                                $cat_id = request()->get('category');
                                $traverse = function ($categories, $prefix = '') use (&$traverse, $cat_id) {
                                    foreach ($categories as $category) {
                                        $selected = '';
                                        if ($cat_id == $category->id)
                                            $selected = 'selected';

                                        $translate = $category->translateOrOrigin(app()->getLocale());
                                        printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $translate->name);
                                        $traverse($category->children, $prefix . '-');
                                    }
                                };
                                $traverse($list_categories);
                            ?>
                        </select>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="sort-by-right">
            <div class="sort-by">
                <select class="chosen-select" name="orderby" onchange="this.form.submit()">
                    <option value=""><?php echo e(__('Sort by (Default)')); ?></option>
                    <option value="new" <?php if(request()->get('orderby') == 'new'): ?> selected <?php endif; ?>><?php echo e(__('Newest')); ?></option>
                    <option value="old" <?php if(request()->get('orderby') == 'old'): ?> selected <?php endif; ?>><?php echo e(__('Oldest')); ?></option>
                    <option value="name_high" <?php if(request()->get('orderby') == 'name_high'): ?> selected <?php endif; ?>><?php echo e(__('Name [a->z]')); ?></option>
                    <option value="name_low" <?php if(request()->get('orderby') == 'name_low'): ?> selected <?php endif; ?>><?php echo e(__('Name [z->a]')); ?></option>
                </select>
            </div>
        </div>
    </div>
</form>
<?php if($rows->isNotEmpty()): ?>
    <div class="ls-switcher">
        <div class="showing-result">
            <div class="text"><?php echo e(__('Showing')); ?> <strong><?php echo e($rows->firstItem()); ?>-<?php echo e($rows->lastItem()); ?></strong> <?php echo e(__('of')); ?> <strong><?php echo e($rows->total()); ?></strong>
                <?php echo e(__('items')); ?></div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Gig/Views/frontend/search/filter.blade.php ENDPATH**/ ?>