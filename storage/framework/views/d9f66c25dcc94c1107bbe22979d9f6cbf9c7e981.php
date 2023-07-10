
<?php $__env->startSection('content'); ?>
    <div class="py-3 px-2">
        <ul class="page-breadcrumb">
            <li><a href="#"><?php echo e(__("Buyer Dashboard")); ?></a></li>
            <li><a href="#"><?php echo e(__("My Orders")); ?></a></li>
        </ul>
    </div>

    <div class="upper-title-box">
        <h3 class="title"><?php echo e(__("My Orders")); ?></h3>
        <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
    </div>
    <div class="ls-widget">
        <div class="tabs-box">
            <div class="widget-title"><h4><?php echo e(__("My Orders")); ?></h4></div>
            <div class="widget-content">
                <div class="table-outer">
                    <table class="default-table">
                        <thead>
                        <tr class="carttable_row">
                            <th class="cartm_title"><?php echo e(__('No')); ?></th>
                            <th class="cartm_title"><?php echo e(__('Product')); ?></th>
                            <th class="cartm_title"><?php echo e(__('Price')); ?></th>
                            <th class="cartm_title"><?php echo e(__('Order Date')); ?></th>
                            <th class="cartm_title"><?php echo e(__('Gateway')); ?></th>
                            <th class="cartm_title"><?php echo e(__('Status')); ?></th>
                        </tr>
                        </thead>
                        <tbody class="table_body">

                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $model = $row->model();
                            ?>
                            <tr>
                                <td><?php echo e($rows ->perPage() * ($rows->currentPage()-1) + $k + 1); ?></td>
                                <td scope="row">
                                    <?php if($model): ?>
                                        <?php $url = $model->getDetailUrl()?>
                                        <ul class="cart_list d-flex align-center list-unstyled">
                                            <?php if($model->image_id): ?>
                                                <li class="list-inline-item pr20">
                                                    <?php echo get_image_tag($model->image_id ?? '','thumb',['class'=>'float-left img-120 mw-80']); ?>

                                                </li>
                                            <?php endif; ?>
                                            <li class="list-inline-item"><a class="cart_title" href="<?php echo e($url ? $url : '#'); ?>"><?php echo e($model->title); ?></a></li>
                                        </ul>
                                    <?php else: ?>
                                        <ul class="cart_list d-flex align-center list-unstyled">
                                            <li class="list-inline-item pr20">
                                            </li>
                                            <li class="list-inline-item"><a class="cart_title" ><?php echo e($row->name); ?></a></li>
                                        </ul>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(format_money($row->price)); ?></td>
                                <td><?php echo e(display_datetime($row->created_at)); ?></td>
                                <td><?php echo e($row->order->gateway ?? ''); ?></td>
                                <td><?php echo e($row->status_name); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="ls-pagination">
                        <?php echo e($rows->appends(request()->query())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("Layout::user", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Order/Views/frontend/user/history.blade.php ENDPATH**/ ?>