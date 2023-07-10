

<?php $__env->startSection('title','All Advertisement'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__("All Advertisements")); ?></h1>
            
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                <?php if(!empty($rows)): ?>
                    <form method="post" action="<?php echo e(route('company.advertisement.admin.bulkEdit')); ?>" class="filter-form filter-form-left d-flex justify-content-start">
                        <?php echo e(csrf_field()); ?>

                        <select name="action" class="form-control">
                            <option value=""><?php echo e(__(" Bulk Actions ")); ?></option>
                            <option value="delete"><?php echo e(__(" Delete ")); ?></option>
                        </select>
                        <button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button"><?php echo e(__('Apply')); ?></button>
                    </form>
                <?php endif; ?>
            </div>
            <div class="col-left">
                <form method="get" action="#" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <input type="text" name="s" value="<?php echo e(Request()->s); ?>" placeholder="<?php echo e(__('Search by Title / URL')); ?>" class="form-control">
                   
                    <select name="status" class="form-control">
                        <option value=""><?php echo e(__('-- Status --')); ?> </option>
                        <option <?php if((Request()->status == 'publish')): ?> selected <?php endif; ?> value="publish"> <?php echo e(__('Publish')); ?> </option>
                        <option <?php if((Request()->status == 'blocked')): ?> selected <?php endif; ?> value="blocked"> <?php echo e(__('Blocked')); ?> </option>
                    </select>
                   
                    <button class="btn-info btn btn-icon btn_search" type="submit"><?php echo e(__('Search Ads')); ?></button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <p><i><?php echo e(__('Found :total items',['total'=> $rows->total()])); ?></i></p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="alert alert-info alert-block d-none" id="adApproveAlert">
                                
                            </div>
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="60px"><input type="checkbox" class="check-all"></th>
                                    <th class="title"> <?php echo e(__('Ttile')); ?></th>
                                    <th class="title"> <?php echo e(__('Banner')); ?></th>
                                    <th class="title"> <?php echo e(__('URL')); ?></th>
                                    <th class="title"> <?php echo e(__('Company')); ?></th>
                                    <th class="title"> <?php echo e(__('Countries')); ?></th>
                                    <th class="title"> <?php echo e(__('Start Date')); ?></th>
                                    <th width="title"> <?php echo e(__('End Date')); ?></th>
                                    <th width="title"><?php echo e(__('Status')); ?></th>
                                    <th width="title"><?php echo e(__('Approved')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($rows->total() > 0): ?>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check-item" name="ids[]" value="<?php echo e($row->id); ?>">
                                            </td>
                                            <td class="title"> <?php echo e($row->title); ?> </td>
                                            <td>
                                                <?php
                                                    $image = $row->banner()?->first()?->file_path ?? null;
                                                ?>
                                                <?php if(!empty($image)): ?>
                                                    <img src="<?php echo e(asset('uploads/'.$image)); ?>" alt="<?php echo e($row->title); ?>" style="height:50px;width:auto;obect-fit:contain;">
                                                    <?php else: ?> 
                                                    <span>No Image image</span>
                                                <?php endif; ?>
                                            </td>
                                            <td> 
                                                <a href="<?php echo e($row->url); ?>" target="_blank" title="<?php echo e($row->url); ?>">URL</a>
                                            </td>
                                            <td> <?php echo e($row->companies?->name ?? ''); ?></td>
                                            <td>
                                                <?php echo e(implode(', ',$row->countries?->pluck('country')?->toArray() ?? [])); ?>

                                            </td>
                                            <td> <?php echo e(display_date($row->start_date)); ?></td>
                                            <td> <?php echo e(display_date($row->end_date)); ?></td>
                                            <td><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" <?php if($row->is_approved): ?> checked="true" <?php endif; ?> data-id="<?php echo e($row->id); ?>" class="ad-approve" id="<?php echo e("approve_ad__".$row->id); ?>">
                                                    <label class="form-check-label" for="<?php echo e("approve_ad__".$row->id); ?>"></label>
                                                  </div>
                                            </td>
                                            
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8"><?php echo e(__("No data")); ?></td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                            </div>
                        </form>
                        <?php echo e($rows->appends(request()->query())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script>
    const adAlert = $('#adApproveAlert');
   
    $(document).on('click','.ad-approve',function(evt) {
        adId = evt.target.id;
        adEl = $(`#${adId}`);
        if(adEl.length > 0) {
            value = adEl.is(':checked');
            adEl.attr('checked',!value);
            $.ajax({
                url: `<?php echo e(route('company.advertisement.admin.approveAd')); ?>`,
                data: {
                    'ad_id' : adEl.data('id'), 
                    'approve': value
                },
                dataType: 'json',
                type: 'post',
                success: function (res) {
                    if (res.status === false) {
                        superioApp.showError(res);
                        adAlert.addClass('d-none')
                    }
                    if (res.status === true) {
                        adAlert.removeClass('d-none')
                        adAlert.html('<button type="button" class="close" data-dismiss="alert">×</button> <span>' + res.message + '</span>');
                        
                    }
                },
                error: function (e) {
                    superioApp.showAjaxError(e);
                }
            });
        }
    });
</script>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\rvoize\modules/Advertisement/Views/admin/list-ads.blade.php ENDPATH**/ ?>