<div class="sidebar-widget widget_search search-box">
    <div class="sidebar-title">
        <h4><?php echo e(__('Search by Keywords')); ?></h4>
    </div>

    <form action="<?php echo e(url(app_get_locale(false,false,'/').config('news.news_route_prefix'))); ?>">
        <div class="form-group">
            <span class="icon flaticon-search-1"></span>
            <input type="search" name="s" value="<?php echo e(Request::query("s")); ?>" placeholder="<?php echo e(__("keywords ...")); ?>" aria-label="<?php echo e(__("Company or title")); ?>">
        </div>
    </form>
</div>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/News/Views/frontend/layouts/sidebars/search_form.blade.php ENDPATH**/ ?>