<div class="btn-box">
    <?php
        $url = '';
        if(!empty($cv)){
            $file = (new \Modules\Media\Models\MediaFile())->findById($cv->file_id);
            $url  = asset('uploads/'.$file['file_path']);
        }
    ?>
    <?php if($url): ?>
        <?php if(setting_item('candidate_download_cv_required_login') && !auth()->check()): ?>
            <a href="javascript:void(0)" class="theme-btn btn-style-one bc-call-modal login"><?php echo e(__('Download CV')); ?></a>
        <?php elseif((is_candidate() || !$row->enableDownloadCV()) && (!is_admin() && \Illuminate\Support\Facades\Auth::id() != $row->id)): ?>
            <a href="javascript:void(0)" class="theme-btn btn-style-one bc-required" data-require-text="<?php echo e(__('You do not have permission to download CV')); ?>" ><?php echo e(__('Download CV')); ?></a>
        <?php else: ?>
            <a href="<?php echo e($url); ?>" class="theme-btn btn-style-one" target="_blank" download ><?php echo e(__('Download CV')); ?></a>
        <?php endif; ?>
    <?php endif; ?>
    <button class="bookmark-btn <?php if($row->wishlist): ?> active <?php endif; ?> service-wishlist" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>"><span class="flaticon-bookmark"></span></button>
</div>
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Candidate/Views/frontend/layouts/details/candidate-btn-box.blade.php ENDPATH**/ ?>