<!-- Filter Block -->
<?php if($list_categories): ?>
    <div class="filter-block">
        <h4><?php echo e($val['title']); ?></h4>
        <div class="form-group">

            <select class="bc-select2 form-control" name="category">
                <option><?php echo e(__("Choose a category")); ?></option>
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
            <span class="icon flaticon-briefcase"></span>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\rvoize\modules/Job/Views/frontend/layouts/form-search/fields/form-style-1/category.blade.php ENDPATH**/ ?>