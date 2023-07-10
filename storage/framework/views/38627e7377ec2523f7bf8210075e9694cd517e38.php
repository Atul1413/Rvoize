<div class="content">
    <figure class="image"><img src="<?php echo e($row->user->getAvatarUrl()); ?>" alt=""></figure>
    <h4 class="name"><a href="#"><?php echo e($row->user->getDisplayName()); ?></a></h4>
    <ul class="candidate-info">
        <li class="designation"><?php echo e($row->title); ?></li>
        <?php if($row->city): ?>
            <li><span class="icon flaticon-map-locator"></span> <?php echo e($row->city); ?></li>
        <?php endif; ?>
        <?php if($row->expected_salary): ?>
            <li><span class="icon flaticon-money"></span> <?php echo e($row->expected_salary); ?> <?php echo e(currency_symbol()); ?>  / <?php echo e($row->salary_type); ?></li>
        <?php endif; ?>
        <?php if($row->user->created_at): ?>
            <li><span class="icon flaticon-clock"></span> <?php echo e(__('Member Since')); ?> <?php echo e(date('M d, Y', strtotime($row->user->created_at))); ?></li>
        <?php endif; ?>
    </ul>
    <?php
        $categories = $row->getCategory();
    ?>
    <ul class="post-tags">
        <?php if(!empty($row->categories)): ?>
            <?php $__currentLoopData = $row->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $trans = $oneCategory->translateOrOrigin(app()->getLocale()); ?>
                <li><a target="_blank" href="<?php echo e(route('candidate.index', ['category' => $oneCategory->id])); ?>"><?php echo e($trans->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ul>
</div>
<?php /**PATH C:\wamp64\www\rvoize\modules/Candidate/Views/frontend/layouts/details/candidate-block.blade.php ENDPATH**/ ?>